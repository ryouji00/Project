	<?php require "header.php";?>
	<title>Sistem E-Gerak | Pergerakan Pegawai</title>
</head>
<!-- <link rel="stylesheet" type="text/css" href="../css/staffdestination.css"> -->
<body id="body">
	<hr>
	<h2>Pergerakan Pegawai</h2>
	<hr>
	<!-- CARIAN  -->
	<section id="form">
		<div>
			<form action="staffdestination.php" method="GET">
				<label class="formpegawai">Masukkan <strong>ID PEGAWAI</strong> yang dikehendaki: </label>
				<input name="idpegawai" type="text" class="formpegawai">
				<label>From date</label>
				<input type="date" name="searchfromdate">
				<label>To date</label>
				<input type="date" name="searchtodate">
				<span><button name="submit" type="submit">Search</button>
				<button type="reset" value="Reset">Reset</button></span>
				<br>
			</form>
		</div>
		<hr>
		<!-- HASIL CARIAN -->
		<section id="result">
		<?php
		if(isset($_GET['submit'])) {
			$searchstaff = mysqli_real_escape_string($conn, $_GET['idpegawai']);
			$start = $_GET['searchfromdate'];
			$end = $_GET['searchtodate'];
			echo "<h3>Hasil Carian</h3>";
			//SQL YANG JADI
			$sql = "SELECT s.staffname, d.destinationname, d.starttrip, d.endtrip, d.replaceofficer, d.note
					FROM destination d, staff s
					WHERE s.staffid = '$searchstaff' AND d.staffid = '$searchstaff'
					AND d.starttrip AND d.endtrip BETWEEN '$start' AND '$end';";
			$result = $conn -> query($sql);
			if($result -> num_rows > 0) {
				$resultQuery = mysqli_num_rows($result);
				echo "<h4>There are " .$resultQuery. " trip</h4>";
				while($row = $result -> fetch_assoc()) {
					echo "Name: " .$row['staffname']. "<br>Place: " .$row['destinationname'];
					echo "<br>From: " .$row['starttrip']. " to " .$row['endtrip'];
					echo "<br>Pegawai pengganti: " .$row['replaceofficer'];
					echo "<br>Note: " .$row['note']. "<hr>";
				}
			}
			else {
				echo "Tiada Rekod";
			}
		}
		?>
	</section>
	<?php include "footer.php";?>