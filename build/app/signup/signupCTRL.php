<?php

function is_inputs_empty(string $username , string $email , string $pwd):bool{
    
    if(empty($username) || empty($email) || empty($pwd)){
        return true ;
    }
  
        return false;
  

}


function is_email_taken(PDO $pdo , string $email):bool{

    if(getEmails($pdo , $email)){
        return true ;
    }
 
        return false ;
   

}

function createUser(PDO $pdo , string $username , string $email , string $pwd){
    createNewUser($pdo , $username , $email , $pwd);
}

?>