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
        .myinput {
            width: 95%;
            height: 70%;
            border: 1px solid #ccc;
            padding-left: 10px;
        }
        .myinput:focus {
            border: 1px solid #888;
            outline: none;
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
                        <p>欢迎：<?php echo $_SESSION["flag"]; ?></p>
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
                    <li class="treeview">
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
                    <li class="active">
                        <a href="users.php">
                            <i class="fa fa-users"></i> <span>用户管理</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>系统用户管理</h1>
            </section>
            <section class="insertItem">
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target=".modal-add">添加用户</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="table6" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="display: none"></th>
                                            <th>用户名</th>
                                            <th>密码</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        mysql_connect("localhost","MChen","123");
                                        mysql_select_db("bishe");
                                        mysql_query("set names 'utf8'");
                                        $result = mysql_query("select * from users");
                                        while($row = mysql_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td class="id" style="display: none">
                                                <?php echo $row["userID"] ?>
                                            </td>
                                            <td class="username">
                                                <?php echo $row["username"] ?>
                                            </td>
                                            <td class="password">
                                                <?php echo $row["password"] ?>
                                            </td>
                                            <td>
                                                <i class="fa fa-edit op op-edit" data-toggle="modal" data-target=".modal-update">修改</i>&nbsp;&nbsp;
                                                <i class="fa fa-remove op op-remove">删除</i></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="display: none"></th>
                                            <th>用户名</th>
                                            <th>密码</th>
                                            <th>操作</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade bs-example-modal modal-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../bss/cSQL.php" method="post" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">系统用户添加</h4>
                        </div>
                        <div class="modal-body">
                            <table class="mytable">
                                <tbody>
                                    <tr class="row">
                                        <th class="col-xs-4">用户名</th>
                                        <td class="col-xs-8">
                                            <input type="text" class="myinput" name="addUsername">
                                        </td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-4">密码</th>
                                        <td class="col-xs-8">
                                            <input type="text" class="myinput" name="addPassword">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" name="addSubmit">确认添加</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal modal-update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../bss/cSQL.php" method="post" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">系统用户</h4>
                        </div>
                        <div class="modal-body">
                            <table class="mytable">
                                <tbody>
                                    <tr class="row" style="display:none">
                                        <td><input type="text" id="id" name="id"></td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-4">用户名</th>
                                        <td class="col-xs-8">
                                            <input type="text" class="myinput" name="updateUsername" id="username">
                                        </td>
                                    </tr>
                                    <tr class="row">
                                        <th class="col-xs-4">密码</th>
                                        <td class="col-xs-8">
                                            <input type="text" class="myinput" name="updatePassword" id="password">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../myjs/users.js"></script>
    <script src="../myjs/mydemo.js"></script>
    <script>
        $(function () {
            $('#table6').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "lengthChange": false,
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
            });
        });
    </script>
</body>

</html>