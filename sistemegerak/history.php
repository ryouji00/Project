<?php require 'header.php';?>

<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/whole.css">
<body>
    <section class="contain-record">
        <section class="resultoverall">
            <?php
            $id = $_SESSION['idstaff'];
            $sql ="SELECT *
                    FROM destination
                    WHERE staffid = $id AND category = 'Mesyuarat'
                    ORDER BY tripstart DESC";
            $result = $conn -> query($sql);
			echo "<br><h5>Lawatan Tapak</h5><hr>";
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
            else {
                echo "Tiada rekod";
            }
            ?>
        </section>
        <section class="resultoverall">
            <?php
            $id = $_SESSION['idstaff'];
            $sql ="SELECT *
                    FROM destination
                    WHERE staffid = $id AND category = 'Bengkel'
                    ORDER BY tripstart DESC";
            $result = $conn -> query($sql);
			echo "<br><h5>Lawatan Tapak</h5><hr>";
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
            else {
                echo "Tiada rekod";
            }
            ?>
        </section>
        <section class="resultoverall">
            <?php
            $id = $_SESSION['idstaff'];
            $sql ="SELECT *
                    FROM destination
                    WHERE staffid = $id AND category = 'Kursus'
                    ORDER BY tripstart DESC";
            $result = $conn -> query($sql);
			echo "<br><h5>Lawatan Tapak</h5><hr>";
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
            else {
                echo "Tiada rekod";
            }
            ?>
        </section>
        <section class="resultoverall">
            <?php
            $id = $_SESSION['idstaff'];
            $sql ="SELECT *
                    FROM destination
                    WHERE staffid = $id AND category = 'Lawatan'
                    ORDER BY tripstart DESC";
            $result = $conn -> query($sql);
			echo "<br><h5>Lawatan Tapak</h5><hr>";
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
            else {
                echo "Tiada rekod";
            }
            ?>
        </section>
    </section>
    
</body>