<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">Launch demo modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  				<?php
				$sID = array($row['staffid']);
				$newarray = implode(",", $sID);
				$sql2 = "SELECT destinationname, starttrip, endtrip
						FROM destination
						WHERE staffid = '($newarray)'
						ORDER BY starttrip ASC;";
				$result2 = $conn -> query($sql2);
				if($result2 -> num_rows > 0) {
					while($row2 = $result -> fetch_assoc()) {
						echo "Place: " .$row2["destinationname"];
						echo "<br>Start date:" .$row2["starttrip"];
						echo " End date: " .$row2["endtrip"];
					}
				}
				else {
					echo "Tiada Rekod";
				}
				?>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>