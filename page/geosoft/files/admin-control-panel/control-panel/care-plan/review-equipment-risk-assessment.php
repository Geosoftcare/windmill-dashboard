<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitTaskAssessment'])) {

    $txtIdentified = mysqli_real_escape_string($conn, $_REQUEST['txtIdentified']);
    $txtVisits = mysqli_real_escape_string($conn, $_REQUEST['txtVisits']);
    $txtTasktobeCompleted = mysqli_real_escape_string($conn, $_REQUEST['txtTasktobeCompleted']);
    $txthitrmom = mysqli_real_escape_string($conn, $_REQUEST['txthitrmom']);
    $txtwshwho = mysqli_real_escape_string($conn, $_REQUEST['txtwshwho']);
    $txtCurrentDate = $currentDate;
    $txtComments = "Null";

    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);


    $queryIns = mysqli_query($conn, "INSERT INTO tbl_equipment_risk_assessment (equipment_details, to_be_use_to, col_how, last_serviced, next_service, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtIdentified . "', '" . $txtVisits . "', '" . $txtTasktobeCompleted . "', '" . $txthitrmom . "', '" . $txtwshwho . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-equipment-risk-assessment?uryyToeSS4=$txtClientId");

        unset($txtIdentified);
        unset($txtVisits);
        unset($txtTasktobeCompleted);
        unset($txthitrmom);
        unset($txtwshwho);
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
                            <h5 class="m-b-1To be used to">Mental health assessment tool</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to client Mental health assessment tool.
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
                    <form action="./review-equipment-risk-assessment?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="Equipment">Equipment (Details)</label>
                            <input type="text" class="form-control" placeholder="Equipment" required name="txtIdentified" />
                        </div>
                        <div class="form-group">
                            <label for="To be used to">To be used to</label>
                            <input type="text" class="form-control" placeholder="To be used to" required name="txtVisits" />
                        </div>
                        <div class="form-group">
                            <label for="How? (No. of stall needed to safely use the equipment?)">How? (No. of stall needed to safely use the equipment?)</label>
                            <textarea name="txtTasktobeCompleted" id="" rows="4" class="form-control" required placeholder="How? (No. of stall needed to safely use the equipment?)"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Last serviced">Last serviced</label>
                            <textarea name="txthitrmom" id="" rows="4" class="form-control" required placeholder="Last serviced"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Next service">Next service</label>
                            <textarea name="txtwshwho" id="" rows="4" class="form-control" required placeholder="Next service"></textarea>
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
                                        <input type="submit" value="Submit assessment" class="btn btn-info" name="btnSubmitTaskAssessment" />
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
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>Equipment
                                    <br>
                                    (Details)</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>To be used to</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-4 col-4">
                            <br>
                            <h5><strong>How? (No. of staff needed to safely use the equipment?)</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>Last serviced</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>Next service</strong></h5>
                        </div>
                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_equipment_risk_assessment WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['equipment_details'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['to_be_use_to'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                    <br>
                                    <h6>" . $trans['col_how'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['last_serviced'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['next_service'] . "</h6>
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