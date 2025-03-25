<?php
include('client-header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-6">
                <h5>Schedule new inactivity</h5>
                <hr>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="Temporary" aria-selected="true">Temporary</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="Permanent" aria-selected="false">Permanent</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body" style="font-size: 16px;background-color: rgba(189, 195, 199,.2);">
                                <p class="card-text" style="font-size: 16px;">
                                    <span onclick="history.back();" style="font-size:25px; background-color:rgba(189, 195, 199,.1); cursor:pointer; padding:2px 8px 2px 8px;">&larr; </span> &nbsp;
                                    <span style="font-size:19px;">Temporary</span>
                                </p>
                                <div class="alert alert-info" role="alert">
                                    <h5 class="alert-heading">Notice!</h5>
                                    <p style="font-size:16px;">Any visits scheduled to start during the period of inactivity will be cancelled automatically. Visits that are due to start before this period of inactivity will not be cancelled.</p>
                                    <hr>
                                    <p class="mb-0">Do you still wish to proceed with this decision?</p>
                                </div>
                                <form action="./processing-client-status-temporary" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                    <div class="form-group">
                                        <input type="hidden" name="txtClientId" value="<?php echo $uryyToeSS4; ?>" />
                                        <input type="hidden" name="txtCompanyId" value="<?php echo "" . $_SESSION['usr_compId'] . ""; ?>" />
                                        <label style="font-size:14px; font-weight:600;" for="For reasons">Reasons</label>
                                        <select style="height: 50px;" name="txtReasonForTemporary" class="form-control" required id="">
                                            <option value="--Select options--">--Reasons--</option>
                                            <option value="Active">Active</option>
                                            <option value="Hospitalized">Hospitalized</option>
                                            <option value="Holiday">Holiday</option>
                                            <option value="With family">With family</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:14px; font-weight:600;" for="For reasons">Note</label>
                                        <textarea name="txtNoteForTemporary" class="form-control" rows="4" style="resize: none;" placeholder="Note" id=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-sm-6">
                                            <div class="form-group">
                                                <label style="font-size:14px; font-weight:600;" for="For start date">Start date<span style="color:red;">*</span></label>
                                                <input type="date" value="<?php $today; ?>" name="txtStartDate" class="form-control" required id="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-sm-6">
                                            <div class="form-group">
                                                <label style="font-size:14px; font-weight:600;" for="For end date">End date <i style="color:rgba(189, 195, 199,.9);">Optional</i></label>
                                                <input type="date" value="<?php $tomorrow; ?>" name="txtEndDate" class="form-control" id="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" name="btnStatusTemporary" type="submit">Continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-body" style="font-size: 16px;background-color: rgba(189, 195, 199,.2);">
                                <p class="card-text" style="font-size: 16px;">
                                    <span onclick="history.back();" style="font-size:25px; background-color:rgba(189, 195, 199,.1); cursor:pointer; padding:2px 8px 2px 8px;">&larr; </span> &nbsp;
                                    <span style="font-size:19px;">Permanently</span>
                                </p>
                                <div class="alert alert-danger" role="alert">
                                    <h5 class="alert-heading">Notice!</h5>
                                    <p style="font-size:16px;">All visit schedules will be stopped when the permanent inactivity starts. Any visits that are due to start before this period of inactivity will not be cancelled.</p>
                                    <hr>
                                    <p class="mb-0">Do you still wish to proceed with this decision?</p>
                                </div>
                                <form action="./processing-client-status-permanently" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                    <div class="form-group">
                                        <input type="hidden" name="txtClientId" value="<?php echo $uryyToeSS4; ?>" />
                                        <input type="hidden" name="txtCompanyId" value="<?php echo "" . $_SESSION['usr_compId'] . ""; ?>" />
                                        <label style="font-size:14px; font-weight:600;" for="For reasons">Reasons</label>
                                        <select style="height: 50px;" name="txtReasonForPermanent" class="form-control" required id="">
                                            <option value="--Select options--">--Reasons--</option>
                                            <option value="Active">Active</option>-
                                            <option value="Deceased">Deceased</option>
                                            <option value="Left Service">Left Service</option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="font-size:14px; font-weight:600;" for="For reasons">Note</label>
                                        <textarea name="txtNoteForPermanent" class="form-control" rows="4" style="resize: none;" placeholder="Note" id=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6 col-sm-6">
                                            <div class="form-group">
                                                <label style="font-size:14px; font-weight:600;" for="For start date">Start date<span style="color:red;">*</span></label>
                                                <input type="date" value="<?php $today; ?>" name="txtStartDate" class="form-control" required id="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-sm-6"></div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" name="btnStatusPermanent" type="submit">Continue</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">ssas</div>-->
                </div>
            </div>
            <div class="col-md-4 col-xl-3"></div>
        </div>
        <!-- [ delete box ] end -->
    </div>
</div>


<?php include('footer-contents.php'); ?>