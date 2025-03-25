<?php
session_start();
include('db-connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Geosoft | Admin control panel - Sign up</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Geocare is a dynamic nursing and domiciliary agency based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Geocare Services Limited">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- [ auth-signup ] start -->
<div class="wrapper">
    <div style="margin-top: 5%;" class="container text-center">

        <div class="card borderless">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:rgba(39, 174, 96,1.0); color:white;">
                        <?php

                        $result = "SELECT * FROM tbl_goesoft_users WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND verification_code ='Verified' ";

                        $myCheckres = mysqli_query($conn, $result);
                        $countRes = mysqli_num_rows($myCheckres);

                        if ($countRes != 0) {
                            header("Location: ./loading-dashboard");
                        } else {

                            header("Location: ./verify-your-email");
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- [ auth-signup ] end -->





    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#popupAlert').hide();

        function showDiv() {
            document.getElementById('popupAlert').style.display = "block";
        };
    </script>
    </body>

</html>