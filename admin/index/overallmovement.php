	<?php require "header.php";?>
	<title>Sistem E-Gerak | Pergerakan Menyeluruh</title>
</head>
<body id="body">
	<hr>
	<h2>Pergerakan Menyeluruh</h2>
	<hr>
	<section class="container">
		<section class="peopleout">
			<?php
			$sql = "SELECT s.staffname, s.staffunit
					FROM staff s, destination d
					WHERE s.staffid = d.staffid
					ORDER BY tripstart ASC;";
			$result = $conn -> query($sql);
			while($row = $result -> fetch_assoc()) {
				echo "<br>Name: " .$row['staffname']. "<br> " .$row['staffunit']. "<hr>";
			}
			?>
		</section>
		<br>
		<section class="resultoverall">
			<?php
			$sql = "SELECT *
					FROM destination d, staff s
					WHERE s.staffid = d.staffid
					ORDER BY tripstart DESC;";
			$result = $conn -> query($sql);
			if($result -> num_rows > 0) {
				while($row2 = $result -> fetch_assoc()) {
					require "../include/dateformat.inc.php";
					echo "<br>Name: " .$row2['staffname'];
					echo "<br>Category: " .$row2['category'];
					echo "<br>Name of work: " .$row2['workname'];
					echo "<br>Place been: " .$row2['placename'];
					echo "<br>From: " .$newDate. " to " .$newDate2;
					echo "<br>Time start: " .$newTime. " to " .$newTime2;
					echo "<hr>";
				}
			}
			?>
		</section>
	</section>
	<?php include "footer.php";?>