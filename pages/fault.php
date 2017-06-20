<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>电梯安全管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../mycss/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        div.circle{
            width: 12px;
            height: 12px;
            border-radius: 6px;
            display: inline-block;
        }
        span.font1{
            padding-left: 2px;
            padding-right: 10px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php include '../bss/checkLogin.php' ?>
    <div class="wrapper">
        <header class="main-header">
            <div class="logo">
                <span class="logo-mini"><img src="../img/logo.png" alt="" style="height:40px"></span>
                <span class="logo-lg"><img src="../img//logo.png" alt="" style="height:40px"></span>
            </div>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="myheader">电梯安全管理系统</div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../img/user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>欢迎：
                            <?php echo $_SESSION["flag"]; ?>
                        </p>
                        <a href="../bss/logout.php"><i class="fa fa-circle text-danger"></i>退出登录</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i> <span>资料管理</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="docs/eUsers.php"><i class="fa fa-circle-o"></i>电梯使用单位</a></li>
                            <li><a href="docs/eVendors.php"><i class="fa fa-circle-o"></i>生产厂家信息</a></li>
                            <li><a href="docs/mCorp.php"><i class="fa fa-circle-o"></i>维保单位信息</a></li>
                            <li><a href="docs/wuyeCorp.php"><i class="fa fa-circle-o"></i>物业公司信息</a></li>
                            <li><a href="docs/installCorp.php"><i class="fa fa-circle-o"></i>安装单位信息</a></li>
                            <li><a href="docs/mStaff.php"><i class="fa fa-circle-o"></i>维保人员信息</a></li>
                            <li><a href="docs/wuyeStaff.php"><i class="fa fa-circle-o"></i>物业人员信息</a></li>
                            <li><a href="docs/elevBInfo.php"><i class="fa fa-circle-o"></i>电梯基本信息</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="mainRecord.php">
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
                    <li class="treeview active">
                        <a href="fault.php">
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
                        <a href="users.php">
                            <i class="fa fa-users"></i> <span>用户管理</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="display:inline-block">故障记录</h1>
                <span style="font-size:12px">（ 注：
                <div class="circle"style="background-color:rgb(221,75,57)"></div><span class="font1">故障中</span>
                <div class="circle"style="background-color:rgb(100,100,100)"></div><span class="font1">已处理</span> 
                ）</span>
            </section>
            <section style="height:54px;padding-left:18px;padding-top:20px">
                <button class="btn btn-primary pull-left" id="alldo">全部标记已处理</button>
                <button class="btn btn-primary" style="margin-left:10px" id="done">标记为已处理</button>
                <button class="btn btn-primary" style="margin-left:10px" id="dont">标记为未处理</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="table2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="display:none">id</th>
                                            <th>电梯ID</th>
                                            <th>电梯用户</th>
                                            <th>电梯位置</th>
                                            <th>维保公司</th>
                                            <th>故障原因</th>
                                            <th>故障发生时间</th>
                                            <th>操作</th>
                                            <th style="display:none">故障处理时间</th>
                                            <th style="display:none">员工</th>
                                            <th style="display:none">员工电话</th>
                                            <th style="display:none">状态</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $result = mysql_query("select * from faultrecord where status = '0'");
                                        while($row = mysql_fetch_array($result)){
                                        ?>
                                            <tr style="color:rgb(221,75,57)">
                                                <td><input type="checkbox" class="cbox"></td>
                                                <td style="display:none" class="id"><?php echo $row["id"] ?></td>
                                                <td class="eid"><?php echo $row["eid"] ?></td>
                                                <td class="user"><?php echo $row["user"] ?></td>
                                                <td class="location"><?php echo $row["location"] ?></td>
                                                <td class="mcorp"><?php echo $row["mcorp"] ?></td>
                                                <td class="reason"><?php echo $row["reason"] ?></td>
                                                <td class="optime"><?php echo $row["optime"] ?></td>
                                                <td><i class="fa fa-eye op op-details" data-toggle="modal" data-target=".modal-details">详情</i></td>
                                                <td class="edtime" style="display:none"><?php echo $row["edtime"] ?></td>
                                                <td class="mstaff" style="display:none"><?php echo $row["mstaff"] ?></td>
                                                <td class="mstaffphone" style="display:none"><?php echo $row["mstaffphone"] ?></td>
                                                <td class="status" style="display:none"><?php echo $row["status"] ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php
                                        $result3 = mysql_query("select * from faultrecord where status = '1'");
                                        while($row = mysql_fetch_array($result3)){
                                        ?>
                                            <tr style="color:rgb(100,100,100)">
                                                <td><input type="checkbox" class="cbox"></td>
                                                <td style="display:none" class="id"><?php echo $row["id"] ?></td>
                                                <td class="eid"><?php echo $row["eid"] ?></td>
                                                <td class="user"><?php echo $row["user"] ?></td>
                                                <td class="location"><?php echo $row["location"] ?></td>
                                                <td class="mcorp"><?php echo $row["mcorp"] ?></td>
                                                <td class="reason"><?php echo $row["reason"] ?></td>
                                                <td class="optime"><?php echo $row["optime"] ?></td>
                                                <td><i class="fa fa-eye op op-details" data-toggle="modal" data-target=".modal-details">详情</i></td>
                                                <td class="edtime" style="display:none"><?php echo $row["edtime"] ?></td>
                                                <td class="mstaff" style="display:none"><?php echo $row["mstaff"] ?></td>
                                                <td class="mstaffphone" style="display:none"><?php echo $row["mstaffphone"] ?></td>
                                                <td class="status" style="display:none"><?php echo $row["status"] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th style="display:none">id</th>
                                            <th>电梯ID</th>
                                            <th>电梯用户</th>
                                            <th>电梯位置</th>
                                            <th>维保公司</th>
                                            <th>故障原因</th>
                                            <th>故障发生时间</th>
                                            <th>操作</th>
                                            <th style="display:none">故障处理时间</th>
                                            <th style="display:none">员工</th>
                                            <th style="display:none">员工电话</th>
                                            <th style="display:none">状态</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade bs-example-modal modal-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">故障记录详情</h4>
                    </div>
                    <div class="modal-body">
                        <table class="mytable">
                            <tbody>
                                <tr class="row">
                                    <th class="col-xs-4">电梯ID</th>
                                    <td class="col-xs-8" id="eid"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">电梯用户</th>
                                    <td class="col-xs-8" id="user"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">电梯位置</th>
                                    <td class="col-xs-8" id="location"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">维保公司</th>
                                    <td class="col-xs-8" id="mcorp"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">维保员工</th>
                                    <td class="col-xs-8" id="mstaff"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">维保员工联系方式</th>
                                    <td class="col-xs-8" id="mstaffphone"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">故障发生时间</th>
                                    <td class="col-xs-8" id="optime"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">故障处理时间</th>
                                    <td class="col-xs-8" id="edtime"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">故障发生原因</th>
                                    <td class="col-xs-8" id="reason"></td>
                                </tr>
                                <tr class="row">
                                    <th class="col-xs-4">故障状态</th>
                                    <td class="col-xs-8" id="status"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../myjs/faultRecord.js"></script>
    <script>
        $(function(){
            $('#table2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "lengthChange": false,
                "columnDefs": [ { "width": "8%", "targets": -1 }],
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