<?php include('client-header-contents.php'); ?>



<?php
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
    while ($row = mysqli_fetch_array($result)) { ?>

        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="row">

                    <div style="width: 100%; height:auto; padding:22px;">
                        <h5>About <?php echo "" . $row['client_first_name'] . "" ?></h5>
                        <span style="font-size: 18px;">
                            Capture basic information about Ann, including their likes and preferences.
                        </span>
                        <br><br>
                        <div class="col-xl-4">
                            <a href='../client-details?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                                <div class='card table-card'>
                                    <div class='card-header'>
                                        <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; About <?php echo "" . $row['client_first_name'] . "" ?></strong></h5>
                                    </div>
                                    <div class='card-body p-0'>
                                        <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                            <span style='font-weight:22px;'><i class='feather mr-2 icon-check-square'></i> Updated</span> <span style='font-weight:22px; position:absolute;'>&nbsp; &nbsp; 24 Jan 2024</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div style="width: 100%; height:auto; padding:22px;">
                        <h5>Initial assessments</h5>
                        <span style="font-size: 18px;">
                            Carry out a holistic initial assessment across eight key areas of care.
                        </span>
                    </div>


                    <br><br>
                    <!-- Clients feed, team member start -->
                    <div class="col-xl-4">
                        <a href='./need-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Need assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> need assessment.</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./visit-tasks-plan?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Visit tasks plan</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> visit tasks plan.</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./my-personalised-risk-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; My personalised risk assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> personalised risk assessment</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./mental-health-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Mental health assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Mental health assessment.</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./equipment-risk-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Equipment risk assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Equipment risk assessment. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./moving-and-handling-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Moving and handling assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Moving and handling assessment. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./sensory-impairment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Sensory impairment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Sensory equipment. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./fire-action-plan?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Fire action plan</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Fire action plan. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!--<div class="col-xl-4">
                        <a href='./ps-and-appropriate-handling-of-meds?' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; PS and appropriate handling of meds</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Updated</span> <span style='font-weight:16px; position:absolute;'>&nbsp; &nbsp; 24 Jan 2024</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>-->

                    <div class="col-xl-4">
                        <a href='./medication-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Medication assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Medication assessment. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4">
                        <a href='./outcome-of-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Outcome of assessment</strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:rgba(39, 174, 96,1.0);">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Outcome of assessment. </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

        <?php
    }
} ?>
        <br>
        <br>

        <div class="row">
            <?php include('bottom-panel-block.php'); ?>
        </div>

        <!-- Latest Customers end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>




        <?php include('footer-contents.php'); ?>