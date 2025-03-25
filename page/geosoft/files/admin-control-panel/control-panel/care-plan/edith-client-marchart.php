<?php
include('client-header-contents.php');
if (isset($_GET['med_Id'])) {
    $med_Id = $_GET['med_Id'];
}
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" class="col-md-4 col-xl-7">
                <h5 class="m-3 font-bold"><strong>Edit marChart</strong></h5>
                <hr>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">

                        <form action="./processing-update-marchart" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM tbl_finished_meds WHERE med_Id = '$med_Id' 
                            AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ORDER BY med_Id DESC ");
                            while ($trans = mysqli_fetch_array($result)) { ?>
                                <input type="hidden" value="<?php echo "" . $trans['uryyToeSS4'] . ""; ?>" name="txtClientId">
                                <input type="hidden" value="<?php echo "" . $trans['med_Id'] . "";
                                                        } ?>" name="txtClientMedId">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Outcome<span style="color: red;">*</span></label>
                                    <select name="txtOutcome" required class="form-control resize-none" id="exampleFormControlSelect1">
                                        <option value="Null">--Select option--</option>
                                        <option value="Maybe taken">Maybe taken</option>
                                        <option value="Not taken">Not taken</option>
                                        <option value="Partially taken">Partially taken</option>
                                        <option value="Fully taken">Fully taken</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <!--<div class="form-group">
                                        <label for="exampleFormControlTextarea1">Reason<span style="color: red;">*</span></label>
                                        <select name="txtReason" required class="form-control" id="exampleFormControlSelect1">
                                            <option value="Null">--Select option--</option>
                                            <option value="Medication unavailable">Medication unavailable</option>
                                            <option value="Destroyed">Destroyed</option>
                                            <option value="Missing">Missing</option>
                                            <option value="Not neccessary">Not neccessary</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>-->
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Note<span style="color: red;">*</span></label>
                                    <textarea style="resize: none;" name="txtMarchartNote" id="" cols="" rows="6" class="form-control resize-none" required></textarea>
                                </div>

                                <button class="btn btn-primary" name="btnUpdateMarChart" type="submit">Update marChart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3"></div>
        </div>
        <!-- [ delete box ] end -->
    </div>
</div>


<?php include('footer-contents.php'); ?>