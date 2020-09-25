<?php require 'header.php';?>

<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/whole.css">
<body>
    <section class="container">
        <?php
        $id = $_SESSION['idstaff'];
        $sql ="SELECT *
                FROM destination
                WHERE staffid = $id
                ORDER BY tripstart ASC";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0) {
            while($row2 = $result -> fetch_assoc()) {
                include '../admin/include/dateformat.inc.php';
                echo "<br><b>Trip ID: " .$row2['destinationid']. "</b>";
                echo "<br>Category: " .$row2['category'];
                echo "<br>Workname: " .$row2['workname'];
                echo "<br>Place: " .$row2['placename'];
                echo "<br>Date: " .$newDate. " hingga " .$newDate2;
                echo "<br>Date: " .$newTime. " hingga " .$newTime2. "<hr>";
            }
        }
        ?>
    </section>
    
</body>