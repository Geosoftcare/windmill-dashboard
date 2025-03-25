<?php include('header-contents.php'); ?>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ delete box ] start -->
        <div class="row">
            <div class="col-md-4 col-xl-2"></div>
            <div class="col-md-4 col-xl-7">
                <hr>
                <div class="card">
                    <div class="card-body" style="font-size: 16px;">
                        <h5 class="card-title">Delete notice</h5>
                        <p class="card-text" style="font-size: 16px;">If this was the action that you wanted to do. Please confirm your choice or cancel and return to home page.</p>
                        <hr>
                        Are you sure you want to delete this admin?

                        <?php
                        if (isset($_GET['run_ids'])) {
                            $run_ids = $_GET['run_ids'];
                        ?>
                            <form action="./processing-run-delete-system" method="POST" enctype="multipart/form-data" name="deactivate-admin" autocomplete="off">
                                <div class="form-group">
                                    <input type="hidden" name="RunSpecialId" value="<?php echo $run_ids;
                                                                                } ?>" />
                                </div>

                                <button class="btn btn-danger" name="btnDeleteRun" type="submit">Yes am sure!</button>
                                <a href="./administrator-list" style="text-decoration: none;" class="btn btn-primary">Go back</a>
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