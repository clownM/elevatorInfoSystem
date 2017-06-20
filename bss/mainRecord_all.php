<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    mysql_query("update mainrecord set status = '2' where status = '0'");
    mysql_query("update mainrecord set status = '2' where status = '1'");
    mysql_close($conn);
?>