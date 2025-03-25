<?php

if (isset($_POST['btnCheckEmail'])) {

  include('dbconnection-string.php');

  $collectMyEmail = mysqli_real_escape_string($conn, $_POST['txt_myEmail']);
  $collectMyEmail = strip_tags($collectMyEmail);
  $collectMyEmail = htmlspecialchars($collectMyEmail);

  $final_str = strtolower($collectMyEmail);

  $sel_data_for_reset = mysqli_query($conn, "SELECT user_email_address, col_company_Id, user_special_Id, user_password FROM tbl_goesoft_carers_account WHERE user_email_address='$final_str' ");
  $get_data_for_row = mysqli_fetch_array($sel_data_for_reset);
  $count = mysqli_num_rows($sel_data_for_reset); // if uname/pass correct it returns must be 1 row

  if ($count == 1 && $get_data_for_row['user_email_address'] == $final_str) {
    $_SESSION['usr_email'] = $get_data_for_row['user_email_address'];
    $_SESSION['usr_carerId'] = $get_data_for_row['user_special_Id'];
    $_SESSION['usr_compId'] = $get_data_for_row['col_company_Id'];
    header("Location: ./reset-pin");
  } else {
    echo "
            <script type='text/javascript'>
            $(document).ready(function() {
              $('#popupAlert').show();
            });
          </script>";
  }
}
