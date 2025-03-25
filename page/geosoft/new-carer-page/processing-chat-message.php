<?php

include('dbconnection-string.php');

if (isset($_POST['btnSendChat'])) {

    //Get user and client latitude and longitude which result to comparison in disatnce to know if carer point A is closer to 
    //client point B

    $txtCarerEmail = mysqli_real_escape_string($conn, $_POST['txtCarerEmail']);
    $txtCarerName = mysqli_real_escape_string($conn, $_POST['txtCarerName']);
    $txtCarerSpecialId = mysqli_real_escape_string($conn, $_POST['txtCarerSpecialId']);
    $txtChatMessage = mysqli_real_escape_string($conn, $_POST['txtChatMessage']);
    $txtCarerTimeSent = mysqli_real_escape_string($conn, $_POST['txtCarerTimeSent']);
    $txtCarerDateSent = mysqli_real_escape_string($conn, $_POST['txtCarerDateSent']);
    $txtPending = mysqli_real_escape_string($conn, $_POST['txtPending']);
    $txtChatColor = "rgba(41, 128, 185,1.0)";
    $txtChatStatus = "Pending";

    //Check if care call already started
    $myCheck = "SELECT * FROM tbl_chat_system WHERE carer_email = '" . $txtCarerEmail . "' AND carer_chat = '' ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    //if it is true then execute queries and proceed to tasks
    if ($countRes != 0) {
        $sql = mysqli_query($conn, "UPDATE `tbl_chat_system` SET `carer_email` = '$txtCarerEmail', `carer_name` = '$txtCarerName', `carer_specialId` = '$txtCarerSpecialId', `carer_chat` = '$txtChatMessage', `time_sent` = '$txtCarerTimeSent', `date_sent` = '$txtCarerDateSent', `chat_color` = '$txtChatColor' WHERE carer_email = '$txtCarerEmail' ORDER BY userId DESC LIMIT 1 ");
        if ($sql) {
            header("Location: ./chat-system");
        }
    } else {
        $queryIns = mysqli_query($conn, "INSERT INTO tbl_chat_system (carer_email, carer_name, carer_specialId, carer_chat, time_sent, date_sent, chat_color, admin_chat, chat_status) VALUES('" . $txtCarerEmail . "', '" . $txtCarerName . "', '" . $txtCarerSpecialId . "', '" . $txtChatMessage . "', '" . $txtCarerTimeSent . "', '" . $txtCarerDateSent . "', '" . $txtChatColor . "', '" . $txtPending . "', '" . $txtChatStatus . "') ");
        if ($queryIns) {
            header("Location: ./chat-system");
        }
    }
    //Below code insert the data into database if distance agreed is stated in the map

} else {
}
