<?php

include('client-header-contents.php');

if (isset($_POST['btnSaveNoK'])) {

    $target = "lpa_documents/" . basename($_FILES['file']['name']);

    $txtFirstName = mysqli_real_escape_string($conn, $_REQUEST['txtFirstName']);
    $txtLastName = mysqli_real_escape_string($conn, $_REQUEST['txtLastName']);
    $txtRelationship = mysqli_real_escape_string($conn, $_REQUEST['txtRelationship']);
    $txtPhonenumber = mysqli_real_escape_string($conn, $_REQUEST['txtPhonenumber']);
    $txtTypeofcontact = mysqli_real_escape_string($conn, $_REQUEST['txtTypeofcontact']);
    $txtEamilAddress = mysqli_real_escape_string($conn, $_REQUEST['txtEamilAddress']);

    $txtStatement = mysqli_real_escape_string($conn, $_REQUEST['txtStatement']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);
    $lpa_file =  mysqli_real_escape_string($conn, $_FILES['file']['name']);

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_nok (col_first_name, col_last_name, col_relationship, col_phone_number, col_type_ofContact, nok_emailaddress, col_client_statement, lpa_documents, uryyToeSS4, col_company_Id) VALUES('" . $txtFirstName . "', '" . $txtLastName . "', '" . $txtRelationship . "', '" . $txtPhonenumber . "', '" . $txtTypeofcontact . "', '" . $txtEamilAddress . "', '" . $txtStatement . "', '" . $lpa_file . "', '" . $txtClientId . "', '" . $_SESSION['usr_compId'] . "') ");
    if ($queryIns) {
        if ($lpa_file) {

            if (is_uploaded_file($_FILES['file']['tmp_name']) and copy($_FILES['file']['tmp_name'], $target)) {
                header("Location: ../client-details?uryyToeSS4=$txtClientId");

                unset($txtFirstName);
                unset($txtLastName);
                unset($txtRelationship);
                unset($txtPhonenumber);
                unset($txtTypeofcontact);
                unset($txtEamilAddress);
                unset($txtStatement);
                unset($txtClientId);
            }
        } else {
            header("Location: ../client-details?uryyToeSS4=$txtClientId");
        }
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
                            <h5 class="m-b-10">NoK / emergency contacts</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">

            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-8">

                    <!--///////////////////////////////////////////Client next of kin details////////////////////////////////////////-->
                    <br>
                    <h5>Emergency contact</h5>
                    <?php
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyToeSS4 = $_GET['uryyToeSS4'];
                    ?>

                        <div style='width: 100%; height:auto; text-align:right;'>
                            <a href="./add-client-next-of-kin?<?php echo "uryyToeSS4=$uryyToeSS4" ?>" style="text-decoration: none; color:#000;">
                                <button class="btn btn-primary"><i class="feather icon-plus"></i> Add details</button>
                            </a>
                        </div>


                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tbl_client_nok WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId ASC LIMIT 1 ");
                        while ($row = mysqli_fetch_array($result)) {
                            $lastUpdate = date('d M, Y', strtotime("" . $row['dateTime'] . ""));
                        ?>

                            <div style='width: 100%; height:auto; text-align:right;'>
                                <br>
                                <a href="./edit-next-of-kin-263554-588577-9000494-0598i769?<?php echo "uryyToeSS4=$uryyToeSS4" ?>" style="text-decoration: none; color:#000;">
                                    <button class="btn btn-secondary"><i class="feather icon-edit"></i> Edit</button>
                                </a>
                            </div>

                            <div class="card mb-4">
                                <div class="card-body" style="font-size: 16px;">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_first_name'] . " " . $row['col_last_name'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Relationship</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_relationship'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_phone_number'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Type of contact</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_type_ofContact'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Email address</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['nok_emailaddress'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Documents</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0">
                                                <a href="<?php echo "" . $row['lpa_documents'] . "" ?>"><?php echo "" . $row['lpa_documents'] . "" ?></a>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Data updated</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo $lastUpdate; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Statement</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_client_statement'] . " ";
                                                                                            } ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!--///////////////////////////////////////////Client next of kin details////////////////////////////////////////-->

                            <?php
                            $sel_check_count_rows_result = mysqli_query($conn, "SELECT * FROM tbl_client_nok WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                            $row_checker_result = mysqli_num_rows($sel_check_count_rows_result);
                            if ($row_checker_result >= 2) {
                            ?>


                                <br>
                                <h5>Emergency contact</h5>

                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM tbl_client_nok WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1 ");
                                while ($row = mysqli_fetch_array($result)) {
                                    $lastUpdate = date('d M, Y', strtotime("" . $row['dateTime'] . ""));
                                ?>

                                    <div style='width: 100%; height:auto; text-align:right;'>
                                        <a href="./edit-next-of-kin-263554-588577-9000494-0598i7222?<?php echo "uryyToeSS4=$uryyToeSS4" ?>" style="text-decoration: none; color:#000;">
                                            <button class="btn btn-secondary"><i class="feather icon-edit"></i> Edit</button>
                                        </a>
                                    </div>

                                    <div class="card mb-4">
                                        <div class="card-body" style="font-size: 16px;">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Name</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_first_name'] . " " . $row['col_last_name'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Relationship</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_relationship'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_phone_number'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Type of contact</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_type_ofContact'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Email address</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['nok_emailaddress'] . "" ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Documents</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0">
                                                        <a href="<?php echo "" . $row['lpa_documents'] . "" ?>"><?php echo "" . $row['lpa_documents'] . "" ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Data updated</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo $lastUpdate; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <p style="font-size: 16px;" class="mb-0">Statement</p>
                                                </div>
                                                <div class="col-sm-7">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_client_statement'] . "" ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php };
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