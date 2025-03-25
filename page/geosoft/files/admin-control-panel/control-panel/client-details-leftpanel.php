<section style="background-color: #eee; margin-bottom:50px;">
    <br>
    <div class="container-fluid">

        <?php
        if (isset($_GET['uryyToeSS4'])) {
            $uryyToeSS4 = $_GET['uryyToeSS4'];

            $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form 
            WHERE uryyToeSS4='$uryyToeSS4' ");
            while ($row = mysqli_fetch_array($result)) { ?>


                <div class="row" style="font-size: 18px;">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="assets/images/user/profile-icon.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 120px;">
                                <h5 class="my-3"><?php echo "" . $row['client_first_name'] . "&nbsp;" . $row['client_last_name'] . "" ?></h5>
                                <p style="font-size: 16px;" class="text-muted mb-1"><?php echo "" . $row['client_sexuality'] . "" ?> | <?php echo "" . $row['client_area'] . "" ?></p>
                                <p style="font-size: 16px;" class="text-muted mb-4"><?php echo "" . $row['client_city'] . ", " . $row['client_county'] . "" ?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="./client-status<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "";
                                                        }
                                                    } ?>" style=" text-decoration: none;">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fas fa-user"></i> Status</button>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0" style="font-size: 18px;">
                                <h5 style="padding: 22px;">Care calls</h5>
                                <a href="./setup-visits<?php echo "?uryyToeSS4=$uryyToeSS4"; ?>" style="text-decoration: none;">
                                    <button class="btn btn-xs btn-info">Plan visits</button>
                                </a>

                                <div style="width: 100%; height:auto; margin-top:12px; padding:12px; border-top:2px solid rgba(39, 174, 96,1.0); ">
                                    <table class="table table-striped">
                                        <tr>
                                            <td style="font-size:15px; font-weight:600;">Care call</td>
                                            <td style="font-size:15px; font-weight:600;">Time</td>
                                            <td style="font-size:15px; font-weight:600;"><i class="feather icon-edit"></i> Extra call</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Morning
                                            </td>
                                            <td>
                                                <?php
                                                $result = mysqli_query($conn, "SELECT * FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'Morning' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <a href="./morning-care-calls<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" style=" text-decoration: none; color:#000;">
                                                        <p style="font-size: 16px;" class="mb-0"><?php echo "" . $row['dateTime_in'] . " - " . $row['dateTime_out'] . "";
                                                                                                } ?>
                                                        </p>
                                                    </a>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Extra Morning
                                            </td>
                                            <td>
                                                <?php
                                                $select_extmorning = mysqli_query($conn, "SELECT dateTime_in, dateTime_out FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'EM morning call' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1");
                                                while ($row_extmorning = mysqli_fetch_array($select_extmorning)) {
                                                    $countRes = mysqli_num_rows($select_extmorning);
                                                    $dateTimein = $row_extmorning['dateTime_in'];
                                                    $dateTimeOut = $row_extmorning['dateTime_out'];
                                                    echo "
                                                <a href='./extra-care-call1-46657-587768-0059876?uryyToeSS4=<?php echo $uryyToeSS4; ?>' style='text-decoration: none; font-size:16px; color:#000;'>
                                                    $dateTimein - $dateTimeOut
                                                </a>
                                                ";
                                                } ?>
                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                                <a href='./extra-care-call1-46657-587768-0059876?uryyToeSS4=<?= $uryyToeSS4 ?>' style='text-decoration: none; color:rgba(44, 62, 80,.4);'>
                                                    <i class='feather icon-plus'></i> Add
                                                </a>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                Lunch
                                            </td>
                                            <td>
                                                <?php
                                                $result = mysqli_query($conn,  "SELECT * FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'Lunch' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <a href="./lunch-care-calls<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" style=" text-decoration: none; color:#000;">
                                                        <p style="font-size: 16px;" class="mb-0"><?php echo "" . $row['dateTime_in'] . " - " . $row['dateTime_out'] . "";
                                                                                                } ?>
                                                        </p>
                                                    </a>

                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Extra Lunch
                                            </td>
                                            <td>
                                                <?php
                                                $select_extmorning = mysqli_query($conn, "SELECT dateTime_in, dateTime_out FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'EL lunch call' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1");
                                                while ($row_extmorning = mysqli_fetch_array($select_extmorning)) {
                                                    $countRes = mysqli_num_rows($select_extmorning);
                                                    $dateTimein = $row_extmorning['dateTime_in'];
                                                    $dateTimeOut = $row_extmorning['dateTime_out'];
                                                    echo "
                                                <a href='./extra-care-call2-46657-587768-0059876?uryyToeSS4=<?php echo $uryyToeSS4; ?>' style='text-decoration: none; font-size:16px; color:#000;'>
                                                   $dateTimein - $dateTimeOut
                                                </a>
                                                ";
                                                } ?>
                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                                <a href='./extra-care-call2-46657-587768-0059876?uryyToeSS4=<?= $uryyToeSS4 ?>' style='text-decoration: none; color:rgba(44, 62, 80,.4);'>
                                                    <i class='feather icon-plus'></i> Add
                                                </a>
                                            </td>
                                        </tr>




                                        <tr>
                                            <td>
                                                Tea
                                            </td>
                                            <td>
                                                <?php
                                                $result = mysqli_query($conn, "SELECT * FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'Tea' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <a href="./tea-care-calls<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" style=" text-decoration: none; color:#000;">
                                                        <p style="font-size: 16px;" class="mb-0"><?php echo "" . $row['dateTime_in'] . " - " . $row['dateTime_out'] . "";
                                                                                                } ?></p>
                                                    </a>

                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Extra Tea
                                            </td>
                                            <td>
                                                <?php
                                                $select_extmorning = mysqli_query($conn, "SELECT dateTime_in, dateTime_out FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'ET tea call' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1");
                                                while ($row_extmorning = mysqli_fetch_array($select_extmorning)) {
                                                    $countRes = mysqli_num_rows($select_extmorning);
                                                    $dateTimein = $row_extmorning['dateTime_in'];
                                                    $dateTimeOut = $row_extmorning['dateTime_out'];
                                                    echo "
                                                <a href='./extra-care-call3-46657-587768-0059876?uryyToeSS4=<?php echo $uryyToeSS4; ?>' style='text-decoration: none; font-size:16px; color:#000;'>
                                                    $dateTimein - $dateTimeOut
                                                </a>
                                                ";
                                                } ?>
                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                                <a href='./extra-care-call3-46657-587768-0059876?uryyToeSS4=<?= $uryyToeSS4 ?>' style='text-decoration: none; color:rgba(44, 62, 80,.4);'>
                                                    <i class='feather icon-plus'></i> Add
                                                </a>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>
                                                Bed
                                            </td>
                                            <td>
                                                <?php
                                                $result = mysqli_query($conn, "SELECT * FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'Bed' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <a href="./bed-care-calls<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>" style=" text-decoration: none; color:#000;">
                                                        <p style="font-size: 16px;" class="mb-0"><?php echo "" . $row['dateTime_in'] . " - " . $row['dateTime_out'] . "";
                                                                                                } ?></p>
                                                    </a>

                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Extra Bed
                                            </td>
                                            <td>
                                                <?php
                                                $select_extmorning = mysqli_query($conn, "SELECT dateTime_in, dateTime_out FROM tbl_clienttime_calls WHERE uryyToeSS4='$uryyToeSS4' AND care_calls = 'EB bed call' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1");
                                                while ($row_extmorning = mysqli_fetch_array($select_extmorning)) {
                                                    $countRes = mysqli_num_rows($select_extmorning);
                                                    $dateTimein = $row_extmorning['dateTime_in'];
                                                    $dateTimeOut = $row_extmorning['dateTime_out'];
                                                    echo "
                                                <a href='./extra-care-call4-46657-587768-0059876?uryyToeSS4=<?php echo $uryyToeSS4; ?>' style='text-decoration: none; font-size:16px; color:#000;'>
                                                    $dateTimein - $dateTimeOut
                                                </a>
                                                ";
                                                } ?>
                                            </td>
                                            <td style="font-size:16px; font-weight:600;">
                                                <a href='./extra-care-call4-46657-587768-0059876?uryyToeSS4=<?= $uryyToeSS4 ?>' style='text-decoration: none; color:rgba(44, 62, 80,.4);'>
                                                    <i class='feather icon-plus'></i> Add
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </div>
    <br><br>
</section>