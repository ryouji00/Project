<?php
session_start();
if($_SESSION['usernamestaff']) {
?>
	<?php require "header.php";?>
	<title>Sistem E-Gerak | Halaman Utama</title>
</head>
<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<body id="body">
	<hr>
	<h2>Welcome <?php echo $_SESSION['usernamestaff']?></h2>
	<!-- Search  -->
	<section id="carian">
		<form action="staffinformation.php" method="GET">
			<label>Masukkan nama pegawai: </label>
			<input id="myInput" name="search" type="text" onkeyup="myFunction()">
			<!-- <button name="search-button" type="submit">Cari</button> -->
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
							$_SESSION['currentid'] = $row['staffid'];
							$id = $row['staffid'];
							//require("../include/dashboard.inc.php"); ?>
							<tr>
								<td class="bil"><?php echo $i;?></td>
								<td><?php echo $row["staffname"];?></td>
								<td><?php echo $row["staffunit"];?></td>
								<td class="text-center"><button id="infobutton" type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#exampleModal">View</button></td>
							</tr>
							<?php
							$i++;
						}
					}
					?>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
    		<div class="modal-header">
    			<h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
    			</button>
    		</div>
    		<div class="modal-body">
				<?php
				$currentid = $_SESSION['currentid'];
				$sql2 = "SELECT category, workname, placename, tripstart, tripend, timestart, timeend,replaceofficer
						FROM destination
						WHERE staffid = $id
						ORDER BY tripstart ASC;";
				$result2 = $conn -> query($sql2);
				if(mysqli_num_rows($result2) > 0) {
					while($row2 = mysqli_fetch_assoc($result2)) {
						include "../include/dateformat.inc.php";
						echo "Kategori: " .$row2["category"];
						echo "<br>Tugasan: " .$row2["workname"];
						echo "<br>Lokasi: " .$row2["placename"];
						echo "<br>Pegawai pengganti: " .$row2["replaceofficer"];
						echo "<br>Dari: " .$newDate. " hingga " .$newDate2;
						echo "<br>Bermula: " .$newTime . " hingga " .$newTime2;
					}
				}
				else {
					echo "Tiada rekod";
				}
				?>
    		</div>
    		<div class="modal-footer">
    			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    			<a name="edit-button" href="../index/staffinformationresult.php" type="button" class="btn btn-primary">Edit</a>
    		</div>
		</div>
	</div>
</div>
		<!-- Result -->
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
		?>
		</form>
	</section>
	<script>
		//for search filter
		$(document).ready(function() {
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#tablefortoday tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
		$('.popover-dismiss').popover({
			trigger: 'focus'
		})
	</script>
	<?php require "footer.php";?>
<?php
}
else {
    header("location:../sistemegerak/login.php");
}
?>