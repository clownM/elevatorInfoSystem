<?php
    include 'demo.php';

    $insert = "insert into mcorp(name,licenseno,address,boss,phone,email) values ('$name','$licenseno','$address','$boss','$phone','$email')";
    $update = "update mcorp set name = '$name',licenseno = '$licenseno',address = '$address',boss = '$boss',phone = '$phone',email = '$email' where id = '$id'";

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/mcorp.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/mcorp.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from mcorp where id = '$deleteID'";
    mysql_query($delete);
?>