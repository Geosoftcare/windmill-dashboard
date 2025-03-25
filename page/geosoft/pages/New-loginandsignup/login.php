<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Geosoft care - Software for care settings is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
    <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL">
    <meta name="author" content="Geocare Services Limited">
    <title>Geosoft Care - Login | For home and community care</title>
    <meta property="og:image" content="../assets/img/gsLogo.png" />
    <meta name="twitter:image" content="../assets/img/gsLogo.png" />
    <link rel="icon" href="../assets/img/gsLogo.png" />
    <!-- Logo icon -->
    <link rel="icon" href="../assets/img/gsLogo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('#popupAlert').hide();
        });
    </script>
    <?php include('processing-user-signin.php'); ?>


</head>

<style type="text/css">
    body,
    html {
        overflow-y: hidden;
    }

    .pin-login {
        width: 100%;
        display: inline-block;
        border-radius: 10px;
        padding: 10px;
        font-size: 20px;
        text-align: center;
        color: white;
        user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-user-select: none;
        font-family: sans-serif;
    }

    .pin-login__text {
        margin: 10px auto 10px auto;
        padding: 10px;
        display: block;
        width: 80%;
        font-size: 25px;
        text-align: center;
        letter-spacing: 0.2em;
        background: #5f27cd;
        border: none;
        border-radius: 10px;
        outline: none;
        cursor: default;
    }

    .pin-login__text--error {

        color: white;
        background: #ffb3b3;
        animation-name: loginError;
        animation-duration: 0.1s;
        animation-iteration-count: 2;
    }

    @keyframes loginError {
        25% {
            transform: translateX(-3px);
        }

        75% {
            transform: translateX(3px);
        }
    }

    @-moz-keyframes loginError {
        25% {
            transform: translateX(-3px);
        }

        75% {
            transform: translateX(3px);
        }
    }

    .pin-login__key {
        width: 35px;
        height: 35px;
        margin: 25px;
        background: #2c3e50;

        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        cursor: pointer;
    }

    .pin-login__key:active {
        background: #e84118;
    }

    ::-webkit-input-placeholder {
        color: red;
        font-weight: 800;
    }

    :-moz-placeholder {
        /* Firefox 18- */
        color: red;
        font-weight: 800;
    }

    ::-o-placeholder {
        /* Firefox 19+ */
        color: red;
        font-weight: 800;
    }

    :-ms-input-placeholder {
        color: red;
        font-weight: 800;
    }
</style>



<body>

    <div style="width: 100%; height:350px; text-align:center; background-image: url('../assets/img/23-bgs.jpg'); padding:22px; color:white; background-size: cover;">
        <img src="../assets/img/gsLogo.png" style="height: 40px; width:40px; float:left;" alt="Geosoft care logo" />
        <a href="./forgot-pin" style="text-decoration: none; color:rgba(236, 240, 241); font-size:20px; padding:22px;">
            <span style="float: right; font-weight:800px;">Forgot?</span>
        </a>

        <div style="width: 100%; height:auto; padding:22px; margin-top:80px; color:rgba(236, 240, 241,.9);">
            <!--<h1><strong>Geosoft Care</strong></h1>-->
            <h1><strong>Login</strong></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h6 style="font-weight:600; margin-top:3%; width: 100%; height:auto; padding:5px; text-align:center; color:rgba(44, 62, 80); font-size:20px;">Enter passcode</h6>
                <div style="width: 100%; height:auto; margin-top:-15px; background-color:#fff; z-index:1000;">
                    <form action="./login" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="pin-login" id="mainPinLogin">
                            <input placeholder="&#x2022;&#x2022;&#x2022;&#x2022;&#x2022;" label="Passcode must be in 5 digits numbers" inputmode="numeric" pattern="[0-9]*" type="password" class="form-control" minlength="5" style="height: 55px; font-size:28px; text-align:center; background-color:rgba(127, 140, 141,.3); color:black;" name="txtPassword" />
                            <br>
                            <div style="text-align: center;" class="form-group">
                                <button style="width: 60px; height:60px; text-align:center; border-radius: 100%; background-color:#5f27cd; color:white; padding:6px;
                            border:none; font-size:32px;" name="btncarerLogin" type="submit"><i class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div style="width: 100%; height:auto; padding:22px; font-size:20px; color:black; position:fixed; bottom:0;">
                    <hr>
                    <span>Don't have account?</span>
                    <a href="./setup-pin" style="text-decoration: underline; color:black;display: inline-block; position: relative; z-index: 1; padding: 2em; margin: -2em;">
                        <span>Create pin!</span>
                    </a>
                </div>
                <div style="margin-top: 50px;"></div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>



</body>

</html>