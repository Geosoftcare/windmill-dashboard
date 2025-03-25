<?php
include_once('header-panel.php');
$txtDate = mysqli_real_escape_string($myConnection, $_REQUEST['txtDate']);
$currentDateRota = date('Y-m-d', strtotime($txtDate));
$_SESSION['currentDateRota'] = $currentDateRota;
?>
<div class="container-fluid ">
    <!--//Display the run name and the button to assign the run to a carer-->
    <div style="width: width; height:auto;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <br>
                <a href="./wolverhampton-run" style="text-decoration: none;">
                    <button class="btn btn-primary">Wolverhampton</button>
                </a>
                <a href="./stock-on-trent-run" style="text-decoration: none;">
                    <button class="btn btn-info">Stock on trent</button>
                </a>
            </div>
            <div class="col-md-1">
                <div style="width:100%; height:auto; padding:3px; text-align:center;">
                    <form style="margin-top: 5px;" action="./schedule-run-756473-00499-99553-85006" method="GET" enctype="multipart/form-data" autocomplete="off">
                        <div style="padding: 0px 0px 20px 5px; width:100%;">
                            <input type="date" name='txtDate' onchange='this.form.submit()' value="<?php echo $currentDateRota ?>" name="txtSelectDate" style="width: 150px; height:45px; background-color:inherit; border:none; font-size:18px; font-weight:600;" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div style="width: auto; height:auto;">
        <h6><strong>Unallocated</strong></h6>
        <?php
        $todayDay = date("l");
        if ($todayDay == 'Monday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_monday = 'Monday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_monday = 'Monday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_monday = 'Monday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_monday = 'Monday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Tuesday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_tuesday = 'Tuesday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_tuesday = 'Tuesday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_tuesday = 'Tuesday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Wednesday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_wednesday = 'Wednesday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_wednesday = 'Wednesday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_wednesday = 'Wednesday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_wednesday = 'Wednesday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Thursday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_thursday = 'Thursday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_thursday = 'Thursday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_thursday = 'Thursday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Friday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_friday = 'Friday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_friday = 'Friday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_friday = 'Friday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Saturday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_saturday = 'Saturday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_saturday = 'Saturday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_saturday = 'Saturday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else if ($todayDay == 'Sunday') {
        ?>
            <table style="overflow: auto;" border="2" class="table table-condensed">
                <tbody>
                    <?php
                    $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT col_run_name FROM tbl_manage_runs WHERE (col_run_name != '' AND col_sunday = 'Sunday' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                    while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                        $db_run_name = $att_rw['col_run_name'];

                        $sel_dist_attr = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' GROUP BY run_area_nameId ");
                        while ($att_cor_rw = mysqli_fetch_array($sel_dist_attr)) {
                            $attri_run_Id = $att_cor_rw['run_area_nameId'];
                            $db_run_name_Id = $att_cor_rw['col_run_name'];

                            $check_care_status = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (col_area_Id='$attri_run_Id' AND Clientshift_Date = '" . $_SESSION['currentDateRota'] . "') ");
                            $care_call_status_Res = mysqli_num_rows($check_care_status);
                            if ($care_call_status_Res != 0) {
                    ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; background-color:rgba(22, 160, 133,1.0); padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(22, 160, 133,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_sunday = 'Sunday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>

                            <?php
                            } else {
                            ?>
                                <tr style="border: 2px solid rgba(25, 42, 86,.4);">
                                    <td style="font-size:16px; min-width:200px; max-width:200px; padding:0;">
                                        <a href="../assign-run-57756-47746-398937?run_area_nameId=<?= $attri_run_Id ?>" style="text-decoration: none; text-align:left;">
                                            <button style="color:white; background-color:rgba(44, 62, 80,1.0); text-align:left; font-size:12px; height:57px; width:220px; font-weight:800; padding:5px 8px 5px 6px;" class="btn">
                                                <?= $db_run_name ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td style="font-size:16px; min-width:30px; max-width:30px;"></td>
                                    <?php
                                    $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_manage_runs WHERE col_run_name = '$db_run_name' AND col_sunday = 'Sunday' ORDER BY dateTime_in ");
                                    while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                                    ?>
                                        <td>
                                            <div style="width:150px; height:auto; cursor:pointer; border-radius:5px; font-size:13px; text-align:center; font-weight:700; background-color:rgba(25, 42, 86,.2);">
                                                <a href="../change-client-run-567483-59956-847754?userId=<?= $att_cor_rw["userId"] ?>" style=" padding:5px 10px 9px 8px; text-decoration:none; color:rgba(34, 47, 62,.9);">
                                                    <?= $att_cor_rw["client_name"] ?>
                                                    <br>
                                                    <span style="padding:2px 0px 5px 12px;"><?= $att_cor_rw["dateTime_in"] . ' - ' . $att_cor_rw["dateTime_out"] ?></span>
                                                    &nbsp; <span style="color:rgba(22, 160, 133,1.0); font-size:14px;"><img src="../assets/images/user2-add-icon.png" style="width:14px; height:12px;" alt=""><?= $att_cor_rw["col_required_carers"] ?></span>
                                                </a>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>

                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</div>