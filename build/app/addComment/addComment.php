<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $comment = $_POST["comment"];
    $productId = $_POST["productId"];
    $userId = $_SESSION['userData']["id"];
    $userName = $_SESSION['userData']["username"];

    try {

        require_once("../dbh.php");
        require_once("addCommentModel.php");
        
        $errors = [] ;

        if(strlen($comment) <= 0){
            $errors["emptyField"] = "Don't let it empty !" ;
        }

        if($errors){
            $_SESSION["emptyField"] = $errors ;
            header("location: ../index.php?section=product-details&id=$productId");
        }
        else{
            $_SESSION["commentAddedSuccessufly"] = "Your Comment Added Successfuly !";
            addComment($pdo , $userId , $productId , $userName , $comment);
            header("location: ../index.php?section=product-details&id=$productId");
        }
      

    } catch (PDOException $e) {
        die("Faild to add a comment " . $e->getMessage());
    }
    
}



?>