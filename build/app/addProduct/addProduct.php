<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $productName = $_POST["name"];
    $productDescription = $_POST["description"];
    $productPrice = (int)$_POST["price"];
    $productImg = $_FILES["productImg"]["name"];
    $ownerID = $_SESSION['userData']['id'];
    $ownerName = $_SESSION['userData']['username'];

    $productImg = str_replace(" " , "_" , $productImg);

    $part1 = rand(10000,99999);
    $part2 = rand(9999,99999);

    $imageName = $part1 . "&" . $part2 . "&" . $productImg;
    $productPath = "../productsImages/" . $imageName ;

     
        
    try {
        require_once("../dbh.php");
        require_once("addProductMODEL.php");
        require_once("addProductCTRL.php");
        

        $errors = [] ;

        if(img_validation($imageName)){
            $errors['imgNotValid'] = "Only 'png' , 'jpeg' and 'jpg' accepted!";
        }

        if(is_fields_empty($productName,$productDescription , $productPrice)){
            $errors['fieldsEmpty'] = "filling out all the fields!";
        }

        if($errors){ 
            $_SESSION["postingErrors"] = $errors;
            header('location: ../index.php?section=addProduct');
         
        }
        else{
            $_SESSION["postingSuccessfully"] = "Your Product Added Successfully!";
            move_uploaded_file($_FILES["productImg"]["tmp_name"] , $productPath);
            creating_new_post($pdo,$imageName,$productName,$productDescription,$productPrice,$ownerID,$ownerName);
            header('location: ../index.php');
        }

    } catch (PDOException $e) {
        die("error " . $e->getMessage());
    }

}
else{
    header("location: ../index.php");
}


?>