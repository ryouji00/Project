<?php
if(isset($_POST['send-submit'])){

	require 'dbh.inc.php';

	$category = $_POST['place-go'];
	$worknama = $_POST['work'];
	$placename = $_POST['place'];
	$tripstart = $_POST['trip-start'];
	$tripend = $_POST['trip-end'];
	$timestart = $_POST['time-start'];
	$timeend = $_POST['time-end'];
	$pegawai = $_POST['officer'];
	$staffid = $_SESSION['idstaff'];

	if(empty($category) || empty($worknama) || empty($placename) || empty($tripstart) || empty($tripend) || empty($timestart) || empty($timeend) || empty($pegawai)) {
		header("Location: ../form.php?error=emptyfields&place-go=".$category. "&place-go=" .$worknama);
		exit();
	}
	else{
		$sql = "SELECT destinationid FROM destination WHERE destinationid=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../form.php?error=sqlerror1");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$pegawai);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../form.php?error=officertaken&officer=".$pegawai);
				exit();
			}
			else{
				$sql = "INSERT INTO destination ('category','workname','placename','tripstart','tripend','timestart','timeend','replaceofficer','staffid') VALUE (?,?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../form.php?error=sqlerror2");
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt,"sssssssss",$category,$worknama,$placename,$tripstart,$tripend,$timestart,$timeend,$pegawai,$staffid);
					mysqli_stmt_execute($stmt);
					header("Location: ../form.php?form=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../form.php?form=success");
	exit();
}


