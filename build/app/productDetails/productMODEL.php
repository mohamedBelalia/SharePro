<?php

function productDetails(PDO $pdo , string $id){
    
    $query = "SELECT * FROM productstable WHERE id = :id";
    $statment = $pdo->prepare($query);
    $statment->bindParam(':id' , $id);

    $statment->execute();

    $details = $statment->fetch(PDO::FETCH_ASSOC);

    return $details ;
}

function fromSameSeller(PDO $pdo , string $sellerId){
    $query = "SELECT * FROM productstable WHERE ownerId = :ownerId;";
    $statment = $pdo->prepare($query);

    $statment->bindParam(':ownerId',$sellerId);
    $statment->execute();

    $products = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $products ;
}

?>