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
						<?php
						$idstaff = $_SESSION['idstaff'];
						$sql = "SELECT staffposition
								FROM staff
								WHERE staffid = '$idstaff';";
						$result = $conn -> query($sql);
						while($row = $result -> fetch_assoc()) {
							if($row['staffposition'] == "Admin") {?>
								<a id="adminbtn" class="btn btn-outline-secondary" href="../admin/index/staffinformation.php">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hammer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.812 1.952a.5.5 0 0 1-.312.89c-1.671 0-2.852.596-3.616 1.185L4.857 5.073V6.21a.5.5 0 0 1-.146.354L3.425 7.853a.5.5 0 0 1-.708 0L.146 5.274a.5.5 0 0 1 0-.706l1.286-1.29a.5.5 0 0 1 .354-.146H2.84C4.505 1.228 6.216.862 7.557 1.04a5.009 5.009 0 0 1 2.077.782l.178.129z"/>
										<path fill-rule="evenodd" d="M6.012 3.5a.5.5 0 0 1 .359.165l9.146 8.646A.5.5 0 0 1 15.5 13L14 14.5a.5.5 0 0 1-.756-.056L4.598 5.297a.5.5 0 0 1 .048-.65l1-1a.5.5 0 0 1 .366-.147z"/>
									</svg>
								Admin page</a>
						<?php
							}
						}
						?>
					</div>
				</div>
			</section>
		</div>
</main>
 <?php
 include "footer.php";
 ?>