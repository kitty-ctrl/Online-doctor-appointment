<?php
include_once 'config.php';
$appid = $_POST['id'];

$delete = mysqli_query($conn,"DELETE FROM appointment WHERE appId=$appid");




?>