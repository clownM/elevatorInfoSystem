<?php
    include 'demo.php';

    $insert = "insert into installcorp(name,licenseno,address,boss,phone,email) values ('$name','$licenseno','$address','$boss','$phone','$email')";
    $update = "update installcorp set name = '$name',licenseno = '$licenseno',address = '$address',boss = '$boss',phone = '$phone',email = '$email' where id = '$id'";

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/installCorp.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/installCorp.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from installcorp where id = '$deleteID'";
    mysql_query($delete);

    mysql_close($conn);
?>