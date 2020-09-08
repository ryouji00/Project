 <?php
 require "header.php";
 ?>
 


 <main>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/whole.css">

 	<div class="form-main">
 		<section class="section-default"> 

 	<h1>Form</h1>
 	<form action="includes/logout.inc.php" method="post">
  <select id="tempat" name="place-go">
   <option value="0">Kategori</option>
   <option value="1">Mesyuarat</option>
   <option value="2">Kursus</option>
   <option value="3">Bengkel</option>
   <option value="4">Lawatan Tapak</option>
</select>

<input type="text" name="work" placeholder="Nama Tugasan">
<input type="text" name="place" placeholder="Tempat">
<input type="date" name="trip-start" placeholder="Tarikh Pergi" >
 	<input type="date" name="trip-end" placeholder="Tarikh Pulang">
  <input type="time" name="time-start" placeholder="Masa Mula">
  <input type="time" name="time-end" placeholder="Masa Tamat">
 	<input type="text" name="officer" placeholder="Pegawai Peganti">
 	<button type="submit" name="send-submit">Hantar</button>
  <button type="reset" name="send-again">Tulis Semula</button>
  
  
 </form>

</section>
</div>
 </main>


 <?php
 require "footer.php";
 ?>