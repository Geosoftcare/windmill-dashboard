
<?php
require_once('dbconnection-string.php');
// check whether the device is already known; a cookie is already set
if (isset($_COOKIE[$cookie_name = 'deviceIdentifier'])) {
    $varIdentifier = $_COOKIE[$cookie_name];

    $comparing_carer_cookie = mysqli_query($conn, "SELECT * FROM `tbl_goesoft_carers_account` 
    WHERE col_cookies_identifier = '$varIdentifier' ");
    $row = mysqli_fetch_array($comparing_carer_cookie);
    $varCookie = $row['col_cookies_identifier'];
    $counter_check_cookie = mysqli_num_rows($comparing_carer_cookie);
    if ($counter_check_cookie == True) {
        // there is already a cookie set; we know the device
        header('Location: ./index');
    } else {
        // there is no cookie set; a new device has connected
        header('Location: ./setup-pin');
    }
} else {
    // there is no cookie set; a new device has connected
    header('Location: ./setup-pin');
}
?>
