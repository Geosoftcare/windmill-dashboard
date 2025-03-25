<?php
include('dbconnection-string.php');
//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['btnSubmitPinCode'])) {

  $fullName = mysqli_real_escape_string($conn, $_REQUEST['teamName']);
  $fullName = strip_tags($fullName);
  $fullName = htmlspecialchars($fullName);

  $email = mysqli_real_escape_string($conn, $_REQUEST['myCredential']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $txtPhone = mysqli_real_escape_string($conn, $_REQUEST['teamPhone']);
  $txtPhone = strip_tags($txtPhone);
  $txtPhone = htmlspecialchars($txtPhone);

  $pass = mysqli_real_escape_string($conn, $_REQUEST['txtPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $currentDate = mysqli_real_escape_string($conn, $_REQUEST['currentDate']);
  $currentTime = mysqli_real_escape_string($conn, $_REQUEST['currentTime']);
  $myIdentity = mysqli_real_escape_string($conn, $_REQUEST['mysocialId']);
  $verifcationCode = 'Not active';
  $btnDeactivate = '0';
  $btnActivate = 'disabled';
  $txtDeviceId = mysqli_real_escape_string($conn, $_REQUEST['txtDeviceId']);
  $companyId = mysqli_real_escape_string($conn, $_REQUEST['companyId']);

  $myPass = hash('sha256', $pass);

  //for ($a = 4; $a <= 5; $a++) {
  //$rand = rand(00, 99);
  // $dIdentifier = "$rand";
  //}

  // there is no cookie set; a new device has connected
  $sql = "SELECT MAX(col_cookies_identifier + 0) FROM tbl_goesoft_carers_account";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
  $hold_mycookie_Id = $row['MAX(col_cookies_identifier + 0)'];
  $count_mycookie = mysqli_num_rows($result);

  if ($count_mycookie != 0) {

    $invertcookieId = $hold_mycookie_Id + 1;
    // set a new cookie for the device | if cookie already exist then add 1 to it
    setcookie("deviceIdentifier", $invertcookieId, time() * 2);

    //name can contain only alpha characters and space
    $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_carers_account (user_fullname,user_email_address,user_phone_number,user_password,col_cookies_identifier,date_registered,time_registered,user_special_Id,verification_code,status1,status2,carer_deviceId,col_company_Id) 
    VALUES('" . $fullName . "', '" . $email . "', '" . $txtPhone . "', '" . $myPass . "', '" . $invertcookieId . "', '" . $currentDate . "', '" . $currentTime . "', '" . $myIdentity . "', '" . $verifcationCode . "', '" . $btnDeactivate . "', '" . $btnActivate . "', '" . $txtDeviceId . "', '" . $companyId . "' )");

    if ($queryIns) {
      $email_to = "" . $email;
      $subject = "Your login pin";
      $headers = "From: it@geosoftcare.co.uk";
      $headers = "MIME-Version: 1.0\r\n";
      $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $message = "
        <html>
        <body>
          <div style='width: 100%; height: auto;>
          <div style='width: 700px; height: 200px; text-align:center; color:white; padding: 23px; background-color:#c0392b; font-size:28px;'>
              <h2>Thank you for joining us.</h2>
              <br>
              <span style='font-size:28px;'>We work to give you a more better service. Below is your login pin.</span>
          </div>
            <div style='width:100%; height:auto; padding:4px; font-size: 18px;'>
              <h3>" . $pass . "</h3>
            </div>
          </div>

        </body>
        </html>
        ";

      mail($email_to, $subject, $message, $headers);

      header("Location: ./index");
    }
  } else {
    $invertcookieId = 110;
    // set a new cookie for the device | if cookie already exist then add 1 to it
    setcookie("deviceIdentifier", $invertcookieId, time() * 2);

    //name can contain only alpha characters and space
    $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_carers_account (user_fullname,user_email_address,user_phone_number,user_password,col_cookies_identifier,date_registered,time_registered,user_special_Id,verification_code,status1,status2,carer_deviceId,col_company_Id) 
    VALUES('" . $fullName . "', '" . $email . "', '" . $txtPhone . "', '" . $myPass . "', '" . $invertcookieId . "', '" . $currentDate . "', '" . $currentTime . "', '" . $myIdentity . "', '" . $verifcationCode . "', '" . $btnDeactivate . "', '" . $btnActivate . "', '" . $txtDeviceId . "', '" . $companyId . "' )");

    if ($queryIns) {
      $email_to = "" . $email;
      $subject = "Your login pin";
      $headers = "From: it@geosoftcare.co.uk";
      $headers = "MIME-Version: 1.0\r\n";
      $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $message = "
        <html>
        <body>
          <div style='width: 100%; height: auto;>
          <div style='width: 700px; height: 200px; text-align:center; color:white; padding: 23px; background-color:#c0392b; font-size:28px;'>
              <h2>Thank you for joining us.</h2>
              <br>
              <span style='font-size:28px;'>We work to give you a more better service. Below is your login pin.</span>
          </div>
            <div style='width:100%; height:auto; padding:4px; font-size: 18px;'>
              <h3>" . $pass . "</h3>
            </div>
          </div>

        </body>
        </html>
        ";

      mail($email_to, $subject, $message, $headers);

      header("Location: ./index");
    }
  }
}
