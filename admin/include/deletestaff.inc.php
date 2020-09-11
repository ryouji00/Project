<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
	<button class="btn btn-danger mt-3" name="button-delete" type="submit" data-toggle="modal" data-target="#exampleModal">Delete</button>
	<section>
		<form method="POST" action="../index/staffinformationresult.php">
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
							echo "Name: " .$row['staffname'];
							echo "<br>Username: " .$row['staffusername'];
							echo "<br>E-Mail: " .$row['staffemail'];
							echo "<br>Unit: " .$row['staffunit'];
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
		$confirmstaff = $_SESSION['search'];
		if(isset($_POST['deletebutton'])) {
			echo "Matching<br>";
			$sql = "DELETE FROM staff
					WHERE staffid = '$confirmstaff';";
			$sql2 = "DELETE FROM destination
					WHERE staffid = '$confirmstaff';";
			$conn -> query($sql2);
			if ($conn -> query($sql) === TRUE) {
				echo "Record deleted successfully";
			}
			else {
				echo "Error deleting record: " . $conn->error;
			}
		}
		?>
	</section>
	<!-- Akhir -->
	<?php include "footer.php";?>