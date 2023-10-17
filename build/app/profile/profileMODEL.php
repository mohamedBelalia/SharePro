<?php

function getPublishedPosts(PDO $pdo , string $userId){

    $query = "SELECT * FROM productstable WHERE ownerId = :userId";

    $statment = $pdo->prepare($query);
    $statment->bindParam(":userId",$userId);
    $statment->execute();

    $posts = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $posts ;
}



function  getDemandsInfos(PDO $pdo , string $ownerId){
    $query = "SELECT * FROM shoppingcartelements WHERE productOwnerId = :productOwnerId";

    $statment = $pdo->prepare($query);
    $statment->bindParam(":productOwnerId" , $ownerId);
    $statment->execute();

    $demandsInfos = $statment->fetchAll(PDO::FETCH_ASSOC);

    return $demandsInfos ;

}


function getCustomerInfos(PDO $pdo , string $id){
    $query = "SELECT userName , email FROM users WHERE id = :id";

    $statment = $pdo->prepare($query);
    $statment->bindParam(":id" , $id);
    $statment->execute();

    $customerInfos = $statment->fetch(PDO::FETCH_ASSOC);

    return $customerInfos ;
}


function getProductsInfos(PDO $pdo , string $id){
    $query = "SELECT * FROM productstable WHERE id = :id";

    $statment = $pdo->prepare($query);
    $statment->bindParam(":id",$id);
    $statment->execute();

    $productInfo = $statment->fetch(PDO::FETCH_ASSOC);

    return $productInfo ;
}


?>

