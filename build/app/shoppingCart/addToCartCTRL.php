<?php

function getItemsCount(PDO $pdo , string $userId ,string $productId){
    $itemsCount = 1 ;
    if(duplicateItem($pdo , $userId , $productId)){
        $count = duplicateItem($pdo , $userId , $productId);
        $itemsCount = (int)$count + 1;

        return $itemsCount ;
    }

    return false ;
}

?>