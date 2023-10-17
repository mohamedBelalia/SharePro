<?php

function getPostData(PDO $pdo , string $id){

    $query = "SELECT * FROM productstable WHERE id = :id";

    $statment = $pdo->prepare($query);
    $statment->bindParam(':id' , $id);

    $statment->execute();

    $postData = $statment->fetch(PDO::FETCH_ASSOC);

    return $postData ;

} 

function editProductData(PDO $pdo,string $id,string $productName,string $productDescription,string $productPrice,string $productImg){
    $query = "UPDATE productstable SET imgName = :imgName , productName = :productName , productDescription = :productDescription , productPrice = :productPrice WHERE id = :id";
    
    $statment = $pdo->prepare($query);

    $statment->bindParam(":imgName",$productImg);
    $statment->bindParam(":productName",$productName);
    $statment->bindParam(":productDescription",$productDescription);
    $statment->bindParam(":productPrice",$productPrice);
    $statment->bindParam(":id",$id);
	
	$statment->execute();

}




?>