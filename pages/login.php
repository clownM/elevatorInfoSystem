<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>电梯安全管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <style>
        img.logo {
            width: 80px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="../img/logo2.png" alt="" class="logo">
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">电梯安全管理系统</p>

            <form action="" method="post" onsubmit="return inputCheck()">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="管理员账号" name="username" id="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="管理员密码" name="password" id="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" id="submit">登录</button>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
            </form>
        </div>
    </div>

    <script src="../plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../myjs/login.js"></script>

    <?php
    if(isset($_REQUEST["submit"])){
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        mysql_connect("localhost","MChen","123");
        mysql_select_db("bishe");
        mysql_query("set names 'utf8'");
        $result = mysql_query("select * from users where username = '$username' and password = '$password'");
        if($row = mysql_fetch_array($result)){
                session_start();
                session_register("flag");
                $flag = $username;
                header("location:users.php");
        }else{
            echo "<script>";
            echo "alert('用户名或密码错误！')";
            echo "</script>";
        };
    };
    ?>
    

    
    

</body>

</html>