<?php
    include 'demo.php';

    $insert = "insert into eusers(name,address,boss,phone,email) values ('$name','$address','$boss','$phone','$email')";
    $update = "update eusers set name = '$name',address = '$address',boss = '$boss',phone = '$phone',email = '$email' where id = '$id'";

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/eUsers.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/eUsers.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from eusers where id = '$deleteID'";
    mysql_query($delete);

    mysql_close($conn);
?>