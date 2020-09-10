 <?php
 require "header.php";
 ?>
 


<main>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/whole.css">

 	<div class="form-main">
 		<section class="section-default"> 

			<h1>Form</h1>
			<form action="includes/logout.inc.php" method="post">
				<select id="tempat" name="place-go">
					<option value="0">Kategori</option>
					<option value="1">Mesyuarat</option>
					<option value="2">Kursus</option>
					<option value="3">Bengkel</option>
					<option value="4">Lawatan Tapak</option>
				</select>

				<input type="text" name="work" placeholder="Nama Tugasan">
				<input type="text" name="place" placeholder="Tempat">
				<input type="date" name="trip-start" placeholder="Tarikh Pergi" >
				<input type="date" name="trip-end" placeholder="Tarikh Pulang">
				<input type="time" name="time-start" placeholder="Masa Mula">
				<input type="time" name="time-end" placeholder="Masa Tamat">
				<input type="text" name="officer" placeholder="Pegawai Peganti">
				<button type="submit" name="send-submit">Hantar</button>
				<button type="reset" name="send-again">Tulis Semula</button>
			</form>
			<button id="logoutbtn" class="btn btn-secondary">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
				</svg>
			Logout</button>
			<a id="adminbtn" class="btn btn-secondary" type="submit" href="../admin/index/staffinformation.php">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hammer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.812 1.952a.5.5 0 0 1-.312.89c-1.671 0-2.852.596-3.616 1.185L4.857 5.073V6.21a.5.5 0 0 1-.146.354L3.425 7.853a.5.5 0 0 1-.708 0L.146 5.274a.5.5 0 0 1 0-.706l1.286-1.29a.5.5 0 0 1 .354-.146H2.84C4.505 1.228 6.216.862 7.557 1.04a5.009 5.009 0 0 1 2.077.782l.178.129z"/>
					<path fill-rule="evenodd" d="M6.012 3.5a.5.5 0 0 1 .359.165l9.146 8.646A.5.5 0 0 1 15.5 13L14 14.5a.5.5 0 0 1-.756-.056L4.598 5.297a.5.5 0 0 1 .048-.65l1-1a.5.5 0 0 1 .366-.147z"/>
				</svg>
			Admin page</a>
		</section>
	</div>
</main>
<div class="card">
	<div class="card-body">
		<?php
		$staffid = $_SESSION['idstaff'];
		$sql = "SELECT staffposition
				FROM staff
				WHERE staffid = '$staffid';";
		$result = $conn -> query($sql);
		?>
	</div>
</div>
 <?php
 require "footer.php";
 ?>