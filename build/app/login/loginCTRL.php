<?php

function is_inputs_empty(string $email , string $pwd):bool{
    if(empty($email) || empty($pwd)){
        return true ;
    }
    return false ;
}

function pwd_email_wrong(PDO $pdo , string $email , string $pwd):bool{

    if(get_user_info($pdo , $email , $pwd)){
        return false ;
    }

    return true ;
}

?>