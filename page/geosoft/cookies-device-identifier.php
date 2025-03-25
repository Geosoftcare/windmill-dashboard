<h1 style="font-size: 50px;">

    <?php

    error_reporting(~E_DEPRECATED & ~E_NOTICE);
    // but I strongly suggest you to use PDO or MySQLi.

    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'work_order_db');

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS);
    $dbcon = mysqli_select_db($conn, DBNAME);


    for ($a = 1; $a <= 5; $a++) {
        $rand = rand(00, 99);
        $dIdentifier = "$rand";
    }
    echo $dIdentifier;

    // check whether the device is already known; a cookie is already set
    if (isset($_COOKIE["deviceIdentifier"])) {
        // there is already a cookie set; we know the device
        echo "This is the Device: " . $_COOKIE["deviceIdentifier"];
    } else {
        // there is no cookie set; a new device has connected

        $myCheck = "SELECT * FROM work_orders WHERE special_Id = '$dIdentifier' ";
        $myCheckres = mysqli_query($conn, $myCheck);
        $countRes = mysqli_num_rows($myCheckres);

        if ($countRes != 0) {
            $invertcookieId = $dIdentifier + 1;
            // set a new cookie for the device
            setcookie("deviceIdentifier", $invertcookieId, time() * 2);
            echo "A new Device has been recognized, it is now linked with the ID: " . $invertcookieId;
        } else {
            // set a new cookie for the device
            setcookie("deviceIdentifier", $dIdentifier, time() * 2);
            echo "A new Device has been recognized, it is now linked with the ID: " . $dIdentifier;
        }
    }
    ?>
</h1>