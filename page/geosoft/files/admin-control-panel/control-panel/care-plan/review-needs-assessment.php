<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitNeedAssessment'])) {

    $txtMyNeed = mysqli_real_escape_string($conn, $_REQUEST['txtMyNeed']);
    $txtOutcomeIWant = mysqli_real_escape_string($conn, $_REQUEST['txtOutcomeIWant']);
    $txtWshthmAt = mysqli_real_escape_string($conn, $_REQUEST['txtWshthmAt']);
    $txtCrthmaMdo = mysqli_real_escape_string($conn, $_REQUEST['txtCrthmaMdo']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);
    $txtCurrentDate = $currentDate;

    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_needs_assessment (my_needs, outcome_i_want, wshthmat, crthmamdo, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtMyNeed . "', '" . $txtOutcomeIWant . "', '" . $txtWshthmAt . "', '" . $txtCrthmaMdo . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-needs-assessment?uryyToeSS4=$txtClientId");

        unset($txtMyNeed);
        unset($txtOutcomeIWant);
        unset($txtWshthmAt);
        unset($txtCrthmaMdo);
        unset($txtClientId);
        unset($txtCurrentDate);
        unset($txtAssessorName);
        unset($txtAssessorEmail);
        unset($txtclientTasks);
    }
}

?>


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

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Need assessment</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to client need assessment.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <form action="./review-needs-assessment?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="My need">My need</label>
                            <input type="text" class="form-control" placeholder="My need" required name="txtMyNeed" />
                        </div>
                        <div class="form-group">
                            <label for="My need">My outcome i want</label>
                            <textarea name="txtOutcomeIWant" id="" rows="4" class="form-control" required placeholder="Outcome i want"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="What should happen to help me achieve this">What should happen to help me achieve this?</label>
                            <textarea name="txtWshthmAt" id="" rows="4" class="form-control" required placeholder="What should happen to help me achieve this?"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Care required to help me achieve my desired outcomes">Care required to help me achieve my desired outcomes</label>
                            <textarea name="txtCrthmaMdo" id="" rows="4" class="form-control" required placeholder="Care required to help me achieve my desired outcomes"></textarea>
                        </div>

                        <?php
                        //change this line in your query as well
                        $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users WHERE user_email_address = '" . $_SESSION['usr_email'] . "' ");
                        while ($trans = mysqli_fetch_array($result)) { ?>

                            <input type="hidden" value="<?php echo "" . $trans['user_fullname'] . "";
                                                    } ?>" name="txtAssessorName" />


                            <input type="hidden" name="txtAssessorEmail" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" />

                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                                while ($trans = mysqli_fetch_array($result)) { ?>

                                    <input type="hidden" value="<?php echo "" . $trans['uryyToeSS4'] . "";
                                                            }
                                                        } ?>" name="txtClientId" />
                                    <div class="form-group">
                                        <input type="submit" value="Submit assessment" class="btn btn-info" name="btnSubmitNeedAssessment" />
                                    </div>
                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>

            <br>
            <hr>
            <br>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- table card-1 start -->

                <!-- prject ,team member start -->
                <div class="col-xl-12 col-md-12">
                    <div class="row">
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>My needs</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>Outcome i want</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>What should happen to help me achieve this?</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>Care required to help me achieve my desired outcomes</strong></h5>
                        </div>
                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_needs_assessment WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['my_needs'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['outcome_i_want'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['wshthmat'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['crthmamdo'] . "</h6>
                                </div>
                            </div>
                

                ";
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>





</div>
<!-- Latest Customers end -->
</div>
<!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>