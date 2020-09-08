	<?php require_once "header.php";?>
	<title>Sistem E-Gerak | Carian Pegawai</title>
</head>
<style>
</style>
<body id="body">
	<hr>
	<h2>ようこそ</h2>
	<hr>
	<!-- Search  -->
	<section id="carian">
		<form action="staffinformation.php" method="GET">
			<label>Masukkan nama pegawai: </label>
			<input id="myInput" name="search" type="text" onkeyup="myFunction()" required>
			<!-- <button name="search-button" type="submit">Cari</button>
			<button type="reset" value="Reset">Reset</button> -->
	<!-- Table -->
	<div>
		<table class="table table-sm table-bordered table-hover">
			<thead class="thead-light text-center">
				<tr>
					<td>Bil.</td>
					<td>Name</td>
					<td>Unit</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody id="tablefortoday" class="table-responsive-sm">
				<tr>
					<?php
					$i = 1;
					$sql = "SELECT staffname, staffunit, staffid
								FROM staff
								ORDER BY staffname ASC;";
					$result = $conn -> query($sql);
					$i = 1;
					if($result -> num_rows > 0) {
						while($row = $result -> fetch_assoc()) {
							require("../include/dashboard.inc.php");
							$i++;
						}
					}
					?>
				</tr>
			</tbody>
		</table>
	</div>
		<!-- Result
		<?php
		if(isset($_GET['search-button'])) {	
			$searchname = mysqli_real_escape_string($conn, $_GET['search']);
			$_SESSION['search'] = $searchname; //PASS THE VARIABLE TO staffinformationresult.php
			echo "<h3>Hasil Carian</h3>";
			$sql = "SELECT staffname
					FROM staff
					WHERE staffname LIKE '%$searchname%'
					ORDER BY staffname ASC;";
			$result = mysqli_query($conn, $sql);
			if($result -> num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
					echo "Name: <a href='staffinformationresult.php'>" .$row['staffname']. "</a><br>";
				}
			}
			else {
				echo "There is 0 results";
			}
		}
		?> -->
		</form>
	</section>
	<?php include "footer.php";?>