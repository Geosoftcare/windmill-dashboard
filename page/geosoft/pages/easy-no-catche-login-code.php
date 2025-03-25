<?php
include('dbconnection-string.php');

if (isset($_POST['btncarerLogin'])) {

  $pass = mysqli_real_escape_string($conn, $_POST['txtPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $password = hash('sha256', $pass);
  $today = date('Y-m-d');

  $select_device_Identifier = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_password='$password' 
  ORDER BY userId ASC LIMIT 1 ");
  $row = mysqli_fetch_array($select_device_Identifier);
  $varUserEmail = $row['user_special_Id'];

  $sql_get_carer_pc = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
  WHERE (uryyTteamoeSS4 = '" . $row['user_special_Id'] . "') ");
  $row_get_carer_pc = mysqli_fetch_array($sql_get_carer_pc);
  $varCarerPC = $row_get_carer_pc['team_poster_code'];

  $count = mysqli_num_rows($select_device_Identifier);

  if ($count == 1) {
    $_SESSION['usr_email'] = $row['user_email_address'];
    $_SESSION['usr_carerId'] = $row['user_special_Id'];
    $_SESSION['usr_carerNames'] = $row['user_fullname'];
    $_SESSION['usr_carerPostCode'] = $varCarerPC;
    $_SESSION['usr_compId'] = $row['col_company_Id'];
    header("Location: ../dashboard");
  }
}
