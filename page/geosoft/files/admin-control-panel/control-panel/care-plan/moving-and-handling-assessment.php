<?php include('client-header-contents.php'); ?>
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
<?php
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
    while ($row = mysqli_fetch_array($result)) { ?>


        <!-- [ Main Content ] start -->
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h4 class="m-b-10">Moving and handling assessment</h4>
                                </div>
                                <ul class="breadcrumb">
                                    <li style="font-size: 16px;" class="breadcrumb-item">
                                        Capture outcomes, tasks and risks related to <?php echo "" . $row['client_first_name'] . "" ?>'s Moving and handling assessment.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>


                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <h5>1. Moving and handling assessment</h5>
                            <span style="font-size: 16px;">
                                Record <?php echo "" . $row['client_first_name'] . "" ?>'s level of independence for each Moving and handling assessment activity, and any support that is required.
                            </span>


                            <br><br>
                            <a href="./review-moving-and-handling-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "";
                                                                            }
                                                                        } ?>" style="text-decoration: none;">
                                <button type="button" class="btn btn-outline-dark">Review assessment</button>
                            </a>

                            <br>
                            <br>

                            <h5>Previous assessments</h5>

                            <br>
                            <?php
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyToeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_moving_and_handling WHERE uryyToeSS4='$uryyToeSS4' ");
                                while ($row = mysqli_fetch_array($result)) { ?>

                                    <div style="width: 100%; height:auto; padding:22px; border:1px solid rgba(189, 195, 199,.6);">
                                        <h5>Complete</h5>
                                        <span style="font-size: 18px;">Submited: <?php echo "" . $row['submitedDate'] . "" ?></span>
                                        <br>
                                        <span style="font-size: 18px;">By: <?php echo "" . $row['assessorName'] . "";
                                                                        }
                                                                    } ?></span>
                                    </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <h5>2. Assessment summary and outcomes</h5>
                            <span style="font-size: 16px;">
                                Describe how your team can support this client
                            </span>
                            <form action="./need-assessment" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <textarea name="txtAssessmentTwo" id="" rows="4" class="form-control" required placeholder="e.g he/she need support with getting dressed in the morning"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="btnSaveAssessment" value="Save changes" />
                                </div>
                            </form>
                        </div>
                    </div>


                    <hr />

                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <h5>3. My tasks</h5>
                            <span style="font-size: 16px;">
                                Current tasks offered
                            </span>
                            <br><br>
                            <?php
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyToeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' ");
                                while ($row = mysqli_fetch_array($result)) { ?>
                            <?php echo "
                            <h5>-- " . $row['client_taskName'] . "</h5>
                            ";
                                }
                            } ?>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <form action="./need-assessment" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">

                            </div>
                        </form>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <div class="row">
                    <!-- table card-1 start -->

                    <!-- prject ,team member start -->
                    <div class="col-xl-12 col-md-12">

                    </div>




                    <?php include('bottom-panel-block.php'); ?>




                </div>
                <!-- Latest Customers end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
        </div>


        <?php include('footer-contents.php'); ?>