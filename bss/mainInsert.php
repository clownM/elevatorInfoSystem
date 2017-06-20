<?php
    ini_set('date.timezone','Asia/Beijing');
    ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
    set_time_limit(0);
    $interval = 12 * 3600;//程序执行时间间隔为12小时
    do{
        $conn = mysql_connect("localhost","MChen","123");
        mysql_select_db("bishe");
        mysql_query("set names 'utf8'");
        $result = mysql_query("select id,userid,location,mcorpid,mstaffno,mdate,mcycletime from elevbasicinfo");
        while($row = mysql_fetch_array($result)){
            $eid = $row["id"];
            $userid = $row["userid"];
            $sub0 = mysql_query("select name from eusers where id = '$userid'");
            while($row0 = mysql_fetch_array($sub0)){
                $user = $row0["name"];
            };
            $location = $row["location"];
            $mcorpid = $row["mcorpid"];
            $sub1 = mysql_query("select name from mcorp where id = '$mcorpid'");
            while($row1 = mysql_fetch_array($sub1)){
                $mcorp = $row1["name"];
            };
            $mstaffno = $row["mstaffno"];
            $sub2 = mysql_query("select name from mstaff where staffno = '$mstaffno'");
            while($row2 = mysql_fetch_array($sub2)){
                $mstaff = $row2["name"];
            };
            $jihuadate = $row["mdate"];
            $mcycletime = $row["mcycletime"];
            $today = date("Y-m-d");
            $days = round((strtotime($jihuadate)-strtotime($today))/3600/24);
            if($days = 0){
                $newdate = date('Y-m-d',strtotime('+'.$mcycletime.'day',strtotime($jihuadate)));
                mysql_query("update elevbasicinfo set jihuadate = '$newdate' where id = '$eid'");
            }
            if($days < 0){
                $mstatus = "0";
            }else if($days >= 0 && $days <=3){
                $mstatus = "1";
            }else{
                $mstatus = "2";
            }
            $sub3 = mysql_query("select jihuadate from mainrecord where eid = '$eid'");
            while($row3 = mysql_fetch_array($sub3)){
                if(strtotime($jihuadate) != strtotime($row3["jihuadate"])){
                    mysql_query("insert into mainrecord(eid,user,location,mcorp,mstaff,jihuadate,status) values('$eid','$user','$location','$mcorp','$mstaff','$jihuadate','$mstatus')");
                }
            }
        };
        mysql_close($conn);

        sleep($interval);
    }while(true);
    
?>