<?php
include('dbconnection-string.php');
if (isset($_GET['userId'])) {
    $myClientSpecialUserId = $_GET['userId'];
}
$sql_mycheck = "SELECT * FROM tbl_daily_shift_records WHERE (col_care_call_Id = '" . $myClientSpecialUserId . "')";
$result = $conn->query($sql_mycheck);
$row = $result->fetch_assoc();
$uryyToeSS4 = $row["uryyToeSS4"];
$VariousCareCalls = $row["col_care_call"];
//echo $VariousCareCalls;

$query_tasks = "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' AND (care_call1='$VariousCareCalls' 
|| care_call2='$VariousCareCalls' || care_call3='$VariousCareCalls' || care_call4='$VariousCareCalls' || extra_call1='$VariousCareCalls' 
|| extra_call2='$VariousCareCalls' || extra_call3='$VariousCareCalls' || extra_call4='$VariousCareCalls') 
AND (monday = '$echoCurDay' || tuesday = '$echoCurDay' || wednesday = '$echoCurDay' || thursday = '$echoCurDay' 
|| friday = '$echoCurDay' || saturday = '$echoCurDay' || sunday = '$echoCurDay'))";
$result = mysqli_query($conn, $query_tasks);
$rowcount_clientTasks_records = mysqli_num_rows($result);
$rowcount_clientTasks_records;

$query_fintasks = "SELECT * FROM tbl_finished_tasks WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='$VariousCareCalls' 
AND care_call_days = '$echoCurDay')";
$result = mysqli_query($conn, $query_fintasks);
$rowcount_clientfinTasks_records = mysqli_num_rows($result);
$rowcount_clientfinTasks_records;

if ($rowcount_clientTasks_records == $rowcount_clientfinTasks_records) {
    header("Location: ./checking-general-note?userId=" . $myClientSpecialUserId . "");
} else {
    header("Location: ./tasks-progress?uryyToeSS4=" . $uryyToeSS4 . "");
}


$conn->close();
