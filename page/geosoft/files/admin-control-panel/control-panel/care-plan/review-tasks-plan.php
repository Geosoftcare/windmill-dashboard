<?php

include('client-header-contents.php');

if (isset($_POST['btnSubmitTaskAssessment'])) {

    $txtVisits = mysqli_real_escape_string($conn, $_REQUEST['txtVisits']);
    $txtTasktobeCompleted = mysqli_real_escape_string($conn, $_REQUEST['txtTasktobeCompleted']);
    $txtETbuattbao = mysqli_real_escape_string($conn, $_REQUEST['txtETbuattbao']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);
    $txtCurrentDate = $currentDate;

    $txtAssessorName = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorName']);
    $txtAssessorEmail = mysqli_real_escape_string($conn, $_REQUEST['txtAssessorEmail']);
    $txtclientTasks = "Null";

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_visit_tasks_plan (visit, ttbc, etbuattbao, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtVisits . "', '" . $txtTasktobeCompleted . "', '" . $txtETbuattbao . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-tasks-plan?uryyToeSS4=$txtClientId");

        unset($txtVisits);
        unset($txtTasktobeCompleted);
        unset($txtETbuattbao);
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
                                Capture outcomes, tasks and risks related to Ann's need assessment.
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
                    <form action="./review-tasks-plan?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="Visit">Visit</label>
                            <input type="text" class="form-control" placeholder="Visit" required name="txtVisits" />
                        </div>
                        <div class="form-group">
                            <label for="Task to be completed">Task to be completed</label>
                            <textarea name="txtTasktobeCompleted" id="" rows="4" class="form-control" required placeholder="Tasks to be completed"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Equipment to be used and things to be aware of">Equipment to be used and things to be aware of?</label>
                            <textarea name="txtETbuattbao" id="" rows="4" class="form-control" required placeholder="Equipment to be used and things to be aware of?"></textarea>
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
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-4 col-4">
                            <br>
                            <h5><strong>Visits</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-4 col-4">
                            <br>
                            <h5><strong>Tasks to be completed</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-4 col-4">
                            <br>
                            <h5><strong>Equipment to be used and things to be aware of?</strong></h5>
                        </div>

                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_visit_tasks_plan WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                    <br>
                                    <h6>" . $trans['visit'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                    <br>
                                    <h6>" . $trans['ttbc'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-4 col-4'>
                                    <br>
                                    <h6>" . $trans['etbuattbao'] . "</h6>
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