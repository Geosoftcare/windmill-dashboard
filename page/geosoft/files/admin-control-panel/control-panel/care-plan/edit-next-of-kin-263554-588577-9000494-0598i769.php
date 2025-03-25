<?php

include('client-header-contents.php');

if (isset($_POST['btnUpdateClientInfo'])) {

    $txtSecondBox = mysqli_real_escape_string($conn, $_REQUEST['txtSecondBox']);
    $txtThirdBox = mysqli_real_escape_string($conn, $_REQUEST['txtThirdBox']);
    $txtFourthBox = mysqli_real_escape_string($conn, $_REQUEST['txtFourthBox']);
    $txtFifthBox = mysqli_real_escape_string($conn, $_REQUEST['txtFifthBox']);
    $txtSixthBox = mysqli_real_escape_string($conn, $_REQUEST['txtSixthBox']);
    $txtSeventhBox = mysqli_real_escape_string($conn, $_REQUEST['txtSeventhBox']);
    $txtEightthBox = mysqli_real_escape_string($conn, $_REQUEST['txtEightthBox']);
    $txtNinethBox = mysqli_real_escape_string($conn, $_REQUEST['txtNinethBox']);
    $txtRowDataId = mysqli_real_escape_string($conn, $_REQUEST['txtRowDataId']);
    $txtcompanyClientId = mysqli_real_escape_string($conn, $_REQUEST['txtcompanyClientId']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    $insert_queryIns = mysqli_query($conn, "UPDATE tbl_client_nok SET `col_first_name` = '$txtSecondBox', `col_last_name` = '$txtThirdBox', 
    `col_relationship` = '$txtFourthBox', `col_phone_number` = '$txtFifthBox', `col_type_ofContact` = '$txtSixthBox', `nok_emailaddress` = '$txtSeventhBox', 
    `col_client_statement` = '$txtEightthBox', `lpa_documents` = '$txtNinethBox' WHERE userId = '$txtRowDataId' AND col_company_Id = '$txtCompanyId' ");
    if ($insert_queryIns) {
        if ($insert_queryIns) {
            header("Location: ./client-next-of-kin?uryyToeSS4=$txtcompanyClientId");

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
        header("Location: ./client-next-of-kin?uryyToeSS4=$txtcompanyClientId");
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
                            <h5 class="m-b-10">Edit next of kin</h5>
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
                    } ?>


                    <div style="width: 100%; height:auto; text-align:right;">
                        <a href="./client-next-of-kin?<?php echo "uryyToeSS4=$uryyToeSS4"; ?>" style="text-decoration: none; color:#000;">
                            <button class="btn btn-info">View details</button>
                        </a>
                    </div>

                    <form action="./edit-next-of-kin-263554-588577-9000494-0598i769?uryyToeSS4=<?php echo $uryyToeSS4; ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" value="<?php echo "" . $_SESSION['usr_compId'] . "" ?>" name="txtCompanyId" />
                        <input type="hidden" value="<?php echo $uryyToeSS4; ?>" name="txtcompanyClientId" />

                        <?php
                        $sel_team_data_result = mysqli_query($conn, "SELECT * FROM tbl_client_nok WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId ASC LIMIT 1");
                        while ($get_team_row = mysqli_fetch_array($sel_team_data_result)) {
                        ?>

                            <div class='row'>
                                <div class='col-lg-6 col-6'>
                                    <div class='form-group'>
                                        <label for='Social number'>First name</label>
                                        <input type='text' value='<?php echo "" . $get_team_row['col_first_name'] . "" ?>' class='form-control' name='txtSecondBox' />
                                    </div>
                                </div>
                                <div class='col-lg-6 col-6'>
                                    <div class='form-group'>
                                        <label for='Employee number'>Last name</label>
                                        <input type='text' value='<?php echo "" . $get_team_row['col_last_name'] . "" ?>' class='form-control' name='txtThirdBox' />
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label for='House number'>Relationship</label>
                                        <input type='text' value='<?php echo "" . $get_team_row['col_relationship'] . "" ?>' class='form-control' name='txtFourthBox' />
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label for='Contract type'>Phone number</label>
                                        <input type='tel' value='<?php echo "" . $get_team_row['col_phone_number'] . "" ?>' class='form-control' name='txtFifthBox' />
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <label for='exampleInputContract'>Type of contact<span style='color: red;'></span></label>
                                    <input type='text' class='form-control' value='<?php echo "" . $get_team_row['col_type_ofContact'] . "" ?>' name='txtSixthBox' />
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label for='Weekly contracted hours'>Email</label>
                                        <input type='email' value='<?php echo "" . $get_team_row['nok_emailaddress'] . "" ?>' class='form-control' name='txtSeventhBox' />
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label for='Weekly contracted hours'>Statement</label>
                                        <input type='text' value='<?php echo "" . $get_team_row['col_client_statement'] . "" ?>' class='form-control' name='txtEightthBox' />
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label for='Covid vaccination status'>LPA Document</label>
                                        <input type='number' value='<?php echo "" . $get_team_row['lpa_documents'] . "" ?>' class='form-control' name='txtNinethBox' />
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <input type='hidden' value='<?php echo "" . $get_team_row['userId'] . "";
                                                        } ?>' name='txtRowDataId' />
                            </div>


                            <br>
                            <hr>
                            <br>



                            <div class=" row">
                                <div class="form-group">
                                    <input style="height: 45px;" type="submit" value="Update details" class="btn btn-primary" name="btnUpdateClientInfo" />
                                </div>
                    </form>
                </div>
                <div class="col-md-4">



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