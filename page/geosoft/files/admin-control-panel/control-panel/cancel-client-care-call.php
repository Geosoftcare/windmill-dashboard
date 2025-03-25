<?php include('client-header-contents.php'); ?>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-6">
                <h5><strong>Cancel visit</strong></h5>
                <hr>
                <div class="alert alert alert-danger" style="font-size: 17px; font-weight: 600;">
                    Are you sure you want to cancel <?php echo $_SESSION['clientName'] . ', ' . $_SESSION['CareCall'] ?> visit?
                    <br>
                    Please note: By taking this action will remove this visit from the carer run and won't be able to attent to it.
                </div>
                <p class="card-text" style="font-size: 16px;"></p>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">
                        <form action="./processing-client-cancel-visit" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                            <div class="row">
                                <input name="txtClientName" value="<?php echo "" . $_SESSION['clientName'] . "" ?>" class="form-control" hidden />
                                <input name="txtClientCareCall" value="<?php echo "" . $_SESSION['CareCall'] . "" ?>" class="form-control" hidden />
                                <input name="txtClientId" value="<?php echo "" . $_SESSION['uryyToeSS4'] . "" ?>" class="form-control" hidden />
                                <input type="hidden" name="clientSpecialId" value="<?php echo "" . $_SESSION['userid'] . ""; ?>" />
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="For date">Cancellation date<span style="font-size:16px; color:red;">*</span></label>
                                        <input type="date" class="form-control" value="<?php echo $today; ?>" required name="txtDateOfVisit" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="For time">Cancellation time<span style="font-size:16px; color:red;">*</span></label>
                                        <input type="time" class="form-control" value="<?php echo $today; ?>" required name="txtTimeOfVisit" />
                                    </div>
                                </div>
                                <div class="col-md-5 col-5">
                                    <div class="form-group">
                                        <label for="For cancellation by">Cancellation by<span style="font-size:16px; color:red;">*</span></label>
                                        <select style="height: 50px;" name="txtCancellationby" class="form-control" required id="">
                                            <option value="Client">Client</option>
                                            <option value="Care manager">Care manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    <div class="form-group">
                                        <label for="For reason">Reason<span style="font-size:16px; color:red;">*</span></label>
                                        <select style="height: 50px;" name="txtClientReason" class="form-control" required id="">
                                            <option value="--Select options--">--Select options--</option>
                                            <option value="Active">Active</option>
                                            <option value="Hospitalized">Hospitalized</option>
                                            <option value="On a trip">On a trip</option>
                                            <option value="With family">With family</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="For date">Pay carer<span style="font-size:16px; color:red;">*</span></label>
                                        <br>
                                        <input type="checkbox" name="txtPayCarer" value="Pay carer" id="txtPayCarer" />
                                        &nbsp;
                                        <span>Pay carer</span>
                                        <br>
                                        <input type="checkbox" name="txtDontPayCarer" value="Don't pay carer" id="txtPayCarer" />
                                        &nbsp;
                                        <span>Don't pay carer</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="For date">Invoice<span style="font-size:16px; color:red;">*</span></label>
                                        <br>
                                        <input type="checkbox" name="txtInvoice" value="Invoice" id="txtPayCarer" />
                                        &nbsp;
                                        <span>Invoice payer</span>
                                        <br>
                                        <input type="checkbox" name="txtDontInvoice" value="Dont Invoice" id="txtPayCarer" />
                                        &nbsp;
                                        <span>Don't invoice payer</span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="For reason">Note</label>
                                        <textarea name="txtcancelNote" class="form-control" required rows="5" placeholder="Kindly state reasons!" id=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <button onclick="history.back();" type="button" class="btn btn-danger">Go back</button>
                            <button class="btn btn-info" name="btnCancelCareCall" type="submit">Cancel call</button>
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