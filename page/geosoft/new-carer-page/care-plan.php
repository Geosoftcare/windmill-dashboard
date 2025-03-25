<?php include('header-contents.php'); ?>
<?php include('top-nav-bar.php'); ?>

<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Care Log</h2>
        <form>
            <?php
            $url = 'https://api.ipgeolocation.io/ipgeo?apiKey=dfe5978c4c4546b7834a7a539ce6af71';

            // Get data from openweathermap and store in JSON object
            $data = file_get_contents($url);
            $json = json_decode($data, true);

            // Fetch required fields

            $myCurLat = $json['latitude'];
            $myCurLong = $json['longitude'];


            if (isset($_GET['uryyToeSS4'])) {
                $uryyToeSS4 = $_GET['uryyToeSS4'];
                $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <input type="hidden" id="point1" value="<?php echo "" . $row['client_latitude'] . "," . $row['client_longitude'] . "";
                                                        }
                                                    } ?>" />

                    <input type='hidden' id='point2' value=" <?php echo $myCurLat . ',' . $myCurLong; ?>">

                    <button type="button" id="calc-dist" style="float: right; margin-top:-50px; width: 120px;" class="form-btn primary-default-btn transparent-btn">
                        Start call
                    </button>
        </form>

        <form action="./processing-start-shift" enctype="multipart/form-data" method="post" id="numform" autocomplete="off">

            <?php

            $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' ");
            while ($row = mysqli_fetch_array($result)) { ?>

                <input type="hidden" value="<?php echo "" . $row['user_special_Id'] . ""; ?>" name="txtCarerId" />
                <input type="hidden" value="<?php echo "" . $row['user_fullname'] . "";
                                        } ?>" name="txtCarerName" />
                <?php
                if (isset($_GET['uryyToeSS4'])) {
                    $uryyToeSS4 = $_GET['uryyToeSS4'];

                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                        <input type="hidden" value="Checked in" name="txtStart" />

                        <input type="hidden" value="<?php echo $currentDate; ?>" name="txtStartDate" />
                        <input type="hidden" value="<?php date_default_timezone_set('Europe/London');
                                                    $sTime = date("H:i");
                                                    print $sTime; ?>" name="txtStartTime" />
                        <input type="hidden" value="<?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?>" name="txtClientName" />
                        <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" name="txtClientId" />
                        <input type="hidden" value="<?php echo "" . $row['client_area'] . ""; ?>" name="txtClientArea" />


                        <input type="hidden" value="<?php echo "" . $row['client_address_line_1'] . ""; ?>" name="txtClientAddLi1" />
                        <input type="hidden" value="<?php echo "" . $row['client_address_line_2'] . ""; ?>" name="txtClientAddLi2" />
                        <input type="hidden" value="<?php echo "" . $row['client_city'] . ""; ?>" name="txtClientCity" />
                        <input type="hidden" value="<?php echo "" . $row['client_poster_code'] . ""; ?>" name="txtClientPostCode" />


                        <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . "";
                                                }
                                            } ?>" name="txtCarerEmail" />

                        <?php
                        if (isset($_GET['uryyToeSS4'])) {
                            $uryyToeSS4 = $_GET['uryyToeSS4'];
                            $result = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE uryyToeSS4='$uryyToeSS4' AND shift_date='$currentDate' ORDER BY userId DESC LIMIT 1");
                            while ($row = mysqli_fetch_array($result)) {
                                echo "
                            <input type='hidden' value='" . $row['checkinout_Id'] . "' name='txtClientTask' />
                            ";
                            }
                        } ?>

                        <?php
                        for ($a = 1; $a <= 50; $a++) {
                            $usdd = "ST";
                            $rand = rand(000, 999);
                            $ud = rand(000, 999);
                            $id = "$usdd$rand$ud";
                        }

                        // Return current date from the remote server
                        ?> <input type="hidden" value="<?php echo $id; ?>" name="txtTaskId" />

                        <input type="hidden" value="" name="txtDistance" id="result-distance" />


                        <button type="submit" id="btnSubmitStartCall" name="btnStartShift" style="float: right; margin-top:-30px;" class="form-btn info-default-btn transparent-btn">
                            Daily activities
                        </button>
        </form>


        <!------------------------------------------------------------------------------------------>

        <?php
        if (isset($_GET['uryyToeSS4'])) {
            $uryyToeSS4 = $_GET['uryyToeSS4'];
            $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
            while ($row = mysqli_fetch_array($result)) {
        ?>


                <div class="row stat-cards">
                    <div class="col-md-6 col-xl-5">
                        <div class="stat-cards-item" style="width: 100%; height:auto; padding:22px;">
                            <div class="row">
                                <div class="col-sm-4 col-4">
                                    <img class="img-fluid rounded" src="img/avatar/avatar-face-02.png" alt="">
                                </div>
                                <div class="col-sm-8 col-8">
                                    <br><br>
                                    <h3 class="stat-cards-info__num"><?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?></h3>
                                    <br>
                                    <h5><span class="stat-cards-info__title"><?php echo "" . $row['client_preferred_name'] . ""; ?> in</span> <span style="color:#d35400;"> <?php echo "" . $row['client_area'] . ""; ?></span></h5>
                                </div>
                            </div>

                            <div style="font-size:16px; margin-top:15px;" class="row">
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span class="stat-cards-info__title" style="font-size:14px;"><strong>Prefered Pronoun</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_referred_to'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Phone number</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_primary_phone'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Address</strong></span>
                                        <br>
                                        <a style="color: rgba(9, 132, 227,1.0);" href="https://www.google.fr/maps/place/<?php echo " " . $row['client_poster_code'] . ""; ?>">
                                            <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);">
                                                <?php echo "" . $row['client_address_line_1'] . " " . $row['client_address_line_2'] . ""; ?>, <?php echo "" . $row['client_area'] . ""; ?>,
                                                <?php echo "" . $row['client_city'] . ""; ?>, <?php echo " " . $row['client_poster_code'] . ""; ?>
                                            </strong>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span class="stat-cards-info__title" style="font-size:14px;"><strong>City</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_city'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Postal code</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo " " . $row['client_poster_code'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Key safe</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_access_details'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Date of birth</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_date_of_birth'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Email address</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);"><?php echo "" . $row['client_email_address'] . ""; ?></strong>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div style="border-bottom: 1px solid rgba(44, 62, 80,.5); padding:7px; margin-bottom:12px;">
                                        <span style="font-size:14px;" class="stat-cards-info__title"><strong>Medicine support</strong></span>
                                        <br>
                                        <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);">We provide <?php echo "" . $row['client_first_name'] . "";
                                                                                                                        }
                                                                                                                    } ?>'s medicine support</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-7">
                        <div class="stat-cards-item" style="width: 100%; height:auto; padding:22px; margin-top:12px;">
                            <h3 class="stat-cards-info__num">About me</h3>
                            <strong class="stat-cards-info__num" style="color:rgba(44, 62, 80,.9);">
                                <?php
                                if (isset($_GET['uryyToeSS4'])) {
                                    $uryyToeSS4 = $_GET['uryyToeSS4'];
                                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "" . $row['client_highlights'] . "";
                                    }
                                } ?>
                            </strong>

                            <div class="stat-cards-info__title">
                                <em>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' ");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "-----------<br>" . $row['care_plan_status'] . "";
                                    } ?>
                                </em>
                            </div>

                            <form action="./processing-client-careplan-status" method="post" enctype="multipart/form-data" autocomplete="off">

                                <?php
                                if (isset($_GET['uryyToeSS4'])) {
                                    $uryyToeSS4 = $_GET['uryyToeSS4'];
                                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . "";
                                                                }
                                                            } ?>" name="txtClientId2" />
                                        <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" name="txtCarerEmail2" />
                                        <br><br><br><br>

                                        <button type="submit" name="btnOfficiallyCert" style="width: auto; padding:12px; background-color:rgba(39, 174, 96,1.0);
                                        color:white; cursor:pointer; border:none; border-radius:5px; float:left;">
                                            Certified
                                        </button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</main>
<!-- ! Footer -->

<?php include('footer-contents.php'); ?>