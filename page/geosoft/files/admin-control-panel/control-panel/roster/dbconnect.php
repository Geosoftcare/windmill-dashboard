<?php
ob_start();
session_start();
if ((empty($_SESSION['usr_email']))) {

    header("Location: ../index");
}
$myConnection = mysqli_connect("localhost", "root", "") or die("could not connect to mysql");
mysqli_select_db($myConnection, "geosoft") or die("no database");


$CompanyName = 'Geosoft Care | For home and community care';

$today = date("Y-m-d");
$todayDate = date("F j, Y");

date_default_timezone_set("Europe/London");
$currentDate = date('F j, Y');

$d = mktime(11, 14, 54, 8, 12, 2014);
