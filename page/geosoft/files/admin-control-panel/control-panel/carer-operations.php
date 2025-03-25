<?php include('team-header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <section style="background-color: #eee; margin-bottom:50px;">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-6 mb-4">
                                <ol class="breadcrumb mb-0">
                                </ol>
                            </nav>
                        </div>
                    </div>


                    <?php
                    if (isset($_GET['uryyTteamoeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE uryyTteamoeSS4='$uryyTteamoeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId Limit 1 ");
                        while ($row = mysqli_fetch_array($result)) { ?>


                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-8">

                                    <h5>Travel information</h5>
                                    <div style="text-align: right; width:100%;">
                                        <a href="./edit-travel-info?<?php echo "uryyTteamoeSS4=" . $row['uryyTteamoeSS4'] . "" ?>" style="text-decoration: none;">
                                            <button class="btn btn-outline-secondary">Edit</button>
                                        </a>
                                    </div>
                                    <div class="card mb-4">
                                        <div class="card-body" style="font-size: 16px;">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['team_first_name'] . " " . $row['team_last_name'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['team_address_line_1'] . ", " . $row['team_address_line_2'] . ", " . $row['team_city'] . ", " . $row['team_poster_code'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Map</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0">
                                                        <a target="_blank" href="https://www.google.fr/maps/place/<?php echo " " . $row['team_poster_code'] . ""; ?>">
                                                            Show map
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Transport method</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['transportation'] . "" ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div style="text-align: left;" class="col-lg-6">
                                            <h5>Rates</h5>
                                        </div>
                                        <div style="text-align: right;" class="col-lg-6">
                                            <a href="./new-carer-rates?<?php echo "uryyTteamoeSS4=" . $row['uryyTteamoeSS4'] . "" ?>" style="text-decoration: none;">
                                                <button class="btn btn-outline-secondary">Edit</button>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <div class="card-body" style="font-size: 16px;">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Rate card</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0">
                                                        <a href="#" target="_blank"><?php echo "" . $row['employment_type'] . "" ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Travel rate card</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_rate_type'] . "" ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            <?php  }
                    } ?>
                                </div>

                                <div class="col-lg-2"></div>
                            </div>
                </div>
            </section>


            <?php include('bottom-panel-block.php'); ?>


        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>