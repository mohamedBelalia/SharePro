<?php

    $hostname = "localhost" ;
    $dbname = "shareproductdb";
    $dbUsername = "root";
    $dbpwd = "";

    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try {

        $pdo = new PDO($dsn , $dbUsername , $dbpwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        
        die("Connection faild " . $e->getMessage()); 
    }
 
?>