<?php
include('client-header-contents.php');
if (isset($_POST['btnSaveClientMdForm'])) {

    $target = "./DNAR/" . basename($_FILES['file']['name']);

    $txtNhsNumber = mysqli_real_escape_string($conn, $_REQUEST['txtNhsNumber']);
    $txtMedicalsupport = mysqli_real_escape_string($conn, $_REQUEST['txtMedicalsupport']);
    $file = mysqli_real_escape_string($conn, $_FILES['file']['name']);

    $txtAllergiesInfo = mysqli_real_escape_string($conn, $_REQUEST['txtAllergiesInfo']);
    $txtGPsname = mysqli_real_escape_string($conn, $_REQUEST['txtGPsname']);
    $txtPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['txtPhoneNumber']);
    $txtEmailAddress = mysqli_real_escape_string($conn, $_REQUEST['txtEmailAddress']);
    $txtAddress = mysqli_real_escape_string($conn, $_REQUEST['txtAddress']);

    $txtPharmacyname = mysqli_real_escape_string($conn, $_REQUEST['txtPharmacyname']);
    $txtPharmacyPhone = mysqli_real_escape_string($conn, $_REQUEST['txtPharmacyPhone']);
    $txtPharmacyAddress = mysqli_real_escape_string($conn, $_REQUEST['txtPharmacyAddress']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);

    if (is_uploaded_file($_FILES['file']['tmp_name']) && copy($_FILES['file']['tmp_name'], $target)) {
        $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_medical (col_nhs_number, col_medical_support, col_dnar, col_allergies, col_gp_name, 
        col_phone_number, gp_email_address, gp_address, col_pharmancy_name, pharmacy_phone, col_pharmancy_address, uryyToeSS4, 
        col_company_Id) VALUES('" . $txtNhsNumber . "', '" . $txtMedicalsupport . "', '" . $file . "', '" . $txtAlergiesInto . "', '" . $txtGPsname . "', 
        '" . $txtPhoneNumber . "', '" . $txtEmailAddress . "', '" . $txtAddress . "', '" . $txtPharmacyname . "', '" . $txtPharmacyPhone . "', 
        '" . $txtPharmacyadd . "', '" . $txtClientId . "', '" . $_SESSION['usr_compId'] . "') ");
        if ($queryIns) {
            header("Location: ./client-medical-form?uryyToeSS4=$txtClientId");
        }
    } else {
        echo "File copy unsuccessful";
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

    .upload-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .upload-button:hover {
        background-color: #45a049;
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
                            <h5 class="m-b-10">Medical Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div style="width: 100%; height:auto; text-align:right;">
                        <a href="./client-medical-form?<?php echo "uryyToeSS4=$uryyToeSS4" ?>" style="text-decoration: none; color:#000;">
                            <button class="btn btn-info">View details</button>
                        </a>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <h5>Health details</h5>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="NHS Number">NHS number</label>
                                    <input type="text" class="form-control" placeholder="NHS Number" name="txtNhsNumber" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="Medical support">Medical support</label>
                                    <input type="text" class="form-control" placeholder="Medical support" name="txtMedicalsupport" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label id="FormLabel" for="Profile picture">DNAR</label>
                                    <h5>Upload DNAR File (Screenshots, document, images, etc.)</h5>
                                    <div style="justify-content:center; align-items:center; display:flex; text-align:center; border:2px dashed rgba(41, 128, 185,1.0); width: 100%; height:200px; padding:22px;">
                                        <input style="display: none;" type="file" id="file-input" name="file">
                                        <label for="file-input" class="upload-button">Browse File</label>
                                    </div>
                                    <span style="font-weight: 800;" id="file-name">No file selected</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <h5>Allergies and intolerances</h5>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="Allergies and intolerances">Allergies and intolerances</label>
                                    <input type="text" class="form-control" placeholder="Allergies and intolerances" required name="txtAllergiesInfo" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <h5>Doctor/GP</h5>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="GP's name">GP's name</label>
                                    <input type="text" class="form-control" placeholder="GP's name" required name="txtGPsname" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="Phone number">Phone number</label>
                                    <input type="tel" class="form-control" placeholder="Phone number" required name="txtPhoneNumber" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="Email address">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email address" name="txtEmailAddress" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="txtAddress" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <h5>Pharmacist</h5>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="Pharmacy name">Pharmacy name</label>
                                    <input type="text" class="form-control" placeholder="Pharmacy name" name="txtPharmacyname" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="Pharmacy phone">Pharmacy phone</label>
                                    <input type="tel" class="form-control" placeholder="Pharmacy phone" name="txtPharmacyPhone" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="Pharmacy address">Pharmacy address</label>
                                    <input type="text" class="form-control" placeholder="Pharmacy address" name="txtPharmacyAddress" />
                                </div>
                            </div>
                        </div>

                        <input type="hidden" value="<?php echo $uryyToeSS4; ?>" name="txtClientId" />
                        <div class="form-group">
                            <input type="submit" value="Save details" class="btn btn-primary btn-lg" name="btnSaveClientMdForm" />
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
<script>
    const fileInput = document.getElementById('file-input');
    const fileNameDisplay = document.getElementById('file-name');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = 'No file chosen';
        }
    });
</script>

<?php include('footer-contents.php'); ?>