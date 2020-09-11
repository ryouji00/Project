<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<tr>
	<td class="bil"><?php echo $i;?></td>
	<td><?php echo $row["staffname"]; $staffarray = array($row['staffname']);?></td>
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
				$staffarray = array($row['staffname']);
				$implodeArray = implode("','", $staffarray);
				$sql2 = "SELECT category, workname, placename, tripstart, tripend, timestart, timeend
						FROM destination
						WHERE staffname = ('$implodeArray')
						ORDER BY destinationId DESC;";
				$result2 = $conn -> query($sql2);
				if($result2 -> num_rows > 0) {
					while($row2 = $result2 -> fetch_assoc()) {
						echo "Kategori: " .$row2["category"];
						echo "Tugasan: " .$row2["workname"];
						echo "<br>Lokasi: " .$row2["placename"];
						echo "<br>Tarikh mula:" .$row2["tripstart"];
						echo "Tarikh akhir: " .$row2["tripend"];
						echo "<br>Masa mula: " .$row2["starttime"];
						echo "Masa akhir: " .$row2["timeend"];
					}
				}
				else {
					echo "Tiada rekod";
				}
				?>
    		</div>
    		<div class="modal-footer">
    			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    			<a name="edit-button" href="staffinformationresult.php" type="button" class="btn btn-primary">Edit</a>
    		</div>
		</div>
	</div>
</div>