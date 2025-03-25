<?php include_once('feeds-header.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div style="width: 100%; height:auto;" id="printableArea">
            <div class="row">
                <?php
                $myIduser = $_GET['userId'];
                $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (userId = '" . $myIduser . "' 
                AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                while ($row = mysqli_fetch_array($result)) {
                    $varShiftDate = $row['Clientshift_Date'];
                    $varClientSpecialId = $row['uryyToeSS4'];
                    $varClientCareCall = $row['care_calls'];
                    $varClientName = $row['client_name'];
                    $varDateTimeIn = $row['dateTime_in'];
                    $varDateTimeOut = $row['dateTime_out'];
                    $_SESSION['clientName'] = $varClientName;
                    $_SESSION['CareCall'] = $varClientCareCall;
                    $_SESSION['userid'] = $myIduser;
                    $myEncryptedId = HASH('sha256', $_SESSION['userid']);
                    $_SESSION['Clientshift_Date'] = $varShiftDate;
                    $_SESSION['uryyToeSS4'] = $varClientSpecialId;
                    $clientVisitDate = date('d M, Y', strtotime("" . $row['Clientshift_Date'] . ""));
                ?>

                    <div style="width:100%; height:auto; padding:22px; justify-content:right; display:flex;">
                        <a href="./cancel-client-care-call?userId=<?php echo "" . $myIduser . "" ?>" style="text-decoration: none;">
                            <button class="btn btn-info">Cancel visit</button>
                        </a>
                        &nbsp;
                        <!--<a href="./cancel-carecall-ahead?userId=<?php echo $myEncryptedId; ?>" style="text-decoration: none;">
                            <button style="width: 120px;" class="btn btn-small btn-dark">Cancel ahead</button>
                        </a>-->
                        <a href="./change-visit-settings?userId=<?php echo "" . $myIduser . "" ?>" style="text-decoration: none;">
                            <button class="btn btn-secondary">Re-adjust time</button>
                        </a>
                    </div>

                    <hr>
                    <!-- Clients feed, team member start -->
                    <div class="col-xl-4">
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h4 style="float: right;"><i class='feather mr-2 icon-log-in'></i></h4>
                                <br>
                                <p style="font-size: 22px;">
                                <div style="font-weight:600; font-size:20px;">Date</div>
                                <span style="font-size: 17px; font-weight:600;"><?php echo "" . $clientVisitDate . "" ?></span>
                                </p>
                                <hr>
                                <p style="font-size: 22px;">
                                <div style="font-weight:600; font-size:20px;">Name</div>
                                <span style="font-size: 17px; font-weight:600;"><?php echo "" . $varClientName . "" ?></span>
                                </p>
                                <hr>
                                <div style="font-weight:600; font-size:20px;">Planned time</div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 style=" font-weight:600;">Time in</h5>
                                        <br>
                                        <span style="font-size: 17px; font-weight:600;"><?php echo $varDateTimeIn ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 style=" font-weight:600;">Time out</h5>
                                        <br>
                                        <span style="font-size: 17px; font-weight:600;"><?php echo $varDateTimeOut ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div style="font-weight:600; font-size:20px;">Status</div>
                                <span style="font-size: 17px; font-weight:600;">Completed</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class='card table-card'>
                            <div class='card-header'>
                                <?php
                                $result_finish_shift = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                                WHERE (uryyToeSS4 = '$varClientSpecialId' AND shift_date = '$varShiftDate' 
                                AND col_care_call = '$varClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') 
                                ORDER BY userId DESC LIMIT 1");
                                while ($row_finish_shift = mysqli_fetch_array($result_finish_shift)) {
                                    $get_firstCarerid = $row_finish_shift['col_carer_Id'];
                                ?>
                                    <h4 style="float: right;"><i class='feather mr-2 icon-user'></i></h4>
                                    <div style="font-weight:600; font-size:20px;">Carer 1<br>
                                        <small style=" font-weight:600;"><?php echo "" . $row_finish_shift['carer_Name'] . "" ?></small>
                                    </div>
                                    <hr>
                                    <div style="padding: 12px;" class="row">
                                        <div style="font-weight:600; font-size:20px;">Actual time</div>
                                        <div class="col-sm-6">
                                            <div style="font-weight:600; font-size:18px;">Time in</div>
                                            <span style="font-size: 17px; font-weight:600;"><?php echo "" . $row_finish_shift['shift_start_time'] . "" ?></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <div style="font-weight:600; font-size:18px;">Time out</div>
                                            <span style="font-size: 17px; font-weight:600;"><?php echo "" . $row_finish_shift['shift_end_time'] . "" ?></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <?php
                                    $result_finish_shift = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                                    WHERE (col_carer_Id != '$get_firstCarerid' AND col_care_call = '$varClientCareCall' 
                                    AND shift_date = '$varShiftDate' AND uryyToeSS4 = '$varClientSpecialId' 
                                    AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                                    while ($row_finish_shift = mysqli_fetch_array($result_finish_shift)) {
                    ?>
                        <div class="col-xl-4">
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h4 style="float: right;"><i class='feather mr-2 icon-log-in'></i></h4>
                                    <div style="font-weight:600; font-size:20px;">Carer 2<br>
                                        <small style=" font-weight:600;"><?php echo "" . $row_finish_shift['carer_Name'] . "" ?></small>
                                    </div>
                                    <hr>
                                    <div style="padding: 12px;" class="row">
                                        <div style="font-weight:600; font-size:20px;">Actual time</div>
                                        <div class="col-sm-6">
                                            <div style="font-weight:600; font-size:18px;">Time in</div>
                                            <span style="font-size: 17px; font-weight:600;"><?php echo "" . $row_finish_shift['shift_start_time'] . "" ?></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <div style="font-weight:600; font-size:18px;">Time out</div>
                                            <span style="font-size: 17px; font-weight:600;"><?php echo "" . $row_finish_shift['shift_end_time'] . "" ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php echo "";
                                    }
                                }
                            } ?>


            <div class="m-1 w-100 h-100 p-3 font-semibold">
                <div class="row">
                    <div class="col-xl-4">
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5 style="font-weight:600;">Medications</h5>
                            </div>
                            <?php
                            $result_med_details = mysqli_query($conn, "SELECT * FROM tbl_finished_meds 
                            WHERE (med_date = '$varShiftDate' AND uryyToeSS4 = '$varClientSpecialId' 
                            AND care_calls = '$varClientCareCall' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                            while ($row_med_details = mysqli_fetch_array($result_med_details)) {
                                echo "
                                    <div style='padding: 5px 5px 0px 10px; width:100%; height:auto;'>
                                        <span class='font-bold'>" . $row_med_details['task_name'] . "</span>
                                        <br>
                                        <span style='color:rgba(127, 140, 141,1.0);'>" . $row_med_details['task_note'] . "</span>
                                        <br>
                                        <span style='float: right; font-size:14px; color:rgba(39, 174, 96,1.0);'><i class='feather mr-2 icon-clock'></i> " . $row_med_details['task_timeIn'] . "</span>
                                        <br>
                                        <hr>
                                    </div>
                                ";
                            } ?>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5 style="font-weight:600;">Task</h5>
                            </div>
                            <?php
                            $result_task_details = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks 
                            WHERE (task_date = '$varShiftDate' AND care_calls = '$varClientCareCall' 
                            AND uryyToeSS4 = '$varClientSpecialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                            while ($row_task_details = mysqli_fetch_array($result_task_details)) {
                                echo "
                                    <div style='padding: 5px 5px 0px 10px; width:100%; height:auto;'>
                                        <span>" . $row_task_details['task_name'] . "</span>
                                        <br>
                                        <span style='color:rgba(127, 140, 141,1.0);'>" . $row_task_details['task_note'] . "</span>
                                        <br>
                                        <span style='float: right; font-size:14px; color:rgba(39, 174, 96,1.0);'><i class='feather mr-2 icon-clock'></i> " . $row_task_details['task_timeIn'] . "</span>
                                        <br>
                                        <hr>
                                </div>
                                ";
                            } ?>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5 style="font-weight:600;">Observations</h5>
                            </div>
                            <div class='card-body'>
                                <div style="padding: 12px; width:100%; height:auto;">
                                    <?php
                                    $result_general_details = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records 
                                    WHERE (shift_date = '$varShiftDate' AND col_care_call = '$varClientCareCall' 
                                    AND uryyToeSS4 = '$varClientSpecialId' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                                    while ($row_general_details = mysqli_fetch_array($result_general_details)) {
                                        echo "" . $row_general_details['task_note'] . "";
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="button" class="btn btn-secondary btn-large" style="width: 150px;" onclick="printDiv('printableArea')" value="Download file" />

            </div>
        </div>
        <div class="row">
            <?php include('bottom-panel-block.php'); ?>
        </div>
    </div>
</div>
</div>






<?php include('footer-contents.php'); ?>