<?php
if (isset($_POST['btnshareAccessCode'])) {
    include('dbconnections.php');
    if (!isset($conn)) {
        echo "Database connection is not established.";
        exit;
    }

    $txtRecipient_Email = filter_var(trim($_POST['txtRecipient_Email']), FILTER_SANITIZE_EMAIL);
    $txtShareCode = htmlspecialchars(strip_tags(trim($_POST['txtShareCode'])));
    $txtInviteeEmail = filter_var(trim($_POST['txtInviteeEmail']), FILTER_SANITIZE_EMAIL);
    $txtShareUrl = htmlspecialchars(strip_tags(trim($_POST['txtShareUrl'])));
    $txtCompanySpecialId = htmlspecialchars(strip_tags(trim($_POST['txtCompanySpecialId'])));

    if (empty($txtRecipient_Email) || empty($txtShareCode) || empty($txtInviteeEmail) || empty($txtShareUrl) || empty($txtCompanySpecialId)) {
        echo "All fields are required!";
        exit;
    }

    $recipient_array = explode(',', $txtRecipient_Email);
    $recipient_array = array_map('trim', $recipient_array);

    $valid_recipients = array_filter($recipient_array, function ($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    });
    if (empty($valid_recipients)) {
        echo "No valid email addresses provided!";
        exit;
    }

    $subject = "Access Care Plan";
    $headers = "From: Geosoftcare@geosoftcare.co.uk\r\n";
    $headers .= "Reply-To: Geosoftcare@geosoftcare.co.uk\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $html_message = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Access Care Plan</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Roboto', sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #212529;
            }
        </style>
    </head>
    <body>
        <div style='width: 100%; background-color: #27ae60; color: #fff; padding: 18px; text-align: center;'>
            <strong style='font-size: 18px;'>Access Care Calls</strong>
        </div>
        <div style='width: 100%; padding: 20px; background-color: #fff;'>
            <h3>Access Link: </h3>
            <p><strong>$txtShareCode</strong></p>
            <p><a href='$txtShareUrl'>$txtShareUrl</a></p>
            <a href='$txtShareUrl' style='text-decoration: none;'>
                <button style='width: 150px; height: 45px; background-color: #27ae60; color: white; border: none; font-size:16px; border-radius: 5px; cursor: pointer;'>Care details</button>
            </a>
        </div>
        <div style='width: 100%; background-color: #16a085; color: white; text-align: center; padding: 12px;'>
            Visit Care Plan
            <Br>
            " . date('Y') . " &copy; Geosoft Care LTD
            <br>
            All  rights reserved.
        </div>
    </body>
    </html>";

    $email_sent = true;
    foreach ($valid_recipients as $to_email) {
        if (!mail($to_email, $subject, $html_message, $headers)) {
            $email_sent = false;
            echo "Failed to send email to $to_email.<br>";
        }
    }

    if ($email_sent) {
        header("Location: successful.php");
    } else {
        echo "Some emails could not be sent.";
    }
} else {
    echo "Invalid Request!";
}
