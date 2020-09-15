<?php
if (isset($_POST['signup-submit'])) {
	
	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$name = $_POST['nama'];
	$staffjawatan = $_POST['position'];
	$staffbahagian = $_POST['unit'];
	

	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($name) || empty($staffjawatan) || empty($staffbahagian)) {
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
		elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}

	elseif ($password !== $passwordRepeat) {
		header("Location: ../signup.php?error=passwordcheck&uid=".$username. "&mail=".$email);
		exit();
	}
	else {
		$sql = "SELECT staffid FROM staff WHERE staffid=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();
			}
			else {
				$sql = "INSERT INTO staff (staffusername,staffemail,staffpassword,staffname,staffposition,staffunit) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
			     header("Location: ../signup.php?error=sqlerror");
			     exit();
		         }
		         else{
		         	$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
		         	mysqli_stmt_bind_param($stmt, "ssssss",$username,$email,$hashedPwd,$name,$staffjawatan,$staffbahagian);
			        mysqli_stmt_execute($stmt);
			        header("Location: ../signup.php?signup=success");
			        exit();
		         }

			}
		}

	}
	mysqli_stmt_close($stmt);
	mysql_close($conn);



}
else{
	header("Location: ../signup.php?signup=success");
    exit();
}