
<?php
if (isset($_POST['manageRun'])) {
    include('dbconnections.php');
    $txtCurrentDate = mysqli_real_escape_string($conn, $_POST['txtCurrentDate']);
    $post = mysqli_real_escape_string($conn, $_POST['manageRun']);

    $expire = time() + 60 * 60 * 24 * 30;
    setcookie("companyCity", $post, $expire);
    header("Location: ./manage-runs"); //notice the redirect?
}

if (isset($_POST['assignRunCity'])) {
    include('dbconnections.php');
    $assignRunAreaId = mysqli_real_escape_string($conn, $_POST['assignRunAreaId']);
    $post = mysqli_real_escape_string($conn, $_POST['assignRunCity']);

    $expire = time() + 60 * 60 * 24 * 30;
    setcookie("companyCity", $post, $expire);
    header("Location: ./assign-run-57756-47746-398937?run_area_nameId=$assignRunAreaId"); //notice the redirect?
}

if (isset($_POST['clientView'])) {
    include('dbconnections.php');
    $txtCurrentDate = mysqli_real_escape_string($conn, $_POST['txtCurrentDate']);
    $post = mysqli_real_escape_string($conn, $_POST['clientView']);

    $expire = time() + 60 * 60 * 24 * 30;
    setcookie("companyCity", $post, $expire);
    header("Location: ./client-list"); //notice the redirect?
}

if (isset($_POST['teamView'])) {
    include('dbconnections.php');
    $txtCurrentDate = mysqli_real_escape_string($conn, $_POST['txtCurrentDate']);
    $post = mysqli_real_escape_string($conn, $_POST['teamView']);

    $expire = time() + 60 * 60 * 24 * 30;
    setcookie("companyCity", $post, $expire);
    header("Location: ./team-list"); //notice the redirect?
}
