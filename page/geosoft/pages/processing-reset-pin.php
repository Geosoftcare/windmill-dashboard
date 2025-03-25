<?php
include('dbconnection-string.php');
//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['btnResetPinCode'])) {

  $pass = mysqli_real_escape_string($conn, $_POST['txtPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $txtClientSessionEm = mysqli_real_escape_string($conn, $_POST['txtClientSessionEm']);

  $myPass = hash('sha256', $pass);

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
    $query_data_update = mysqli_query($conn, "UPDATE tbl_goesoft_carers_account SET user_password = '$myPass', col_cookies_identifier = '$invertcookieId' WHERE user_email_address = '$txtClientSessionEm'");

    if ($query_data_update) {
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
    $invertcookieId = $hold_mycookie_Id + 1;
    // set a new cookie for the device | if cookie already exist then add 1 to it
    setcookie("deviceIdentifier", $invertcookieId, time() * 2);
    $query_data_update = mysqli_query($conn, "UPDATE tbl_goesoft_carers_account SET user_password = '$myPass', col_cookies_identifier = '$invertcookieId' WHERE user_email_address = '$txtClientSessionEm'");

    if ($query_data_update) {
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
