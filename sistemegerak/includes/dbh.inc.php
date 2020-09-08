<?php

$servername = "localhost";
$dbUsername = "root";
$dBPassword = "";
$dBName = "sistem pergerakan pegawai";

$conn = mysqli_connect($servername,$dbUsername,$dBPassword,$dBName);

if (!$conn) {
	die("Connection failed:" .mysqli_connect_error());
}
