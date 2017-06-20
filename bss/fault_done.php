<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    $arr = $_POST["arr"];
    $datetime = $_POST["datetime"];
    foreach($arr as $id){
        mysql_query("update faultrecord set status = '1',edtime = '$datetime' where id = '$id'");
    }
    mysql_close($conn);
?>