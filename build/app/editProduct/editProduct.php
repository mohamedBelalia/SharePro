<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $productName = $_POST["name"];
    $productDescription = $_POST["description"];
    $productPrice = $_POST["price"];
    $productImg = $_FILES["productImg"]["name"];
    $oldImgPath = $_POST["oldImgPath"];

    
    try {

        require_once('../dbh.php');
        require_once('editPostMODEL.php');
        require_once('editProductCTRL.php');
        require_once('../addProduct/addProductCTRL.php');

        $errors = [] ;

        if(!empty($productImg)){
            $oldImgName = $oldImgPath ;
            $imgParts = explode('.',$productImg);
            $imgExtension =  $imgParts[count($imgParts)-1] ;
            $oldImgPath = explode('.',$oldImgPath);
            array_pop($oldImgPath);
            $oldImgPath = implode('.',$oldImgPath);
            
            $productImg = $oldImgPath . "." . $imgExtension ;
    
        }
        else{
            $productImg = $oldImgPath ;
        }
        
        $imgPath ="../productsImages/" . $productImg ;
        

        if(inputs_empty($productName,$productDescription,$productPrice,$productImg)){
            $errors['inputsEmpty'] = "filling out all the fields!";
        }

        if(img_validation($productImg)){
            $errors['imgNotValid'] = "Only 'png' , 'jpeg' and 'jpg' accepted!" ;
        }

        if($errors){
            $_SESSION['editingErrors'] = $errors ;
            header('location: ../index.php?section=edit-product&id='.$id);
        }
        else{
            
            if (file_exists("../productsImages/".$oldImgName)) {
              
                if (unlink("../productsImages/".$oldImgName)) {
                    move_uploaded_file($_FILES["productImg"]["tmp_name"] , $imgPath);
                    echo 'Image removed successfully.';
                } else {
                    echo 'Failed to remove the image.';
                }
            } else {
                echo 'Image not found.';
            }

            editProductData($pdo,$id,$productName,$productDescription,$productPrice,$productImg);

            $_SESSION["productEdited"] = "Your Product Edited Successfully!";
            header('location: ../index.php');
        }

    

    } catch (PDOException $e) {
        die("Query faild " . $e->getMessage());
    }

    
    
   
}

?>