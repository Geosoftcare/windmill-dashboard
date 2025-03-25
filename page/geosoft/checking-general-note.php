<?php
include('dbconnection-string.php');
if (isset($_GET['userId'])) {
    $myClientSpecialUserId = $_GET['userId'];
}
$sql_mycheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '" . $myClientSpecialUserId . "' 
AND task_note != 'Null')";
$result = $conn->query($sql_mycheck);
$row = $result->fetch_assoc();
$uryyToeSS4 = $row["uryyToeSS4"];
$VariousCareCalls = $row["col_care_call"];

if ($result->num_rows > 0) {
    header("Location: ./check-out-progress?uryyToeSS4=" . $uryyToeSS4 . "");
} else {
    header("Location: ./general-report?uryyToeSS4=" . $uryyToeSS4 . "");
}
$conn->close();
