<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");

    session_start();    
    $id = $_REQUEST["id"];
    $model = $_REQUEST["model"];
    $user = $_REQUEST["user"];
    $location = $_REQUEST["location"];
    $type = $_REQUEST["type"];
    $usingdate = $_REQUEST["usingdate"];
    $capacity = $_REQUEST["capacity"];
    $speed = $_REQUEST["speed"];
    $vendor = $_REQUEST["vendor"];
    $installcorp = $_REQUEST["installcorp"];
    $mcorp = $_REQUEST["mcorp"];
    $mstaff = $_REQUEST["mstaff"];
    $wuyecorp = $_REQUEST["wuyecorp"];
    $wuyestaff = $_REQUEST["wuyestaff"];
    $mdate = $_REQUEST["mdate"];
    $mcycletime = $_REQUEST["mcycletime"];

    $insert = "insert into elevbasicinfo(model,userid,location,type,usingdate,capacity,speed,vendorid,installcorpid,mcorpid,mstaffno,wuyecorpid,wuyestaffno,mdate,mcycletime) values ('$model','$user','$location','$type','$usingdate','$capacity','$speed','$vendor','$installcorp','$mcorp','$mstaff','$wuyecorp','$wuyestaff','$mdate','$mcycletime')";

    $update = "update elevbasicinfo set model = '$model',userid = '$user',location = '$location',type = '$type',usingdate = '$usingdate',capacity = '$capacity',speed = '$speed',vendorid = '$vendor',installcorpid = '$installcorp',mcorpid = '$mcorp',mstaffno = '$mstaff',wuyecorpid = '$wuyecorp',wuyestaffno = '$wuyestaff',mdate = '$mdate',mcycletime = '$mcycletime' where id = '$id'";


    if(isset($_REQUEST["addSubmit"])){
        mysql_query($insert);
        header("location:../pages/docs/elevBInfo.php");
    }
    if(isset($_REQUEST["updateSubmit"])){
        mysql_query($update);
        header("location:../pages/docs/elevBInfo.php");
    }

    $deleteID = $_POST["deleteID"];
    $delete = "delete from elevbasicinfo where id = '$deleteID'";
    mysql_query($delete);

    mysql_close($conn);
?>