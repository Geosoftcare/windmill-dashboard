 <?php

    include('dbconnection-string.php');

    $UserDeviceId = gethostname();

    $result = "SELECT * FROM tbl_goesoft_carers_account WHERE carer_deviceId = '$UserDeviceId' ";
    $myCheckres = mysqli_query($conn, $result);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        header("Location: ./login");
    } else {

        header("Location: ./setup-pin");
    }
    ?>