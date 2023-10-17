<?php

function getProductsId(PDO $pdo , string $userId){
    $query = "SELECT productId FROM shoppingcartelements WHERE userId = :userId ;";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':userId',$userId);
    $statment->execute();

    $productIds = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $productIds ;
}

function getProductDetails(PDO $pdo , string $productId){
    $query = "SELECT * FROM productstable WHERE id = :id";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':id',$productId);
    $statment->execute();
    $productDetails = $statment->fetch(PDO::FETCH_ASSOC);

    return $productDetails ;
}

?>