 <?php
 require "header.php";
 $id = $_SESSION['idstaff'];
 $username = $_SESSION['usernamestaff'];
 $sql = "SELECT staffname, staffunit, staffemail
		 FROM staff
		WHERE staffid = $id";
$result = $conn -> query($sql);
 ?>
 


<main>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/whole.css">
  <br>
  <h2>Welcome  <?php echo $_SESSION['usernamestaff'] ?> </h2>
 		<div class="form-main">
			<section class="welcome">
				<?php
				while($row = $result -> fetch_assoc())  {
					echo "<br>Name: " .$row['staffname'];
					echo "<br>" .$row['staffunit'];
					echo "<br>Email: " .$row['staffemail'];
				}
				?>
			</section>
			<hr>
 			<section class="section-default">
				<form action="includes/form.inc.php" method="post">
					<select name="place-go">
						<option value="Mesyuarat">Mesyuarat</option>
						<option value="Kursus">Kursus</option>
						<option value="Bengkel">Bengkel</option>
						<option value="Lawatan">Lawatan Tapak</option>
					</select>
					<br>
					<input type="text" name="work" placeholder="Nama Tugasan">
					<input type="text" name="place" placeholder="Tempat">
					<input type="date" name="trip-start">
					<input type="date" name="trip-end">
					<input type="time" name="time-start">
					<input type="time" name="time-end">
					<input type="text" name="officer" placeholder="Pegawai Peganti">
					<button type="submit" name="send-submit">Hantar</button>
					<button type="reset" name="send-again">Tulis Semula</button>
				</form>
				<div class="row">
					<div class="col text-center">
						
					</div>
				</div>
			</section>
		</div>
</main>
 <?php
 include "footer.php";
 ?>