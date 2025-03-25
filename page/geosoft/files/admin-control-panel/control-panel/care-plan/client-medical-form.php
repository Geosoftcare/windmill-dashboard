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

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Medical Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyToeSS4 = $_GET['uryyToeSS4'];
                    ?>

                        <div style="width: 100%; height:auto; text-align:right;">
                            <a href="./add-client-medical?<?php echo "uryyToeSS4=$uryyToeSS4" ?>" style="text-decoration: none; color:#000;">
                                <button class="btn btn-primary">Add details</button>
                            </a>
                        </div>

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM tbl_client_medical WHERE uryyToeSS4='$uryyToeSS4' 
                        AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1 ");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <div class="card mb-4">
                                <div class="card-body" style="font-size: 16px;">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">NHS No</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "<span style='color:orange;'><strong>" . $row['col_nhs_number'] . "</strong></span>" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Medical support</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_medical_support'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">DNAR</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <a href="./DNAR/<?php echo "" . $row['col_dnar'] . "" ?>">
                                                <p style="font-size: 16px;color: #d35400; text-decoration:underline;" class="mb-0"><?php echo "" . $row['col_dnar'] . "" ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Allergies</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_allergies'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">GP Details</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_gp_name'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">GP Phone</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_phone_number'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">GP Email</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['gp_email_address'] . "" ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">GP Address</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <a target="_blank" href="https://www.google.fr/maps/place/<?php echo " " . $row['gp_address'] . ""; ?>">
                                                <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['gp_address'] . ""; ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Pharmacy Details</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_pharmancy_name'] . ""; ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Pharmacy Phone</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['pharmacy_phone'] . ""; ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p style="font-size: 16px;" class="mb-0">Pharmacy Address</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <p style="font-size: 16px;" class="text-muted mb-0"><?php echo "" . $row['col_pharmancy_address'] . "";
                                                                                            }
                                                                                        } ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
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