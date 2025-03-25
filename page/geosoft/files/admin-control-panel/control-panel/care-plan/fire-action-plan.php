<?php include('client-header-contents.php'); ?>


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


                    <br>
                    <?php
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyToeSS4 = $_GET['uryyToeSS4'];
                        $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                        while ($row = mysqli_fetch_array($result)) { ?>


                            <div class="row" style="font-size: 18px;">

                                <div class="col-lg-8">
                                    <div class="card mb-4">
                                        <div class="card-body" style="font-size: 16px;">
                                            <div style="width: 100%; height:auto; background:none; text-align:center;">
                                                <h5>Fire action plan</h5>
                                                This fire action plan ensures that household members/ staff can evacuate the premises in the event of an outbreak of fire and are clear on what they have to do.
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Service user</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Address / Location</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['client_address_line_1'] . ", " . $row['client_address_line_2'] . ", " . $row['client_city'] . ", " . $row['client_poster_code'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="text-align: center;" class="row">
                                                <div class="col-sm-12">
                                                    <p style="font-size: 16px;" class="mb-0">MEMBERS OF HOUSEHOLD & PEOPLE AT RISK</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0"><?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">Family member(s)</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding:22px; text-align:center;" class="row">
                                                <h5>EMERGENCY ESCAPE ROUTES</h5>
                                                The best escape route is the normal way in and out of the service users home. Decide on a different route as well, in case the normal one blocked. If the accommodation is on the ground or first floor staff / service users may be able to escape from a window.
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">-- Front door</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">-- Back door</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding:22px; text-align:center;" class="row">
                                                <h5>REFUGE ROOM DETAILS</h5>
                                                If service users or staff cannot escape or an escape route is blocked it may be safer for staff and / or service users to stay put in a room with a window that opens, a telephone and protect themselves and await rescure from the fire brigade.
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p style="font-size: 16px;" class="mb-0">--Front living room</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding:22px; text-align:center;" class="row">
                                                <h5>LOCALITY OF WINDOW / DOOR KEYS</h5>
                                                The identification of the location of door and window keys will ensure that anyone who needs to ge tout in an emnergency can easily open doors and windows.
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p style="font-size: 16px;" class="mb-0">Doors are left open throughout the day when care workers are present</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding:22px; text-align:center;" class="row">
                                                <h5>Individual / Household members responsible for dialing 999 and calling fire brigade</h5>
                                                The identification of the location of door and window keys will ensure that anyone who needs to ge tout in an emnergency can easily open doors and windows.
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p style="font-size: 16px;" class="mb-0">Anyone there at the time of the emergency</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <h5>Signatures</h5>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p style="font-size: 16px;" class="mb-0">
                                                        Assessor:
                                                        <br>
                                                        I agree to keep the emergency escape routes clear service user:
                                                        <br>
                                                        Next of kin / advocate:
                                                        <br>
                                                        Date: <?php echo "" . $row['client_title'] . "";
                                                            }
                                                        } ?>
                                                    </p>
                                                </div>
                                            </div>
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