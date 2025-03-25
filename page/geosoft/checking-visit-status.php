<?php
include('dbconnection-string.php');
if (isset($_GET['userId'])) {
    $myClientSpecialUserId = $_GET['userId'];
}
$sql_mycheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '" . $myClientSpecialUserId . "')";
$result = $conn->query($sql_mycheck);
if ($result->num_rows > 0) {
    header("Location: ./checking-med-status?userId=" . $myClientSpecialUserId . "");
} else {
    header("Location: ./care-plan?userId=" . $myClientSpecialUserId . "");
}
$conn->close();
