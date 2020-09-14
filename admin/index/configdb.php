<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sistem pergerakan pegawai';

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if (!$conn) {
	die("Connection failed:".mysqli_connect_error());
}