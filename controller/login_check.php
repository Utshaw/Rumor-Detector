<?php

session_start();

if(isset($_SESSION["user_id"])){
    $session_user_id = $_SESSION["user_id"];
    $session_user_name = $_SESSION["user_name"];

}
