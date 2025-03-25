<?php
include('dbconnection-string.php');
//check if form is submitted
if (isset($_POST['btnResetPinCode'])) {

    $pass = mysqli_real_escape_string($conn, $_POST['txtPassword']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $txtClientSessionEm = mysqli_real_escape_string($conn, $_POST['txtClientSessionEm']);

    $myPass = hash('sha256', $pass);

    //name can contain only alpha characters and space
    $query_data_update = mysqli_query($conn, "UPDATE tbl_goesoft_carers_account SET user_password = '$myPass' WHERE user_email_address = '$txtClientSessionEm'");

    if ($query_data_update) {

        $email_to = "" . $txtClientSessionEm;
        $subject = "New pin";

        $headers = "From: it@geosoftcare.co.uk";
        $headers = "MIME-Version: 1.0\r\n";
        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "
  
  <html>
  <body>
    <div style='width: 100%; height: auto;>
    <div style='width: 700px; height: 200px; text-align:center; color:white; padding: 23px; background-color:#c0392b; font-size:28px;'>
        <h2>You have successfully reset you login pin. Kindly check your pin below.</h2>
        <br>
        <span style='font-size:28px;'>We work to give you a more better services. </span>
    </div>
      <div style='width:100%; height:auto; padding:4px; font-size: 20px;'>
        <h1>Your new login pin is " . $pass . "</h1>
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
