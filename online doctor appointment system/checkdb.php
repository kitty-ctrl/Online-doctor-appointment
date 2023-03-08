<?php
include_once 'config.php';
$userid = $_GET['userid'];
$chkYesNo = $_GET['chkYesNo'];

$update = mysqli_query($conn,"UPDATE appointment SET status='done' WHERE appId=$userid");

?>