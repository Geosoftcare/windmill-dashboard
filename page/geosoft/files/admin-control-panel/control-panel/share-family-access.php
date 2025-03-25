<?php include('client-header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <h5>Share Family Access</h5>
                <hr>
                <?php
                if (isset($_GET['uryyToeSS4'])) {
                    $uryyToeSS4 = $_GET['uryyToeSS4'];
                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' 
                    AND col_company_id = '" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1");
                    while ($row = mysqli_fetch_array($result)) {
                ?>

                        <div class="card">
                            <h5 class="card-header">Send to recipient</h5>
                            <div class="card-body" style="font-size: 16px;">

                                <form action="./processing-share-access" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                    <div class="form-group">
                                        <input type="email" name="txtRecipient_Email" placeholder="Recipient email" class="form-control" required />
                                    </div>
                                    <input type="hidden" name="txtInviteeEmail" value="geosoftcare@geosoftcare.co.uk">
                                    <div class="form-group">
                                        <textarea name="txtShareCode" style="resize: none;" id="" cols="" rows="6" class="form-control" required>Hello. I hope this message finds you well. Please find the share access link attached. This link has been provided to allow you view <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?> care details. It ensures you have up-to-date and transparent information regarding their care plan and progress. If you have any questions or need assistance accessing the link, feel free to reach out.</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="txtShareUrl" value="https://geosoftcare.co.uk/page/geosoft/files/admin-control-panel/control-panel/shared-access/shared/access/client-visit?uryyToeSS4=<?php echo "" . $row['uryyToeSS4'] . ""; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="txtCompanySpecialId" value="<?php echo "" . $row['uryyToeSS4'] . "";
                                                                                            }
                                                                                        } ?>">
                                    </div>
                                    <button class="btn btn-primary btn-lg" name="btnshareAccessCode" type="submit">Send access</button>
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