<?php
$orgDate = $row['tripstart'];
$orgDate2 = $row['tripend'];
$newDate = date("m-d-Y", strtotime($orgDate));
$newDate2 = date("m-d-Y", strtotime($orgDate2));

$orgTime = $row['timestart'];
$orgTime2 = $row['timeend'];
$newTime = date("g:i a", strtotime($orgTime));
$newTime2 = date("g:i a", strtotime($orgTime2));
?>