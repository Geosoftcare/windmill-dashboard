<?php
require_once('dbconnections.php');

if (isset($_POST['assessments']) && is_array($_POST['assessments'])) {
    $assessments = $_POST['assessments'];
    $client_name = $_POST['txtClientName'] ?? ''; // Fixed typo
    $urYYToeSS4 = $_POST['txtUrYYToeSS4'] ?? '';
    $col_company_Id = $_POST['txtCompanyId'] ?? '';

    // Debugging: Check if required fields are received
    if (empty($client_name) || empty($urYYToeSS4) || empty($col_company_Id)) {
        die("Error: Missing required input values. Received: " . json_encode($_POST));
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_assessments (assessment_name, client_name, uryyToeSS4, assessment_Id, col_company_Id) 
        VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    // Insert each selected assessment
    foreach ($assessments as $assessment) {
        // Generate a unique assessment ID for each row inside the loop
        $assessment_Id = uniqid('assess_');  // This will generate a unique ID for each assessment

        // Bind parameters and execute the statement for each assessment
        $stmt->bind_param("sssss", $assessment, $client_name, $urYYToeSS4, $assessment_Id, $col_company_Id);

        if (!$stmt->execute()) {
            die("Execution Error: " . $stmt->error);
        }
    }

    echo "Assessments added successfully!";
} else {
    echo "No assessments selected.";
}
