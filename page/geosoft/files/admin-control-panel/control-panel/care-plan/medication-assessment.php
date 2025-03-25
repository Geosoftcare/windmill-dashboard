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
                                    <h6><strong>Address: <?php echo "" . $trans['client_address_line_1'] . ", " . $trans['client_address_line_2'] . ", " . $trans['client_poster_code'] . ", " . $trans['client_city'] . "";
                                                        }
                                                    } ?></strong></h6>
                                </div>
                            </div>


                            <br><br><br>


                            <div class="row">
                                <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                                    <br>
                                    <h5><strong>Name of medication</strong></h5>
                                </div>
                                <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                                    <br>
                                    <h5><strong>Dosage</strong></h5>
                                </div>
                                <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                                    <br>
                                    <h5><strong>How often</strong></h5>
                                </div>
                                <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                                    <br>
                                    <h5><strong>Route (i.e by mouth)</strong></h5>
                                </div>
                                <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                                    <br>
                                    <h5><strong>Additional info</strong></h5>
                                </div>
                            </div>


                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY med_Id DESC ");
                                while ($trans = mysqli_fetch_array($result)) {
                                    echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['med_name'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['med_dosage'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['med_type'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['med_support_required'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['med_details'] . "</h6>
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