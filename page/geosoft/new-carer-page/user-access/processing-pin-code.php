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
  $myId = mysqli_real_escape_string($conn, $_REQUEST['mysocialId']);
  $verifcationCode = 'Not active';
  $btnDeactivate = '0';
  $btnActivate = 'disabled';
  $txtDeviceId = mysqli_real_escape_string($conn, $_REQUEST['txtDeviceId']);
  $companyId = mysqli_real_escape_string($conn, $_REQUEST['companyId']);

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
    unset($txtDeviceId);
    unset($companyId);
  } else {
    //name can contain only alpha characters and space
    $queryIns = mysqli_query($conn, "INSERT INTO tbl_goesoft_carers_account (user_fullname,user_email_address,user_phone_number,user_password,date_registered,time_registered,user_special_Id,verification_code,status1,status2,VNumber,carer_deviceId,col_company_Id) VALUES('" . $fullName . "', '" . $email . "', '" . $txtPhone . "', '" . $myPass . "', '" . $currentDate . "', '" . $currentTime . "', '" . $myIdentity . "', '" . $verifcationCode . "', '" . $btnDeactivate . "', '" . $btnActivate . "', '" . $myId . "', '" . $txtDeviceId . "', '" . $companyId . "' )");

    if ($queryIns) {

      $email_to = "" . $email;
      $subject = "Verify your email";
      $headers = "From: admin@geosoftcare.co.uk";
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
      <div style='width:100%; height:auto; padding:22px; font-size: 30px;'>
        <h1>" . $pass . "</h1>
  
        https://geosoftcare.co.uk/geosoft/pages/
      </div>
    </div>

  </body>
  </html>
  
  
  ";


      mail($email_to, $subject, $message, $headers);


      header("Location: ./index");
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
