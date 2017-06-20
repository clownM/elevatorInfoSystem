<?php
    session_start();
    if(!isset($_SESSION["flag"])){
        $username = $_REQUEST["username"];
        header("location:/bishe/pages/login.php");
    }                                  
?>