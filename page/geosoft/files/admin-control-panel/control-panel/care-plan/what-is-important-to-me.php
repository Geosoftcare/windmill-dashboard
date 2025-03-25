<?php

include('client-header-contents.php');

if (isset($_POST['btnAddNotes'])) {

    $txtClientId = mysqli_real_escape_string($conn, $_POST['txtClientId']);
    $txtMyNote = mysqli_real_escape_string($conn, $_POST['txtMyNote']);

    $sqlUpdateTable = mysqli_query($conn, "UPDATE `tbl_general_client_form` SET `what_is_important_to_me` = '$txtMyNote' WHERE uryyToeSS4 = '$txtClientId' ");

    if ($sqlUpdateTable) {
        header("Location: ../client-details?uryyToeSS4=$txtClientId");
    } else {
    }
}


?>

<style>
    #fileBtn {
        background-color: indigo;
        color: white;
        padding: 0.5rem;
        font-family: sans-serif;
        border-radius: 0.3rem;
        cursor: pointer;
        margin-top: 1rem;
    }
</style>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-1"></div>
            <div class="col-md-4 col-xl-8">
                <h5>Add Note</h5>
                <hr>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">
                        <?php
                        if (isset($_GET['uryyToeSS4'])) {
                            $uryyToeSS4 = $_GET['uryyToeSS4'];
                            $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' ");
                            while ($row = mysqli_fetch_array($result)) { ?>

                                <form action="./what-is-important-to-me<?php echo "?uryyToeSS4=" . $row['uryyToeSS4'] . " "; ?>" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">


                                    <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . " "; ?>" name="txtClientId" />


                            <?php
                            }
                        }
                            ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Certificate name">What is important to me?</label>
                                        <textarea name="txtMyNote" id="" rows="7" class="form-control" required placeholder="Enter Note"></textarea>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-primary" name="btnAddNotes" type="submit">Add note</button>



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