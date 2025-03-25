<?php
if (isset($_POST['btnCheckTaskandMedsCompletion'])) {
    include_once('dbconnection-string.php');

    $uryyToeSS4 = mysqli_real_escape_string($conn, $_POST['txtClientSpecialIds']);
    $clientCurCallCalls = mysqli_real_escape_string($conn, $_POST['txtVariousCareCalls']);

    //-------------------------------------------------------------------------------------------------------------------------
    //Below is the query for Breakfast care calls
    //--------------------------------------------------------------------------------------------------------------------------
    $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE (uryyToeSS4='$uryyToeSS4' 
    AND (col_occurence <= '$today' || visibility = '$today' AND task_endDate >= '$today' || task_endDate = '')
    AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' || care_call3='$clientCurCallCalls' 
    || care_call4='$clientCurCallCalls' || extra_call1='$clientCurCallCalls' || extra_call2='$clientCurCallCalls' 
    || extra_call3='$clientCurCallCalls' || extra_call4='$clientCurCallCalls') AND (monday='$echoCurDay' || tuesday='$echoCurDay' 
    || wednesday='$echoCurDay' || thursday='$echoCurDay' || friday='$echoCurDay' || saturday='$echoCurDay' || sunday='$echoCurDay'))");
    $rowcount_clientTask_records = mysqli_num_rows($result);

    $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE (uryyToeSS4='$uryyToeSS4' 
    AND care_calls='$clientCurCallCalls' AND care_call_days='$echoCurDay' AND task_date='$today') ");
    $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);
    //echo $rowcount_clientTask_records . '<br><br>';
    //echo $rowcount_finclientTask . '<br><br>';
    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
        header("Location: ./processing-checking-meds-completion?uryyToeSS4=$uryyToeSS4");
    } else {
        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
    }
}
