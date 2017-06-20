<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    $arr = $_POST["arr"];
    foreach($arr as $id){
        mysql_query("update mainrecord set status = '2' where id = '$id'");
    }
    mysql_close($conn);
?>