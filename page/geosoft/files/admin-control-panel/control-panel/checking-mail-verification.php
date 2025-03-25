<?php
include('dbconnect.php');

if (isset($_POST['btnSubmitVerifyform'])) {

    $verificationTXT = mysqli_real_escape_string($myConnection, $_POST['verificationTXT']);

    $myCheck = "SELECT * FROM tbl_goesoft_users WHERE VNumber = '" . $verificationTXT . "' ";
    $myCheckres = mysqli_query($myConnection, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        $UpdateVerisql = mysqli_query($myConnection, "UPDATE `tbl_goesoft_users` SET `verification_code` = 'Verified' WHERE VNumber = '$verificationTXT' ");
        if ($UpdateVerisql) {
            header("Location: ./index");
        }
    } else {
        echo "
    
    <script type='text/javascript'>
		$(document).ready(function() {
			$('#popupAlert').show();
		});
	</script>";
    }
}
