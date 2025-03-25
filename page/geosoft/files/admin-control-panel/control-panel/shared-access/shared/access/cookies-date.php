<?php

if (isset($_POST['txtDate'])) {
    require_once('dbconnections.php');
    $cookie_name = "_VisitDate";
    $txtClientId = mysqli_real_escape_string($conn, $_REQUEST['txtClientId']);
    $txtDate_value = mysqli_real_escape_string($conn, $_REQUEST['txtDate']);
    setcookie($cookie_name, $txtDate_value, time() + 86400, "/"); // 86400 seconds = 1 day
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Cookie named '" . $cookie_name . "' is not set!";
}
