<?php
include('dbconnection-string.php');

if (isset($_POST['btnSubmitConcern'])) {
    // Escape and trim inputs
    $txtClientName = mysqli_real_escape_string($conn, trim($_POST['txtClientName']));
    $txtCarerName = mysqli_real_escape_string($conn, trim($_POST['txtCarerName']));
    $txtTitle = mysqli_real_escape_string($conn, trim($_POST['txtTitle']));
    $txtNote = mysqli_real_escape_string($conn, trim($_POST['txtNote']));

    // File input
    $image = $_FILES['image'];

    $txtClientId = mysqli_real_escape_string($conn, trim($_POST['txtClientId']));
    $txtCarerId = mysqli_real_escape_string($conn, trim($_POST['txtCarerId']));

    $txtPending = "Pending";
    $txtCompanyId = mysqli_real_escape_string($conn, trim($_POST['txtCompanyId']));

    // Validate the file type
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $image_extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    if (!in_array($image_extension, $allowed_extensions)) {
        die("Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Target directory for uploads
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Create a unique filename for the uploaded image
    $new_file = uniqid('IMG_', true) . '.' . $image_extension;
    $target_file = $target_dir . $new_file;

    // Move the uploaded file
    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        // SQL query
        $sql = "INSERT INTO tbl_raise_concern (col_client_name, col_team_name, col_title, col_note, col_image, txtPending, uryyToeSS4, uryyTteamoeSS4, col_company_Id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $txtClientName, $txtCarerName, $txtTitle, $txtNote, $new_file, $txtPending, $txtClientId, $txtCarerId, $txtCompanyId);

        if ($stmt->execute()) {
            // Redirect after success
            header("Location: ./success-page?uryyToeSS4=" . $txtClientId);
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // File upload failed
        echo "Error: Failed to upload the file.";
    }
}

$conn->close();
