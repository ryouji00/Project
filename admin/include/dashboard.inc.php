<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<tr>
	<td class="bil"><?php echo $i;?></td>
	<td><?php echo $row["staffname"];?></td>
	<td><?php echo $row["staffunit"];?></td>
	<td class="text-center"><button id="infobutton" type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#exampleModal">View</button></td>
</tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
    		<div class="modal-header">
    			<h5 class="modal-title" id="exampleModalLongTitle">Info</h5>
    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
    			</button>
    		</div>
    		<div class="modal-body">
				<?php
				$currentid = $_SESSION['currentid'];
				$sql2 = "SELECT category, workname, placename, tripstart, tripend, timestart, timeend,replaceofficer
						FROM destination
						WHERE staffid = $id
						ORDER BY tripstart ASC;";
				$result2 = $conn -> query($sql2);
				if(mysqli_num_rows($result2) > 0) {
					while($row2 = mysqli_fetch_assoc($result2)) {
						include "dateformat.inc.php";
						echo "Kategori: " .$row2["category"];
						echo "<br>Tugasan: " .$row2["workname"];
						echo "<br>Lokasi: " .$row2["placename"];
						echo "<br>Pegawai pengganti: " .$row2["replaceofficer"];
						echo "<br>Dari: " .$newDate. " hingga " .$newDate2;
						echo "<br>Bermula: " .$newTime . " hingga " .$newTime2;
					}
				}
				else {
					echo "Tiada rekod";
				}
				?>
    		</div>
    		<div class="modal-footer">
    			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    			<a name="edit-button" href="../index/staffinformationresult.php" type="button" class="btn btn-primary">Edit</a>
    		</div>
		</div>
	</div>
</div>
<script>
//for row viewing
</script>