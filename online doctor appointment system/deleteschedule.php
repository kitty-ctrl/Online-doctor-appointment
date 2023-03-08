<?php
include_once 'config.php';
$id = $_POST['id'];

$delete = mysqli_query($conn,"DELETE FROM doctorschedule WHERE scheduleId=$id");
?>