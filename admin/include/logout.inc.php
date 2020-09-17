<?php
session_start();
unset($_SESSION['usernamestaff']);
unset($_SESSION['idstaff']);
header("location:../../../sistemegerak/login.php");
?>