<?php
include_once('header-panel.php');
$txtDate = mysqli_real_escape_string($myConnection, $_REQUEST['txtDate']);
$rotaDateByDay = date('d l M, Y', strtotime($txtDate));
$currentDateRota = date('Y-m-d', strtotime($txtDate));
$viewRotaByDate = date('D m Y', strtotime($txtDate));
$_SESSION['currentDateRota'] = $currentDateRota;

$curRotaDay = $txtDate;
$currentRotaDay = date('l', strtotime($curRotaDay));
$_SESSION['currentRotaDay'] = $currentRotaDay;
?>

<div class="content-wrapper">
    <!--Content head start here-->
    <div class="content-header">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xl-4 col-lg-4">
                <form action="./cookie-cities" method="POST" enctype="multipart/form-data" name="areaForm" autocomplete="off">
                    <div class="form-group">
                        <form style="margin-top: 5px;" action="./cookie-cities" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" name="txtCurrentDate" value="<?php echo $currentDateRota; ?>">
                            <select onchange="this.form.submit()" name="Runfname" aria-placeholder=" --Select option--" class="form-control" id="txtSelectArea">
                                <option value="">
                                    <?php
                                    if (isset($_COOKIE['companyCity'])) {
                                        echo $_COOKIE["companyCity"];
                                    } else {
                                        echo "Select city...";
                                    } ?>
                                </option>
                                <option value="Wolverhampton">Wolverhampton</option>
                                <option value="Supported live in">Supported live in</option>
                                <option value="Stoke on Trent">Stoke on trent</option>
                            </select>
                        </form>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-4 col-xl-4 col-lg-4">
                <div class="date-control">
                    <form style="margin-top: 5px;" action="./schedule-run-756473-00499-99553-85006" method="GET" enctype="multipart/form-data" autocomplete="off">
                        <button style="font-size: 22px; cursor: pointer; background-color:inherit; border:none;" id="decrement">&larr;</button>
                        <input name='txtDate' onchange='this.form.submit()' style="background-color: inherit; border:none;" type="date" id="dateInput" value="<?php echo $currentDateRota; ?>">
                        <button style="font-size: 22px; cursor: pointer; background-color:inherit; border:none;" id="increment">&rarr;</button>
                    </form>
                </div>
                <!--<div>
                        <span class="icon-button" id="backwardButton">&larr;</span>
                        <span class="date-display" id="dateDisplay">Loading date...</span>
                        <span class="icon-button" id="forwardButton">&rarr;</span>
                    </div>-->
            </div>
            <div class="col-md-4 col-sm-4 col-xl-4 col-lg-4">
                <a href="../dashboard" style="text-decoration: none;">
                    <button class="btn btn-success btn-md">Dashboard</button>
                </a>
                <a href="./index?txtDate=<?php echo $today; ?>" style="text-decoration: none;">
                    <button class="btn btn-primary btn-md">View rota</button>
                </a>
                <a href="../manage-runs" style="text-decoration: none;">
                    <button style="color: #fff;" class="btn btn-info btn-md">Manage run</button>
                </a>
            </div>
        </div>
    </div>
    <!--Content body start here-->
    <div class="content-body">
        <br>
        <h5 style="padding: 0px 0px 0px 25px;">Roster<br>
            <small>
                <?php
                echo date('l, F j, Y', strtotime($currentDateRota));
                $varCurrentDateInDay = date('l', strtotime($currentDateRota));
                ?>
            </small>
        </h5>
        <hr>
        <div class="scrolling-wrapper">
            <?php
            $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT (col_run_name) FROM tbl_manage_runs WHERE (col_run_name != '' AND col_client_city = '" . $_COOKIE["companyCity"] . "' 
            AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
            while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                $db_run_name = $att_rw['col_run_name'];

                $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE (col_run_name = '$db_run_name' 
                AND (col_monday = '$varCurrentDateInDay' OR col_tuesday = '$varCurrentDateInDay' OR col_wednesday = '$varCurrentDateInDay' 
                OR col_thursday = '$varCurrentDateInDay' OR col_friday = '$varCurrentDateInDay' OR col_saturday = '$varCurrentDateInDay' 
                OR col_sunday = '$varCurrentDateInDay') AND col_company_Id = '" . $_SESSION['usr_compId'] . "') GROUP BY run_area_nameId ");
                while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                    $attri_run_Id = $att_cor_rw['run_area_nameId'];
                    $db_run_name_Id = $att_cor_rw['col_run_name'];

                    $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' 
                    AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    $care_call_status_Res = mysqli_num_rows($check_care_status);
                    $hold_allocated_carer = mysqli_fetch_array($check_care_status);
                    $hold_allocated_carer_name = $hold_allocated_carer['first_carer'];
                    $hold_visit_color = $hold_allocated_carer['col_visitColor_code'];

                    //echo $hold_allocated_carer_name;
                    //echo $hold_visit_color;

                    if ($care_call_status_Res != 0) {
            ?>
                        <!--Select visits start here-->
                        <div id='item-list'>
                            <div class='row'>
                                <div style='padding: 0;' class='col-md-2 col-sm-2 col-xl-2 col-lg-2 col-2'>
                                    <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                        <div style="color:white; background-color:rgba(22, 160, 133,1.0);" id='left-panel-items'>
                                            <?= $db_run_name ?>
                                            <br>
                                            <span style='font-size:13px; color:rgba(255, 255, 255,1.0); justify-content:baseline; font-weight:600;'><?= $hold_allocated_carer_name ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div style='padding:8px; font-size:16px;' class='col-md-10 col-sm-10 col-xl-10 col-lg-10 col-10'>
                                    <ul class='care-visit-list'>
                                        <?php
                                        $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE (col_run_name = '$db_run_name' 
                                        AND (col_startDate <= '$currentDateRota' AND col_occurence != '$currentDateRota' AND col_endDate >= '$currentDateRota' 
                                        OR col_endDate = '') AND dateTime_in != 'Null' AND col_right_to_display ='True' AND (col_monday = '$varCurrentDateInDay' OR col_tuesday = '$varCurrentDateInDay' 
                                        OR col_wednesday = '$varCurrentDateInDay' OR col_thursday = '$varCurrentDateInDay' OR col_friday = '$varCurrentDateInDay' OR col_saturday = '$varCurrentDateInDay' OR col_sunday = '$varCurrentDateInDay')) 
                                        ORDER BY dateTime_in ");
                                        while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                        ?>
                                            <li style="background-color:<?= $hold_visit_color ?>;">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span><?= $att_cor_rw["dateTime_in"] . ' &rarr; ' . $att_cor_rw["dateTime_out"] ?></span> &nbsp; <span><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Select visits ends here-->
                    <?php
                    } else {
                    ?>
                        <!--Select visits start here-->
                        <div id='item-list'>
                            <div class='row'>
                                <div style='padding: 0;' class='col-md-2 col-sm-2 col-xl-2 col-lg-2 col-2'>
                                    <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                        <div id='left-panel-items'>
                                            <?= $db_run_name ?>
                                            <br>
                                            <span style='font-size:13px; color:rgba(255, 255, 255,1.0); font-weight:600;'><?= $hold_allocated_carer_name ?></span>
                                        </div>
                                    </a>
                                </div>
                                <div style='padding:8px; font-size:16px;' class='col-md-10 col-sm-10 col-xl-10 col-lg-10 col-10'>
                                    <ul class='care-visit-list'>
                                        <?php
                                        $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE (col_run_name = '$db_run_name' 
                                        AND (col_startDate <= '$currentDateRota' AND col_occurence != '$currentDateRota' AND col_endDate >= '$currentDateRota' 
                                        OR col_endDate = '') AND dateTime_in != 'Null' AND col_right_to_display ='True' AND (col_monday = '$varCurrentDateInDay' OR col_tuesday = '$varCurrentDateInDay' 
                                        OR col_wednesday = '$varCurrentDateInDay' OR col_thursday = '$varCurrentDateInDay' OR col_friday = '$varCurrentDateInDay' OR col_saturday = '$varCurrentDateInDay' OR col_sunday = '$varCurrentDateInDay')) 
                                        ORDER BY dateTime_in ");
                                        while ($row_sel_visits = mysqli_fetch_array($sel_corr_data)) {
                                        ?>
                                            <li style="background-color:<?= $hold_visit_color ?>;">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $row_sel_visits["client_name"] ?>
                                                    <br>
                                                    <span><?= $row_sel_visits["dateTime_in"] . ' &rarr; ' . $row_sel_visits["dateTime_out"] ?></span> &nbsp; <span><?= $row_sel_visits["col_required_carers"] ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Select visits ends here-->
            <?php
                    }
                }
            } ?>
        </div>
    </div>
    <!--Content footer start here-->
    <div class=" content-footer">
    </div>
</div>













<script>
    // Get date input and buttons
    const dateInput = document.getElementById("dateInput");
    const incrementButton = document.getElementById("increment");
    const decrementButton = document.getElementById("decrement");

    // Function to adjust the date by the given number of days
    function adjustDate(days) {
        const currentDate = new Date(dateInput.value);
        currentDate.setDate(currentDate.getDate() + days);
        dateInput.value = currentDate.toISOString().split("T")[0];
    }

    // Event listeners for the buttons
    incrementButton.addEventListener("click", () => adjustDate(1));
    decrementButton.addEventListener("click", () => adjustDate(-1));
</script>
</body>

</html>