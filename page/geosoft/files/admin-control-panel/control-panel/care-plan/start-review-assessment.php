<?php
include('client-header-contents.php');
if (isset($_GET['assessment_Id'])) {
    $assessmentId = $_GET['assessment_Id'];
}
$stmt = $conn->prepare("SELECT * FROM tbl_assessments 
WHERE assessment_Id = ? AND col_company_Id = ?");
$stmt->bind_param("ss", $assessmentId, $_SESSION['usr_compId']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$varClientName = $row['client_name'];
$varAssessmentName = $row['assessment_name'];
$varAssessmentId = $row['assessment_Id'];
?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10"><?php echo $varClientName; ?>'s <?php echo $varAssessmentName; ?> assessment</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li style="font-size: 16px;" class="breadcrumb-item">
                                Record <?php echo $varClientName; ?>'s level of independence for each <?php echo $varAssessmentName; ?>, and any support that is required
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container my-5">
            <div class="row text-decoration-none mt-3 rounded">
                <div class="col-md-5 col-sm-5 col-xl-5 col-lg-5">
                    <form action="./processing-assessment" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div id="firstRow" class="form-group mt-3">
                            <h4>Bathing</h4>
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-3">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Can <?php echo $varClientName; ?> wash themself?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes independently with or without equipment" name="first_question[]"> &nbsp; &nbsp;Yes, independently (with or without equipment)</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes with help" name="first_question[]"> &nbsp; &nbsp;Yes, with help</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No fully dependent" name="first_question[]"> &nbsp; &nbsp;No, fully dependent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="first_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="secondRow" class="form-group mt-5">
                            <h4>Oral hygiene</h4>
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-3">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Can <?php echo $varClientName; ?> maintain oral hygiene?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes independently" name="second_question[]"> &nbsp; &nbsp;Yes, independently</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes with help" name="second_question[]"> &nbsp; &nbsp;Yes, with help</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No fully dependent" name="second_question[]"> &nbsp; &nbsp;No, fully dependent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="second_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="thirdRow" class="form-group mt-5">
                            <h4>Personal appearance</h4>
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-3">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Can <?php echo $varClientName; ?> maintain their personal appearance?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes independently" name="third_question[]"> &nbsp; &nbsp;Yes, independently</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes with help" name="third_question[]"> &nbsp; &nbsp;Yes, with help</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No fully dependent" name="third_question[]"> &nbsp; &nbsp;No, fully dependent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="third_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Can <?php echo $varClientName; ?> dress themself?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes independently" name="fourth_question[]"> &nbsp; &nbsp;Yes, independently</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes with help" name="fourth_question[]"> &nbsp; &nbsp;Yes, with help</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No fully dependent" name="fourth_question[]"> &nbsp; &nbsp;No, fully dependent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="fourth_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fourthRow" class="form-group mt-5">
                            <h4>Toilet</h4>
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Can <?php echo $varClientName; ?> toilet themself?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes independently" name="fifth_question[]"> &nbsp; &nbsp;Yes, independently</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Yes with help" name="fifth_question[]"> &nbsp; &nbsp;Yes, with help</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No fully dependent" name="fifth_question[]"> &nbsp; &nbsp;No, fully dependent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="fifth_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Does <?php echo $varClientName; ?> have control over their bowels?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Continent" name="sixth_question[]"> &nbsp; &nbsp;Continent</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Occasional accident" name="sixth_question[]"> &nbsp; &nbsp;Occasional accident</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Incontinent" name="sixth_question[]"> &nbsp; &nbsp;Incontinent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="sixth_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class=" btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Does <?php echo $varClientName; ?> have control over their bladder?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Continent" name="seventh_question[]"> &nbsp; &nbsp;Continent</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Occasional accident" name="seventh_question[]"> &nbsp; &nbsp;Occasional accident</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Incontinent" name="seventh_question[]"> &nbsp; &nbsp;Incontinent</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="seventh_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">Does <?php echo $varClientName; ?> need support with the following?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Catheter" name="eighth_question[]"> &nbsp; &nbsp;Catheter</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Incontinence pad" name="eighth_question[]"> &nbsp; &nbsp;Incontinence pad</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Stoma bag" name="eighth_question[]"> &nbsp; &nbsp;Stoma bag</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Other please specify" name="eighth_question[]"> &nbsp; &nbsp;Other (please specify)</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="eighth_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div id="fiftRow" class="form-group mt-5">
                            <h5><strong>Review details</strong></h5>
                            Review details will only be visible on the agency hub. This section will not be displayed in the carer app or care plan PDF.
                        </div>

                        <hr>

                        <div class="form-group mt-5">
                            <div id="dropdown-container">
                                <div class="dropdown-section mb-4 mt-2">
                                    <button class="btn btn-outline-dark dropdown-toggle w-100 h-25" type="button" data-bs-toggle="dropdown">
                                        <span class="selected-text">How would you define the outcome of this review?</span>
                                    </button>
                                    <ul class="dropdown-menu p-2">
                                        <li id="dropdownbox"><input type="checkbox" class="select-all"> &nbsp; &nbsp; <label>Select all options</label></li>
                                        <hr>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="No changes required" name="ninth_question[]"> &nbsp; &nbsp;No changes required</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Minor changes required" name="ninth_question[]"> &nbsp; &nbsp;Minor changes required</li>
                                        <li id="dropdownbox"><input type="checkbox" class="tech-option" value="Major changes required" name="ninth_question[]"> &nbsp; &nbsp;Major changes required</li>
                                    </ul>
                                    <div class="selected-items mt-2"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="ninth_question_details" rows="5" style="resize: none;" class="form-control" placeholder="Additional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <button onclick="history.back();" class="btn btn-danger" type="button">Cancel Review</button>
                            <button class="btn btn-info" type="submit">Finish Review</button>
                        </div>
                    </form>

                </div>
                <div class=" col-md-4 col-sm-4 col-xl-4 col-lg-4">
                    <div id="carePlanSection" class="w-100 h-auto p-3 m-3">
                        <h5>Sections</h5>
                        <hr>
                        <a href="#firstRow" class="w-100 h-auto p-2 text-decoration-none">Bathing</a>
                        <br><br>
                        <a href="#secondRow" class="w-100 h-auto p-2 text-decoration-none">Oral hygiene</a>
                        <br><br>
                        <a href="#thirdRow " class="w-100 h-auto p-2 text-decoration-none">Personal appearance</a>
                        <br><br>
                        <a href="#fourthRow" class="w-100 h-auto p-2 text-decoration-none">Toilet</a>
                        <br><br>
                        <a href="#fiftRow" class="w-100 h-auto p-2 text-decoration-none">Review details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php include('bottom-panel-block.php'); ?>
    </div>
</div>

<?php include('footer-contents.php'); ?>