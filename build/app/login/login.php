<?php

session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $email = $_POST['email'];
        $pwd = $_POST['password'];

        try {

            require_once('../dbh.php');
            require_once('loginMODEL.php');
            require_once('loginCTRL.php');


            $errors = [] ;
            $result = get_user_info($pdo , $email , $pwd);

            if(is_inputs_empty($email,$pwd)){
                $errors['empty_inputs'] = "filling out all the fields!";
            }

            if(pwd_email_wrong($pdo , $email , $pwd)){
                $errors['email_or_pwd_wrong'] = "Email or Password is Wrong!";
            }

            if($errors){
                $_SESSION['loginErrors'] = $errors ;
                header('location: ../index.php?section=Login');
            } 
            else{
                $_SESSION['userData'] = $result;
                $_SESSION['loginSuccessfully'] = 'Wellcome' ;
                header('location: ../index.php');
            }
           
 
        } catch (PDOException $e) {
           die('Something wrong ' + $e->getMessage());
        }


    }
    else{
        echo "who are you";
    }


?>