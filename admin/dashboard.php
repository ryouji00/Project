	<?php require "header.php";?>
	<title>Sistem E-Gerak</title>
</head>
<style>
</style>
<!-- <link rel="stylesheet" type="text/css" href="../css/dashboard.css"> -->
<body id="body">
	<!-- JQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<!-- Bootstrap4 JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!-- Fixed Column -->
	<link rel="stylesheet" src="extensions/fixed-columns/bootstrap-table-fixed-columns.css">
	<script src="extensions/fixed-columns/bootstrap-table-fixed-columns.js"></script>
	<br>
	<!-- Content -->
	<div class="container">
		<input id="myInput" class="form-control mb-3 mt-3" type="text" onkeyup="myFunction()" placeholder="Search for names..">
		<table class="table table-responsive table-bordered table-hover data-fixed-columns">
			<thead>
				<tr class="bg-dark text-white">
					<th>Bil.</th>
					<th>Nama</th>
					<th>Unit</th>
				</tr>
			</thead>
			<div id="tablecontent" class="table-responsive-sm">
				<tbody id="table-for-today">
					<?php
					$sql = "SELECT staffname, staffunit, staffid
							FROM staff
							ORDER BY staffname ASC;";
					
					$result = $conn -> query($sql);
					$i = 1;
					if($result -> num_rows > 0) {
						while($row = $result -> fetch_assoc()) {
							require("../include/dashboard.inc.php");
							$i++;
						}
					}
					?>
				</tbody>
			</div>
		</table>
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="#">Previous</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		</nav>
	</div>
	<div>
		<button>Logout</button>
	</div>
	<!-- Akhir -->
	<?php include "footer.php";?>