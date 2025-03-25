<?php

include('dbconnection-string.php');

if (isset($_POST['mainPinLogin'])) {

    $myCredential = mysqli_real_escape_string($conn, $_POST['myCredential']);
    $verificationTXT = mysqli_real_escape_string($conn, $_POST['verificationTXT']);

    $sql = mysqli_query($conn, "UPDATE `tbl_goesoft_carers_account` SET `loginPin` = '$verificationTXT' WHERE VNumber = '$myCredential' ");
    if ($sql) {
        header("Location: ./index");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Geosoft | Admin control panel - Sign up</title>
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
    <?php include('checking-mail-verification.php'); ?>


</head>

<style type="text/css">
    .pin-login {
        width: 100%;
        display: inline-block;
        border-radius: 10px;
        padding: 10px;
        font-size: 18px;
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
        background: rgba(52, 73, 94, .4);
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
</style>



<body>

    <div class="container">
        <br>

        <div style="width: 100%; height:auto; text-align:center;">
            <a href="./forgot-pin" style="text-decoration: none;">
                <span style="float: right;">Forgot?</span>
            </a>
            <br>
            <hr>
            <h2><strong>Geosoft</strong></h2>
            <span style="font-size: 18px;">Enter new passcode</span>
            <br>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="./create-pin" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo "" . $_SESSION['usr_txtCarerPinCode'] . ""; ?>" name="myCredential" />
                    <div class="pin-login" id="mainPinLogin">
                        <input type="password" style="color: white; font-size:22px;" name="verificationTXT" readonly class="pin-login__text">
                        <div class="pin-login__numpad">
                        </div>
                        <div style="text-align: center;" class="form-group">
                            <button style="width: 40px; height:40px; text-align:center; border-radius: 100%; background-color:#27ae60; color:white; padding:6px;
                border:none; font-size:22px;" name="btnSubmitPinCode" type="submit"><i class="bi bi-box-arrow-in-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>


    <script>
        class PinLogin {
            constructor({
                el,
                loginEndpoint,
                redirectTo,
                maxNumbers = 4
            }) {
                this.el = {
                    main: el,
                    numPad: el.querySelector(".pin-login__numpad"),
                    textDisplay: el.querySelector(".pin-login__text")
                };

                this.loginEndpoint = loginEndpoint;
                this.redirectTo = redirectTo;
                this.maxNumbers = maxNumbers;
                this.value = "";

                this._generatePad();
            }

            _generatePad() {
                const padLayout = [
                    "1", "2", "3",
                    "4", "5", "6",
                    "7", "8", "9",
                    "C", "0", "."
                ];

                padLayout.forEach(key => {
                    const insertBreak = key.search(/[369]/) !== -1;
                    const keyEl = document.createElement("div");

                    keyEl.classList.add("pin-login__key");
                    keyEl.classList.toggle("material-icons", isNaN(key));
                    keyEl.textContent = key;
                    keyEl.addEventListener("click", () => {
                        this._handleKeyPress(key)
                    });
                    this.el.numPad.appendChild(keyEl);

                    if (insertBreak) {
                        this.el.numPad.appendChild(document.createElement("br"));
                    }
                });
            }

            _handleKeyPress(key) {
                switch (key) {
                    case "C":
                        this.value = this.value.substring(0, this.value.length - 1);
                        break;
                    case ".":
                        this._attemptLogin();
                        break;
                    default:
                        if (this.value.length < this.maxNumbers && !isNaN(key)) {
                            this.value += key;
                        }
                        break;
                }

                this._updateValueText();
            }

            _updateValueText() {
                this.el.textDisplay.value = "_".repeat(this.value.length);
                this.el.textDisplay.classList.remove("pin-login__text--error");
            }

            _attemptLogin() {
                if (this.value.length > 0) {
                    fetch(this.loginEndpoint, {
                        method: "post",
                        urldecode: "./processing-pin-code",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `pincode=${this.value}`
                    }).then(response => {
                        if (response.status === 200) {
                            window.location.href = this.redirectTo;
                        } else {
                            this.el.textDisplay.classList.add("pin-login__text--error");
                        }
                    })
                }
            }
        }

        new PinLogin({
            el: document.getElementById("mainPinLogin"),
            loginEndpoint: "./processing-pin-code",
            redirectTo: "./processing-pin-code"
        });
    </script>
</body>

</html>