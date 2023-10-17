<?php

session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = $_POST["password"];

        try {

            require_once("../dbh.php");
            require_once("signupMODEL.php");
            require_once("signupCTRL.php");

            $errors = [] ;

            if(is_inputs_empty($username , $email , $pwd)){
                $errors["inputsEmty"] = "filling out all the fields";
            }

            if(is_email_taken($pdo , $email)){
                $errors["emailIsTaken"] = "Email already exists" ;
            }
            
            if($errors){
                $_SESSION['signupErrors'] = $errors ;
                header('location: ../index.php?section=Signup');
            }
            else{
                // $pwd = password_hash($pwd , PASSWORD_DEFAULT) ;
                createUser($pdo , $username , $email ,$pwd);
                $_SESSION['signupSuccess'] = 'Login to confirm your account !';
                header('location: ../index.php?section=Login');
            }
            

        } catch (PDOException $e) {
            die("Query faild " . $e->getMessage());
        }

    }
    else{
        echo "who are you";
    }
?>