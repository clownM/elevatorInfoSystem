<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["flag"]);
header("location:../pages/login.php");
?>