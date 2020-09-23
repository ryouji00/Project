	<?php require_once "header.php";?>
	<title>Sistem E-Gerak | Hasil Carian Pegawai</title>
</head>
<body id="body">
	<div>
		<hr>
		<section id="result">
			<h3>Detail pegawai</h3>
			<?php
			$currentid = $_SESSION['test'];
			$sql = "SELECT staffname, staffemail, staffusername, staffid, staffunit
					FROM staff
					WHERE staffid = $currentid;";
			$result = $conn -> query($sql);
			if($result -> num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
					echo "<br>Name: " .$row['staffname'];
					echo "<br>Username: " .$row['staffusername'];
					echo "<br>E-Mail: " .$row['staffemail'];
					echo "<br>Unit: " .$row['staffunit'];
					echo "<br>";
					include "../include/deletestaff.inc.php";
				}
			}
			echo "<br>";
			?>
			<br>
			<!-- Retrieve data -->
			<?php
			$currentid = $_SESSION['test'];
			$sql = "SELECT staffname, staffemail, staffusername, staffunit
					FROM staff
					WHERE staffid = '$currentid';";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			$sql2 = "SELECT category, workname, tripstart, tripend
					FROM destination
					WHERE staffid = '$currentid'";
			$result2 = $conn -> query($sql2);
			?>
			<hr>
			<form method="get" action="staffinformationresult.php">
				<h4>Change staff information</h4>
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
				<select name="newunit">
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
				<br>
				<button class="btn btn-dark btn-sm" type="Reset">Reset</button>
				<hr>
				<h4>Change trip information</h4>
				<?php
				$sql = "SELECT *
						FROM destination
						WHERE staffid = $currentid
						LIMIT 2;";
				$result = $conn -> query($sql);
				if($result -> num_rows > 0) {
					while ($row2 = $result -> fetch_assoc()) {
						include "../include/dateformat.inc.php";
						echo "<br>Trip ID: " .$row2['destinationid'];
						echo "<br>Category: " .$row2['category'];
						echo "<br>Work name: " .$row2['workname'];
						echo "<br>Place held: " .$row2['placename'];
						echo "<br>From: " .$newDate. " to " .$newDate2;
						echo "<br>Time start: " .$newTime. " to " .$newTime2;
						echo "<br>";
						require "../include/edit.inc.php";
					}
				}
				else {
					echo "<h3>Tiada rekod</h3>";
				}
				?>
				<br>
			</form>
			<?php
			$confirmdestid = $_GET['confirmdestid'];
			$_SESSION['confirmdestid'] = $_GET['confirmdestid'];
			// change staff name
			if(isset($_GET['change-name'])) {
				$newname = $_GET['newname'];
				$sql = "UPDATE staff
						SET staffname = '$newname'
						WHERE staffid = '$currentid';";
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
						WHERE staffid = '$currentid';";
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
						WHERE staffid = '$currentid';";
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
						WHERE staffid = '$currentid';";
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
						WHERE staffid = '$currentid' AND destinationId = '$confirmdestid';";
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
						WHERE staffid = '$currentid' AND destinationId = '$confirmdestid';";
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
						WHERE staffid = '$currentid' AND destinationId = '$confirmdestid';";
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
						WHERE staffid = '$currentid' AND destinationId = '$confirmdestid';";
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
						WHERE staffid = '$currentid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			?>
			</form>
		</section>
	</div>
	<?php include "footer.php";?>