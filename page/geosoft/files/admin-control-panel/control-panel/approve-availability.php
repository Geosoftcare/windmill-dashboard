<?php include('team-header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <h5>Approve availability</h5>
                <hr>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">
                        <div style="font-size:18px;"><span style="color:red;"><strong>Note:</strong></span> Your action is going to affect this carer availability status. Be sure you want to proceed with this action.</div>
                        <hr style="background-color: rgba(149, 165, 166,.7);">
                        <?php
                        $userId = $_GET['userId'];
                        $sel_team_data_result = mysqli_query($conn, "SELECT * FROM tbl_team_status WHERE userId='$userId' ORDER BY userId DESC LIMIT 1");
                        while ($sel_team_data_row = mysqli_fetch_array($sel_team_data_result)) {
                        ?>

                            <form action="./processing-approve-availability" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                <input type="hidden" name="txtUserSpecialId" value="<?php echo "" . $sel_team_data_row['uryyTteamoeSS4'] . ""; ?>" />
                                <input type="hidden" name="txtUserId" value="<?php echo "" . $sel_team_data_row['userId'] . ""; ?>" />
                                <input type="hidden" name="txtStartDate" value="<?php echo "" . $sel_team_data_row['col_startDate'] . ""; ?>" />
                                <input type="hidden" name="txtEndDate" value="<?php echo "" . $sel_team_data_row['col_endDate'] . "";
                                                                            } ?>" />

                                <div class="form-group">
                                    <label for="For reason">Select option</label>
                                    <select style="height:50px;" name="txtTeamStatus" class="form-control" required id="">
                                        <option selected value="Approved">Approve</option>
                                        <option value="Dicline">Dicline</option>
                                    </select>
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