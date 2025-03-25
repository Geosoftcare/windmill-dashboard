<?php
include('db-connect.php');

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['btnSubmitform'])) {

  $fullName = mysqli_real_escape_string($conn, $_REQUEST['fullName']);
  $fullName = strip_tags($fullName);
  $fullName = htmlspecialchars($fullName);

  $email = mysqli_real_escape_string($conn, $_REQUEST['myEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $txtSelectCurrentCity = mysqli_real_escape_string($conn, $_REQUEST['txtSelectCurrentCity']);
  $txtSelectCurrentCity = strip_tags($txtSelectCurrentCity);
  $txtSelectCurrentCity = htmlspecialchars($txtSelectCurrentCity);

  $pass = mysqli_real_escape_string($conn, $_REQUEST['myPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $currentDate = mysqli_real_escape_string($conn, $_REQUEST['currentDate']);
  $currentTime = mysqli_real_escape_string($conn, $_REQUEST['currentTime']);
  $myId = mysqli_real_escape_string($conn, $_REQUEST['mysocialId']);
  $verifcationCode = 'Not Verified';
  $btnDeactivate = '0';
  $btnActivate = 'disabled';

  $myPass = hash('sha256', $pass);
  $myIdentity = hash('sha256', $myId);

  $txtIpAddress = mysqli_real_escape_string($conn, $_REQUEST['txtIpAddress']);
  $txtFinanceAccess = 'Restricted';
  $txtmyCountry = mysqli_real_escape_string($conn, $_REQUEST['txtmyCountry']);

  $myCheck = "SELECT * FROM tbl_goesoft_users WHERE user_email_address = '" . $email . "'";
  $myCheckres = mysqli_query($conn, $myCheck);
  $countRes = mysqli_num_rows($myCheckres);

  if ($countRes != 0) {
    $queryIns = mysqli_query($conn, "UPDATE tbl_goesoft_users SET `user_fullname` = '$fullName', `user_password` = '$myPass', `date_registered` = '$currentDate', `time_registered` = '$currentTime', `user_special_Id` = '$myIdentity', `verification_code` = '$verifcationCode', `VNumber` = '$myId', `status1` = '$btnDeactivate', `status2` = '$btnActivate', `myviewArea` = '$txtSelectCurrentCity', `client_view` = '$txtSelectCurrentCity', `team_view` = '$txtSelectCurrentCity', `my_city` = '$txtSelectCurrentCity', `my_ip` = '$txtIpAddress', `my_country` = '$txtmyCountry', `finance_access` = '$txtFinanceAccess' WHERE user_email_address = '$email' ");

    if ($queryIns) {

      $email_to = "" . $email;
      $subject = "Verify your email";

      $headers = "From: it@geosoftcare.co.uk";
      $headers = "MIME-Version: 1.0\r\n";
      $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

      $message = "

      <html>
      <body>
        <div style='width: 100%; height: auto;>
        <div style='width: 700px; height: 200px; text-align:center; color:white; padding: 23px; background-color:#c0392b; font-size:20px;'>
            <h2>Thank you for joining us.</h2>
            <br>
            <span style='font-size:20px;'>We work to give you a more better service. Kindly enter the verification code given below to verify your email.</span>
        </div>
          <div style='width:100%; height:auto; padding:4px; font-size: 20 px;'>
            <h1>" . $myId . "</h1>
      
            Use the link attached to navigate to our website for quick verification.
            https://geosoftcare.co.uk/page/geosoft/files/admin-control-panel/control-panel/verify-your-email
          </div>
        </div>
    
       
      </body>
      </html>
      ";

      mail($email_to, $subject, $message, $headers);

      header("Location: ./verify-your-email");
    }
  } else {

    unset($fullName);
    unset($email);
    unset($txtSelectCurrentCity);
    unset($pass);
    unset($currentDate);
    unset($currentTime);
    unset($myId);
    unset($txtmyCity);
    unset($txtIpAddress);
    unset($txtmyCountry);
    unset($txtCompanyId);

    header('Location: ./error-not-on-list');
  }
}
