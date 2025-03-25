<?php
ob_start();
session_start();

if ((empty($_SESSION['usr_email']))) {
    header("Location: ./index");
}

// this will avoid mysql_connect() deprecation error.
error_reporting(~E_DEPRECATED & ~E_NOTICE);
// but I strongly suggest you to use PDO or MySQLi.

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'geosoft');

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS);
$dbcon = mysqli_select_db($conn, DBNAME);

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

if (!$dbcon) {
    die("Database Connection failed : " . mysqli_error());
}

$CompanyName = 'Geosoft Care | For home and community care';

$today = date("Y-m-d");
$txtDateQueryInput = date("Y-m-d");
$dayDateNumb = date("d");

date_default_timezone_set("Europe/London");
$currentDate = date('M j, Y');

$d = mktime(11, 14, 54, 8, 12, 2014);

$cureTimeCount = date("H:i");
$echomyTime = date("H");
$echoCurDay = date("l");
$todayPart = date("D, d M");


$first_day_this_month = date('Y-m-01');
$last_day_this_month  = date('Y-m-t');

date_default_timezone_set('Europe/London');
$sTime = date("H:i");
$firstDateofMonth = date("Y-m-01", strtotime($today));
$lastDateofMonth = date("Y-m-t", strtotime($today));
