<?php include('dbconnection-string.php'); ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create account - Geosoft | For home and community care</title>
  <meta property="og:image" content="../assets/img/gsLogo.png" />
  <meta name="twitter:image" content="../assets/img/gsLogo.png" />
  <link rel="icon" href="../assets/img/gsLogo.png" />
  <!-- Logo icon -->
  <link rel="icon" href="../assets/img/gsLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="../assets/js/init-alpine.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#popupAlert').hide();
    });
    $(document).ready(function() {
      $('#popupAlert2').hide();
    });
  </script>
  <?php include('processing-signup-details.php'); ?>

</head>
<style type="text/css">
  #txtUserLog {
    height: 55px;
    font-size: 18px;
  }

  html {
    font-size: 18px;
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

  <form action="./create-account" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="flex items-center min-h-screen p-2 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/create-account-office.jpeg" alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../assets/img/create-account-office-dark.jpeg" alt="Office" />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                Create account
              </h1>
              <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:15px; background-color:rgba(192, 57, 43,1.0); color:white;">
                Account already exist!!!
              </div>
              <div id="popupAlert2" style="width: 100%; height:auto; margin-bottom:5px; padding:15px; background-color:rgba(211, 84, 0,1.0); color:white;">
                Password not matched
              </div>

              <label class="block">
                <span class="text-gray-700 dark:text-gray-400">Full name</span>
                <input id="txtUserLog" required name="txtFullName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Samson Gift" />
              </label>
              <br>

              <label class="block">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input id="txtUserLog" type="email" required name="txtEmail" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="samsongift@gmail.com" />
              </label>
              <br>
              <label class="block">
                <span class="text-gray-700 dark:text-gray-400">Phone</span>
                <input id="txtUserLog" type="tel" required name="txtPhoneNumber" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="0123456789" />
              </label>

              <label class="block mt-4">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input id="txtUserLog" required name="txtPassword" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
              </label>

              <label class="block mt-4">
                <span class="text-gray-700 dark:text-gray-400">
                  Confirm password
                </span>
                <input id="txtUserLog" required name="txtCPassword" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
              </label>

              <div class="flex mt-6">
                <label class="flex items-center dark:text-gray-400">
                  <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                  <span class="ml-2">
                    I agree to the
                    <span class="underline">privacy policy</span>
                  </span>
                </label>
              </div>



              <?php
              require_once('dbconnection-string.php');

              for ($a = 1; $a <= 50; $a++) {
                $usdd = "0";
                $rand = rand(0000, 9999);
                $ud = "45";
                $id = "$usdd$rand$ud";
              }

              // Return current date from the remote server

              ?> <input type="hidden" value="<?php echo $id; ?>" name="mysocialId" />
              <input type="hidden" name="currentDate" value="<?php echo "" . date("Y-m-d") . ""; ?>" />
              <input type="hidden" name="currentTime" value="<?php echo "" . date("H:ia"); ?>" />


              <!-- You should use a button here, as the anchor is only used for the example  -->
              <button id="txtUserLog" name="btnCarerSignup" type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="./login.html">
                Create account
              </button>

              <hr class="my-8" />


              <p class="mt-4">
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./index">
                  Already have an account? Login
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>





  </form>

</body>

</html>