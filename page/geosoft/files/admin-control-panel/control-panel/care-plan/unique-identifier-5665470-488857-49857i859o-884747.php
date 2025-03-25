<?php

include('client-header-contents.php');

if (isset($_POST['btnUpdateClientInfo'])) {

    $txtSecondBox = mysqli_real_escape_string($conn, $_REQUEST['txtSecondBox']);
    $txtthirdBox = mysqli_real_escape_string($conn, $_REQUEST['txtthirdBox']);
    $txtcompanyClientId = mysqli_real_escape_string($conn, $_REQUEST['txtcompanyClientId']);
    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    $insert_queryIns = mysqli_query($conn, "UPDATE tbl_general_client_form SET `col_swn_number` = '$txtSecondBox', `col_second_phone` = '$txtthirdBox' WHERE uryyToeSS4 = '$txtcompanyClientId' AND col_company_Id = '$txtCompanyId' ");
    if ($insert_queryIns) {
        if ($insert_queryIns) {
            header("Location: ../client-details?uryyToeSS4=$txtcompanyClientId");

            unset($txtSecondBox);
            unset($txtthirdBox);
            unset($txtcompanyClientId);
            unset($txtCompanyId);
        }
    } else {
        header("Location: ../client-details?uryyToeSS4=$txtcompanyClientId");
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
                            <h5 class="m-b-10">Unique identifier</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">

            <br>
            <h5>Social worker unique identifier</h5>

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

                    <form action="./unique-identifier-5665470-488857-49857i859o-884747?uryyToeSS4=<?php echo $uryyToeSS4; ?>" method="post" enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" value="<?php echo "" . $_SESSION['usr_compId'] . "" ?>" name="txtCompanyId" />
                        <input type="hidden" value="<?php echo $uryyToeSS4; ?>" name="txtcompanyClientId" />

                        <?php
                        $sel_team_data_result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                        while ($get_team_row = mysqli_fetch_array($sel_team_data_result)) {
                        ?>

                            <div class='row'>
                                <div class='col-lg-8 col-8'>
                                    <div class='form-group'>
                                        <label for='Social number'>Unique client identifier</label>
                                        <input type='text' value='<?php echo "" . $get_team_row['col_swn_number'] . ""; ?>' class='form-control' name='txtSecondBox' />
                                    </div>

                                    <div class='form-group'>
                                        <label for='Social number'>Client other phone number</label>
                                        <input type='tel' value='<?php echo "" . $get_team_row['col_second_phone'] . "";
                                                                } ?>' class='form-control' name='txtthirdBox' />
                                    </div>
                                </div>
                            </div>

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