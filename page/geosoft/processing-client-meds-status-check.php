<?php
include('dbconnection-string.php');
$sel_carer_data_result = mysqli_query($conn, "SELECT * FROM tbl_care_calls WHERE (col_shift_date = '$today' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
$get_carer_data_row = mysqli_fetch_array($sel_carer_data_result, MYSQLI_ASSOC);
$uryyToeSS4 = $get_carer_data_row['uryyToeSS4'];
$txtVariousCareCalls = $get_carer_data_row['col_care_call'];


//-------------------------------------------------------------------------------------------------------------------------
//Below is the query for Breakfast care calls
//--------------------------------------------------------------------------------------------------------------------------

if ($txtVariousCareCalls == 'Morning' or $txtVariousCareCalls == 'Breakfast') {

    //---------------------------------------------------------------------------------
    //Below is the query for Monday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Monday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Tuesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Tuesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Wednesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Wednesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Thursday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Thursday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Friday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Friday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Saturday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Saturday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Sunday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Sunday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Breakfast' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }
}



//-------------------------------------------------------------------------------------------------------------------------
//Below is the query for Breakfast care calls
//--------------------------------------------------------------------------------------------------------------------------

if ($txtVariousCareCalls == 'Lunch') {

    //---------------------------------------------------------------------------------
    //Below is the query for Monday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Monday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Tuesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Tuesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Wednesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Wednesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Thursday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Thursday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Friday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Friday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Saturday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Saturday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Sunday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Sunday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Lunch' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }
}


//-------------------------------------------------------------------------------------------------------------------------
//Below is the query for Breakfast care calls
//--------------------------------------------------------------------------------------------------------------------------

if ($txtVariousCareCalls == 'Tea') {

    //---------------------------------------------------------------------------------
    //Below is the query for Monday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Monday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Tuesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Tuesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Wednesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Wednesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Thursday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Thursday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Friday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Friday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Saturday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Saturday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Sunday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Sunday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Tea' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }
}


//-------------------------------------------------------------------------------------------------------------------------
//Below is the query for Breakfast care calls
//--------------------------------------------------------------------------------------------------------------------------

if ($txtVariousCareCalls == 'Bed') {

    //---------------------------------------------------------------------------------
    //Below is the query for Monday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Monday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Tuesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Tuesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Wednesday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Wednesday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Thursday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Thursday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Friday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Friday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Saturday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Saturday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }

    //---------------------------------------------------------------------------------
    //Below is the query for Sunday care calls
    //---------------------------------------------------------------------------------

    if ($echoCurDay == 'Sunday') {
        if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE (uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' AND client_endMed >= '$today') ")); {
            $rowcount_clientTask_records = mysqli_num_rows($result);
        }
        $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (uryyToeSS4='$uryyToeSS4' AND care_calls='Bed' AND care_call_days='$echoCurDay' AND med_date='$today') ");
        $rowcount_finclientTask = mysqli_num_rows($result_finiTask0);

        if ($rowcount_clientTask_records == $rowcount_finclientTask) {
            header("Location: ./general-report?uryyToeSS4=$uryyToeSS4");
        } else {
            header("Location: ./tasks-progress?uryyToeSS4=$uryyToeSS4");
        }
    }
}
