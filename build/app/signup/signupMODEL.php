<?php

    function getEmails(PDO $pdo , string $email){

        $query = 'SELECT email FROM users WHERE email = :email ;';

        $statment = $pdo->prepare($query);
        $statment->bindParam(':email',$email);
        $statment->execute();

        $result = $statment->fetch(PDO::FETCH_ASSOC);

        return $result ;


    }


    function createNewUser(PDO $pdo , string $username , string $email , string $pwd){
        $query = 'INSERT INTO users (username , email , pwd) VALUES (:username , :email , :pwd);';

        $statment = $pdo->prepare($query);
        $statment->bindParam(':username' , $username);
        $statment->bindParam(':email' , $email);
        $statment->bindParam(':pwd' , $pwd);

        $statment->execute();

    }

?>