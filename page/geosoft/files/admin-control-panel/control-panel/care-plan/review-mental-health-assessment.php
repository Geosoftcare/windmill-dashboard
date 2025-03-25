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


    $queryIns = mysqli_query($conn, "INSERT INTO tbl_mental_health_assessment_tool (assess_name, digit_zerro, digit_one, digit_two, digit_three, comments, submitedDate, assessorName, assessorEmail, help_tasks, uryyToeSS4) VALUES('" . $txtIdentified . "', '" . $txtVisits . "', '" . $txtTasktobeCompleted . "', '" . $txthitrmom . "', '" . $txtwshwho . "', '" . $txtComments . "', '" . $txtCurrentDate . "', '" . $txtAssessorName . "', '" . $txtAssessorEmail . "', '" . $txtclientTasks . "', '" . $txtClientId . "') ");
    if ($queryIns) {
        header("Location: ./review-mental-health-assessment?uryyToeSS4=$txtClientId");

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
                            <h5 class="m-b-10">Mental health assessment tool</h5>
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
                    <form action="./review-mental-health-assessment?uryyToeSS4=$txtClientId" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" placeholder="Name" required name="txtIdentified" />
                        </div>
                        <div class="form-group">
                            <label for="Zero (0)">Zero (0)</label>
                            <input type="text" class="form-control" placeholder="Zero (0)" required name="txtVisits" />
                        </div>
                        <div class="form-group">
                            <label for="One (1)">One (1)</label>
                            <textarea name="txtTasktobeCompleted" id="" rows="4" class="form-control" required placeholder="One (1)"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Two (2)">Two (2)</label>
                            <textarea name="txthitrmom" id="" rows="4" class="form-control" required placeholder="Two (2)"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Three (3)">Three (3)</label>
                            <textarea name="txtwshwho" id="" rows="4" class="form-control" required placeholder="Three (3)"></textarea>
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
                            <h5><strong>Name</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>0</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>1</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>2</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>3</strong></h5>
                        </div>
                        <div style="border: 1px solid rgba(189, 195, 199,.9);" class="col-xl-2 col-2">
                            <br>
                            <h5><strong>Comments</strong></h5>
                        </div>
                    </div>


                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_mental_health_assessment_tool WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                        while ($trans = mysqli_fetch_array($result)) {
                            echo "
                            
                            <div class='row'>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['assess_name'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['digit_zerro'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['digit_one'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['digit_two'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['digit_three'] . "</h6>
                                </div>
                                <div style='border: 1px solid rgba(189, 195, 199,.9);' class='col-xl-2 col-2'>
                                    <br>
                                    <h6>" . $trans['comments'] . "</h6>
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