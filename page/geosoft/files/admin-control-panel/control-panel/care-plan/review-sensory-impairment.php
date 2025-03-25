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
                            <h5 class="m-b-1To be used to">Sensory impairment plan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to client Sensory impairment plan.
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
                    <form action="./review-sensory-impairment?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="My sensory impairment needs">My sensory impairment needs</label>
                            <input type="text" class="form-control" placeholder="My sensory impairment needs" required name="txtIdentified" />
                        </div>
                        <div class="form-group">
                            <label for="Interventions">Interventions</label>
                            <input type="text" class="form-control" placeholder="Interventions" required name="txtVisits" />
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
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-6 col-6">
                            <br>
                            <h5><strong>My sensory impairment needs</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-6 col-6">
                            <br>
                            <h5><strong>Interventions</strong></h5>
                        </div>
                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_sensory_impairment_plan WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-6 col-6'>
                                    <br>
                                    <h6>" . $trans['impairment_need'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-6 col-6'>
                                    <br>
                                    <h6>" . $trans['interventions'] . "</h6>
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