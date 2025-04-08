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

while ($row = $result->fetch_assoc()) {

?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="row text-decoration-none">
                <div style="width: 100%; height:auto; padding:22px;">
                    <h5>About <?php echo "" . $row['client_first_name'] . "" ?></h5>
                    <span style="font-size: 18px;">
                        Capture basic information about <?php echo "" . $row['client_first_name'] . "" ?>, including their likes and preferences.
                    </span>
                    <br><br>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <a href='../client-details?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; About <?php echo "" . $row['client_first_name'] . "" ?></strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                        <span style='font-weight:22px;'><i class='feather mr-2 icon-check-square'></i> Updated</span> <span style='font-weight:22px; position:absolute;'>&nbsp; &nbsp; 24 Jan 2024</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                <div style="width: 100%; height:auto; padding:22px;">
                    <h5>Initial assessments</h5>
                    <span style="font-size: 18px;">
                        Carry out a holistic initial assessment across eight key areas of care.
                    </span>
                </div>


                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./personal-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Personal care assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> need assessment.</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./need-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Need assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> need assessment.</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./visit-tasks-plan?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Visit tasks plan</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> visit tasks plan.</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./my-personalised-risk-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; My personalised risk assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> personalised risk assessment</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./mental-health-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Mental health assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Mental health assessment.</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./equipment-risk-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Equipment risk assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Equipment risk assessment. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./moving-and-handling-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Moving and handling assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Moving and handling assessment. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./sensory-impairment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Sensory impairment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Sensory equipment. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./fire-action-plan?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Fire action plan</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Fire action plan. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./medication-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Medication assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Medication assessment. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href='./outcome-of-assessment?<?php echo "uryyToeSS4=" . $row['uryyToeSS4'] . "" ?>' style='text-decoration:none; color:#000;'>
                        <div class='card table-card'>
                            <div class='card-header'>
                                <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; Outcome of assessment</strong></h5>
                            </div>
                            <div class='card-body p-0'>
                                <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                    <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i> Complete details on <?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?> Outcome of assessment. </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="row text-decoration-none mt-1 w-100 h-auto">
                <div class="col-xl-12">
                    <h5>
                        <strong>Additional assessments</strong> <br>
                        <small>
                            Select additional assessments that are relevant to <?php echo "" . $row['client_first_name'] . "" ?>’s needs and potential risks.
                        </small>
                    </h5>
                    <div class="card table-card">
                        <div class="card-body p-0">
                            <div class="p-2 m-5 w-100 h-auto text-center text-decoration-none">
                                <h5>Add assessments <br> <small>Add additional assessment for <?php echo "" . $row['client_first_name'] . "" ?></small></h5>
                                <button type="button" class="btn btn-outline-primary mt-3 text-center" data-toggle="modal" data-target="#exampleModal">
                                    Add assessments
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add assessment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Select additional assessments that are relevant to <?php echo "" . $row['client_first_name'] . "" ?>’s needs and potential risks.
                                <div class="p-2 m-3 w-100 h-auto bg-light">
                                    <input type="checkbox" id="selectAllAssessment"> &nbsp; &nbsp; <strong>Select all</strong> (<strong id="selectedCount">0</strong> <strong>out of 15</strong>)
                                </div>
                                <hr>
                                <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                                    <form id="assessmentForm">
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Behaviour"> &nbsp; &nbsp; <strong>Behaviour</strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Communication"> &nbsp; &nbsp; <strong>Communication </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Condition specific"> &nbsp; &nbsp; <strong>Condition specific </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="COSHH"> &nbsp; &nbsp; <strong>Control of Substances Hazardous to Health </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="COVID-19"> &nbsp; &nbsp; <strong>COVID-19 </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Dysphagia"> &nbsp; &nbsp; <strong>Dysphagia </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="End of life"> &nbsp; &nbsp; <strong>End of life </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Environment and fire"> &nbsp; &nbsp; <strong>Environment and fire </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Financial"> &nbsp; &nbsp; <strong>Financial </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Medication"> &nbsp; &nbsp; <strong>Medication </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Mental capacity"> &nbsp; &nbsp; <strong>Mental capacity </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Moving and handling"> &nbsp; &nbsp; <strong>Moving and handling </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Restrictive practice"> &nbsp; &nbsp; <strong>Restrictive practice </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Seizures"> &nbsp; &nbsp; <strong>Seizures </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input type="checkbox" name="assessments[]" value="Waterlow"> &nbsp; &nbsp; <strong>Waterlow </strong> <br>
                                        </div>
                                        <div class="form-group border rounded p-3">
                                            <input form="assessmentForm" type="hidden" name="txtClientName" value="<?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?>">
                                            <input form="assessmentForm" type="hidden" name="txtUrYYToeSS4" value="<?php echo "" . $row['uryyToeSS4'] . "" ?>">
                                            <input form="assessmentForm" type="hidden" name="txtCompanyId" value="<?php echo "" . $row['col_company_Id'] . "" ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel assessment</button>
                                <button type="button" id="submitBtn" class="btn btn-outline-info">Save assessment</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
        }
            ?>

            <div class="row text-decoration-none">
                <?php
                $stmt2 = $conn->prepare("SELECT * FROM tbl_assessments 
                WHERE uryyToeSS4 = ? AND col_company_Id = ?");
                $stmt2->bind_param("ss", $uryyToeSS4, $_SESSION['usr_compId']);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                while ($row2 = $result2->fetch_assoc()) {
                ?>
                    <div class="col-xl-4">
                        <a href='./client-assessment?<?php echo "assessment_Id=" . $row2['assessment_Id'] . "" ?>' style='text-decoration:none; color:#000;'>
                            <div class='card table-card'>
                                <div class='card-header'>
                                    <h5><strong><i class='feather mr-2 icon-briefcase'></i> &nbsp; <?php echo "" . $row2['assessment_name'] . "" ?></strong></h5>
                                </div>
                                <div class='card-body p-0'>
                                    <div style=" width: 100%; height:auto; padding:18px; color:#000;">
                                        <span style='font-weight:14px;'><i class='feather mr-2 icon-check-square'></i>
                                            Complete details on <?php echo "" . $row2['client_name'] . "" ?>
                                            Outcome of assessment.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>


            <div class="row">
                <?php include('bottom-panel-block.php'); ?>
            </div>

            </div>
        </div>


        <script>
            $(document).ready(function() {
                $("#submitBtn").click(function() {
                    var selectedValues = [];
                    $("input[name='assessments[]']:checked").each(function() {
                        selectedValues.push($(this).val());
                    });

                    console.log("Selected assessments: ", selectedValues); // Debugging line to see the selected checkboxes

                    if (selectedValues.length === 0) {
                        alert("Please select at least one assessment.");
                        return;
                    }

                    var clientName = $("input[name='txtClientName']").val();
                    var urYYToeSS4 = $("input[name='txtUrYYToeSS4']").val();
                    var companyId = $("input[name='txtCompanyId']").val();

                    // AJAX Request
                    $.ajax({
                        url: "insert_assessment.php",
                        type: "POST",
                        data: {
                            assessments: selectedValues,
                            txtClientName: clientName,
                            txtUrYYToeSS4: urYYToeSS4,
                            txtCompanyId: companyId
                        },
                        success: function(response) {
                            alert(response);
                        },
                        error: function() {
                            alert("An error occurred while submitting the form.");
                        }
                    });
                });

                document.getElementById('selectAllAssessment').addEventListener('change', function() {
                    // Get all checkboxes inside the form
                    var checkboxes = document.querySelectorAll('#assessmentForm input[type="checkbox"]');

                    // Set all checkboxes to the same state as the "selectAllAssessment" checkbox
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = document.getElementById('selectAllAssessment').checked;
                    });

                    // Update the count after "select all"
                    updateCheckedCount();
                });

                // Add event listeners to each individual checkbox to update count on change
                var checkboxes = document.querySelectorAll('#assessmentForm input[type="checkbox"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', updateCheckedCount);
                });

                // Function to update the count of selected checkboxes
                function updateCheckedCount() {
                    var selectedCheckboxes = document.querySelectorAll('#assessmentForm input[type="checkbox"]:checked');
                    var count = selectedCheckboxes.length;

                    // Display the count
                    document.getElementById('selectedCount').textContent = count + ' Selected';
                }

                // Initial count update on page load
                window.onload = updateCheckedCount;
            });
        </script>

        <?php include('footer-contents.php'); ?>