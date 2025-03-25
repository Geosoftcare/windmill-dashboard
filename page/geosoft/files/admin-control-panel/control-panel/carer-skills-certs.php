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
                        $result = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE uryyTteamoeSS4='$uryyTteamoeSS4' ");
                        while ($row = mysqli_fetch_array($result)) { ?>


                            <div class="row">

                                <div class="col-lg-2"></div>



                                <div class="col-lg-8">

                                    <h5>Skills</h5>
                                    <a href="./add-carer-certificates<?php echo "?uryyTteamoeSS4=" . $row['uryyTteamoeSS4'] . "" ?>" style="text-decoration: none; position:absolute; right:17px;">
                                        <button class="btn btn-primary">Add</button>
                                    </a>
                                    <br><br>
                                    <div class="card mb-4">
                                        <div class="card-body" style="font-size: 16px;">
                                            <div class="row">
                                                <div class="col-sm-5 col-4">
                                                    <p style="font-size: 16px;" class="mb-0"><strong>Name</strong></p>
                                                </div>
                                                <div class="col-sm-3 col-3">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><strong>Document</strong></p>
                                                </div>
                                                <div class="col-sm-2 col-3">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><strong>Added</strong></p>
                                                </div>
                                                <div class="col-sm-2 col-2">
                                                    <p style="font-size: 16px;" class="text-muted mb-0"><strong>Expire</strong></p>
                                                </div>
                                            </div>
                                            <hr>

                                            <?php
                                            if (isset($_GET['uryyTteamoeSS4'])) {
                                                $uryyTteamoeSS4 = $_GET['uryyTteamoeSS4'];
                                                $result = mysqli_query($conn, "SELECT * FROM tbl_team_certificates WHERE uryyTteamoeSS4='$uryyTteamoeSS4' ");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "
                                               
                                            <div class='row'>
                                                <div class='col-sm-5 col-4'>
                                                    <p style='font-size: 16px;' class='mb-0'>" . $row['cert_name'] . "</p>
                                                </div>
                                                <div class='col-sm-3 col-3'>
                                                    <a target='_blank' title='" . $row['cert_file'] . "' href='./Certificates/" . $row['cert_file'] . "' onclick='window.open('" . $row['cert_file'] . ".pdf', '_blank', 'fullscreen=yes'); return false;'>
                                                        Certificate Mad...
                                                    </a>
                                                </div>
                                                <div class='col-sm-2 col-3'>
                                                    <p style='font-size: 14px;' class='text-muted mb-0'>" . $row['dateUpload'] . "</p>
                                                </div>
                                                <div class='col-sm-2 col-2'>
                                                    <p style='font-size: 14px;' class='text-muted mb-0'>" . $row['cert_expire'] . "</p>
                                                </div>
                                            </div>
                                            <hr>
                                        ";
                                                }
                                            }
                                            ?>
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