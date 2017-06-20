<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>电梯安全管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../../mycss/style.css">
    <style>
        .myinput,.myselect{
            width: 95%;
            height: 70%;
            border: 1px solid #ccc;
            padding-left: 10px;
        }
        
        .myinput:focus,.myselect:focus {
            border: 1px solid #888;
            outline: none;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php include '../../bss/checkLogin.php' ?>
    <div class="wrapper">
        <header class="main-header">
            <div class="logo">
                <span class="logo-mini"><img src="../../img/logo.png" alt="" style="height:40px"></span>
                <span class="logo-lg"><img src="../../img//logo.png" alt="" style="height:40px"></span>
            </div>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="myheader">电梯安全管理系统</div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../img/user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>欢迎：
                            <?php echo $_SESSION["flag"]; ?>
                        </p>
                        <a href="../../bss/logout.php"><i class="fa fa-circle text-danger"></i>退出登录</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-folder-open"></i> <span>资料管理</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="eUsers.php"><i class="fa fa-circle-o"></i>电梯使用单位</a></li>
                            <li><a href="eVendors.php"><i class="fa fa-circle-o"></i>生产厂家信息</a></li>
                            <li><a href="mCorp.php"><i class="fa fa-circle-o"></i>维保单位信息</a></li>
                            <li><a href="wuyeCorp.php"><i class="fa fa-circle-o"></i>物业公司信息</a></li>
                            <li><a href="installCorp.php"><i class="fa fa-circle-o"></i>安装单位信息</a></li>
                            <li><a href="mStaff.php"><i class="fa fa-circle-o"></i>维保人员信息</a></li>
                            <li><a href="wuyeStaff.php"><i class="fa fa-circle-o"></i>物业人员信息</a></li>
                            <li class="active"><a href="elevBInfo.php"><i class="fa fa-circle-o"></i>电梯基本信息</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="../mainRecord.php">
                            <i class="fa fa-gavel"></i> 
                            <span>维保管理</span>
                            <span class="pull-right-container">
                                <?php 
                                mysql_connect("localhost","MChen","123");
                                mysql_select_db("bishe");
                                mysql_query("set names 'utf8'"); 
                                $sql1 = mysql_query("select * from mainrecord where status = '0'");
                                $sql2 = mysql_query("select * from mainrecord where status = '1'");
                                $count0 = 0;
                                $count1 = 0;
                                while(mysql_fetch_array($sql1)){
                                    $count0 += 1;
                                }
                                while(mysql_fetch_array($sql2)){
                                    $count1 += 1;
                                }
                                ?>
                                <small class="label pull-right bg-yellow"><?php echo $count1 ?></small>
                                <small class="label pull-right bg-red"><?php echo $count0 ?></small>
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="../fault.php">
                            <i class="fa fa-gavel"></i> 
                            <span>故障管理</span>
                            <span class="pull-right-container">
                                <?php 
                                mysql_connect("localhost","MChen","123");
                                mysql_select_db("bishe");
                                mysql_query("set names 'utf8'"); 
                                $sql1 = mysql_query("select * from faultrecord where status = '0'");
                                $count2 = 0;
                                while(mysql_fetch_array($sql1)){
                                    $count2 += 1;
                                }
                                ?>
                                <small class="label pull-right bg-red"><?php echo $count2 ?></small>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="../users.php">
                            <i class="fa fa-users"></i> <span>用户管理</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>电梯基本资料 </h1>
            </section>
            <section class="insertItem">
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target=".modal-add" id="addbtn">添加档案</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="table7" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>电梯ID</th>
                                            <th>电梯用户</th>
                                            <th>电梯位置</th>
                                            <th>维保公司</th>
                                            <th>物业公司</th>
                                            <th>操作</th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    mysql_connect("localhost","MChen","123");
                                    mysql_select_db("bishe");
                                    mysql_query("set names 'utf8'");
                                    $result = mysql_query("select * from elevbasicinfo");
                                    while($row = mysql_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <!--电梯ID-->
                                            <td class="id">
                                                <?php echo $row["id"] ?>
                                            </td>
                                            <!--/*电梯用户*/-->
                                            <td>
                                            <?php 
                                            $userid = $row["userid"];    
                                            $userresult = mysql_query("select id,name from eusers where id = '$userid'");
                                            while($userrow = mysql_fetch_array($userresult)){
                                                echo "<span class='user'>".$userrow['name']."</span>";
                                                echo "<span style = 'display:none' class='user2'>".$userrow['id']."</span>";
                                             } ?>
                                            </td>
                                            <!--电梯位置-->
                                            <td class="location">
                                                <?php echo $row["location"] ?>
                                            </td>
                                            <!--维保公司-->
                                            <td class="mcorpid">
                                            <?php 
                                            $mcorpid = $row["mcorpid"];
                                            $mcorpresult = mysql_query("select id,name from mcorp where id = '$mcorpid'");
                                            while($mcorprow = mysql_fetch_array($mcorpresult)){
                                                echo "<span class='mcorp'>".$mcorprow['name']."</span>";
                                                echo "<span style = 'display:none' class='mcorp2'>".$mcorprow['id']."</span>";
                                             } ?>
                                            </td>
                                            <!--//物业公司-->
                                            <td class="">
                                            <?php 
                                            $wuyecorpid = $row["wuyecorpid"];
                                            $wuyecorpresult = mysql_query("select id,name from wuyecorp where id = '$wuyecorpid'");
                                            while($wuyecorprow = mysql_fetch_array($wuyecorpresult)){
                                                echo "<span class='wuyecorp'>".$wuyecorprow['name']."</span>";
                                                echo "<span style = 'display:none' class='wuyecorp2'>".$wuyecorprow['id']."</span>";
                                             } ?>
                                            </td>
                                            
                                            <!--操作-->
                                            <td>
                                                <i class="fa fa-eye op op-details" data-toggle="modal" data-target=".modal-details">详情</i>&nbsp;&nbsp;
                                                <i class="fa fa-edit op op-edit" data-toggle="modal" data-target=".modal-edit">修改</i>&nbsp;&nbsp;
                                                <i class="fa fa-remove op op-remove">删除</i>
                                            </td>
                                            <!--安装单位-->
                                            <td class="installcorpid" style="display:none">
                                            <?php 
                                            $installcorpid = $row["installcorpid"];
                                            $installcorpresult = mysql_query("select id,name from installcorp where id = '$installcorpid'");
                                            while($installcorprow = mysql_fetch_array($installcorpresult)){
                                                echo "<span class='installcorp'>".$installcorprow['name']."</span>";
                                                echo "<span style = 'display:none' class='installcorp2'>".$installcorprow['id']."</span>";
                                             } ?>
                                            </td>
                                            <!--生产单位-->
                                            <td class="vendorid" style="display:none">
                                            <?php 
                                            $vendorid = $row["vendorid"];
                                            $vendorresult = mysql_query("select id,name from evendors where id ='$vendorid'");
                                            while($vendorrow = mysql_fetch_array($vendorresult)){
                                                echo "<span class='vendor'>".$vendorrow['name']."</span>";
                                                echo "<span style = 'display:none' class='vendor2'>".$vendorrow['id']."</span>";
                                             } ?>
                                            </td>
                                            <!--维保员工-->
                                            <td style="display:none">
                                            <?php 
                                            $mstaffno = $row["mstaffno"];
                                            $mstaffresult = mysql_query("select staffno,name from mstaff where staffno ='$mstaffno'");
                                            while($mstaffrow = mysql_fetch_array($mstaffresult)){
                                                echo "<span class='mstaff'>".$mstaffrow['name']."</span>";
                                                echo "<span style = 'display:none' class='mstaff2'>".$mstaffrow['staffno']."</span>";
                                             } ?>
                                            </td>
                                            <!--wuye员工-->
                                            <td style="display:none">
                                            <?php 
                                            $wuyestaffno = $row["wuyestaffno"];
                                            $wuyestaffresult = mysql_query("select staffno,name from wuyestaff where staffno = '$wuyestaffno'");
                                            while($wuyestaffrow = mysql_fetch_array($wuyestaffresult)){
                                                echo "<span class='wuyestaff'>".$wuyestaffrow['name']."</span>";
                                                echo "<span style = 'display:none' class='wuyestaff2'>".$wuyestaffrow['staffno']."</span>";
                                             } ?>
                                            </td>
                                            <!--电梯型号-->
                                            <td class="model" style="display:none">
                                                <?php echo $row["model"] ?>
                                            </td>
                                            <!--电梯类型-->
                                            <td class="type" style="display:none">
                                                <?php echo $row["type"] ?>
                                            </td>
                                            <!--定员-->
                                            <td class="capacity" style="display:none">
                                                <?php echo $row["capacity"] ?>
                                            </td>
                                            <!--速度-->
                                            <td class="speed" style="display:none">
                                                <?php echo $row["speed"] ?>
                                            </td>
                                            <!--投用日期-->
                                            <td class="usingdate" style="display:none">
                                                <?php echo $row["usingdate"] ?>
                                            </td>
                                            <!--维保日-->
                                            <td class="mdate" style="display:none">
                                                <?php echo $row["mdate"] ?>
                                            </td>
                                            <!--维保周期-->
                                            <td class="mcycletime" style="display:none">
                                                <?php echo $row["mcycletime"] ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>电梯ID</th>
                                            <th>电梯用户</th>
                                            <th>电梯位置</th>
                                            <th>维保公司</th>
                                            <th>物业公司</th>
                                            <th>操作</th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                            <th style="display:none"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade bs-example-modal-lg modal-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="../../bss/elevBInfo_bs.php" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">电梯基本资料</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <table class="mytable">
                                    <tbody>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯型号</th>
                                            <td class="col-xs-4">
                                                <input type="text" name="model" class="myinput">
                                            </td>
                                            <th class="col-xs-6" colspan="2" style="border:none"></th>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯用户</th>
                                            <td class="col-xs-4">
                                                <select name="user" class="myselect">
                                                <?php 
                                                $sql1 = mysql_query("select id, name from eusers");
                                                while($row1 = mysql_fetch_array($sql1)){ ?>
                                                    <option value="<?php echo $row1["id"] ?>">
                                                        <?php echo $row1["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">电梯位置</th>
                                            <td class="col-xs-4">
                                                <input type="text" name="location" class="myinput">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯类型</th>
                                            <td class="col-xs-4">
                                                <select name="type" class="myselect">
                                                    <option value="0">自动扶梯</option>
                                                    <option value="1">住宅电梯</option>
                                                    <option value="2">载货电梯</option>
                                                    <option value="3">商务电梯</option>
                                                    <option value="4">观光电梯</option>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">投用日期</th>
                                            <td class="col-xs-4">
                                                <input type="date" name="usingdate" class="myinput">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">定员</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="capacity" class="myinput">
                                            </td>
                                            <th class="col-xs-2">速度(米/秒)</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="speed" class="myinput">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">生产厂家</th>
                                            <td class="col-xs-4">
                                                <select name="vendor" class="myselect">
                                                <?php 
                                                $sql2 = mysql_query("select id, name from evendors");
                                                while($row2 = mysql_fetch_array($sql2)){ ?>
                                                    <option value="<?php echo $row2["id"] ?>">
                                                        <?php echo $row2["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">安装单位</th>
                                            <td class="col-xs-4">
                                                <select name="installcorp" class="myselect">
                                                <?php 
                                                $sql3 = mysql_query("select id, name from installcorp");
                                                while($row3 = mysql_fetch_array($sql3)){ ?>
                                                    <option value="<?php echo $row3["id"] ?>">
                                                        <?php echo $row3["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">维保单位</th>
                                            <td class="col-xs-4">
                                                <select name="mcorp" id="addmcorp" class="myselect">
                                                <?php 
                                                $sql4 = mysql_query("select id, name from mcorp");
                                                while($row4 = mysql_fetch_array($sql4)){ ?>
                                                    <option value="<?php echo $row4["id"] ?>">
                                                        <?php echo $row4["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">维保人员</th>
                                            <td class="col-xs-4">
                                                <select name="mstaff" class="myselect">
                                                <?php 
                                                $sql5 = mysql_query("select staffno,name from mstaff");
                                                while($row5 = mysql_fetch_array($sql5)){ ?>
                                                    <option value="<?php echo $row5["staffno"] ?>">
                                                        <?php echo $row5["name"]."(".$row5["staffno"].")" ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">物业单位</th>
                                            <td class="col-xs-4">
                                                <select name="wuyecorp" class="myselect">
                                                <?php 
                                                $sql6 = mysql_query("select id, name from wuyecorp");
                                                while($row6 = mysql_fetch_array($sql6)){ ?>
                                                    <option value="<?php echo $row6["id"] ?>">
                                                        <?php echo $row6["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">物业人员</th>
                                            <td class="col-xs-4">
                                                <select name="wuyestaff" class="myselect">
                                                <?php 
                                                $sql7 = mysql_query("select staffno, name from wuyestaff");
                                                while($row7 = mysql_fetch_array($sql7)){ ?>
                                                    <option value="<?php echo $row7["staffno"] ?>">
                                                        <?php echo $row7["name"]."(".$row7["staffno"].")" ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">维保日</th>
                                            <td class="col-xs-4">
                                                <input type="date" name="mdate" class="myinput">
                                            </td>
                                            <th class="col-xs-2">维保周期（天）</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="mcycletime" class="myinput">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" name="addSubmit">确认添加</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg modal-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">电梯基本资料</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <table class="mytable">
                                <tbody>
                                    <tr class="row">
                                        <th class="col-xs-2">电梯ID</th>
                                        <td class="col-xs-4" id="id1"></td>
                                        <th class="col-xs-2">电梯型号</th>
                                        <td class="col-xs-4" id="model1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">电梯用户</th>
                                        <td class="col-xs-4" id="user1"></td>
                                        <th class="col-xs-2">电梯位置</th>
                                        <td class="col-xs-4" id="location1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">电梯类型</th>
                                        <td class="col-xs-4" id="type1"></td>
                                        <th class="col-xs-2">投用日期</th>
                                        <td class="col-xs-4" id="usingdate1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">定员</th>
                                        <td class="col-xs-4" id="capacity1"></td>
                                        <th class="col-xs-2">速度(米/秒)</th>
                                        <td class="col-xs-4" id="speed1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">生产厂家</th>
                                        <td class="col-xs-4" id="vendor1"></td>
                                        <th class="col-xs-2">安装单位</th>
                                        <td class="col-xs-4" id="installcorp1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">维保单位</th>
                                        <td class="col-xs-4" id="mcorp1"></td>
                                        <th class="col-xs-2">维保人员</th>
                                        <td class="col-xs-4" id="mstaff1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">物业单位</th>
                                        <td class="col-xs-4" id="wuyecorp1"></td>
                                        <th class="col-xs-2">物业人员</th>
                                        <td class="col-xs-4" id="wuyestaff1"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-2">维保日</th>
                                        <td class="col-xs-4" id="mdate1"></td>
                                        <th class="col-xs-2">维保周期</th>
                                        <td class="col-xs-4" id="mcycletime1"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="../../bss/elevBInfo_bs.php" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">电梯基本资料</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <table class="mytable">
                                    <tbody>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯ID</th>
                                            <td class="col-xs-4">
                                                <input type="text" name="id" class="myinput" id="id2">
                                            </td>
                                            <th class="col-xs-2">电梯型号</th>
                                            <td class="col-xs-4">
                                                <input type="text" name="model" class="myinput" id="model2">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯用户</th>
                                            <td class="col-xs-4">
                                                <select name="user" id="user2" class="myselect">
                                                <?php 
                                                $sql1 = mysql_query("select id, name from eusers");
                                                while($row1 = mysql_fetch_array($sql1)){ ?>
                                                    <option value="<?php echo $row1["id"] ?>">
                                                        <?php echo $row1["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">电梯位置</th>
                                            <td class="col-xs-4">
                                                <input type="text" name="location" class="myinput" id="location2">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">电梯类型</th>
                                            <td class="col-xs-4">
                                                <select name="type" id="type2" class="myselect">
                                                    <option value="0">自动扶梯</option>
                                                    <option value="1">住宅电梯</option>
                                                    <option value="2">载货电梯</option>
                                                    <option value="3">商务电梯</option>
                                                    <option value="4">观光电梯</option>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">投用日期</th>
                                            <td class="col-xs-4">
                                                <input type="date" name="usingdate" class="myinput" id="usingdate2">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">定员</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="capacity" class="myinput" id="capacity2">
                                            </td>
                                            <th class="col-xs-2">速度(米/秒)</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="speed" class="myinput" id="speed2">
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">生产厂家</th>
                                            <td class="col-xs-4">
                                                <select name="vendor" id="vendor2" class="myselect">
                                                <?php 
                                                $sql2 = mysql_query("select id, name from evendors");
                                                while($row2 = mysql_fetch_array($sql2)){ ?>
                                                    <option value="<?php echo $row2["id"] ?>">
                                                        <?php echo $row2["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">安装单位</th>
                                            <td class="col-xs-4">
                                                <select name="installcorp" id="installcorp2" class="myselect">
                                                <?php 
                                                $sql3 = mysql_query("select id, name from installcorp");
                                                while($row3 = mysql_fetch_array($sql3)){ ?>
                                                    <option value="<?php echo $row3["id"] ?>">
                                                        <?php echo $row3["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">维保单位</th>
                                            <td class="col-xs-4">
                                                <select name="mcorp" id="mcorp2" class="myselect">
                                                <?php 
                                                $sql4 = mysql_query("select id, name from mcorp");
                                                while($row4 = mysql_fetch_array($sql4)){ ?>
                                                    <option value="<?php echo $row4["id"] ?>">
                                                        <?php echo $row4["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">维保人员</th>
                                            <td class="col-xs-4">
                                                <select name="mstaff" id="mstaff2" class="myselect">
                                                <?php 
                                                $sql5 = mysql_query("select staffno,name from mstaff");
                                                while($row5 = mysql_fetch_array($sql5)){ ?>
                                                    <option value="<?php echo $row5["staffno"] ?>">
                                                        <?php echo $row5["name"]."(".$row5["staffno"].")" ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">物业单位</th>
                                            <td class="col-xs-4">
                                                <select name="wuyecorp" id="wuyecorp2" class="myselect">
                                                <?php 
                                                $sql6 = mysql_query("select id, name from wuyecorp");
                                                while($row6 = mysql_fetch_array($sql6)){ ?>
                                                    <option value="<?php echo $row6["id"] ?>">
                                                        <?php echo $row6["name"] ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <th class="col-xs-2">物业人员</th>
                                            <td class="col-xs-4">
                                                <select name="wuyestaff" id="wuyestaff2" class="myselect">
                                                <?php 
                                                $sql7 = mysql_query("select staffno,name from wuyestaff");
                                                while($row7 = mysql_fetch_array($sql7)){ ?>
                                                    <option value="<?php echo $row7["staffno"] ?>">
                                                        <?php echo $row7["name"]."(".$row7["staffno"].")" ?>
                                                    </option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="row">
                                            <th class="col-xs-2">维保日</th>
                                            <td class="col-xs-4">
                                                <input type="date" name="mdate" id="mdate2" class="myinput">
                                            </td>
                                            <th class="col-xs-2">维保周期（天）</th>
                                            <td class="col-xs-4">
                                                <input type="number" name="mcycletime" id="mcycletime2" class="myinput">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" name="updateSubmit">确认修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>网络1301</b> 毛晨
            </div>
            <strong><a href="http://iee.zjgsu.edu.cn/">浙江工商大学信息与电子工程学院</a></strong> 毕业设计.
        </footer>
    </div>

    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/demo.js"></script>
    <script src="../../myjs/mydemo.js"></script>
    <script src="../../myjs/elevBInfo.js"></script>
    <script>
        $(function () {
            $('#table7').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "lengthChange": false,
                "columnDefs": [ { "width": "20%", "targets": -1 }],
                "language": {
                    "paginate": {
                        "next": "下一页",
                        "previous": "上一页",
                    },
                    "info": "总项数： _TOTAL_",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "zeroRecords": "没有查询到匹配项！"
                },
                "scrollX": true,
            });
        });
    </script>
</body>

</html>