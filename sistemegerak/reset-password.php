 <?php
 require "header.php"
 ?>
 


<main>
   <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/whole.css">

	<div class="wrapper-main">
		<section class="section-default">
        	<h1>Reset your password</h1>
        	<p>An e-mail will be send to you with instruction on how to reset your password</p>
        	<form action="include/reset-request.inc.php" method="post">
            	<input type="text" name="email" placeholder="Enter your e-mail address..">
            	<button type="submit" name="reset-request-submit">Receive new password by e-mail</button>
        	</form>
			<a id="loginbtn" class="btn btn-outline-secondary" href="login.php">Login</a>
			<?php  
			if (isset($_GET["reset"])) {
				if($_GET["reset"] == "success"){
					echo '<p class="signupsuccess">Check your e-mail</p>';
				}
			}
			?>
		</section>
	</div>
</main>


 <?php
 require "footer.php";
 ?>