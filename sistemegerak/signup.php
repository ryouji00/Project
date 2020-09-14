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
    <select id="jawatan" name="position" placeholder="Jawatan">
	<option value="0">Jawatan</option>
   <option value="1">Admin</option>
   <option value="2">Staff</option>
    </select>
   <select id="Bahagian" name="unit" placeholder="Unit">
   <option value="0">Bahagian</option>
   <option value="1">Pejabat CIO</option>
   <option value="2">Unit Perolehan Dan SQA</option>
   <option value="3">Unit Dasar Dan Penilaian Projek</option>
   <option value="4">Unit Pengurusan Pentadbiran Kewangan</option>
   <option value="5">Unit Perancangan Dan Inovasi ICT </option>
   <option value="6">Unit Aplikasi HIS</option>
   <option value="7">Unit Aplikasi Perubatan</option>
   <option value="8">Unit Aplikasi Kesihatan</option>
   <option value="9">Unit Aplikasi Farmasi Pengurusan Dan Kejuruteraan</option>
   <option value="10">Unit Pengaturcaraan</option>
   <option value="11">Unit Operasi Dan Pusat</option>
   <option value="12">Unit Keselamatan</option>
   <option value="13">Unit Sokongan Teknikal</option>
   <option value="14">Unit Rangkaian</option>
   <option value="15">Unit Pemindahan TEK</option>
   </select>
 	<input type="text" name="uid" placeholder="Username">
 	<input type="text" name="mail" placeholder="E-mail">
 	<input type="password" name="pwd" placeholder="Password">
 	<input type="password" name="pwd-repeat" placeholder="Repeat password">
  <button type="submit" name="signup-submit">Signup</button>


  <a href="login.php">Login</a>


 </form>

</section>
</div>
 </main>


 <?php
 require "footer.php";
 ?>