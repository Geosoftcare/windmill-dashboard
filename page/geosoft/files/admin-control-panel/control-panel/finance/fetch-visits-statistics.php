<div class="row">
    <div class="col-xl-4 col-md-4">
        <div class="card flat-card widget-primary-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="feather icon-credit-card"></i>
                </div>
                <div class="col-sm-9">
                    <h4>
                        <?php
                        $sql_total_balance = mysqli_query($conn, "SELECT SUM(`col_carecall_rate`) AS total_payment 
                        FROM `tbl_daily_shift_records` WHERE ((`timesheet_date` >= '$txtStartDate' 
                        AND `timesheet_date` <= '$txtEndDate') AND (col_carer_Id = '$txtCareGiver' OR shift_status = '$txtCareGiver') 
                        AND col_call_status = '$varCareCallStatus' AND col_company_Id = '$txtCompanyId') ");
                        $row_total_balance = mysqli_fetch_array($sql_total_balance, MYSQLI_ASSOC);
                        $total_payment = number_format((float)$row_total_balance['total_payment'], 2, '.', '');
                        echo '£' . $total_payment;
                        ?>
                        <br>
                        <small style="font-size:16px; font-weight:600;">
                            Balance
                        </small>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="col-sm-9">
                    <h4>
                        <?php
                        $sql_total_hour = mysqli_query($conn, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(`planned_timeOut`, `planned_timeIn`)))) AS total_worked_hours 
                        FROM `tbl_daily_shift_records` WHERE ((`planned_timeOut` IS NOT NULL AND `planned_timeIn` IS NOT NULL) 
                        AND (`timesheet_date` BETWEEN '$txtStartDate' AND '$txtEndDate') AND (col_carer_Id = '$txtCareGiver' OR shift_status = '$txtCareGiver')
                        AND col_call_status = '$varCareCallStatus' AND col_company_Id = '$txtCompanyId') ");
                        $row_total_hour = mysqli_fetch_array($sql_total_hour, MYSQLI_ASSOC);
                        $total_hours = $row_total_hour['total_worked_hours'];
                        // Split the time into hours, minutes, and seconds
                        list($hours, $minutes, $seconds) = explode(':', $total_hours);
                        // Convert the time into seconds
                        $total_seconds = $hours * 3600 + $minutes * 60 + $seconds;

                        $hours = floor($total_seconds / 3600);
                        $minutes = floor(($total_seconds % 3600) / 60);
                        $seconds = $total_seconds % 60;

                        $formatted_time = sprintf('%02d:%02d', $hours, $minutes, $seconds);
                        echo $formatted_time;
                        ?>
                        <br>
                        <small style="font-size:16px; font-weight:600;">
                            Hour
                        </small>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div style="background-color:rgba(52, 152, 219,1.0); color:#fff;" class="card flat-card widget-blue-card">
            <div class="row-table">
                <div style="background-color:rgba(41, 128, 185,1.0); color:#fff;" class="col-sm-3 card-body">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="col-sm-9">
                    <h4>
                        <?php
                        $sql_get_total_visits = "SELECT * FROM tbl_daily_shift_records WHERE ((shift_date >= '$txtStartDate' 
                        AND shift_date <= '$txtEndDate') AND (col_carer_Id = '$txtCareGiver' OR shift_status = '$txtCareGiver') 
                        AND col_company_id = '" . $_SESSION['usr_compId'] . "')";
                        if ($result_get_total_visits = mysqli_query($conn, $sql_get_total_visits)) {
                            $rowcount = mysqli_num_rows($result_get_total_visits);
                            printf($rowcount);
                            mysqli_free_result($result);
                        }
                        ?>
                        <br>
                        <small style="font-size:16px; font-weight:600;">
                            Visit
                        </small>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>