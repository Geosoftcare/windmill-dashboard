<?php

include('header-contents.php');

if (isset($_POST['btnUpdateClientInfo'])) {

    $txtSecondBox = mysqli_real_escape_string($conn, $_REQUEST['txtSecondBox']);
    $txtThirdBox = mysqli_real_escape_string($conn, $_REQUEST['txtThirdBox']);
    $txtFourthBox = mysqli_real_escape_string($conn, $_REQUEST['txtFourthBox']);
    $txtFifthBox = mysqli_real_escape_string($conn, $_REQUEST['txtFifthBox']);
    $txtSixthBox = mysqli_real_escape_string($conn, $_REQUEST['txtSixthBox']);
    $txtSeventhBox = mysqli_real_escape_string($conn, $_REQUEST['txtSeventhBox']);
    $txtEightthBox = mysqli_real_escape_string($conn, $_REQUEST['txtEightthBox']);
    $txtNinethBox = mysqli_real_escape_string($conn, $_REQUEST['txtNinethBox']);
    $txtTenBox = mysqli_real_escape_string($conn, $_REQUEST['txtTenBox']);
    $txtEleventhBox = mysqli_real_escape_string($conn, $_REQUEST['txtEleventhBox']);
    $txtTwelvthBox = mysqli_real_escape_string($conn, $_REQUEST['txtTwelvthBox']);
    $txtThirtenBox = mysqli_real_escape_string($conn, $_REQUEST['txtThirtenBox']);
    $txtFourtenBox = mysqli_real_escape_string($conn, $_REQUEST['txtFourtenBox']);
    $txtFiftenBox = mysqli_real_escape_string($conn, $_REQUEST['txtFiftenBox']);
    $txtcompanyClientId = mysqli_real_escape_string($conn, $_REQUEST['txtcompanyClientId']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    $insert_queryIns = mysqli_query($conn, "UPDATE tbl_general_client_form SET `client_first_name` = '$txtSecondBox', `client_last_name` = '$txtThirdBox', 
    `client_middle_name` = '$txtFourthBox', `client_preferred_name` = '$txtFifthBox', `client_email_address` = '$txtSixthBox', `client_primary_phone` = '$txtSeventhBox', 
    `client_date_of_birth` = '$txtEightthBox', `client_address_line_1` = '$txtNinethBox', `client_address_line_2` = '$txtTenBox', `client_city` = '$txtEleventhBox', `client_county` = '$txtTwelvthBox'
    , `client_poster_code` = '$txtThirtenBox', `client_country` = '$txtFourtenBox', `client_culture_religion` = '$txtFiftenBox' WHERE uryyToeSS4 = '$txtcompanyClientId' AND col_company_Id = '$txtCompanyId' ");
    if ($insert_queryIns) {
        if ($insert_queryIns) {
            header("Location: ./client-details?uryyToeSS4=$txtcompanyClientId");

            unset($txtSecondBox);
            unset($txtThirdBox);
            unset($txtFourthBox);
            unset($txtFifthBox);
            unset($txtSixthBox);
            unset($txtSeventhBox);
            unset($txtEightthBox);
            unset($txtNinethBox);
            unset($txtcompanyClientId);
            unset($txtCompanyId);
        }
    } else {
        header("Location: ./client-details?uryyToeSS4=$txtcompanyClientId");
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
                            <h5 class="m-b-10">Edit client details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    <?php
                    //change this line in your query as well
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyToeSS4 = $_GET['uryyToeSS4'];
                        $sel_team_data_result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        while ($get_team_row = mysqli_fetch_array($sel_team_data_result)) {
                    ?>

                            <div style="width: 100%; height:auto; text-align:right;">
                                <a href="./client-details?<?php echo "uryyToeSS4=$uryyToeSS4"; ?>" style="text-decoration: none; color:#000;">
                                    <button class="btn btn-info">View details</button>
                                </a>
                            </div>

                            <form action="./edit-client-details-220059-958847-488950?uryyToeSS4=<?php echo $uryyToeSS4; ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                                <input type="hidden" value="<?php echo "" . $_SESSION['usr_compId'] . "" ?>" name="txtCompanyId" />
                                <input type="hidden" value="<?php echo $uryyToeSS4; ?>" name="txtcompanyClientId" />
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <div class="form-group">
                                            <label for="Social number">First name</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_first_name'] . "" ?>" class="form-control" name="txtSecondBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <div class="form-group">
                                            <label for="Employee number">Last name</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_last_name'] . "" ?>" class="form-control" name="txtThirdBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="House number">Middle name</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_middle_name'] . "" ?>" class="form-control" name="txtFourthBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Contract type">Prefered name</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_preferred_name'] . "" ?>" class="form-control" name="txtFifthBox" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputContract">Email<span style="color: red;"></span></label>
                                        <input type="email" class="form-control" value="<?php echo "" . $get_team_row['client_email_address'] . "" ?>" name="txtSixthBox" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Weekly contracted hours">Phone number</label>
                                            <input type="tel" value="<?php echo "" . $get_team_row['client_primary_phone'] . "" ?>" class="form-control" name="txtSeventhBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Weekly contracted hours">Date of birth</label>
                                            <input type="date" value="<?php echo "" . $get_team_row['client_date_of_birth'] . "" ?>" class="form-control" name="txtEightthBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Covid vaccination status">Address line 1 (house no)</label>
                                            <input type="number" value="<?php echo "" . $get_team_row['client_address_line_1'] . "" ?>" class="form-control" name="txtNinethBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label for="Weekly contracted hours">Address line 2 (Street name)</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_address_line_2'] . "" ?>" class="form-control" name="txtTenBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="Weekly contracted hours">City</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_city'] . "" ?>" class="form-control" name="txtEleventhBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Covid vaccination status">County</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_county'] . "" ?>" class="form-control" name="txtTwelvthBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Weekly contracted hours">Postal code</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_poster_code'] . "" ?>" class="form-control" name="txtThirtenBox" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Covid vaccination status">Country</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_country'] . "" ?>" class="form-control" name="txtFourtenBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Covid vaccination status">Culture</label>
                                            <input type="text" value="<?php echo "" . $get_team_row['client_culture_religion'] . "" ?>" class="form-control" name="txtFiftenBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <input style="height: 45px;" type="submit" value="Update details" class="btn btn-primary" name="btnUpdateClientInfo" />
                                    </div>
                            </form>
                </div>
                <div class="col-md-4">


            <?php
                        }
                    }
            ?>
                </div>
            </div>
            <br>
        </div>
    </div>





</div>
<!-- Latest Customers end -->
</div>
<!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>