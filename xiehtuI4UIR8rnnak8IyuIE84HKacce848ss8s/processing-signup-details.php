<?php
include('dbconnections.php');
$error = false;
if (isset($_POST['btnAccessurlform'])) {
  $email = mysqli_real_escape_string($conn, $_REQUEST['myEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $fullName = mysqli_real_escape_string($conn, $_REQUEST['fullName']);
  $fullName = strip_tags($fullName);
  $fullName = htmlspecialchars($fullName);

  $pass = mysqli_real_escape_string($conn, $_REQUEST['myPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  $myPass = hash('sha256', $pass);

  $txtFinanceAccess = 'Granted';
  $txtAdminAccess = 'Granted';

  $myCheck = "SELECT * FROM tbl_goesoft_users WHERE user_email_address = '" . $email . "'";
  $myCheckres = mysqli_query($conn, $myCheck);
  $countRes = mysqli_num_rows($myCheckres);
  if ($countRes != 0) {
    echo "
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert').show();
      });
    </script>";
  } else {
    $sql_sel_cur_Id = "SELECT `col_company_Id` FROM tbl_goesoft_users ORDER BY userId DESC LIMIT 1";
    $result_cur_Id = $conn->query($sql_sel_cur_Id);
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    if ($result_cur_Id->num_rows > 0) {
      $row = $result_cur_Id->fetch_assoc();
      $myCompanyId = $row["col_company_Id"];
      $varIncreament = $myCompanyId + 1;
      require 'phpqrcode/qrlib.php';
      $text = '' . $varIncreament;
      $filePath = 'qrcodes/' . $varIncreament . '.png';
      QRcode::png($text, $filePath);
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_users (user_email_address,company_name,user_password,finance_access,admin_access,col_company_Id,col_qrcode) 
      VALUES('" . $email . "', '" . $fullName . "', '" . $myPass . "', '" . $txtFinanceAccess . "', '" . $txtAdminAccess . "', '" . $varIncreament . "', '" . $filePath . "')");
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
              <span style='font-size:20px;'>We work to give you a more better service. Continue creating your company by clicking the link below.</span>
          </div>
            <div style='width:100%; height:auto; padding:4px; font-size: 20 px;'>
              Use the link attached to navigate to our website for quick verification.
              https://geosoftcare.co.uk/page/geosoft/files/admin-control-panel/control-panel/auth-signup
            </div>
          </div>
        </body>
        </html>
          ";
        mail($email_to, $subject, $message, $headers);
        header("Location: ./index.php");
      } else {
        echo "ERROR: Could not able to execute. " . mysqli_error($conn);
      }
    } else {
      $row = $result_cur_Id->fetch_assoc();
      $myCompanyId = $row["col_company_Id"];
      require 'phpqrcode/qrlib.php';
      $varIncreament = '146763';
      $text = '' . $varIncreament;
      $filePath = './qrcodes/' . $varIncreament . '.png';
      QRcode::png($text, $filePath);
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_users (user_email_address,company_name,user_password,finance_access,admin_access,col_company_Id,col_qrcode) 
      VALUES('" . $email . "', '" . $fullName . "', '" . $myPass . "', '" . $txtFinanceAccess . "', '" . $txtAdminAccess . "', '" . $varIncreament . "', '" . $filePath . "')");
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
              <span style='font-size:20px;'>We work to give you a more better service. Continue creating your company by clicking the link below.</span>
          </div>
            <div style='width:100%; height:auto; padding:4px; font-size: 20 px;'>
              Use the link attached to navigate to our website for quick verification.
              https://geosoftcare.co.uk/page/geosoft/files/admin-control-panel/control-panel/auth-signup
            </div>
          </div>
        </body>
        </html>
          ";
        mail($email_to, $subject, $message, $headers);
        header("Location: ./index.php");
      } else {
        echo "ERROR: Could not able to execute. " . mysqli_error($conn);
      }
    }
  }
}
