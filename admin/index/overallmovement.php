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
			$sql = "SELECT d.staffid, d.starttrip, d.endtrip, s.staffname
					FROM destination d, staff s
					WHERE s.staffid = d.staffid
					GROUP BY d.staffid;";
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
				echo "<br>ID: " .$row['staffid']. "<br>Name: " .$row['staffname']. "<hr>";
			}
			?>
		</section>
		<br>
		<section class="resultoverall">
			<?php
			$sql = "SELECT *
					FROM destination d, staff s
					WHERE s.staffid = d.staffid
					ORDER BY d.starttrip DESC;";
			$result = $conn -> query($sql);
			if($result -> num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
					echo "<br>Name: " .$row['staffname'];
					echo "<br>Desination: " .$row['destinationname'];
					echo "<br>Start trip: " .$row['starttrip']. " to " .$row['endtrip'];
					echo "<br>Reason: " .$row['note']. "<hr>";
				}
			}
			?>
		</section>
	</section>
	<!-- Akhir -->
	<?php include "footer.php";?>