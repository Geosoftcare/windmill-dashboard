<?php
include_once('dbconnection-string.php');

$sel_carer_data_result = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (col_shift_date = '$today' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND  col_company_Id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
$get_carer_data_row = mysqli_fetch_array($sel_carer_data_result, MYSQLI_ASSOC);
$uryyToeSS4 = $get_carer_data_row['uryyToeSS4'];
$clientCurCallCalls = $get_carer_data_row['col_care_call'];

//-------------------------------------------------------------------------------------------------------------------------
//Below is the query for Breakfast care calls
//--------------------------------------------------------------------------------------------------------------------------
$result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' 
    AND (col_occurence <= '$today' || visibility = '$today' AND client_endMed >= '$today' || client_endMed = '')
    AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' || care_call3='$clientCurCallCalls' 
    || care_call4='$clientCurCallCalls' || extra_call1='$clientCurCallCalls' || extra_call2='$clientCurCallCalls' 
    || extra_call3='$clientCurCallCalls' || extra_call4='$clientCurCallCalls') AND (monday='$echoCurDay' || tuesday='$echoCurDay' 
    || wednesday='$echoCurDay' || thursday='$echoCurDay' || friday='$echoCurDay' || saturday='$echoCurDay' || sunday='$echoCurDay'))");
$rowcount_clientTask_records = mysqli_num_rows($result);
//echo $rowcount_clientTask_records . '<br><br>';

$result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='$clientCurCallCalls' AND care_call_days='$echoCurDay' AND med_date='$today') ");
$rowcount_finclientTask = mysqli_num_rows($result_finiTask0);
//echo $rowcount_finclientTask . '<br><br>';

if ($rowcount_clientTask_records == $rowcount_finclientTask) {
    header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
} else {
    header("Location: ./client-med-not-completed?uryyToeSS4=$uryyToeSS4");
}
