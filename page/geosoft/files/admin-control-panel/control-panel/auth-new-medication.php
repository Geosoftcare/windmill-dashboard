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
                            <h5 class="m-b-10">Add new medicine</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Medicine</a></li>
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
                        <h5>Add more medicine</h5>
                    </div>
                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
                        Medicine already exist
                    </div>
                    <form method="POST" action="./auth-new-medication" enctype="multipart/form-data" name="addClient-form" autocomplete="off">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="client-form-body" style="width:100%; height:auto; padding:22px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Medicine name</label>
                                                <input name="txtMedName" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Dosage</label>
                                                <input name="txtMedDosage" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Dosage">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Type</label>
                                                <select name="txtMedType" required class="form-control" id="exampleFormControlSelect1">
                                                    <option value="" selected="selected" disabled="disabled">--Select Option--</option>
                                                    <option value="Tablets">Tablets</option>
                                                    <option value="General cream">General cream</option>
                                                    <option value="Capsule">Capsule</option>
                                                    <option value="Syrup">Syrup</option>
                                                    <option value="Body cream">Body cream</option>
                                                    <option value="Harm cream">Harm cream</option>
                                                    <option value="Let cream">Let cream</option>
                                                    <option value="Face cream">Face cream</option>
                                                    <option value="Barrier cream">Barrier cream</option>
                                                    <option value="Cream">Cream</option>
                                                    <option value="Air spray">Air spray</option>
                                                    <option value="Air freshner">Air freshner</option>
                                                    <option value="Body spray">Body spray</option>
                                                    <option value="Perfume">Perfume</option>
                                                    <option value="Patches">Patches</option>
                                                    <option value="Oral Solution">Oral Solution</option>
                                                    <option value="Roll-on deodorants">Roll-on deodorants</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div style="padding: 0px 0px 0px 15px;" class="form-group">
                                                <button type="submit" name="btnSubmitNewMed" class="btn  btn-primary">Add more medicine</button>
                                            </div>
                                        </div>

                                        <div class="col-md-8">

                                            <h4>Medication</h4>
                                            <br>

                                            <div class="card table-card">
                                                <div class="card-header">
                                                    <h5>Recent meds</h5>
                                                    <div class="card-header-right">
                                                        <div class="btn-group card-option">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-horizontal"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Medicine name</th>
                                                                    <th>Dosage</th>
                                                                    <th>Type</th>
                                                                    <th class="text-right">Decision</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                include('dbconnect.php');
                                                                //change this line in your query as well
                                                                $result = mysqli_query($myConnection, "SELECT * FROM tbl_medication_list ORDER BY med_Id DESC LIMIT 20");
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    echo "
                                                   

                                                            <tr>
                                                                <td>

                                                                    <div class='d-inline-block align-middle'>
                                                                        <div class='d-inline-block'>
                                                                            <h6>" . $row['med_name'] . "</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>" . $row['med_dosage'] . "</td>
                                                                <td>" . $row['med_type'] . "</td>
                                                                <td class='text-right'>
                                                                    <a href=''> <button type='button' class='btn  btn-danger btn-sm'>Delete</button> </a>
                                                                </td>
                                                            </tr>
                                                            ";
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
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