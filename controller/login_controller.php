<?php


session_start();

require_once '../model/dbconnection.php';
require_once '../model/dataAccess.php';

$message = "";

$daoObject = DAO::getInstance();



if(isset($_SESSION["user_id"])){
    header("location:index.php");

}else{
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            $message = "Please fill up email and password";
        }else{
            $user = new user();
            $user->Email = $email;
            $user->Password = $password;
            $results  = $daoObject->loginAttempt($user);


            if(count($results) > 0){
                $user_id = $results[0]->User_ID;
                $user_name = $results[0]->Name;

                $_SESSION["user_name"] = $user_name;
                $_SESSION["user_id"] = $user_id;
                header("location:index.php");

            }else{
                $message = "Error in signing in . \n Incorrect email or password! Otherwise, unregistered account or your account is blocked by admin";
            }



        }

    }else{

        if($_GET['message'] == "loginfirst") {
            $message = "You need to login first to cast your vote";
        }
    }
}

