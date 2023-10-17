<?php
session_start();
if(isset($_SESSION['userData'])){
    $userId = $_SESSION['userData']['id'] ;
    $productId = $_GET["productId"] ;
    $ownerId = $_GET["ownerId"];
    $itemsCount = 1; 
    try {
        require_once("../dbh.php");
        require_once("addToCartMODEL.php");
        require_once("addToCartCTRL.php");

     

        if(getItemsCount($pdo , $userId , $productId)){
            $itemsCount = getItemsCount($pdo , $userId , $productId) ;
            updateExistedItem($pdo, $userId ,$productId,$itemsCount);
            
        }
        else{
            addToCart($pdo , $userId , $productId , $itemsCount , $ownerId );
        }
        
        if($_GET['source'] == "index"){
            $_SESSION['addedSuccessfully'] = "Added Successfully !";
            header('location: ../index.php?section=home');
        }
        else{ 
            header('location: ../index.php?section=shoppingCart');
        }
        

    } catch (PDOException $e) {
        die('Query Faild ' . $e->getMessage());
    }
    
}
else{
    $_SESSION['loginFirst'] = "Login To Added The Product !";
    header('location: ../index.php?section=Login'); 
}


?>