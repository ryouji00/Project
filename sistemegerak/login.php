<?php
require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example of meta description.This will often show up in search result.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/whole.css">
</head>
<body>
	<div class="header-login">
		<h1>Login</h1>
		<?php
		if (isset($_SESSION['staffid'])) {
 			echo '<form action="includes/logout.inc.php" method="post">
		          <button type="submit" name="logout-submit">Logout</button>
	              </form>';
        }
 		else{
 			echo '<form action="includes/login.inc.php" method="post">
		          <input type="text" name="mailuid" placeholder="Username/E-mail...">
				  <input type="password" name="pwd" placeholder="Password...">
				  <button name="login-submit" class="btn btn-primary" type="submit">Login</button>
				  <a href="signup.php" class="header-signup btn btn-secondary btn-sm mt-3 mb-3">Signup</a>';
		}
		?>
    	<?php
		if(isset($_GET["newpwd"])){
    		if($_GET["newpwd"] == "passwordupdated"){
    			echo '<p class="signupsuccess">Your password has been reset!</p>';
    		}   
		}
		?>
		<a class="btn btn-secondary btn-sm mt-3 mb-3 ml-3" href="reset-password.php">Forgot your password</a>
	</div>
</body>
</html>
<?php
require "footer.php";
?>