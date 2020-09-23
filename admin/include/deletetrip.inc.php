<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
	<button class="btn btn-danger btn-sm mt-3" name="button-delete" type="submit" data-toggle="modal" data-target="#Modal">Delete trip</button>
	<section>
		<form method="POST" action="../index/staffinformationresult.php">
			<!-- Modal -->
			<div class="modal fade" id="Modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <b><?php
							$sql = "SELECT *
									FROM destination
									WHERE staffid = $currentid AND destinationid = $confirmdestid;";
							$result = $conn -> query($sql);
							while($row2 = $result -> fetch_assoc()) {
                            	include "dateformat.inc.php";
						    	echo "Kategori: " .$row2["category"];
						    	echo "Tugasan: " .$row2["workname"];
						    	echo "<br>Lokasi: " .$row2["placename"];
						    	echo "<br>Dari:" .$newDate. " hingga " .$newDate2;
								echo "<br>Bermula: " .$newTime . " hingga " .$newTime2;
							}
							?></b>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button name="deletebutton" type="button" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
        // delete trip confirmation
        $confirmdestid = $_SESSION['confirmdestid'];
        $searchid = $_SESSION['currentid'];
		if(isset($_POST['deletebutton'])) {
			$sql = "DELETE FROM destination
					WHERE staffid = '$searchid' AND destinationid = '$confirmdestid';";
			if ($conn->query($sql) === TRUE)								
			{
				echo "<hr>Record updated successfully";
			}
			else {
				echo "<hr>Error updating record: " . $conn->error;
			}
		}
		?>
	</section>