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
    <meta property="og:image" content="assets/images/gsLogo.png" />
    <meta name="twitter:image" content="assets/images/gsLogo.png" />
    <link rel="icon" href="assets/images/gsLogo.png" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/gsLogo.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupAlert').hide();
        });
    </script>
    <?php include('checking-mail-verification.php'); ?>


</head>

<!-- [ auth-signup ] start -->
<div class="wrapper">
    <div style="margin-top: 5%;" class="container text-center">


        <div class="card borderless">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:22px; background-color:#e74c3c; color:white;">
                        Oops!!! Wrong code.
                    </div>
                    <div class="">
                        <br />
                        <h1 class="f-w-400">GeoSoft</h1>
                        <hr>
                        <h3>
                            Verify your email
                        </h3>

                        Thank you for your time.
                        <br>
                        Kindly check your email for the verification code.
                        <br><br>

                        <form action="./verify-your-email" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="tel" style="width: 350px; margin:0px auto; font-size:22px;" class="form-control" placeholder="Enter code" required name="verificationTXT" />
                            </div>
                            <div class="form-group">
                                <button name="btnSubmitVerifyform" type="submit" class="btn  btn-primary btn-lg">Verify now!</button>
                            </div>
                        </form>
                    </div>
                    <br /><br>
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