<script>
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
	<button class="btn btn-success mt-3" name="button-change" type="submit" data-toggle="modal" data-target="#Modal">Jadikan Pentadbir</button>
	<section>
		<form method="POST" action="../index/staffinformationresult.php">
			<!-- Modal -->
			<div class="modal fade" id="Modal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLongTitle">Adakah anda pasti dengan perubahan tersebut?</h3>
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
							<form action="../index/staffinformationresult.php" method="post">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button name="change-button" type="button" class="btn btn-success">Ubah</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>