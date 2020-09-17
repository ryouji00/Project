<?php
session_start();
unset($_SESSION['usernamestaff']);
unset($_SESSION['idstaff']);
header("location:http://localhost/Project/sistemegerak/login.php");
?>