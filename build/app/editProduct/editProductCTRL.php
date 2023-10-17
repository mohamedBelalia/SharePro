<?php

    function inputs_empty(string $name, string $description , string $price , string $img):bool{
        if(empty($name) || empty($description) || empty($price) || empty($img)){
            return true ;
        }
        return false ;
    }

?>