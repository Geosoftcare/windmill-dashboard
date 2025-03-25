<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitTaskAssessment'])) {

    $txtIdentified = mysqli_real_escape_string($conn, $_REQUEST['txtIdentified']);
    $txtVisits = mysqli_real_escape_string($conn, $_REQUEST['txtVisits']);
    $txtTasktobeCompleted = mysqli_real_escape_string($conn, $_REQUEST['txtTasktobeCompleted']);
    $txthitrmom = mysqli_real_escape_string($conn, $_REQUEST['txthitrmom']);
    $txtwshwho = mysqli_real_escape_string($conn, $_REQUEST['txtwshwho']);
    $txtCurrentDate = $currentDate;

    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);


    $queryIns = mysqli_query($conn, "INSERT INTO tbl_personalised_risk_assessment (identified_hazard, risk_level, wiarahmtbh, hitrmom, wshwho, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtIdentified . "', '" . $txtVisits . "', '" . $txtTasktobeCompleted . "', '" . $txthitrmom . "', '" . $txtwshwho . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-personalised-risk-assessment?uryyToeSS4=$txtClientId");

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
                            <h5 class="m-b-10">Personalised risk assessment</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to client Personalised risk assessment.
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
                    <form action="./review-personalised-risk-assessment?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="Identified Hazard">Identified Hazard</label>
                            <input type="text" class="form-control" placeholder="Identified Hazard" required name="txtIdentified" />
                        </div>
                        <div class="form-group">
                            <label for="Risk level">Risk level</label>
                            <input type="text" class="form-control" placeholder="Risk level" required name="txtVisits" />
                        </div>
                        <div class="form-group">
                            <label for="Who is at risk and how might they be harmed">Who is at risk and how might they be harmed</label>
                            <textarea name="txtTasktobeCompleted" id="" rows="4" class="form-control" required placeholder="Tasks to be completed"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="How is the risk managed or minimised">How is the risk managed or minimised?</label>
                            <textarea name="txthitrmom" id="" rows="4" class="form-control" required placeholder="How is the risk managed or minimised?"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="What should happen when harm occurs">What should happen when harm occurs</label>
                            <textarea name="txtwshwho" id="" rows="4" class="form-control" required placeholder="What should happen when harm occurs"></textarea>
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
                            <h5><strong>Identified hazard</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-1 col-1">
                            <br>
                            <h5><strong>Risk level</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>Who is at risk and how might they be harmed?</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>How is the risk managed or minimised</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-3 col-3">
                            <br>
                            <h5><strong>What should happen when harm occurs</strong></h5>
                        </div>

                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_personalised_risk_assessment WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['identified_hazard'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-1 col-1'>
                                    <br>
                                    <h6>" . $trans['risk_level'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['wiarahmtbh'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['hitrmom'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-3 col-3'>
                                    <br>
                                    <h6>" . $trans['wshwho'] . "</h6>
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