<?php
$sel_client_med_result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' 
AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' || care_call3='$clientCurCallCalls' || care_call4='$clientCurCallCalls' 
|| extra_call1='$clientCurCallCalls' || extra_call2='$clientCurCallCalls' || extra_call3='$clientCurCallCalls' 
|| extra_call4='$clientCurCallCalls') 
AND (monday='$echoCurDay' || tuesday='$echoCurDay' || wednesday='$echoCurDay' || thursday='$echoCurDay' || friday='$echoCurDay' 
|| saturday='$echoCurDay' || sunday='$echoCurDay') AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY col_fifo ASC ");
while ($get_client_med_row = mysqli_fetch_array($sel_client_med_result)) {
    $get_certain_med_Id = $get_client_med_row['med_Id'];
    $get_client_meds_status = $get_client_med_row['client_med_Id'];

    $sel_client_med_checker = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (med_Id='$get_certain_med_Id' 
    AND (care_call1='$clientCurCallCalls' || care_call2='$clientCurCallCalls' 
    || care_call3='$clientCurCallCalls' || care_call4='$clientCurCallCalls' || extra_call1='$clientCurCallCalls' 
    || extra_call2='$clientCurCallCalls' || extra_call3='$clientCurCallCalls' || extra_call4='$clientCurCallCalls') 
    AND (client_endMed >= '$today' || client_endMed = '') 
    AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    while ($display_client_med_row = mysqli_fetch_array($sel_client_med_checker)) {
        $get_cehck_med_Id = $display_client_med_row['med_Id'];
        $check_care_status = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' 
        AND care_calls='$clientCurCallCalls' AND med_date = '$today' AND task_SpecialId = '$get_client_meds_status') ");
        $care_call_status_Res = mysqli_num_rows($check_care_status);

        if ($care_call_status_Res != 0) {
            echo "
                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                            <hr>
                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                <span class='text-gray-600 dark:text-gray-300' style='font-size:12px;'>--" . $get_client_med_row['med_package'] . "--</span></span>
                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                    <br>
                                <span style='font-size: 13px; color:rgba(39, 174, 96,1.0);'>Updated</span>
                            </div>
                         </a>
                    ";
        } else {
            echo "
                        <a href='./medication-report-form?client_med_Id=" . $get_client_med_row['client_med_Id'] . "' style='text-decoration:none;'>
                            <hr>
                            <div style='width: 100%; height:auto; padding:12px; color:" . $get_client_med_row['med_colours'] . ";'>
                                <span class='text-gray-600 dark:text-gray-300'>" . $get_client_med_row['med_name'] . "
                                <span class='text-gray-600 dark:text-gray-300' style='font-size:12px;'>--" . $get_client_med_row['med_package'] . "--</span></span>
                                <span class='text-gray-600 dark:text-gray-300' style='float:right; font-size:25px; color:rgba(131, 149, 167,.5);'>></span>
                                    <br>
                                <span style='font-size: 13px;'>Not updated</span>
                            </div>
                         </a>
                    ";
        }
    }
}
