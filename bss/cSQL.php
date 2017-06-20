<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    
    session_start();
    $addUsername = $_REQUEST["addUsername"];
    $addPassword = $_REQUEST["addPassword"];
    $insert = "insert into users(username,password) values ('$addUsername','$addPassword')";

    $updateUsername = $_REQUEST["updateUsername"];
    $updatePassword = $_REQUEST["updatePassword"];
    $updateUserID = $_REQUEST["id"];
    $update = "update users set username = '$updateUsername',password = '$updatePassword' where userID = '$updateUserID'";
    
    $deleteID = $_POST["deleteID"];
    $delete = "delete from users where userID = '$deleteID'";
    mysql_query($delete);

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/users.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/users.php");
    }
    mysql_close($conn);
?>