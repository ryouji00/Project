	<?php include "header.php";?>
	<title>Sistem E-Gerak | Hasil Carian Pegawai</title>
</head>
<link rel="stylesheet" type="text/css" href="css/staffinformationresult.css">
<body id="body">
	<div>
		<hr>
		<section id="result">
			<h3>Detail pegawai</h3>
			<?php
			$searchid = $_SESSION['search'];
			$sql = "SELECT staffname, staffemail, staffposition, staffusername, staffunit
					FROM staff
					WHERE staffid = '$searchid';";
			$result = $conn -> query($sql);
			$row = $result -> fetch_assoc();
			$sql2 = "SELECT destinationname, destinationId, starttrip, endtrip
					FROM destination
					WHERE staffid = '$searchid'";
			$result2 = $conn -> query($sql2);
			?>
			<form method="get" action="editinformation2.php">
				<p>Change staff information</p>
				<?php 
				echo "<br>Name: " .$row['staffname'];
				echo "<br>Username: " .$row['staffusername'];
				echo "<br>E-Mail: " .$row['staffemail'];
				echo "<br>Unit: " .$row['staffunit'];
				?>
				<br>
				<!-- Change Staff Name -->
				<input type="text" name="newname" placeholder="Enter new name">
				<button name="change-name">edit</button>
				<br>
				<!-- Change Staff Username -->
				<input type="text" name="newusername" placeholder="Enter new username">
				<button name="change-username">edit</button>
				<br>
				<!-- Change Staff Email -->
				<input type="text" name="newemail" placeholder="Enter new email">
				<button name="change-email">edit</button>
				<br>
				<!-- Change Staff Unit -->
				<lable>Change Unit: </lable>
				<select name="newunit">
					<option value="Unit Rangkaian">Unit Rangkaian</option>
					<option value="Unit Sokongan Teknika">Unit Sokongan Teknikal</option>
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
				<button name="change-unit">edit</button>
				<hr>
				<p>Change trip information</p>
				<?php
				while ($row2 = $result2 -> fetch_assoc()) {
					include "dateformat.inc.php";
					echo "<br>Trip ID: " .$row2['destinatioId'];
					echo "<br>Category: " .$row2['category'];
					echo "<br>Work name: " .$row2['workname'];
					echo "<br>Place held: " .$row2['placename'];
					echo "<br>From: " .$newDate. " to " .$newDate2;
					echo "<br>Time start: " .$newTime. " to " .$newTime2;
				}
				?>
				<br>
				<input type="text" name="confirmdestid" placeholder="Destination ID for confirmation">
				<br>
				<lable>Change category: </lable>
				<select name="newcategory">
					<option value="Kategori">Kategori</option>
					<option value="Mesyuarat">Mesyuarat</option>
					<option value="Kursus">Kursus</option>
					<option value="Bengkel">Bengkel</option>
					<option value="Lawatan Tapak">Lawatan Tapak</option>
				</select>
				<button name="change-category">edit</button>
				<input type="text" name="newdestname" placeholder="Enter new for place being held">
				<button name="change-destname">edit</button>
				<input type="text" name="newworkname" placeholder="Enter new name for the work">
				<button name="change-workname">edit</button>
				<br>
				<input type="date" name="newstart" placeholder="Enter start date">
				<input type="date" name="newend" placeholder="Enter end date">
				<button name="change-date">edit</button>
				<input type="time" name="newstarttime" placeholder="Enter start time">
				<input type="time" name="newendtime" placeholder="Enter end time">
				<button name="change-time">edit</button>
				<button name="delete-trip">Delete trip</button>
			</form>
			<?php
			$confirmdestid = $_GET['confirmdestid'];
			if(isset($_GET['change-name'])) { //change name
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
			elseif(isset($_GET['change-username'])) { //change username
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
			elseif(isset($_GET['change-email'])) { //change email
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
			elseif(isset($_GET['change-unit'])) { //change unit
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
			elseif(isset($_GET['change-category'])) { //change category
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
			elseif(isset($_GET['change-destname'])) { //change placename
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
			elseif(isset($_GET['change-workname'])) { //change workname
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
			elseif(isset($_GET['change-date'])) { //change date
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
			elseif(isset($_GET['change-time'])) { //change date
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
			elseif(isset($_GET['delete-trip'])) {
				$sql = "DELETE FROM destination
						WHERE staffid = '$searchid' AND destinationId = '$confirmdestid';";
				if ($conn->query($sql) === TRUE) {
					echo "<hr>Record updated successfully";
				}
				else {
					echo "<hr>Error updating record: " . $conn->error;
				}
			}
			?>
		</section>
	</div>
	<?php //include "footer.php";?>