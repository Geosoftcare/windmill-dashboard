<?php include('header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <h5>Activate admin</h5>
                <hr>
                <div class="card">
                    <h5 class="card-header">Activate</h5>
                    <div class="card-body" style="font-size: 16px;">
                        <h5 class="card-title">Activation notice</h5>
                        <p class="card-text" style="font-size: 16px;">Dear Geosoft.</p>
                        <p class="card-text" style="font-size: 16px;">It's good to be back. However you must know, activating this user you have agreed to grant full access and control of all overall activities</p>
                        <p class="card-text" style="font-size: 16px;">that can be carried out in the platform.</p>
                        <hr>
                        <br>Are you sure you want to grant access to this user?
                        </p>

                        <?php
                        include('dbconnect.php');

                        if (isset($_GET['user_special_Id'])) {
                            $user_special_Id = $_GET['user_special_Id'];
                            //change this line in your query as well
                            $result = mysqli_query($myConnection, "SELECT * FROM tbl_goesoft_users WHERE user_special_Id='$user_special_Id'");
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <form action="./processing-activate-admin" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                    <div class="form-group">
                                        <input type="hidden" name="adminSpecialId" value="<?php echo "" . $row['user_special_Id'] . "";
                                                                                        }
                                                                                    } ?>" />
                                    </div>

                                    <button class="btn btn-danger" name="btnDeactivateAdmin" type="submit">Yes am sure!</button>
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