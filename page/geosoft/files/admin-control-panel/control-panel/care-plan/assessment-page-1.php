<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitOutcomeassessment'])) {

    $txtColumn_1 = mysqli_real_escape_string($conn, $_REQUEST['txtDescription']);
    $txtColumn_2 = mysqli_real_escape_string($conn, $_REQUEST['txtYescheck']);
    $txtColumn_3 = mysqli_real_escape_string($conn, $_REQUEST['txtNocheck']);


    $txtCurrentDate = $currentDate;
    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";
    $txtAssessmentType = "Assessment1";
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_outcome_of_assessment (my_description, col_yes, col_no, submitedDate, assessorName, assessorEmail, help_tasks, assessment_type, uryyToeSS4) 
    VALUES('" . $txtColumn_1 . "', '" . $txtColumn_2 . "', '" . $txtColumn_3 . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtAssessmentType . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./assessment-page-1?uryyToeSS4=$txtClientId");

        unset($txtColumn_1);
        unset($txtColumn_2);
        unset($txtColumn_3);
        unset($txtCurrentDate);
        unset($txtAssessorName);
        unset($txtAssessorEmail);
        unset($txtclientTasks);
        unset($txtClientId);
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
        border-radius: 1px solid 5px 5px;
    }

    .list-items {
        padding: 1To be used topx 5px;
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
                            <h5 class="m-b-1To be used to">Medication assessment</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to client Medication assessment.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">


            <br>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- table card-1 start -->

                <!-- prject ,team member start -->
                <div class="col-xl-12 col-md-12">
                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId  DESC ");
                        while ($trans = mysqli_fetch_array($result)) { ?>

                            <div class="row">
                                <div class="col-xl-6 col-6">
                                    <br>
                                    <h5><strong>Name: <?php echo "" . $trans['client_first_name'] . " " . $trans['client_last_name'] . "" ?></strong></h5>
                                    <h6><strong>D.O.B: <?php echo "" . $trans['client_date_of_birth'] . "" ?></strong></h6>
                                </div>
                                <div class="col-xl-6 col-6">
                                    <br>
                                    <h6><strong>Address: <?php echo "" . $trans['client_address_line_1'] . ", " . $trans['client_address_line_2'] . ", " . $trans['client_poster_code'] . ", " . $trans['client_city'] . "" ?></strong></h6>
                                </div>
                            </div>

                            <br><br>
                            <a href="./assessment-page-1<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . ""; ?>" style="text-decoration: none;">
                                <button class="btn btn-info btn-sm">Add assessment</button>
                            </a>

                            <a href="./assessment-page-2<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . "" ?>" style="text-decoration: none;">
                                <button class="btn btn-primary btn-sm">Assessment criteria</button>
                            </a>

                            <a href="./assessment-page-3<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . ""; ?>" style="text-decoration: none;">
                                <button class="btn btn-danger btn-sm">Assessment comment</button>
                            </a>
                            <br><br>

                            <hr>

                            <form action="./assessment-page-1<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . "" ?>" method="post" enctype="multipart/form-data" autocomplete="off">


                                <div class='row'>
                                    <div class='col-xl-6 col-8'>

                                        <div class="form-group">
                                            <label for="Description">Description</label>
                                            <textarea name="txtDescription" id="" rows="4" class="form-control" required placeholder="Dscription"></textarea>
                                        </div>
                                    </div>
                                    <div class='col-xl-1 col-2'>
                                        <div class="form-group">
                                            <br><br>
                                            <label for="Response">Yes</label>
                                            <br>
                                            <input type="checkbox" name="txtYescheck" value="Yes" />
                                        </div>
                                    </div>
                                    <div class='col-xl-1 col-2'>
                                        <div class="form-group">
                                            <br><br>
                                            <label for="Response">No</label>
                                            <br>
                                            <input type="checkbox" name="txtNocheck" value="No" />
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="txtClientId" value="<?php echo "" . $trans['uryyToeSS4'] . "";
                                                                            }
                                                                        } ?>">



                                <?php
                                //change this line in your query as well
                                $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_users WHERE user_email_address = '" . $_SESSION['usr_email'] . "' ");
                                while ($trans = mysqli_fetch_array($result)) { ?>

                                    <input type="hidden" value="<?php echo "" . $trans['user_fullname'] . "";
                                                            } ?>" name="txtAssessorName" />


                                    <input type="hidden" name="txtAssessorEmail" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" />


                                    <br>

                                    <div class="form-group">
                                        <input type="submit" name="btnSubmitOutcomeassessment" class="btn btn-primary" value="Save now" />
                                    </div>

                            </form>


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