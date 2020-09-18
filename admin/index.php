<?php
session_start();
if($_SESSION['idstaff']) {
    header("location:index/staffinformation.php");
}
else {
    header("location:../sistemegerak/login.php");
}
?>