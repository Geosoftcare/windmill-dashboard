<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Geocare is a dynamic nursing and domiciliary agency based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team.">
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

    #btn1,
    #btn2,
    #btn3,
    #btn3,
    #btn4,
    #btn5,
    #btn6,
    #btn7,
    #btn8,
    #btn9,
    #btn0,
    #btnDel,
    #btn12,
    #btnlog {
        font-size: 25px;
        font-weight: 600;
        color: black;
        background-color: transparent;
        border: none;
        display: inline-block;
        position: relative;
        z-index: 1;
        padding: 2em;
        margin: -2em;
    }

    #tbInput {
        width: 100%;
        height: 100%;
        font-size: 35px;
        text-align: center;
        letter-spacing: 0.2em;
        background: transparent;
        border: none;
        border-radius: 10px;
        outline: none;
        cursor: default;
        color: black;
        font-weight: 800;
        font-family: sans-serif;
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
                <div style="text-align:center; padding:22px; width:100%; height:auto; margin-top:-70px;">
                    <h4><strong>Enter passcode</strong></h4>
                    <input id="tbInput" disabled placeholder="&#x2022;&#x2022;&#x2022;&#x2022;" label="Passcode must be in 4 digits numbers" pattern="[0-9]*" type="password" class="form-control" maxlength="4" minlength="4" name="txtPassword" />
                    <!--<input id="tbInput" type="text" />-->

                    <div id="VirtualKey">
                        <div class="row">
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn1" value="1" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn2" value="2" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn3" value="3" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn4" value="4" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn5" value="5" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn6" value="6" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn7" value="7" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn8" value="8" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn9" value="9" class="btn btn-primary" type="button" onclick="input(this);" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <button id="btnDel" type="button" value="Del" onclick="del();"><i class="bi bi-backspace"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <input id="btn0" value="0" class="btn btn-primary" type="button" onclick="input(this)" />
                                </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div style="padding: 5px;">
                                    <button type="submit" name="btnLogin" id="btnlog"><i class="bi bi-box-arrow-in-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; height:auto; padding:22px; font-size:20px; color:black; margin-top:30px;">
                        <hr>
                        <span>Don't have account?</span>
                        <a href="./setup-pin" style="text-decoration: underline; color:black; display: inline-block; position: relative; z-index: 1; padding: 2em; margin: -2em;">
                            <span>Create pin!</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script>
        function input(e) {
            var tbInput = document.getElementById("tbInput");
            tbInput.value = tbInput.value + e.value;
        }

        function del() {
            var tbInput = document.getElementById("tbInput");
            tbInput.value = tbInput.value.substr(0, tbInput.value.length - 1);
        }
    </script>
</body>

</html>