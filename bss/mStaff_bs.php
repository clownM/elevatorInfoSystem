<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");

    session_start();    
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $mcorpid = $_REQUEST["mcorpid"];
    $staffno = $_REQUEST["staffno"];
    $gender = $_REQUEST["gender"];
    $idcardno = $_REQUEST["idcardno"];
    $phone = $_REQUEST["phone"];

    $insert = "insert into mstaff(name,mcorpid,staffno,gender,idcardno,phone) values ('$name','$mcorpid','$staffno','$gender','$idcardno','$phone')";
    $update = "update mstaff set name = '$name',mcorpid = '$mcorpid',staffno = '$staffno',gender = '$gender',idcardno = '$idcardno',phone = '$phone' where id = '$id'";

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/mStaff.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/mStaff.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from mstaff where id = '$deleteID'";
    mysql_query($delete);

    mysql_close($conn);
?>