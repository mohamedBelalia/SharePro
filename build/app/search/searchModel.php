<?php


function searching(PDO $pdo , string $value){

    $query = "SELECT * FROM productstable WHERE productName LIKE '%$value%' || productDescription LIKE '%$value%';" ;
    
    $statment = $pdo->prepare($query);

    $statment->execute();

    $products = $statment->fetchAll(PDO::FETCH_ASSOC);
    
    return $products ;
}


?>