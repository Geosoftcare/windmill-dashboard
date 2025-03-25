<?php
include('client-header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
    $sql_client_name = mysqli_query($conn, "SELECT `client_first_name`,`client_last_name` FROM `tbl_general_client_form` 
    WHERE (uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
    $row_client_name = mysqli_fetch_array($sql_client_name, MYSQLI_ASSOC);
    $varClientFirstName = $row_client_name['client_first_name'];
    $varClientLastName = $row_client_name['client_last_name'];
}
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h4>Funding
            <br>
            <small><?php echo $varClientFirstName . ' ' . $varClientLastName ?> funding plan</small>
        </h4>
        <hr>
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <div class="form-cover" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding:25px 15px 25px 15px; border-radius:12px;">
                    <h5>
                        <span style="background-color:rgba(189, 195, 199,.3); padding:6px; cursor:pointer; font-size:22px;" onclick="history.back();"><strong>&larr;</strong></span>
                        <span>Funding arrangements</span>
                    </h5>
                    <hr>
                    <div class="card">
                        <div class="card-body" style="font-size: 16px;">
                            <p class="card-text" style="font-size: 16px;">
                                Current funding
                            </p>
                            <div style="width: 100%; height:auto; padding:15px; background-color:rgba(26, 188, 156,.9); color:#fff; font-weight:600; border-left: 30px solid rgba(22, 160, 133,1.0);">
                                <?php
                                $sql_get_funding_details = mysqli_query($conn, "SELECT * FROM `tbl_funding` WHERE (uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                while ($row_get_funding_details = mysqli_fetch_array($sql_get_funding_details)) {
                                    $varGetFundingType = $row_get_funding_details['col_invoice_format'];
                                    print '<h6><strong>&#9758; ' . $varGetFundingType . '</strong><h6>';
                                }
                                ?>
                            </div>
                            <br>
                            <p class="card-text" style="font-size: 16px;">
                                Please select one or more funding options:
                            </p>

                            <form action="./processing-client-funding" method="POST" id="clientFundForm" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                <div class="list-group list-group-light">

                                    <div class="form-group">
                                        <input form="clientFundForm" type="hidden" name="txtClientFullName" value="<?php echo $varClientFirstName . ' ' . $varClientLastName; ?>" />
                                        <input form="clientFundForm" type="hidden" name="txtClientId" value="<?php echo $uryyToeSS4; ?>" />
                                        <input form="clientFundForm" type="hidden" name="txtCompanyId" value="<?php echo "" . $_SESSION['usr_compId'] . ""; ?>" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6">
                                            <li id="fundingCheckboxList" class="list-group-item">
                                                <input form="clientFundForm" name="txtLAFunding" class="form-check-input" type="checkbox" value="Local Authority" id="checkboxExample1" />
                                                &nbsp; &nbsp;
                                                <label class="form-check-label" for="checkboxExample1">Local Authority</label>
                                            </li>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <li class="list-group-item">
                                                <input form="clientFundForm" name="txtPrivateFunding" class="form-check-input" type="checkbox" value="Private" id="checkboxExample2" />
                                                &nbsp; &nbsp;
                                                <label class="form-check-label" for="checkboxExample2">Private</label>
                                            </li>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <li class="list-group-item">
                                                <input form="clientFundForm" name="txtNHSFunding" class="form-check-input" type="checkbox" value="NHS" id="checkboxExample3" />
                                                &nbsp; &nbsp;
                                                <label class="form-check-label" for="checkboxExample3">NHS</label>
                                            </li>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <li class="list-group-item">
                                                <input form="clientFundForm" name="txtOrderFunding" class="form-check-input" type="checkbox" value="Order" id="checkboxExample4" />
                                                &nbsp; &nbsp;
                                                <label class="form-check-label" for="checkboxExample4">Order</label>
                                            </li>
                                        </div>
                                    </div>
                                </div>


                                <br><br>
                                <div class="form-group">
                                    <h5>Local authority ID</h5>
                                    <?php
                                    $sql_local_auth = mysqli_query($conn, "SELECT `col_local_auth` FROM `tbl_funding` WHERE (uryyToeSS4 = '$uryyToeSS4' AND `col_company_Id` = '" . $_SESSION['usr_compId'] . "') ");
                                    $row_local_auth = mysqli_fetch_array($sql_local_auth, MYSQLI_ASSOC);
                                    $varLocalAuth = $row_local_auth['col_local_auth'];
                                    ?>
                                    <input form="clientFundForm" type="text" class="form-control" name="txtLocalAuthority" value="<?php echo "" . $varLocalAuth . ""; ?>" />
                                </div>

                                <button form="clientFundForm" class="btn btn-info" name="btnSaveClientFunding" type="submit">Save funding</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3"></div>
        </div>
        <!-- [ delete box ] end -->
    </div>
</div>


<?php include('footer-contents.php'); ?>