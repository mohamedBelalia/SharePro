<?php

function img_validation(string $imgName):bool{

    $nameArray = explode('.',$imgName);
    $extension = $nameArray[count($nameArray) - 1];

    if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
        return false ;
    }

    return true ;
}


function is_fields_empty(string $title , string $description , int $price){
    if(empty($title) || empty($description) || empty($price)){
        return true ;
    }

    return false ;
}


function creating_new_post(PDO $pdo, string $imgName , string $productName , string $productDescription, int $productPrice , int $ownerId , string $ownerName){
    new_product($pdo,$imgName,$productName,$productDescription,$productPrice,$ownerId,$ownerName);
}


?>