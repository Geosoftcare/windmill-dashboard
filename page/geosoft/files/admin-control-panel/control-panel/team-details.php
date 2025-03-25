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
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                    <?php
                    if (isset($_GET['uryyTteamoeSS4'])) {
                        $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE uryyTteamoeSS4='$uryyTteamoeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        while ($row = mysqli_fetch_array($result)) {
                            $clientDOB = date('d M, Y', strtotime("" . $row['team_date_of_birth'] . ""));
                    ?>


                            <div class="row" style="font-size: 18px; font-weight:600;">
                                <div class="col-lg-4">
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            <img src="assets/images/user/profile-icon.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 120px;">
                                            <h5 class="my-3"><?php echo "" . $row['team_first_name'] . "&nbsp;" . $row['team_last_name'] . "" ?></h5>
                                            <p style="font-size: 16px;" class="text-muted mb-1"><?php echo "" . $row['team_sexuality'] . "" ?></p>
                                            <p style="font-size: 16px;" class="text-muted mb-4"><?php echo "" . $row['team_city'] . ", " . $row['team_county'] . "" ?></p>
                                            <div class="d-flex justify-content-center mb-2">


                                                <!--<a href="./team-status<?php echo "?uryyTteamoeSS4=" . $row['uryyTteamoeSS4'] . "" ?>" style=" text-decoration: none;">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">View status</button>
                                                </a>

                                                &nbsp;&nbsp;

                                                <a href="./delete-team-details<?php echo "?uryyTteamoeSS4=" . $row['uryyTteamoeSS4'] . "" ?>" style=" text-decoration: none;">
                                                    <button type="button" class="btn btn-danger" data-target="#exampleModal" data-whatever="@mdo">Delete profile</button>
                                                </a>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-4">
                                        <div style="width: 100%; height:auto; text-align:right; font-weight:600;">
                                            <a href="./edit-team-details-brief-7754658-984847-884735465<?php echo "?uryyTteamoeSS4=$uryyTteamoeSS4"; ?>" style="text-decoration: none;">
                                                <button class="btn btn-xs btn-info">Edit</button>
                                            </a>
                                        </div>
                                        <div class="card-body" style="font-size: 16px; font-weight:600;">

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_address_line_1'] . " " . $row['team_address_line_2'] . ", " . $row['team_city'] . ", " . $row['team_county'] . ", " . $row['team_poster_code'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Nationality</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_nationality'] . ""; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div style="width: 100%; height:auto; text-align:right;">
                                            <a href="./edit-team-details-brief-7754658-984847-48884<?php echo "?uryyTteamoeSS4=$uryyTteamoeSS4"; ?>" style="text-decoration: none;">
                                                <button class="btn btn-xs btn-info">Edit</button>
                                            </a>
                                        </div>
                                        <div class="card-body" style="font-size: 16px; font-weight:600;">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_title'] . " " . $row['team_middle_name'] . " | <span>Prefered name: </span> " . $row['team_preferred_name'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_email_address'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "+44 " . $row['team_primary_phone'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Date of birth</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo $clientDOB ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class=" row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">DBS</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_dbs'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">NIN</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_nin'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Refered to</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_referred_to'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Culture/Religion</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_culture_religion'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px; font-weight:600;" class="mb-0">Gender</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['team_sexuality'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <a href="./team-pay-rate<?php echo "?uryyTteamoeSS4=$uryyTteamoeSS4"; ?>" style='text-decoration:none;'>
                                                        <button class="btn btn-secondary">Update pay rate</button>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "" . $row['col_rate_type'] . "" ?></p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p style="font-size: 16px; font-weight:600;" class="text-muted mb-0"><?php echo "£" . $row['col_pay_rate'] . "";
                                                                                                                        }
                                                                                                                    } ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-body" style="font-size: 16px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3 class="">Highlights</h3>
                                            <hr>
                                            <p style="font-size: 16px;" class="text-muted mb-0">I am experienced in personal grooming and I enjoy helping clients look their best. I can assist with hygiene, toileting, eating, cooking, cleaning and any administrative tasks which need support. I have a full clean driving license and enjoy taking clients out to meet friends.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                </div>
                <br><br>
            </section>


            <?php include('bottom-panel-block.php'); ?>


        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>