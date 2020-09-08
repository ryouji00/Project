<?php
 require "login.php"
 ?>


 <main>
 	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/whole.css">
	<div class="wrapper-main">
 		<section class="section-default">
 			<?php
 			if (isset($_SESSION['idstaff'])) {
 				echo '<p class="login-status">You are logged in</p>';
                }
 				else{
 					echo '<p class="login-status">You are logged out</p>';
 				}

            
 			
 			?>
 	
 	</section>
 </div>
 </main>


 <?php
 require "footer.php";
 ?>