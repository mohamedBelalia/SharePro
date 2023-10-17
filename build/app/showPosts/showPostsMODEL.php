<?php

    function showPosts(PDO $pdo){

        $query = "SELECT * FROM productstable ;";

        $statment = $pdo->prepare($query);

        $statment->execute();

        $posts = $statment->fetchAll(PDO::FETCH_ASSOC);

        return $posts ;

    }


?>