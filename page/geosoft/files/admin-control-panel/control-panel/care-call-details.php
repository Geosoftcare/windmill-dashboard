<?php
include('header-contents.php');

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
    WHERE (userId = '$userId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY first_carer ");
    $att_rw = mysqli_fetch_array($sel_dist_att);
    $hold_first_Id = $att_rw['first_carer_Id'];
    $hold_col_area_Id = $att_rw['col_area_Id'];
    $hold_first_carer = $att_rw['first_carer'];
    $hold_area_Id = $att_rw['col_area_Id'];
    $hold_call_status = $att_rw['call_status'];
    $hold_uryyToeSS4 = $att_rw['uryyToeSS4'];
    $hold_bgChange = $att_rw['bgChange'];
    $hold_col_area_city = $att_rw['col_area_city'];
    $hold_client_name = $att_rw['client_name'];
    $hold_dateTime_in = $att_rw['dateTime_in'];
    $hold_dateTime_out = $att_rw['dateTime_out'];
    $hold_care_call_date = $att_rw['Clientshift_Date'];
    $hold_care_calls = $att_rw['care_calls'];
    $usuryIYTj = hash('SHA256', $userId);
    $_SESSION['first_carer_Id'] = $hold_first_Id;
    $_SESSION['first_carer'] = $hold_first_carer;
    $_SESSION['userid'] = $userId;
    $_SESSION['col_area_Id'] = $hold_area_Id;
    $_SESSION['clientName'] = $hold_client_name;
    $_SESSION['CareCall'] = $hold_care_calls;
    $_SESSION['uryyToeSS4'] = $hold_uryyToeSS4;
    $_SESSION['Clientshift_Date'] = $hold_care_call_date;

    $todayDay = date('l', strtotime($hold_care_call_date));
    $_SESSION['currentRotaDay'] = $todayDay;
    $_SESSION["currentDateRota"] = $hold_care_call_date;
}
?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 style="font-weight: 600;">Care Logs <br>
            <small style=" font-weight:600;"><?php echo $hold_client_name; ?> care logs
                <br>
                <span style="color:rgba(39, 174, 96,1.0); font-weight:600;"><?php echo $hold_dateTime_in . ' - ' . $hold_dateTime_out . ', ' . $hold_care_call_date; ?></span>
            </small>
        </h5>

        <div style="width: 100%; height:auto; padding:12px; text-align:right;">
            <a href="./cancel-client-care-call?userId=<?php echo $userId; ?>" style="text-decoration: none;">
                <button class="btn btn-secondary">Cancel call</button>
            </a>
            <a href="./change-care-call-carer?userId=<?php echo $userId; ?>" style="text-decoration: none;">
                <button class="btn btn-info">Change carer</button>
            </a>
            <!--<a href="./change-client-run-567483-59956-847754?userId=<?php echo $userId; ?>" style="text-decoration: none;">
                <button class="btn btn-outline-primary">Change run</button>
            </a>-->
        </div>

        <hr style="background-color: rgba(236, 240, 241,.9);">

        <!--<div class="row">
            <div class="col-md-1 col-xl-1 col-sm-1 col-lg-1">
                <div style="width: 100%; height:auto; padding:12px; text-align:left;">
                    <a href="./delete-rota?col_area_Id=<?php echo $hold_col_area_Id; ?>" style="text-decoration: none;">
                        <button class="btn btn-danger">Delete run</button>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xl-2 col-sm-2 col-lg-2">
                <div style="width: 100%; height:auto; padding:12px; text-align:left;">
                    <a href="./assign-run-57756-47746-398937?run_area_nameId=<?php echo $hold_col_area_Id; ?>" style="text-decoration: none;">
                        <button class="btn btn-primary">Re-allocate run</button>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xl-2 col-sm-2 col-lg-2"></div>
            <div class="col-md-2 col-xl-2 col-sm-2 col-lg-2"></div>
            <div class="col-md-2 col-xl-2 col-sm-2 col-lg-2"></div>
            <div class="col-md-2 col-xl-2 col-sm-2 col-lg-2"></div>
        </div>-->

        <br>

        <div class="row">
            <div class='col-sm-4'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="care-call-details-box">
                            <h5 style="font-weight: 600;">Planned time</h5>
                            <div class="row">
                                <div class="col-6">
                                    <span style="font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);">Time in</span>
                                    <br>
                                    <span style="font-weight: 600; font-size:14px;"><?php echo $hold_dateTime_in; ?></span>
                                </div>
                                <div class="col-6">
                                    <span style="font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);">Time out</span>
                                    <br>
                                    <span style="font-weight: 600; font-size:14px;"><?php echo $hold_dateTime_out; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="care-call-details-box">
                            <h5 style="font-weight: 600;">Details</h5>
                            <div class="row">
                                <div class="col-12">
                                    <span style="font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);">Area</span>
                                    <br>
                                    <span style="font-weight: 600; font-size:14px;"><?php echo $hold_col_area_city; ?></span>
                                </div>
                                <div class="col-12">
                                    <span style="font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);">Status</span>
                                    <br>
                                    <span style="font-weight: 600; font-size:14px; color:<?php echo $hold_bgChange; ?>;"><?php echo $hold_call_status; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <?php
                    $myCheck = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                    WHERE (shift_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' 
                    AND col_care_call = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    $countRes = mysqli_num_rows($myCheck);
                    if ($countRes != 0) {
                        $sel_dist_att_act_fin = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                        WHERE (shift_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' 
                        AND col_care_call = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        while ($att_rw_act_fin = mysqli_fetch_array($sel_dist_att_act_fin)) {
                            $hold_general_note = $att_rw_act_fin['task_note'];
                            echo "
                            <div style='margin-top: 12px;' class='col-md-12'>
                                <div class='care-call-details-box'>
                                    <h5 style='font-weight: 600;'>Care team</h5>
                                    <h6 style='font-weight: 600;'>" . $att_rw_act_fin['carer_Name'] . "</h6>
                                    <h6 style='font-weight: 600;'>Actual time</h6>
                                    <div class='row'>
                                        <div class='col-6'>
                                            <span style='font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);'>Check in</span>
                                            <br>
                                            <span style='font-weight: 600; font-size:14px;'>" . $att_rw_act_fin['shift_start_time'] . "</span>
                                        </div>
                                        <div class='col-6'>
                                            <span style='font-weight: 600; font-size:14px; color:rgba(44, 62, 80,.7);'>Check out</span>
                                            <br>
                                            <span style='font-weight: 600; font-size:14px;'>" . $att_rw_act_fin['shift_end_time'] . "</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                        }
                    } else {
                        echo "No records";
                    }
                    ?>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <h5 style="font-weight: 600;">General note</h5>
                    <?php
                    $myCheck = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$hold_care_call_date' 
                    AND uryyToeSS4 = '$hold_uryyToeSS4' AND col_care_call = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    $countRes = mysqli_num_rows($myCheck);
                    if ($countRes != 0) {
                        $sel_dist_att_gn = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                        WHERE (shift_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' 
                        AND col_care_call = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        $att_rw_gn = mysqli_fetch_array($sel_dist_att_gn);
                        $hold_general_note = $att_rw_gn['task_note'];
                        $shift_start_time = $att_rw_gn['shift_start_time'];
                        $shift_end_time = $att_rw_gn['shift_end_time'];
                        $shift_date = $att_rw_gn['shift_date'];
                        $uryyToeSS4 = $att_rw_gn['uryyToeSS4'];
                        $careCallDate = date('d M, Y', strtotime($shift_date));
                        echo "
                        <div class='col-md-12'>
                            <div class='care-call-details-box'>
                                <h5 style='font-weight: 400;'>
                                    $hold_general_note 
                                </h5>
                                <hr style='background-color:rgba(0, 0, 0,.3);'>
                                <div style='width: 100%; height:auto; color:rgba(39, 174, 96,1.0); padding:3px; font-size:14px; font-weight:600; text-align:right;'>
                                    $shift_start_time  $shift_end_time | $careCallDate
                                </div>
                            </div>
                            <br>
                            <a href='./edit-note?uryyToeSS4=$uryyToeSS4' style='text-decoration: none; color:#000;'>
                                <h6><strong>Edit note</strong></h6>
                            </a>
                        </div>
                    ";
                    } else {
                        echo "No records";
                    } ?>
                </div>
            </div>






            <div class='col-sm-4'>
                <div class="row">
                    <h5 style="font-weight: 600;">Task(s)</h5>
                    <?php
                    $myCheck = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE (med_date = '$hold_care_call_date' 
                    AND uryyToeSS4 = '$hold_uryyToeSS4' AND care_calls = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    $countRes = mysqli_num_rows($myCheck);
                    if ($countRes != 0) {
                        $sel_dist_att_act_med = mysqli_query($conn, "SELECT * FROM tbl_finished_meds 
                        WHERE (med_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' AND care_calls = '$hold_care_calls' 
                        AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                        while ($att_rw_act_med = mysqli_fetch_array($sel_dist_att_act_med)) {
                            $hold_general_note = $att_rw_act_med['task_note'];
                            echo "
                            <div class='col-md-12'>
                                <div class='care-call-details-box'>
                                    <h5 style='font-weight: 600;'>" . $att_rw_act_med['task_name'] . "</h5>
                                    <hr style='background-color:rgba(0, 0, 0,.3);'>
                                    <h6 style='font-weight: 600;'>Status: " . $att_rw_act_med['col_outcome'] . "</h6>
                                    <h6 style='font-weight: 600;'>" . $att_rw_act_med['col_task_status'] . "</h6>
                                    <div style='width: 100%; height:auto; padding:3px; font-size:14px; font-weight:600; text-align:right;'>
                                        " . $att_rw_act_med['task_timeIn'] . ", " . $att_rw_act_med['med_date'] . "
                                    </div>
                                </div>
                            </div>
                        ";
                        }
                    } else {
                        echo "No records";
                    }
                    ?>
                </div>
            </div>







            <div class='col-sm-4'>
                <h5 style="font-weight: 600;">Medication(s)</h5>

                <?php
                $myCheck = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE (task_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' AND care_calls = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                $countRes = mysqli_num_rows($myCheck);
                if ($countRes != 0) {
                    $sel_dist_att_act_task = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE (task_date = '$hold_care_call_date' AND uryyToeSS4 = '$hold_uryyToeSS4' AND care_calls = '$hold_care_calls' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw_act_task = mysqli_fetch_array($sel_dist_att_act_task)) {
                        $hold_general_note = $att_rw_act_task['task_note'];
                        echo "
                        <div class='col-md-12'>
                            <div class='care-call-details-box'>
                                <h5 style='font-weight: 600;'>" . $att_rw_act_task['task_name'] . "</h5>
                                <hr style='background-color:rgba(0, 0, 0,.3);'>
                                <h6 style='font-weight: 600;'>Status: " . $att_rw_act_task['col_outcome'] . "</h6>
                                <h6 style='font-weight: 600;'>" . $att_rw_act_task['col_task_status'] . "</h6>
                                <div style='width: 100%; height:auto; padding:3px; font-size:14px; font-weight:600; text-align:right;'>
                                    " . $att_rw_act_task['task_timeIn'] . ", " . $att_rw_act_task['task_date'] . "
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "No records";
                }
                ?>
            </div>
        </div>












    </div>
</div>


<?php include('footer-contents.php'); ?>