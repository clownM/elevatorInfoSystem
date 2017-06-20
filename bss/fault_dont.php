<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    $arr = $_POST["arr"];
    foreach($arr as $id){
        $sql = "update faultrecord set status = '0',edtime = '' where id = '$id'";
        mysql_query($sql);
    } 
    mysql_close($conn);
?>