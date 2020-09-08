<?php
include_once 'configdb.php';
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<a href="http://localhost/Project/admin/staffinformation.php">
			<div id="logo">
				<img class="firstimg" src="../img/jatanegara2.png" width="160">
				<img class="secondimg" src="../img/kkm2.png" width="160">
				<span><h1 class="tajuk">Sistem E-Pergerakan Pegawai</h1></span>
			</div>
		</a>
		<header>
			<div>
				<nav class="navbar navbar-expand-lg navbar-light bg-light toggled">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav nav-tabs mr-auto">
							<a class="btn btn-lg navbar-brand" href="http://localhost/Project/admin/staffinformation.php">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
									<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
								</svg>
							</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
    						<li class="nav-item active">
    							<a class="nav-link" href="http://localhost/Project/admin/overallmovement.php">PERGERAKAN MENYELURUH<span class="sr-only">(current)</span></a>
    						</li>
    						<li class="nav-item">
    							<a class="nav-link" href="http://localhost/Project/sistemegerak/form.php?form=success">Halaman borang</a>
							</li>
							<li class="nav-item">
								<a id="logoutbtn" class="btn btn-outline-secondary" href="http://localhost/Project/include/logout.inc.php">Daftar keluar
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
									</svg>
								</a>
							</li>
    						<!-- <li class="nav-item dropdown">
    							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
        							<a class="dropdown-item" href="#">Action</a>
        							<a class="dropdown-item" href="#">Another action</a>
        							<div class="dropdown-divider"></div>
        								<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
    						</li> -->
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<link rel="stylesheet" type="text/css" href="../css/whole.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<!-- My self defined JS -->
		<script src="js/main.js"></script>
		<!-- Search Filter Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>