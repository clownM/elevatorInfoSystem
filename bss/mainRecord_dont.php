<?php
    $conn = mysql_connect("localhost","MChen","123");
    mysql_select_db("bishe");
    mysql_query("set names 'utf8'");
    $arr = $_POST["arr"];
    foreach($arr as $id){
        $sql = mysql_query("select jihuadate from mainrecord where id = '$id'");
        $today = date("Y-m-d");
        while($row = mysql_fetch_array($sql)){
            $days = round((strtotime($row["jihuadate"])-strtotime($today))/3600/24);
            if($days < 0){
                mysql_query("update mainrecord set status = '0' where id = '$id'");
            }else if($days >= 0 && $days <= 3){
                mysql_query("update mainrecord set status = '1' where id = '$id'");
            }
        }
        
    }
    mysql_close($conn);
?>