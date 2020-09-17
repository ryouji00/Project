<?php
session_start();
if($_SESSION['usernamestaff']) {
    header("location:index/staffinformation.php");
}
else {
    header("location:../sistemegerak/login.php");
}
?>