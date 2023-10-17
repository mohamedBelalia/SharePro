<?php

function get_user_info(PDO $pdo ,string $email , string $pwd){
    $query = 'SELECT * FROM users WHERE email = :email AND pwd = :pwd ;';

    $statment = $pdo->prepare($query);
    $statment->bindParam(':email',$email);
    $statment->bindParam(':pwd',$pwd);

    $statment->execute();

    $result = $statment->fetch(PDO::FETCH_ASSOC);

    return $result ;

}


?>