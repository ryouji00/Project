<!DOCTYPE html>
<html>
<head>
</head>
<body>
		  				<?php
						  include_once 'cofigdb.php';
				$sql2 = "SELECT destinationname, starttrip, endtrip
						FROM destination
						WHERE staffid ASC
						ORDER BY starttrip ASC;";
				$result2 = $conn -> query($sql2);
				if($result2 -> num_rows > 0) {
					while($row2 = $result -> fetch_assoc()) {
						echo "Place: " .$row2["destinationId"];
						echo "Place: " .$row2["placename"];
						echo "<br>Start date:" .$row2["tripstart"];
						echo " End date: " .$row2["tripend"];
					}
				}
				else {
					echo "Tiada Rekod";
				}
				?>
</body>
</html>