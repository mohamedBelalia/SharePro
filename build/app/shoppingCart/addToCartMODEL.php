<?php

function addToCart(PDO $pdo , string $userId , string $productId , string $itemsCount , string $ownerId){
    $query = "INSERT INTO shoppingcartelements (userId , productId , itemsCount , productOwnerId) VALUES (:userId , :productId , :itemsCount , :productOwnerId)" ;

    $statment = $pdo->prepare($query);

    $statment->bindParam(':userId',$userId);
    $statment->bindParam(':productId',$productId);
    $statment->bindParam(':itemsCount',$itemsCount);
    $statment->bindParam(':productOwnerId',$ownerId);

    $statment->execute(); 
 
}

function updateExistedItem(PDO $pdo , string $userId , string $productId , string $itemsCount){
    $query = "UPDATE shoppingcartelements SET itemsCount = :itemsCount WHERE userId = :userId AND productId = :productId;";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':itemsCount', $itemsCount);
    $statment->bindParam(':userId', $userId);
    $statment->bindParam(':productId', $productId);
    $statment->execute();
}



function duplicateItem(PDO $pdo , string $userId , string $productId){
    $query = "SELECT itemsCount FROM shoppingcartelements WHERE userId = :userId AND productId = :productId";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':userId' , $userId);
    $statment->bindParam(':productId' , $productId);

    $statment->execute();

    $result = $statment->fetch(PDO::FETCH_ASSOC);

    if($result){
        return $result["itemsCount"] ;
    }

    return false ;

}

?>