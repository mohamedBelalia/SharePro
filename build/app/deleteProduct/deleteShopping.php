<?php
session_start();
if(isset($_SESSION['userData'])){
    $productId = $_GET['productId'];
    $userId = $_SESSION['userData']['id'] ;

    try {
        require_once('../dbh.php');
        require_once('deleteShoppingMODEL.php');

        if(currentItemsCount($pdo , $userId , $productId)){
            $currentCount = (int)currentItemsCount($pdo , $userId , $productId);
            $currentCount -= 1 ;
            
            if($currentCount >0){
                deleteOneByOne($pdo , $userId , $productId , $currentCount);
                header('location: ../index.php?section=shoppingCart');
            }
            else{
                deleteProduct($pdo , $userId , $productId);
                header('location: ../index.php?section=shoppingCart');
            }
            
        }

    } catch (PDOException $e) {
        die('Deleteing faild ' . $e->getMessage());
    }
    
}
else{
    header('location : ../index.php');
}

?>