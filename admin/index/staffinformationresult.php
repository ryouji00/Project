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
			<?php
				require "deleteinformation.php";
			?>
			<form method="POST" action="staffinformationresult.php">
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
				<select name="newunit">
					<option value="0">Unit Rangkaian</option>
					<option value="1">Unit Sokongan Teknikal</option>
					<option value="2">Unit Operasi dan Pusat</option>
					<option value="3">Unit Keselamatan</option>
					<option value="4">Unit Pemindanan Tex</option>
					<option value="5">Unit Pengaturcaraan</option>
					<option value="6">Unit Farmasi Pengurusan dan Kejuruteraan</option>
					<option value="7">Unit Aplikasi Kesihatan</option>
					<option value="8">Unit Perubatan</option>
					<option value="9">Unit Aplikasi HIS</option>
					<option value="10">Unit Dasar dan Penilaian Projek</option>
					<option value="12">Unit Perolehan SQA</option>
					<option value="13">Unit Pengurusan, Pentadbiran, Kewangan</option>
					<option value="14">Unit Perancangan dan Inovasi ICT</option>
				</select>
				<button class="btn btn-secondary btn-sm" name="change-email">edit</button>
				<button class="btn btn-dark btn-sm" type="Reset">Reset</button>
				<hr>
				<h4>Change trip information</h4>
				<?php
				if($result -> num_rows > 0) {
					while ($row2 = $result2 -> fetch_assoc()) {
						include "include/dateformat.inc.php";
						echo "<br>Trip ID: " .$row2['destinatioId'];
						echo "<br>Category: " .$row2['category'];
						echo "<br>Work name: " .$row2['workname'];
						echo "<br>Place held: " .$row2['placename'];
						echo "<br>From: " .$newDate. " to " .$newDate2;
						echo "<br>Time start: " .$newTime. " to " .$newTime2;
					}
				}
				else {
					echo "No  record";
				}		
				?>
				<br>
				<!-- Confirming trip -->
				<div>
					<input type="text" name="confirmdestid" placeholder="Destination ID for confirmation">
				</div>
				<br>
				<!-- Change category -->
				<div>
					<lable>Change category: </lable>
					<select name="newcategory">
						<option value="Kategori">Kategori</option>
						<option value="Mesyuarat">Mesyuarat</option>
						<option value="Kursus">Kursus</option>
						<option value="Bengkel">Bengkel</option>
						<option value="Lawatan Tapak">Lawatan Tapak</option>
					</select>
					<button class="btn btn-secondary btn-sm" name="change-category">edit</button>
				</div>
				<br>
				<!-- Change placename -->
				<div>
					<input type="text" name="newdestname" placeholder="Enter new for place being held">
					<button class="btn btn-secondary btn-sm" name="change-destname">edit</button>
				</div>
				<br>
				<!-- Change workname -->
				<div>
					<input type="text" name="newworkname" placeholder="Enter new name for the work">
					<button class="btn btn-secondary btn-sm" name="change-workname">edit</button>
				</div>
				<br>
				<!-- Change date -->
				<div>
					<label>Change date: </label>
					<input id="DTformat" type="date" name="newstart">
					<input id="DTformat" type="date" name="newend">
					<button class="btn btn-secondary btn-sm" name="change-date">edit</button>
				</div>
				<br>
				<!-- Change time -->
				<div>
					<label>Change time: </label>
					<input id="DTformat" type="time" name="newstarttime">
					<input id="DTformat" type="time" name="newendtime">
					<button class="btn btn-secondary btn-sm" name="change-time">edit</button>
				</div>
				<br>
				<button class="btn btn-secondary btn-sm" name="delete-trip">Delete trip</button>
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
			//change username
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
			//change email
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
			//change unit
			elseif(isset($_GET['change-unit'])) {
				$newunit = $_GET['newunit'];
				$sql = "UPDATE staff
						SET staffunit = '$newunit'
						WHERE staffid = '$searchid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			//change category
			elseif(isset($_GET['change-category'])) {
				$newcat = $_GET['newcategory'];
				$sql = "UPDATE destination
						SET category = '$newcat'
						WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			//change placename
			elseif(isset($_GET['change-destname'])) {
				$newdestname = $_GET['newdestname'];
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
			//change workname
			elseif(isset($_GET['change-workname'])) {
				$newworkname = $_GET['newworkname'];
				$sql = "UPDATE destination
						SET workname = '$newworkname'
						WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			//change date
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
			//change date
			elseif(isset($_GET['change-time'])) {
				$newstarttime = $_GET['newstarttime'];
				$newendtime = $_GET['newendtime'];
				$sql = "UPDATE destination
						SET timestart = '$newstarttime', timeend = '$newendtime'
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