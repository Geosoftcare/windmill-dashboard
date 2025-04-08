<?php
include('client-header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
$stmt = $conn->prepare("SELECT * FROM tbl_general_client_form 
WHERE uryyToeSS4 = ? AND col_company_Id = ?");
$stmt->bind_param("ss", $uryyToeSS4, $_SESSION['usr_compId']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Personal Assessment</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Capture outcomes, tasks and risks related to personal assessment plan.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container my-5">
            <div class="row text-decoration-none mt-3 rounded">
                <div class="col-md-6 col-sm-6 col-xl-6 col-lg-6">
                    <h4>1. Needs assessment</h4>
                    Record <?php echo "" . $row['client_first_name'] . "" . $row['client_last_name'] . ""; ?>'s level of independence for each activity, and any support that is required
                    <a href="./start-personal-care-assessment?uryyToeSS4=<?php echo "" . $row['uryyToeSS4'] . ""; ?>" style="width: 200px;"
                        class="text-decoration-none text-dark mt-3 btn btn-outline-info btn-block">Start/Review Assessment</a>
                    <h4 class="mt-4">2. Previous assessments</h4>
                    <form action="">
                        <div class="form-group">
                            <textarea name="txtAssessment" rows="5" placeholder="No assessment added yet" class="form-control" style="resize: none;" id=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xl-4 col-lg-4"></div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <?php include('bottom-panel-block.php'); ?>
</div>



<?php include('footer-contents.php'); ?>