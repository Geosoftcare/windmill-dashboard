<?php

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['btnCarerSignup'])) {

  $fullName = mysqli_real_escape_string($conn, $_REQUEST['txtFullName']);
  $fullName = strip_tags($fullName);
  $fullName = htmlspecialchars($fullName);

  $email = mysqli_real_escape_string($conn, $_REQUEST['txtEmail']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $txtPhone = mysqli_real_escape_string($conn, $_REQUEST['txtPhoneNumber']);
  $txtPhone = strip_tags($txtPhone);
  $txtPhone = htmlspecialchars($txtPhone);

  $pass = mysqli_real_escape_string($conn, $_REQUEST['txtPassword']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $cpass = mysqli_real_escape_string($conn, $_REQUEST['txtCPassword']);
  $cpass = strip_tags($cpass);
  $cpass = htmlspecialchars($cpass);

  $currentDate = mysqli_real_escape_string($conn, $_REQUEST['currentDate']);
  $currentTime = mysqli_real_escape_string($conn, $_REQUEST['currentTime']);
  $myId = mysqli_real_escape_string($conn, $_REQUEST['mysocialId']);
  $verifcationCode = 'Not active';
  $btnDeactivate = '0';
  $btnActivate = 'disabled';

  if ($pass == $cpass) {

    $myPass = hash('sha256', $pass);
    $myIdentity = hash('sha256', $myId);

    $myCheck = "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $email . "'";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
      echo "
    
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert').show();
      });

    </script>";
      unset($fullName);
      unset($email);
      unset($txtPhone);
      unset($pass);
      unset($currentDate);
      unset($currentTime);
      unset($myId);
    } else {
      //name can contain only alpha characters and space
      $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_carers_account (user_fullname,user_email_address,user_phone_number,user_password,date_registered,time_registered,user_special_Id,verification_code,status1,status2,VNumber) VALUES('" . $fullName . "', '" . $email . "', '" . $txtPhone . "', '" . $myPass . "', '" . $currentDate . "', '" . $currentTime . "', '" . $myIdentity . "', '" . $verifcationCode . "', '" . $btnDeactivate . "', '" . $btnActivate . "', '" . $myId . "')");

      if ($queryIns) {

        $email_to = "" . $email;
        $subject = "Verify your email";

        $headers = "From: info@esesphere.online";
        $headers = "MIME-Version: 1.0\r\n";
        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "
  
  <html>
  <body>
    <div style='width: 100%; height: auto;>
    <div style='width: 700px; height: 200px; text-align:center; color:white; padding: 23px; background-color:#c0392b; font-size:28px;'>
        <h2>Thank you for joining us.</h2>
        <br>
        <span style='font-size:28px;'>We work to give you a more better service. Kindly enter the verification code given below to verify your email.</span>
    </div>
      <div style='width:100%; height:auto; padding:22px; font-size: 30px;'>
        <h1>" . $myId . "</h1>
  
        https://esesphere.online/geosoft/geosoft/page/verify-your-email
      </div>
    </div>





  </body>
  </html>
  
  
  ";

        mail($email_to, $subject, $message, $headers);

        header("Location: ./verify-your-email");
      } else {
        echo "
    
    <script type='text/javascript'>
		$(document).ready(function() {
			$('#popupAlert2').show();
		});

	</script>";
      }
    }
  }
}
