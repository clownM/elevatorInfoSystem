<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    $datetime = $_POST["datetime"];
    mysql_query("update faultrecord set status = '1',edtime='$datetime' where status = '0'");
    mysql_close($conn);
?>