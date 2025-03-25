<?php include('team-header-contents.php'); ?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <h5>Carer Status</h5>
                <hr>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">
                        <div style="font-size:18px;"><span style="color:red;"><strong>Note:</strong></span>
                            <br>
                            Your action is going to affect this carer availability status. Be sure you want to proceed with this action.
                        </div>
                        <hr style="background-color: rgba(149, 165, 166,.7);">
                        <?php
                        if (isset($_GET['uryyTteamoeSS4'])) {
                            $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
                        }
                        $sel_team_data_result = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
                        WHERE uryyTteamoeSS4='$uryyTteamoeSS4' ORDER BY userId DESC LIMIT 1");
                        while ($sel_team_data_row = mysqli_fetch_array($sel_team_data_result)) {
                        ?>

                            <form action="./processing-team-availability" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                <input type="hidden" name="txtFullname" value="<?php echo "" . $sel_team_data_row['team_first_name'] . " " . $sel_team_data_row['team_last_name'] . ""; ?>" />
                                <input type="hidden" name="txtTeamResource" value="<?php echo "" . $sel_team_data_row['col_team_resource'] . ""; ?>" />
                                <input type="hidden" name="teamSpecialId" value="<?php echo "" . $sel_team_data_row['uryyTteamoeSS4'] . "";
                                                                                } ?>" />

                                <div class="row">
                                    <div class="col-md-6 col-4">
                                        <div class="form-group">
                                            <label for="Start date">Start date</label>
                                            <input type="date" name="txtStartDate" value="<?php echo $today; ?>" class="form-control" required id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-4">
                                        <div class="form-group">
                                            <input style="transform: scale(1.2);" id="checkbox1" value="TFN" type="checkbox" checked name="txtFurtherNotice">
                                            <label for="Till further notice">Till further notice</label>
                                            &nbsp;&nbsp;
                                            <input id="checkbox2" style="transform: scale(1.2);" type="checkbox">
                                            <label for="End date">End date</label>
                                            <br>
                                            <span id="hideStatement">This will continue for an uncertain length of time until someone changes it</span>
                                            <div id="txtEndDateStatus" style="display: none;">
                                                <input type="date" name="txtEndDate" value="<?php echo $tomorrow; ?>" class="form-control" required id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="For reason">Absence</label>
                                    <select style="height:50px;" name="txtTeamStatus" class="form-control" required id="">
                                        <option value="--Select options--">--Select options--</option>
                                        <option value="Active">Active</option>
                                        <option value="Left Service">Left Service</option>
                                        <option value="Deceased">Deceased</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Hospitalized">Hospitalized</option>
                                        <option value="On a trip">On a trip</option>
                                        <option value="With family">With family</option>
                                        <option value="Annual Leave">Annual Leave (Holiday Entitlement)</option>
                                        <option value="Bank Holidays">Bank Holidays</option>
                                        <option value="Casual Leave">Casual Leave</option>
                                        <option value="Compassionate Leave">Compassionate Leave (Bereavement Leave)</option>
                                        <option value="Duvet Day">Duvet Day</option>
                                        <option value="Gardening Leave">Gardening Leave</option>
                                        <option value="Maternity Leave">Maternity Leave (Parental Leave)</option>
                                        <option value="Paid Time Off">Paid Time Off (PTO)</option>
                                        <option value="Sabbatical Leave">Sabbatical Leave</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Time Off In Lieu Leave">Time Off In Lieu (TOIL) Leave</option>
                                        <option value="Unpaid Leave">Unpaid Leave</option>
                                        <option value="Miscellaneous Leave">Miscellaneous Leave</option>
                                        <option value="None">None</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="for Note">Note <span style="font-style: italic;">110 characters maximum.</span></label>
                                    <textarea maxlength="110" style="resize: none;" name="txtNote" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="button" onclick="history.back();" class="btn btn-danger">Go back</button>
                                    <button class="btn btn-primary" name="btnTeamStatus" type="submit">Submit form</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3"></div>
        </div>
        <!-- [ delete box ] end -->
    </div>
</div>

<?php include('footer-contents.php'); ?>