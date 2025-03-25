<?php
ob_start();
session_start();

if ((empty($_SESSION['usr_email']))) {
    header("Location: ../index");
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

$datetime = new DateTime('tomorrow');
$tomorrow = $datetime->format('Y-m-d');

date_default_timezone_set("Europe/London");
$currentDate = date('F j, Y');

$d = mktime(11, 14, 54, 8, 12, 2014);

// Secure database query using prepared statements
$companyId = $_SESSION['usr_compId'];

$sqlQuery = "SELECT shift_date FROM tbl_daily_shift_records WHERE col_company_Id = ? ORDER BY userId DESC LIMIT 1";

$stmt = $conn->prepare($sqlQuery);
$stmt->bind_param("i", $companyId);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$varRecentDate = $row['shift_date'] ?? date("Y-m-d");
$first_day_this_month = date("Y-m-01", strtotime($varRecentDate));
$last_day_this_month = date("Y-m-t", strtotime($varRecentDate));
$txtAllCarer = $txtCarerRecipient = $txtContract = 'Checked in';



if (isset($_COOKIE[$cookie_name = 'StartDate'])) {
    $txtStartDate = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'EndDate'])) {
    $txtEndDate = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'CareGiver'])) {
    $txtCareGiver = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'Contract'])) {
    $txtClientContract = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'CareRecipient'])) {
    $txtCareRecipient = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'CompanyId'])) {
    $txtCompanyId = "" . $_COOKIE[$cookie_name];
}
if (isset($_COOKIE[$cookie_name = 'Contract'])) {
    $txtContract = "" . $_COOKIE[$cookie_name];
}
