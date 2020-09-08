<?php
	include_once 'dbh.inc.php';
	session_start();
?>

<!-- https://www.youtube.com/watch?v=kMT54MPz9oE -->

<!DOCTYPE html>
<html>
<head>
	<title>Sistem E-Gerak</title>
	<link rel="stylesheet" href="css/dashboard.css">
</head>

<style>
	ul
	{
		border-style: solid;
 		list-style-type: none;
 		margin: 0;
  		padding: 0;
  		overflow: hidden;
  		background-color: #e8a34a;
	}

	li
	{
 		float: left;
 		border-right: 1px solid #bbb;
	}

	li a
	{
 		display: block;
 		padding: 8px;
 		color: black;
	}
	li a:hover:not(.active)
	{
  		background-color: #f7b157;
	}
	.home
	{
  		background-color: #f58c05;
	}

	#logo
	{
		border-style: solid;
		background-color: white;
		align-content: center;
		display: flex;
		padding: 10px;
		padding-left: 20px;
		align-items: center;
		font-family: sans-serif;
	}
	/*.tajuk
	{
		text-decoration-line: underline;
	}*/
	
	#body
	{
		font-family: sans-serif;
		background-color: #deb887;
	}
	html
	{
		position: relative;
		min-height: 100%;
	}

	#userdetails
	{
		border-style: solid;
		background-color: #E0E0E0;
		width: 400px;
	}

	#userdetails
	{
		margin-left: 200px;
		font-style: italic;
		padding-left: 20px;
		padding-top: 20px;
		padding-bottom: 20px;
	}
		
	.name
	{
		padding-left: 50px;
	}
	.id
	{
		padding-left: 50px;
	}
</style>

<body id="body">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		require "login.php";
	?>

	<hr>
	<div id="logo">
		<img class="firstimg" src="img\jatanegara2.png" width="160">
		<img class="secondimg" src="img\kkm2.png" width="160">
		<span><h1 class="tajuk">Sistem E-Gerakan Pegawai</h1></span>
	</div>

	<br>



	<!-- Details of the Admin -->
	<section id="userdetails">
		<?php
		$staffid = $_SESSION['password'];
			$sql = "SELECT * FROM staff 
					WHERE staffpassword = $staffpasword';";
			$result = $conn -> query($sql);
			while($row = $result -> fetch_assoc())
			{
				echo "Name: " .$row['staffname']. "<br>";
				echo "ID: " .$row['staffid']. "<br>";
			}
		?>
	</section>

	<!--<h3 class="about">About</h3>
	<p>Sistem ini dibina adalah untuk mengetahui tentang keberadaan seseorang pegawai.</p>-->


<!-- Akhir -->
<style>
.footer {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 100%;
  width: 100%;
  background-color: #1E88E5;
  color: black;
  text-align: center;
  overflow: hidden;
}
</style>

<?php
	require "footer.php";
?>

</body>
</html>