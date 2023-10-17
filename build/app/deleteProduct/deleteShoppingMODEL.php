<?php

function deleteOneByOne(PDO $pdo , string $userId , string $productId , int $newCount){
    $query = "UPDATE shoppingcartelements SET itemsCount = :newItemsCount WHERE userId = :userId AND productId = :productId ;" ;

    $statment = $pdo->prepare($query);
    $statment->bindParam(':userId',$userId);
    $statment->bindParam(':productId',$productId);
    $statment->bindParam(':newItemsCount',$newCount);

    $statment->execute();
}

function currentItemsCount(PDO $pdo , string $userId , string $productId ){
    $query = "SELECT * FROM shoppingcartelements WHERE userId = :userId AND productId = :productId;";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':userId',$userId);
    $statment->bindParam(':productId',$productId);

    $statment->execute();

    $currentCount = $statment->fetch(PDO::FETCH_ASSOC);

    return $currentCount["itemsCount"] ;
}

function deleteProduct(PDO $pdo , string $userId , string $productId){
    $query = "DELETE FROM shoppingcartelements WHERE userId = :userId AND productId = :productId;";
    
    $statment = $pdo->prepare($query);
    $statment->bindParam(':userId',$userId);
    $statment->bindParam(':productId',$productId);

    $statment->execute();

}

?>