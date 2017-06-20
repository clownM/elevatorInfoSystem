<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");

    session_start();    
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $wuyecorpid = $_REQUEST["wuyecorpid"];
    $staffno = $_REQUEST["staffno"];
    $gender = $_REQUEST["gender"];
    $idcardno = $_REQUEST["idcardno"];
    $phone = $_REQUEST["phone"];

    $insert = "insert into wuyestaff(name,wuyecorpid,staffno,gender,idcardno,phone) values ('$name','$wuyecorpid','$staffno','$gender','$idcardno','$phone')";
    $update = "update wuyestaff set name = '$name',wuyecorpid = '$wuyecorpid',staffno = '$staffno',gender = '$gender',idcardno = '$idcardno',phone = '$phone' where id = '$id'";

    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/wuyeStaff.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/wuyeStaff.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from wuyestaff where id = '$deleteID'";
    mysql_query($delete);

    mysql_close($conn);
?>