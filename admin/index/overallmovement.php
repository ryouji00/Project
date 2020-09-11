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
					WHERE s.staffid = d.staffid;";
			$result = $conn -> query($sql);
			while($row = $result -> fetch_assoc()) {
				/*to count total trip for each person
				$sql2 = "SELECT s.staffid
						FROM destination d, staff s
						WHERE s.staffid = d.staffid;";
				$result2 = $conn -> query($sql2);
				$row2 = $result2 -> fetch_assoc();
				$id = $row2['staffid'];
				$i = 0;
				$queryResult = $result2 -> num_rows;
				while($id === $row['staffid'])
				{
					$i++;
				}
				echo "Total trip: " .$i;*/
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
				while($row = $result -> fetch_assoc()) {
					require "../include/dateformat.inc.php";
					echo "<br>Name: " .$row['staffname'];
					echo "<br>Category: " .$row['category'];
					echo "<br>Name of work: " .$row['workname'];
					echo "<br>Place been: " .$row['placename'];
					echo "<br>From: " .$newDate. " to " .$newDate2;
					echo "<br>Time start: " .$newTime. " to " .$newTime2;
					echo "<hr>";
				}
			}
			?>
		</section>
	</section>
	<!-- Akhir -->
	<?php include "footer.php";?>