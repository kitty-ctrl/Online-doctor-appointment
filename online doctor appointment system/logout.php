<?php
session_start();

if(!isset($_SESSION['doctorSession']))
{
 header("Location: doctordashboard.php");
}
else if(isset($_SESSION['doctorSession'])!="")
{
 header("Location:main.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['doctorSession']);
 header("Location: main.php");
}
?>