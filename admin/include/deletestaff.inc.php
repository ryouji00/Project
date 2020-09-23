<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
	<button class="btn btn-danger mt-3" name="button-delete" type="submit" data-toggle="modal" data-target="#exampleModal">Padam data pegawai</button>
	<section>
		<form method="POST" action="../index/staffinformationresult.php">
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLongTitle">Adakah anda pasti untuk memadam data pegawai tersebut?</h3>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<b><?php
							$sql = "SELECT staffname, staffusername, staffid, staffemail, staffunit
									FROM staff
									WHERE staffid = $currentid";
							$result = $conn -> query($sql);
							while($row = $result -> fetch_assoc()) {
								echo "Name: " .$row['staffname'];
								echo "<br>Username: " .$row['staffusername'];
								echo "<br>E-Mail: " .$row['staffemail'];
								echo "<br>" .$row['staffunit'];
							}
							?></b>
						</div>
						<div class="modal-footer">
							<form method="post">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button name="delete-button" type="button" href="../index/staffinformationresult.php" class="btn btn-danger">Padam</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
		$confirmstaff = $_SESSION['test'];
		if(isset($_POST['delete-button'])) {
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