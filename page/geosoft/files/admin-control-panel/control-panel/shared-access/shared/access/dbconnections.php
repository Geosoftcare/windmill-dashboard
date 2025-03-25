<?php
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
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



$sTime = date("H:i");
$CompanyName = 'Geosoft Care | For home and community care';

$today = date("Y-m-d");
$datetime = new DateTime('tomorrow');
$tomorrow = $datetime->format('Y-m-d');

date_default_timezone_set("Europe/London");
$currentDate = date('F j, Y');
$d = mktime(11, 14, 54, 8, 12, 2014);
//isset($_COOKIE['companyCity']);

if (isset($_COOKIE[$cookie_name = '_VisitDate'])) {
    $visitCookieDate = "" . $_COOKIE[$cookie_name];
}
