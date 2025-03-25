<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitTaskAssessment'])) {

    $txtIdentified = mysqli_real_escape_string($conn, $_REQUEST['txtIdentified']);
    $txtVisits = mysqli_real_escape_string($conn, $_REQUEST['txtVisits']);
    $txtEmptyCol = "Null";
    $txtCurrentDate = $currentDate;
    $txtComments = "Null";

    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);


    $queryIns = mysqli_query($conn, "INSERT INTO tbl_sensory_impairment_plan (impairment_need, interventions, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtIdentified . "', '" . $txtVisits . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-sensory-impairment?uryyToeSS4=$txtClientId");

        unset($txtIdentified);
        unset($txtVisits);
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
                            <h5 class="m-b-1To be used to">Outcome of assessment</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                (Circle as appropriate)
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
                                    <h5>Name: <?php echo "" . $trans['client_first_name'] . " " . $trans['client_last_name'] . "" ?></h5>
                                    <h6>D.O.B: <?php echo "" . $trans['client_date_of_birth'] . "" ?></h6>
                                </div>
                                <div class="col-xl-6 col-6">
                                    <br>
                                    <h6>Address: <?php echo "" . $trans['client_address_line_1'] . ", " . $trans['client_address_line_2'] . ", " . $trans['client_poster_code'] . ", " . $trans['client_city'] . "" ?></h6>
                                </div>
                            </div>


                            <br><br><br>

                            <a href="./assessment-page-1<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . ""; ?>" style="text-decoration: none;">
                                <button class="btn btn-info btn-sm">Add assessment</button>
                            </a>

                            <a href="./assessment-page-2<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . "" ?>" style="text-decoration: none;">
                                <button class="btn btn-primary btn-sm">Assessment criteria</button>
                            </a>

                            <a href="./assessment-page-3<?php echo "?uryyToeSS4=" . $trans['uryyToeSS4'] . "";
                                                    }
                                                } ?>" style="text-decoration: none;">
                                <button class="btn btn-danger btn-sm">Assessment comment</button>
                            </a>

                            <br><br>

                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_outcome_of_assessment WHERE uryyToeSS4 = '$uryyToeSS4' AND assessment_type = 'Assessment1' ORDER BY userId DESC ");
                                while ($trans = mysqli_fetch_array($result)) {
                                    echo "
                                        <div class='row'>
                                            <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-9 col-9'>
                                                <br>
                                                <h5>" . $trans['my_description'] . "</h5>
                                            </div>
                                            <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                                <br>
                                                <h5><span></span>" . $trans['col_yes'] . " / " . $trans['col_no'] . "<span></span> </h5>
                                            </div>
                                        </div>
                                    ";
                                }
                            } ?>


                            <br><br>


                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                    <br>
                                    <h5>Assessment criteria</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>Not capable</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>Unble to assist</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>Able to assist</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>Fully capable</h5>
                                </div>
                            </div>

                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_outcome_of_assessment WHERE uryyToeSS4 = '$uryyToeSS4' AND assessment_type = 'Assessment2' ORDER BY userId DESC ");
                                while ($trans = mysqli_fetch_array($result)) {
                                    echo "

                                    <div class='row'>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                            <br>
                                            <h5>" . $trans['my_description'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['not_capable'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['unable_to_assist'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['able_to_assist'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['fully_capable'] . "</h5>
                                        </div>
                                    </div>


                            ";
                                }
                            } ?>


                            <br><br>

                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-5 col-5'>
                                    <br>
                                    <h5>--</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>Yes</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h5>No</h5>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h5>Comments</h5>
                                </div>
                            </div>

                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_outcome_of_assessment WHERE uryyToeSS4 = '$uryyToeSS4' AND assessment_type = 'Assessment3' ORDER BY userId DESC ");
                                while ($trans = mysqli_fetch_array($result)) {
                                    echo "
                            
                                    <div class='row'>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-5 col-5'>
                                            <br>
                                            <h5>" . $trans['my_description'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['col_yes'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h5>" . $trans['col_no'] . "</h5>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                            <br>
                                            <h5>" . $trans['comments'] . "</h5>
                                        </div>
                                    </div>


                            ";
                                }
                            } ?>


                            <br><br><br>



                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_outcome_of_assessment WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC LIMIT 1 ");
                                while ($trans = mysqli_fetch_array($result)) {
                                    echo "

                                    <div class='row'>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                            <br>
                                            <h6>Assessment completed by: " . $trans['assessorName'] . "</h6>
                                            <h6>Assessment date: " . $trans['submitedDate'] . "</h6>
                                        </div>
                                        <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                            <br>
                                            <h6>Review date: " . $trans['dateTime'] . "</h6>
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