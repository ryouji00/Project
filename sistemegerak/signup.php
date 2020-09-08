<?php
require "header.php"
?>
<main>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/whole.css">
 	<div class="wrapper-main">
 		<section class="section-default">
 			<h1>Signup</h1>
 			<?php
    		if(isset($_GET["error"])){
      			if($_GET["error"] == "emptyfields"){
      				echo '<p class="signuperror">Fill in all fields!</p>';
      			}
      			elseif ($_GET["error"] == "invaliduidmail") {
      				echo '<p class="signuperror">Invalid username and e-mail!</p>';
      			}
      			elseif ($_GET["error"] == "invaliduid") {
      				echo '<p class="signuperror">Invalid username!</p>';
      			}
      			elseif ($_GET["error"] == "invalidmail") {
      				echo '<p class="signuperror">Invalid e-mail!</p>';
        		}
        		elseif ($_GET["error"] == "passwordcheck") {
        			echo '<p class="signuperror">Your password do not match!</p>';
        		}
        		elseif ($_GET["error"] == "usertaken") {
        			echo '<p class="signuperror">Username is already taken!</p>';
        		}
    		} 
    		elseif ($_GET["signup"] == "success") {
      			echo '<p class="signupSuccess">Signup successful!</p>';
    		}
 			?>
			<form action="includes/signup.inc.php" method="post"> 
				<input type="text" name="nama" placeholder="Name">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwd-repeat" placeholder="Repeat password">
				<button type="submit" name="signup-submit">Signup</button>
				<a class="btn btn-secondary btn-sm mt-3 mb-3" href="login.php">Login</a>
			</form>
		</section>
	</div>
</main>
<?php
require "footer.php";
?>