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
		if(isset($_GET['signup']) || isset($_GET['error'])) {
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
		}
		?>
 		<form action="includes/signup.inc.php" method="post"> 
    		<input type="text" name="nama" placeholder="Name">
    		<select name="unit">
				<option value="Unit Rangkaian">Unit Rangkaian</option>
				<option value="Unit Sokongan Teknikal">Unit Sokongan Teknikal</option>
				<option value="Unit Operasi dan Pusat">Unit Operasi dan Pusat</option>
				<option value="Unit Keselamatan">Unit Keselamatan</option>
				<option value="Unit Pemindahan Tex">Unit Pemindanan Tex</option>
				<option value="Unit Pengaturcaraan">Unit Pengaturcaraan</option>
				<option value="Unit Farmasi Pengurusan dan Kejuruteraan">Unit Farmasi Pengurusan dan Kejuruteraan</option>
				<option value="Unit Aplikasi Kesihatan">Unit Aplikasi Kesihatan</option>
				<option value="Unit Perubatan">Unit Perubatan</option>
				<option value="Unit Aplikasi HIS">Unit Aplikasi HIS</option>
				<option value="Unit Dasar dan Penilaian Projek">Unit Dasar dan Penilaian Projek</option>
				<option value="Unit Perolehan SQA">Unit Perolehan SQA</option>
				<option value="Unit Pengurusan, Pentadbiran, Kewangan">Unit Pengurusan, Pentadbiran, Kewangan</option>
				<option value="Unit Perancangan dan Inovasi ICT">Unit Perancangan dan Inovasi ICT</option>
			</select>
 			<input type="text" name="uid" placeholder="Username">
 			<input type="text" name="mail" placeholder="E-mail">
 			<input type="password" name="pwd" placeholder="Password">
 			<input type="password" name="pwd-repeat" placeholder="Repeat password">
			<button type="submit" name="signup-submit">Signup</button>
			<a id="loginbtn" class="btn btn-outline-secondary" href="login.php">Login</a>
		</form>
	</section>
</div>
</main>
<?php require "footer.php";?>