<?php

ob_start();
session_start();

error_reporting(~E_DEPRECATED & ~E_NOTICE);
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
