<?php
$orgDate = $row2['tripstart'];
$orgDate2 = $row2['tripend'];
$newDate = date("d-m-Y", strtotime($orgDate));
$newDate2 = date("d-m-Y", strtotime($orgDate2));

$orgTime = $row2['timestart'];
$orgTime2 = $row2['timeend'];
$newTime = date("g:i a", strtotime($orgTime));
$newTime2 = date("g:i a", strtotime($orgTime2));
?>