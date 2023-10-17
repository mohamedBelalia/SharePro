<?php

    function addComment(PDO $pdo , string $userId , string $productId , string $userName , string $commentText){
        $query = "INSERT INTO comments (idUser,idProduct,commentOwnerName,commentText) VALUES (:idUser,:idProduct,:commentOwnerName,:commentText);";

        $statment = $pdo->prepare($query);

        $statment->bindParam(":idUser",$userId);
        $statment->bindParam(":idProduct",$productId);
        $statment->bindParam(":commentOwnerName",$userName);
        $statment->bindParam(":commentText",$commentText);

        $statment->execute();
    }


    function getProductComments(PDO $pdo , string $productId){
        $query = "SELECT * FROM comments WHERE idProduct = :idProduct;" ;

        $statment = $pdo->prepare($query);
        $statment->bindParam(":idProduct" , $productId);
        $statment->execute();

        $comments = $statment->fetchAll(PDO::FETCH_ASSOC);

        return $comments ;
    }

?>