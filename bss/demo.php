<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    
    session_start();
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $address = $_REQUEST["address"];
    $boss = $_REQUEST["boss"];
    $phone = $_REQUEST["phone"];
    $email = $_REQUEST["email"];
    $licenseno = $_REQUEST["licenseno"];
?>