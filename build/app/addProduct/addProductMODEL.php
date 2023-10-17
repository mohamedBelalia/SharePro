<?php

function new_product(PDO $pdo , string $imgName , string $productName , string $productDescription , int $productPrice , int $ownerId , string $ownerName){

    $query = "INSERT INTO productstable (imgName,productName,productDescription,productPrice,ownerId,ownerName) VALUES (:imgName,:productName,:productDescription,:productPrice,:ownerId,:ownerName)";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':imgName',$imgName);
    $statment->bindParam(':productName',$productName);
    $statment->bindParam(':productDescription',$productDescription);
    $statment->bindParam(':productPrice',$productPrice);
    $statment->bindParam(':ownerId',$ownerId);
    $statment->bindParam(':ownerName',$ownerName);

    $statment->execute();

}

?>