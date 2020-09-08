<!-- link rel="stylesheet" type="text/css" href="../css/editinformation.css"> -->
<body id="body">
	<div>
		<hr>
		<section id="result">
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
				<?php 
				echo "Name: " .$row['staffname'];
				echo "<br>Username: " .$row['staffusername'];
				echo "<br>E-Mail: " .$row['staffemail'];
				?>
				<br>
				<!-- Change Staff Name -->
				<input type="text" name="newname" placeholder="Enter new name">
				<button class="btn btn-secondary btn-sm" name="change-name">edit</button>
				<br>
				<!-- Change Staff Username -->
				<input type="text" name="newusername" placeholder="Enter new username">
				<button class="btn btn-secondary btn-sm" name="change-username">edit</button>
				<br>
				<!-- Change Staff Email -->
				<input type="text" name="newemail" placeholder="Enter new email">
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
				<input type="text" name="confirmdestid" placeholder="Destination ID for confirmation">
				<br>
				<!-- Change place name -->
				<input type="text" name="newplacename" placeholder="Enter new place name">
				<button class="btn btn-secondary btn-sm" name="change-destname">edit</button>
				<br>
				<!-- Change date trip -->
				<input type="date" name="newstart" placeholder="Enter start date">
				<input type="date" name="newend" placeholder="Enter end date">
				<button class="btn btn-secondary btn-sm" name="change-date">edit</button>
				<!-- Delete trip -->
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