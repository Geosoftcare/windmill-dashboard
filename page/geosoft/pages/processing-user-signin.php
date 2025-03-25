<?php
include('dbconnection-string.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btncarerLogin'])) {

  if (!isset($_COOKIE["deviceIdentifier"])) {
    header("Location: ./index");
    exit();
  }

  $myDeviceIdentifier = $_COOKIE["deviceIdentifier"];

  $pass = filter_input(INPUT_POST, 'txtPassword', FILTER_SANITIZE_STRING);
  $pass = trim($pass);
  $hashedPassword = hash('sha256', $pass);
  $today = date('Y-m-d');

  $query = "SELECT * FROM tbl_goesoft_carers_account WHERE col_cookies_identifier = ? AND user_password = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $myDeviceIdentifier, $hashedPassword);
  $stmt->execute();
  $result = $stmt->get_result();
  $carer = $result->fetch_assoc();

  if ($carer) {
    $teamQuery = "SELECT team_poster_code FROM tbl_general_team_form WHERE uryyTteamoeSS4 = ?";
    $stmt2 = $conn->prepare($teamQuery);
    $stmt2->bind_param("s", $carer['user_special_Id']);
    $stmt2->execute();
    $teamResult = $stmt2->get_result();
    $team = $teamResult->fetch_assoc();

    $_SESSION['usr_email'] = $carer['user_email_address'];
    $_SESSION['usr_carerId'] = $carer['user_special_Id'];
    $_SESSION['usr_carerNames'] = $carer['user_fullname'];
    $_SESSION['usr_carerPostCode'] = $team['team_poster_code'] ?? null;
    $_SESSION['usr_compId'] = $carer['col_company_Id'];

    header("Location: ../dashboard?QueryDate=$today");
    exit();
  } else {
    header("Location: ./index?error=invalid_credentials");
    exit();
  }
} else {
  header("Location: ./index");
  exit();
}
