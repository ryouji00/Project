	<?php require_once "header.php";?>
	<title>Sistem E-Gerak | Hasil Carian Pegawai</title>
</head>
<body id="body">
	<div>
		<hr>
		<section id="result">
			<h3>Detail pegawai</h3>
			<?php
			$searchname = $_SESSION['search'];
			$sql = "SELECT staffname, staffemail, staffusername, staffid, staffunit
					FROM staff
					WHERE staffname = '$searchname';";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			echo "<br>Name: " .$row['staffname'];
			echo "<br>Username: " .$row['staffusername'];
			echo "<br>E-Mail: " .$row['staffemail'];
			echo "<br>Unit: " .$row['staffunit'];
			?>
			<br>
			<form method="get">
				<button class="btn btn-danger mt-3" name="button-delete" type="submit" data-toggle="modal" data-target="#exampleModal">Delete</button>
				<!-- <button class="btn btn-secondary" name="button-edit" type="submit">Edit</button> -->
			</form>
			<form method="POST" action="staffinformationresult.php">
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button name="deletebutton" type="button" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
				<!-- <h3>Are you sure you want to delete?</h3>
				<form action="staffinformation.php" method="post">
					<a class="btn btn-secondary" href="staffinformationresult.php" role="button">Cancel</a>
					<button id="confirmdelete" type="button" class="btn btn-danger">Delete</button>
					<label>Enter staff name again to delete</label>
					<input type="text" name="idstaff" required>
					<button type="submit" name="deletebutton">Delete</button>
					<button type="reset" value="Reset">Reset</button> -->
			</form>
			<hr>
			<!-- Delete targeted staff -->
			<?php
			$confirmstaff = $_SESSION['search'];
			if(isset($_POST['deletebutton'])) {
				echo "Matching<br>";
				$sql = "DELETE FROM staff
						WHERE staffid = '$confirmstaff';";
				$sql2 = "DELETE FROM destination
						WHERE staffid = '$confirmstaff';";
				$conn -> query($sql2);
				if ($conn -> query($sql) === TRUE) {
					echo "Record deleted successfully";
				}
				else {
					echo "Error deleting record: " . $conn->error;
				}
			}
			?>
			<!-- Retrieve data -->
			<?php
			$searchid = $_SESSION['search'];
			$sql = "SELECT staffname, staffemail, staffusername
					FROM staff
					WHERE staffname = '$searchid';";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			$sql2 = "SELECT category, workname, tripstart, tripend
					FROM destination
					WHERE staffid = '$searchid'";
			$result2 = $conn -> query($sql2);
			?>
			<form method="get" action="editinformation.php">
				<h4>Change staff information</h4>
				<!-- <?php 
				echo "Name: " .$row['staffname'];
				echo "<br>Username: " .$row['staffusername'];
				echo "<br>E-Mail: " .$row['staffemail'];
				?> -->
				<br>
				<!-- Change Staff Name -->
				<div>
					<input type="text" name="newname" placeholder="Enter new name">
					<button class="btn btn-secondary btn-sm" name="change-name">edit</button>
				</div>

				<br>
				<!-- Change Staff Username -->
				<div>
					<input type="text" name="newusername" placeholder="Enter new username">
					<button class="btn btn-secondary btn-sm" name="change-username">edit</button>
				</div>
				<br>
				<!-- Change Staff Email -->
				<div>
					<input type="text" name="newemail" placeholder="Enter new email">
					<button class="btn btn-secondary btn-sm" name="change-email">edit</button>
				</div>
				<br>
				<!-- Change Staff Unit -->
				<label>Choose new unit: </label>
				<select>
					<option>--Choose--</option>
					<option value="Unit Rangkaian">Unit Rangkaian</option>
					<option value="Unit Sokongan Teknikal">Unit Sokongan Teknikal</option>
					<option value="Unit Operasi dan Pusat">Unit Operasi dan Pusat</option>
					<option value="Unit Keselamatan">Unit Keselamatan</option>
					<option value="Unit Pemindanan Tex">Unit Pemindanan Tex</option>
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
				<button class="btn btn-secondary btn-sm" name="change-email">edit</button>
				<button class="btn btn-dark btn-sm" type="Reset">Reset</button>
				<hr>
				<h4>Change trip information</h4>
				<?php
				if($result -> num_rows > 0) {
					while ($row2 = $result2 -> fetch_assoc()) {
						echo "Destination ID: " .$row2['destinationid'];
						echo "<br>Destination name: " .$row2['workname'];
						echo "<br>Start date: " .$row2['tripstart'];
						echo "<br>End date:" .$row2['tripend'];
					}
				}
				else {
					echo "No  record";
				}		
				?>
				<br>
				<div>
					<input type="text" name="confirmdestid" placeholder="Destination ID for confirmation">
				</div>
				<br>
				<!-- Change place name -->
				<div>
					<input type="text" name="newplacename" placeholder="Enter new place name">
					<button class="btn btn-secondary btn-sm" name="change-destname">edit</button>
				</div>
				<br>
				<!-- Change date trip -->
				<div>
					<input id="changedate" type="date" name="newstart" placeholder="Enter start date">
					<label>End date</label>
					<input id="changedate" type="date" name="newend" placeholder="Enter end date">
					<button class="btn btn-secondary btn-sm" name="change-date">edit</button>
				</div>
				<label>Start date</label>
				<!-- Delete trip -->
				<br>
				<button class="btn btn-danger btn-sm" name="delete-trip">Delete trip</button>
				<button class="btn btn-dark btn-sm" type="Reset">Reset</button>
			<?php
			$confirmdestid = $_GET['confirmdestid'];
			// change staff name
			if(isset($_GET['change-name'])) {
				$newname = $_GET['newname'];
				$sql = "UPDATE staff
						SET staffname = '$newname'
						WHERE staffid = '$searchid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			// change username
			elseif(isset($_GET['change-username'])) {
				$newusername = $_GET['newusername'];
				$sql = "UPDATE staff
						SET staffusername = '$newusername'
						WHERE staffid = '$searchid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			// change email
			elseif(isset($_GET['change-email'])) {
				$newemail = $_GET['newemail'];
				$sql = "UPDATE staff
						SET staffemail = '$newemail'
						WHERE staffid = '$searchid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			// change name of the place
			elseif(isset($_GET['change-destname'])) {
				$newdestname = $_GET['newplacename'];
				$sql = "UPDATE destination
						SET placename = '$newdestname'
						WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			// change trip date
			elseif(isset($_GET['change-date'])) {
				$newstart = $_GET['newstart'];
				$newend = $_GET['newend'];
				$sql = "UPDATE destination
						SET tripstart = '$newstart', tripend = '$newend'
						WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			// delete trip confirmation
			elseif(isset($_GET['delete-trip'])) {
				include("include/deletetrip.inc.php");
				if(isset($_GET['confirmdelete'])) {
					$sql = "DELETE FROM destination
							WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
					if ($conn->query($sql) === TRUE)								
					{
						echo "<hr>Record updated successfully";
					}
					else {
						echo "<hr>Error updating record: " . $conn->error;
					}
				}
			}
			?>
			</form>
		</section>
	</div>
	<?php include "footer.php";?>