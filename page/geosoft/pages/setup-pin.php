<!DOCTYPE html>
<html :class="{ 'theme-dark': light }" x-data="data()" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Geosoft is a dynamic nursing, domiciliary, support and agency App based in the UK. It is built on solid partnership and experience spanning almost two decades within its management team." />
  <meta name="keywords" content="HTML, CSS, JavaScript, AJAX, PHP mySQL" />
  <meta name="author" content="Ese Sphere Ent" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta property="og:image" content="../assets/img/gsLogo.png" />
  <meta name="twitter:image" content="../assets/img/gsLogo.png" />
  <link rel="icon" href="../assets/img/gsLogo.png" />
  <link rel="icon" href="../assets/img/gsLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="../assets/js/init-alpine.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#popupAlert').hide();
      $('#popupAlertlog').hide();
    });
    $(document).ready(function() {
      $('#popupAlert2').hide();
    });
  </script>
  <?php include('processing-setup-pin.php'); ?>
</head>

<style type="text/css">
  #txtUserLog {
    height: 55px;
    font-size: 19px;
    border: rgba(95, 39, 205, 1.0) 1px solid;
  }

  html,body {
    font-size: 18px;
    overflow:hidden;
  }

  ::-webkit-input-placeholder {
    color: red;
    font-weight: 600;
  }

  :-moz-placeholder {
    /* Firefox 18- */
    color: red;
    font-weight: 600;
  }

  ::-o-placeholder {
    /* Firefox 19+ */
    color: red;
    font-weight: 600;
  }

  :-ms-input-placeholder {
    color: red;
    font-weight: 600;
  }
</style>


<body>

  <div style="width: 100%; height:auto; text-align:right; background-image: url('../assets/img/23-bgs.jpg'); padding:22px; color:white; background-size: cover;">
    <button onclick="history.back()" style="font-size:16px; font-weight:600; background-color:inherit; border:none;"></button>
  </div>

  <form action="./setup-pin" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="flex items-center min-h-screen p-2 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/forgot-password-office.jpeg" alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../assets/img/forgot-password-office-dark.jpeg" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 style="font-size:20px;" class="mb-4 font-semibold text-gray-700 dark:text-gray-200">
                Account setup
              </h1>

              <div id="popupAlert" style="width: 100%; height:auto; font-size:16px; border-radius:5px; margin-bottom:5px; padding:15px; background-color:rgba(192, 57, 43,1.0); color:white;">
                Email not found!
              </div>
              <div id="popupAlertlog" style="width: 100%; height:auto; font-size:18px; border-radius:5px; margin-bottom:5px; padding:15px; background-color:rgba(192, 57, 43,1.0); color:white;">
                Account already exist
                <br>
                <a href="./reset-pin" style="text-decoration: underline; padding:12px 0px 12px 0px;">
                  click here to change pin
                </a>
              </div>


              <label class="block">
                <input id="txtUserLog" placeholder="Enter email" type="email" name="txt_myEmail" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
              </label>

              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button id="txtUserLog" name="btnContinue" type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="./login.html">
                Continue
              </button>

            </div>
          </div>
        </div>
      </div>
    </div>

  </form>

</body>

</html>