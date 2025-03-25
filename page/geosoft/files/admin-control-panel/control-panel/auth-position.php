<?php include('header-contents.php'); ?>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add new position</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Psition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- prject ,team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Add more position</h5>
                    </div>
                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
                        Position already exist
                    </div>
                    <form method="POST" action="./auth-position" enctype="multipart/form-data" name="addClient-form" autocomplete="off">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="client-form-body" style="width:100%; height:auto; padding:22px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Position</label>
                                                <select name="txtPositionName" required class="form-control" id="exampleFormControlSelect1">
                                                    <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                    <option value="Health Care Assistant">Health care assistant</option>
                                                    <option value="Support worker">Support worker</option>
                                                    <option value="Personal assistant">Personal assistant</option>
                                                    <option value="Senior care assistant">Senior care assistant</option>
                                                    <option value="Live in carer">Live in care</option>
                                                    <option value="kitchen assistant">kitchen assistant</option>
                                                    <option value="Senior Carer">Senior Carer</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Deputy manager">Deputy manager</option>
                                                    <option value="Care co-ordinator">Care co-ordinator</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Position</label>
                                                <textarea name="txtPositionDetails" required id="exampleInputPassword1" class="form-control" rows="5" placeholder="Add task"></textarea>
                                            </div>

                                            <div style="padding: 0px 0px 0px 15px;" class="form-group">
                                                <button type="submit" name="btnSubmitPosition" class="btn btn-primary">Add more position</button>
                                            </div>
                                        </div>

                                        <div class="col-md-7">

                                            <h4>Position(s)</h4>
                                            <br>

                                            <div class="card table-card">
                                                <div class="card-header">
                                                    <div class="card-header-right">
                                                        <div class="btn-group card-option">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-horizontal"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">


                                                    <?php
                                                    include('dbconnect.php');

                                                    //change this line in your query as well
                                                    $result = mysqli_query($myConnection, "SELECT * FROM tbl_position ORDER BY position_Id DESC LIMIT 20");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "
                                                   
                                                            <div style='padding:12px;' class='form-group'>
                                                                <h5>" . $row['position_name'] . "</h5>
                                                                <div style='width: 100%; font-size:16px; padding:6px;''>" . $row['position_details'] . "</div>
                                                            </div>
                                                            ";
                                                    }
                                                    ?>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            <?php include('bottom-panel-block.php'); ?>








        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>


<?php include('footer-contents.php'); ?>