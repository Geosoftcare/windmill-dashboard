<?php
include('dbconnections.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_question = implode(", ", $_POST['first_question'] ?? []);
    $first_question_details = $_POST['first_question_details'] ?? '';

    $second_question = implode(", ", $_POST['second_question'] ?? []);
    $second_question_details = $_POST['second_question_details'] ?? '';

    $third_question = implode(", ", $_POST['third_question'] ?? []);
    $third_question_details = $_POST['third_question_details'] ?? '';

    $fourth_question = implode(", ", $_POST['fourth_question'] ?? []);
    $fourth_question_details = $_POST['fourth_question_details'] ?? '';

    $fifth_question = implode(", ", $_POST['fifth_question'] ?? []);
    $fifth_question_details = $_POST['fifth_question_details'] ?? '';

    $sixth_question = implode(", ", $_POST['sixth_question'] ?? []);
    $sixth_question_details = $_POST['sixth_question_details'] ?? '';

    $seventh_question = implode(", ", $_POST['seventh_question'] ?? []);
    $seventh_question_details = $_POST['seventh_question_details'] ?? '';

    $eighth_question = implode(", ", $_POST['eighth_question'] ?? []);
    $eighth_question_details = $_POST['eighth_question_details'] ?? '';

    $ninth_question = implode(", ", $_POST['ninth_question'] ?? []);
    $ninth_question_details = $_POST['ninth_question_details'] ?? '';

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_personal_assessment 
        (first_question, first_question_details, 
         second_question, second_question_details, 
         third_question, third_question_details, 
         fourth_question, fourth_question_details, 
         fifth_question, fifth_question_details, 
         sixth_question, sixth_question_details, 
         seventh_question, seventh_question_details, 
         eighth_question, eighth_question_details, 
         ninth_question, ninth_question_details, 
         assessorName, uryyTteamoeSS4, uryyToeSS4, col_company_Id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if preparation was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param(
        "ssssssssssssssssssssss",
        $first_question,
        $first_question_details,
        $second_question,
        $second_question_details,
        $third_question,
        $third_question_details,
        $fourth_question,
        $fourth_question_details,
        $fifth_question,
        $fifth_question_details,
        $sixth_question,
        $sixth_question_details,
        $seventh_question,
        $seventh_question_details,
        $eighth_question,
        $eighth_question_details,
        $ninth_question,
        $ninth_question_details,
        $_SESSION['usr_userName'],
        $_SESSION['usr_specId'],
        $_SESSION['txtUserId'],
        $_SESSION['usr_compId']
    );

    // Execute the query
    if ($stmt->execute()) {
        header("Location: ./start-personal-care-assessment?uryyToeSS4=" . urlencode($_SESSION['txtUserId']));
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
