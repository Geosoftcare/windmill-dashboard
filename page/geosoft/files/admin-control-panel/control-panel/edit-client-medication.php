<?php include('client-header-contents.php'); ?>


<style>
    ul {
        list-style: none;
    }

    .list {
        width: 100%;
        background-color: #ffffff;
        border-radius: 0 0 5px 5px;
    }

    .list-items {
        padding: 10px 5px;
    }

    .list-items:hover {
        background-color: #dddddd;
    }
</style>

<?php
$result = mysqli_query($conn, "SELECT med_name,uryyToeSS4,med_dosage, med_type,med_Id,col_period_two,col_period_one, SUBSTRING(monday, 1, 1) AS MDay, SUBSTRING(tuesday, 1, 1) AS TDay, SUBSTRING(wednesday, 1, 1) AS WDay, SUBSTRING(thursday, 1, 1) AS THDay, SUBSTRING(friday, 1, 1) AS FDay, SUBSTRING(saturday, 1, 1) AS SDay, SUBSTRING(sunday, 1, 1) AS SATDay, 
SUBSTRING(care_call1, 1, 1) AS BCall, SUBSTRING(care_call2, 1, 1) AS LCall, SUBSTRING(care_call3, 1, 1) AS TCall, SUBSTRING(care_call4, 1, 1) AS BdCall, SUBSTRING(extra_call1, 1, 2) AS EBCall, SUBSTRING(extra_call2, 1, 2) AS ELCall, SUBSTRING(extra_call3, 1, 2) AS ETCall, SUBSTRING(extra_call4, 1, 2) AS EBdCall
FROM tbl_clients_medication_records WHERE med_Id=$_GET[med_Id] AND (client_endMed >= '$today' OR client_endMed = '') AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
while ($row = mysqli_fetch_array($result)) {
    $myclientSpecial = $row['uryyToeSS4'];
    $_SESSION['uryyToeSS4'] = $myclientSpecial;
?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Edit medication(s)</h5>
                                <hr>
                                <h5 style="font-size:20px;"><?php echo "" . $row['med_name'] . " |
                                <span style='height: 20px; width:20px; border-radius:50px; padding:3px; font-size:14px; font-weight:600;'>" . $row['col_period_one'] . " </span>
                                <span style='height: 20px; width:20px; padding:3px;font-size:14px; font-weight:600;'>" . $row['col_period_two'] . "</span>
                               "; ?></h5>
                                <?php echo "
                                <ul class='pagination justify-content-left pagination-sm'>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['MDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['TDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['WDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['THDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['FDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['SDay'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['SATDay'] . "</li>
                                </ul>
                                <ul class='pagination justify-content-left pagination-sm'>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['BCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['EBCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['LCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['ELCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['TCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['ETCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['BdCall'] . "</li>
                                    <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['EBdCall'] . "</li>
                                </ul>
                                " ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->

            <div class="row">
                <!-- prject ,team member start -->
                <div class="col-xl-12 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">


                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="client-form-body" style="width:100%; height:auto; padding:22px;">
                                    <div class="row">
                                        <div class="col-md-5">

                                            <form method="POST" action="./processing-edit-medication" enctype="multipart/form-data" name="addClient-form" autocomplete="off">
                                                <div class="form-group">

                                                    <input type="hidden" name="txtMed_Id" value="<?php echo "" . $row['med_Id'] . ""; ?>" />
                                                    <input type="hidden" name="uryyToeSS4" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Select Medicine<span style="color: red;">*</span></label>
                                                    <div>
                                                        <input type="text" name="txtMedName" required class="form-control" id="input" placeholder="Type a task here..." />
                                                    </div>
                                                    <ul class="list"></ul>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-7 col-7">
                                                            <label for="exampleInputPassword1">Select dosage<span style="color: red;">*</span></label>
                                                            <select name="txtMedDosage" required class="form-control" id="exampleFormControlSelect1">
                                                                <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                                <?php
                                                                $result = mysqli_query($conn, "SELECT * FROM tbl_medication_list GROUP BY med_dosage ");
                                                                while ($trans = mysqli_fetch_array($result)) {
                                                                    echo "
                                                                <option value='" . $trans['med_dosage'] . "'>" . $trans['med_dosage'] . "</option>
                                                                    ";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 col-5">
                                                            <label for="exampleInputPassword1">Select type<span style="color: red;">*</span></label>
                                                            <select name="txtMedType" required class="form-control" id="exampleFormControlSelect1">
                                                                <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                                <?php
                                                                $result = mysqli_query($conn, "SELECT * FROM tbl_medication_list GROUP BY med_type ");
                                                                while ($trans = mysqli_fetch_array($result)) {
                                                                    echo "
                                                                <option value='" . $trans['med_type'] . "'>" . $trans['med_type'] . "</option>
                                                                    ";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">What support is required with this medicine?<span style="color: red;">*</span></label>
                                                    <select name="txtMedicineSupport" required class="form-control" id="exampleFormControlSelect1">
                                                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                        <option value="Administer">Administer</option>
                                                        <option value="Assist">Assist</option>
                                                        <option value="Prompt">Prompt</option>
                                                    </select>
                                                    <br>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">What type of medicine?<span style="color: red;">*</span></label>
                                                    <select name="txtMedPackage" required class="form-control" id="exampleFormControlSelect1">
                                                        <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                        <option value="Scheduled">Scheduled</option>
                                                        <option value="PRN">PRN</option>

                                                    </select>

                                                </div>
                                                <br>
                                                <h6>Medication time</h6>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Select frequency 1 <span style="color: red;">*</span></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                                <div class="daysAlignment" style="width: 100%; font-weight:600; height:auto; padding:12px 0px 0px 20px;">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <input name="txtMorning" value="Morning" type="checkbox" class='checkboxes'>
                                                                            <span style="font-size:13px;">&nbsp; Mor</span>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <input name="txtLunch" value="Lunch" type="checkbox" class='checkboxes'>
                                                                            <span style="font-size:13px;">&nbsp; Lun</span>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <input name="txtTea" value="Tea" type="checkbox" class='checkboxes'>
                                                                            <span style="font-size:13px;">&nbsp; Tea</span>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <input name="txtBed" value="Bed" type="checkbox" class='checkboxes'>
                                                                            <span style="font-size:13px;">&nbsp; Bed</span>
                                                                        </div>

                                                                        <?php
                                                                        $select_client_carecalls = mysqli_query($conn, "SELECT * 
                                                                            FROM tbl_clienttime_calls WHERE (uryyToeSS4='" . $_SESSION['uryyToeSS4'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                                                                        while ($row_client_carecalls = mysqli_fetch_array($select_client_carecalls)) {
                                                                            $txtExtraCalls = $row_client_carecalls['care_calls'];

                                                                            if ($txtExtraCalls == 'EM morning call') {
                                                                                echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEM' value='EM morning call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EM</span>
                                                                                    </div>
                                                                                    ";
                                                                            } else if ($txtExtraCalls == 'EL lunch call') {
                                                                                echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEL' value='EL lunch call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EL</span>
                                                                                    </div>
                                                                                    ";
                                                                            } else if ($txtExtraCalls == 'ET tea call') {
                                                                                echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtET' value='ET tea call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; ET</span>
                                                                                    </div>
                                                                                    ";
                                                                            } else if ($txtExtraCalls == 'EB bed call') {
                                                                                echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEB' value='EB bed call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EB</span>
                                                                                    </div>
                                                                                    ";
                                                                            }
                                                                        }
                                                                        ?>

                                                                        <div class="col-3">
                                                                            <input type="checkbox" id="selectAllCheckbox">
                                                                            <span style='font-size:13px;'>&nbsp; Check all</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="width: 100%; height:auto;">

                                                    <div class="card-header">
                                                        <h5>Select frequency 2 <span style="color: red;"></span></h5>
                                                    </div>
                                                    <nav>
                                                        <div style="font-size: 18px; color:black; font-weight: 600;" class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <button style="color:black;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Daily | Weekly</button>
                                                            <button style="color:black;" class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">One time</button>
                                                            <button style="color:black;" class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Custom</button>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                            <br>
                                                            <h6><strong>Daily | weekly</strong></h6>
                                                            <div style="width: 100%; height:auto; background-color:rgba(149, 175, 192,1.0); padding:12px;">
                                                                <div>
                                                                    If you wish this medication to popup once every month, kindly select a date for the popup.
                                                                </div>
                                                                <span>Popup date</span> &nbsp;
                                                                <input type="checkbox" name="clickDisplayDaily" onclick="onlyOne(this)" id="clickDisplayDaily">
                                                            </div>
                                                            <div id="displayDailyCheckbox" class="card">
                                                                <div class="card-body">
                                                                    <div class="tab-content">
                                                                        <div class="daysAlignment" style="width: 100%; height:auto; padding:12px 0px 0px 20px;">
                                                                            <div class="row">
                                                                                <div class="col-3">
                                                                                    <input name="txtMonday" value="Monday" type="checkbox" id="customswitch5">
                                                                                    <span style="font-size:13px;">&nbsp; Mon</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtTuesday" value="Tuesday" type="checkbox" class=" " id="customswitch6">
                                                                                    <span style="font-size:13px;">&nbsp; Tue</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtWednesday" value="Wednesday" type="checkbox" class=" " id="customswitch7">
                                                                                    <span style="font-size:13px;">&nbsp; Wed</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtThursday" value="Thursday" type="checkbox" class=" " id="customswitch8">
                                                                                    <span style="font-size:13px;">&nbsp; Thu</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtFriday" value="Friday" type="checkbox" class=" " id="customswitch9">
                                                                                    <span style="font-size:13px;">&nbsp; Fri</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtSaturday" value="Saturday" type="checkbox" class=" " id="customswitch10">
                                                                                    <span style="font-size:13px;">&nbsp; Sat</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input name="txtSunday" value="Sunday" type="checkbox" class=" " id="customswitch11">
                                                                                    <span style="font-size:13px;">&nbsp; Sun</span>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <input type="checkbox" name="select-all" id="select-alldays" />
                                                                                    <span style="font-size:13px;">&nbsp; All</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                            <br>
                                                            <h6><strong>One time</strong></h6>
                                                            <div style="width: 100%; height:auto; padding:6px; font-size:17px; font-weight:600;">
                                                                <div style="width: 100%; height:auto; background-color:rgba(22, 160, 133,.3); padding:12px;">
                                                                    <div>
                                                                        If you wish this medication to popup once every month, kindly choose the start date and the end date below.
                                                                    </div>
                                                                    <span>Select choice</span> &nbsp;
                                                                    <input type="checkbox" name="clickDisplayOneTime" onclick="onlyOne(this)" id="clickDisplayOneTime" />
                                                                </div>
                                                                <div id="displayOneTimeCheckBox" style="width: 100%; height:auto; background-color:rgba(189, 195, 199,.3); padding:12px;">
                                                                    <h6><strong>Once every month</strong></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                            <br>
                                                            <h6><strong>Custom</strong></h6>
                                                            <div style="width: 100%; height:auto; padding:6px; font-size:17px; font-weight:600;">
                                                                <div style="width: 100%; height:auto; background-color:rgba(25, 42, 86,1.0); color:white; padding:12px;">
                                                                    <div>
                                                                        Custom
                                                                        <br>
                                                                        If you wish this medication to popup on every other day, please select the checkbox below.
                                                                    </div>
                                                                    <span>Every other day</span> &nbsp;
                                                                    <input type="checkbox" name="clickDisplayCustom" onclick="onlyOne(this)" id="clickDisplayCustom">
                                                                </div>
                                                                <div id="displayCustomCheckBox" style="width: 100%; height:auto; background-color:rgba(189, 195, 199,.3); padding:12px;">
                                                                    <div class="row">
                                                                        <div class="col-md-5 col-5">
                                                                            <label for="exampleInputPassword1">Period<span style="color: red;"></span></label>
                                                                            <input type="number" min="2" max="7" value="2" class="form-control" name="txtPeriod" id="txtMedPopupDate" placeholder="Enter Period">
                                                                        </div>
                                                                        <div class="col-md-7 col-7">
                                                                            <label for="exampleInputPassword1">Select option<span style="color: red;"></span></label>
                                                                            <select name="txtPeriodCategory" value="Null" class="form-control" id="exampleFormControlSelect1">
                                                                                <option value="Days">Days</option>
                                                                                <option value="Weeks">Weeks</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="tab-content">
                                                                            <div class="daysAlignment" style="width: 100%; height:auto; padding:12px 0px 0px 20px;">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <input name="txtMonday" value="Monday" type="checkbox" id="customswitch5">
                                                                                        <span style="font-size:13px;">&nbsp; Mon</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtTuesday" value="Tuesday" type="checkbox" class=" " id="customswitch6">
                                                                                        <span style="font-size:13px;">&nbsp; Tue</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtWednesday" value="Wednesday" type="checkbox" class=" " id="customswitch7">
                                                                                        <span style="font-size:13px;">&nbsp; Wed</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtThursday" value="Thursday" type="checkbox" class=" " id="customswitch8">
                                                                                        <span style="font-size:13px;">&nbsp; Thu</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtFriday" value="Friday" type="checkbox" class=" " id="customswitch9">
                                                                                        <span style="font-size:13px;">&nbsp; Fri</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtSaturday" value="Saturday" type="checkbox" class=" " id="customswitch10">
                                                                                        <span style="font-size:13px;">&nbsp; Sat</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtSunday" value="Sunday" type="checkbox" class=" " id="customswitch11">
                                                                                        <span style="font-size:13px;">&nbsp; Sun</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input type="checkbox" name="select-all" id="select-alldays" />
                                                                                        <span style="font-size:13px;">&nbsp; All</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-6">
                                                            <label for="exampleInputStarts1">Start date<span style="color: red;"> *</span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                                                        <img src="assets/images/icons/pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" style="width: 20px; height:20px;" alt="">
                                                                    </span>
                                                                </div>
                                                                <input type="date" required name="txtStartMed" class="form-control" id="exampleInputStarts" aria-describedby="StartDate" placeholder="Starts">
                                                                <div class="invalid-tooltip">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <label for="exampleInputStarts1">End date<span style="color: red;"></span></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                                                        <img src="assets/images/icons/pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" style="width: 20px; height:20px;" alt="">
                                                                    </span>
                                                                </div>
                                                                <input type="date" name="txtEndMed" class="form-control" id="exampleInputStarts" aria-describedby="StartDate" placeholder="Starts">
                                                                <div class="invalid-tooltip">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>

                                                <div class="form-group">
                                                    <h5>Add details(optional)</h5>
                                                    <label for="exampleFormControlTextarea1">The carer will see this note in the app each time they complete this medication.</label>
                                                    <textarea name="txtMedkDetails" class="form-control" placeholder="Highlights" id="exampleFormControlHighlights" rows="5"></textarea>
                                                </div>


                                                <div class="form-grou">
                                                    <input type="hidden" value="<?php
                                                                                $currentDate = date('F j, Y');
                                                                                echo $currentDate; ?>" name="current_Date">

                                                    <input type="hidden" value="<?php echo date("h:i a");
                                                                            } ?>" name="current_Time">
                                                </div>

                                                <button style='height:50px;' type="submit" name="btnEditClientMedicine" class="btn  btn-primary">Edit/Replace Med</button>


                                            </form>
                                        </div>

                                        <div class="col-md-7">
                                            <?php include_once('edit-client-medication-table.php'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <?php include('bottom-panel-block.php'); ?>






            </div>
            <!-- Latest Customers end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
    </div>


    <script type=" text/javascript">
        /**/
        let names = [
            <?php
            include('dbconnect.php');
            //change this line in your query as well
            $result = mysqli_query($myConnection, "SELECT * FROM tbl_medication_list ");
            while ($trans = mysqli_fetch_array($result)) {
                echo "
                '" . $trans['med_name'] . "',
                ";
            } ?>



        ];
        //Sort names in ascending order
        let sortedNames = names.sort();

        //reference
        let input = document.getElementById("input");

        //Execute function on keyup
        input.addEventListener("keyup", (e) => {
            //loop through above array
            //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
            removeElements();
            for (let i of sortedNames) {
                //convert input to lowercase and compare with each string

                if (
                    i.toLowerCase().startsWith(input.value.toLowerCase()) &&
                    input.value != ""
                ) {
                    //create li element
                    let listItem = document.createElement("li");
                    //One common class name
                    listItem.classList.add("list-items");
                    listItem.style.cursor = "pointer";
                    listItem.setAttribute("onclick", "displayNames('" + i + "')");
                    //Display matched part in bold
                    let word = "<b>" + i.substr(0, input.value.length) + "</b>";
                    word += i.substr(input.value.length);
                    //display the value in array
                    listItem.innerHTML = word;
                    document.querySelector(".list").appendChild(listItem);
                }
            }
        });

        function displayNames(value) {
            input.value = value;
            removeElements();
        }

        function removeElements() {
            //clear all the item
            let items = document.querySelectorAll(".list-items");
            items.forEach((item) => {
                item.remove();
            });
        }
    </script>
    <?php include('footer-contents.php'); ?>