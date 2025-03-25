<?php

include('client-header-contents.php');

if (isset($_POST['btnSaveNoK'])) {

    $target = "lpa_documents/" . basename($_FILES['file']['name']);

    $txtFirstName = mysqli_real_escape_string($conn, $_REQUEST['txtFirstName']);
    $txtLastName = mysqli_real_escape_string($conn, $_REQUEST['txtLastName']);
    $txtRelationship = mysqli_real_escape_string($conn, $_REQUEST['txtRelationship']);
    $txtPhonenumber = mysqli_real_escape_string($conn, $_REQUEST['txtPhonenumber']);
    $txtTypeofcontact = mysqli_real_escape_string($conn, $_REQUEST['txtTypeofcontact']);
    $txtEamilAddress = mysqli_real_escape_string($conn, $_REQUEST['txtEamilAddress']);

    $txtStatement = mysqli_real_escape_string($conn, $_REQUEST['txtStatement']);
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);
    $lpa_file =  mysqli_real_escape_string($conn, $_FILES['file']['name']);

    $queryIns = mysqli_query($conn, "INSERT INTO tbl_client_nok (col_first_name, col_last_name, col_relationship, col_phone_number, col_type_ofContact, nok_emailaddress, col_client_statement, lpa_documents, uryyToeSS4, col_company_Id) VALUES('" . $txtFirstName . "', '" . $txtLastName . "', '" . $txtRelationship . "', '" . $txtPhonenumber . "', '" . $txtTypeofcontact . "', '" . $txtEamilAddress . "', '" . $txtStatement . "', '" . $lpa_file . "', '" . $txtClientId . "', '" . $_SESSION['usr_compId'] . "') ");
    if ($queryIns) {
        if ($lpa_file) {

            if (is_uploaded_file($_FILES['file']['tmp_name']) and copy($_FILES['file']['tmp_name'], $target)) {
                header("Location: ../client-details?uryyToeSS4=$txtClientId");

                unset($txtFirstName);
                unset($txtLastName);
                unset($txtRelationship);
                unset($txtPhonenumber);
                unset($txtTypeofcontact);
                unset($txtEamilAddress);
                unset($txtStatement);
                unset($txtClientId);
            }
        } else {
            header("Location: ../client-details?uryyToeSS4=$txtClientId");
        }
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
                            <h5 class="m-b-10">NoK / emergency contacts</h5>
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
                        $uryyToeSS4 = $_GET['uryyToeSS4']; ?>

                        <div style="width: 100%; height:auto; text-align:right;">
                            <a href="./client-next-of-kin?<?php echo "uryyToeSS4=$uryyToeSS4"; ?>" style="text-decoration: none; color:#000;">
                                <button class="btn btn-info">View details</button>
                            </a>
                        </div>

                        <form action="./client-next-of-kin?uryyToeSS4=<?php echo $uryyToeSS4;
                                                                    } ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="form-group">
                                        <label for="First name">First name</label>
                                        <input type="text" class="form-control" placeholder="First name" required name="txtFirstName" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="form-group">
                                        <label for="Last name">Last name</label>
                                        <input type="text" class="form-control" placeholder="Last name" required name="txtLastName" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <div class="form-group">
                                        <label for="Relationship">Relationship</label>
                                        <select name="txtRelationship" required class="form-control" id="exampleFormControlSelect1">
                                            <option value="Null" selected="selected" disabled="disabled">--Select Option--</option>
                                            <option value="Family">Family</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Child">Child</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Uncle">Uncle</option>
                                            <option value="Auntie">Auntie</option>
                                            <option value="Relatives">Relatives</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="form-group">
                                        <label for="Phone number">Phone number</label>
                                        <input type="text" class="form-control" placeholder="Phone number" required name="txtPhonenumber" />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label for="Type of contact">Type of contact</label>
                                        <select name="txtTypeofcontact" required class="form-control" id="exampleFormControlSelect1">
                                            <option value="Null" selected="selected" disabled="disabled">--Select Option--</option>
                                            <option value="Emergency">Emergency</option>
                                            <option value="Friendly">Friendly</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label for="Type of contact">Email address</label>
                                        <input type="text" class="form-control" placeholder="Email address" name="txtEamilAddress" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="My need">Does the client or their appointee consent to discusing routine care matters with this key contact.</label>
                                <select name="txtStatement" required class="form-control" id="exampleFormControlSelect1">
                                    <option value="Null" selected="selected" disabled="disabled">--Select Option--</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <?php
                            //change this line in your query as well
                            if (isset($_GET['uryyToeSS4'])) {
                                $uryyToeSS4 = $_GET['uryyToeSS4'];
                                $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4 = '$uryyToeSS4' ORDER BY userId DESC ");
                                while ($trans = mysqli_fetch_array($result)) { ?>

                                    <input type="hidden" value="<?php echo "" . $trans['uryyToeSS4'] . "";
                                                            }
                                                        } ?>" name="txtClientId" />


                                    <div class="form-group">
                                        <div class="btn btn-info" id="yourBtn" onclick="getFile()">Upload LPA Document</div>
                                        <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" name="file" type="file" onchange="sub(this)" /></div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <input type="submit" value="Save details" class="btn btn-primary" name="btnSaveNoK" />
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