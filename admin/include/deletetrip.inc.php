<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
	<button class="btn btn-danger mt-3" name="button-delete" type="submit" data-toggle="modal" data-target="#Modal">Delete</button>
	<section>
		<form method="POST" action="../index/staffinformationresult.php">
			<!-- Modal -->
			<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                            include "dateformat.inc.php";
						    echo "Kategori: " .$row["category"];
						    echo "Tugasan: " .$row["workname"];
						    echo "<br>Lokasi: " .$row["placename"];
						    echo "<br>Dari:" .$newDate. " hingga " .$newDate2;
						    echo "<br>Bermula: " .$newTime . " hingga " .$newTime2;
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
        $searchid = $_SESSION['search'];
		if(isset($_POST['deletebutton'])) {
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
		?>
	</section>
	<!-- Akhir -->
	<?php include "footer.php";?>