<?php
include('dbconnections.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data from POST request
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

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO tbl_review_details 
        (first_question, first_question_details, second_question, second_question_details, 
         third_question, third_question_details, fourth_question, fourth_question_details, 
         fifth_question, fifth_question_details, sixth_question, sixth_question_details, 
         seventh_question, seventh_question_details, eighth_question, eighth_question_details, 
         ninth_question, ninth_question_details) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param(
        "ssssssssssssssssss",
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
        $ninth_question_details
    );

    // Execute the query
    if ($stmt->execute()) {
        header("Locaton: ./start-review-assessment?assessment_Id=" . $_POST['assessment_Id']);
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
