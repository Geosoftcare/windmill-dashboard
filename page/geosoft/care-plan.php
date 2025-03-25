<?php include('header-contents.php'); ?>

<style>
  #title-Base-txt,
  #body-Base-txt {
    font-size: 16px;
  }
</style>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
  <main class="h-full pb-16 overflow-y-auto">

    <?php
    if (isset($_GET['userId'])) {
      $myClientSpecialUserId = $_GET['userId'];
      $getUniversalSpecialId = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls 
      WHERE (userId='$myClientSpecialUserId' AND col_company_id='" . $_SESSION['usr_compId'] . "') ");
      $row_select_line = mysqli_fetch_array($getUniversalSpecialId, MYSQLI_ASSOC);
      $displayClientSpecId = $row_select_line['uryyToeSS4'];
      $displayClientCareCalls = $row_select_line['dateTime_in'];
      $displayClientCareCallsEnd = $row_select_line['dateTime_out'];
      $displayClientCareCallsDate = $row_select_line['Clientshift_Date'];
      $display_client_carecall = $row_select_line['care_calls'];
      $display_first_carerUserIdPin = $row_select_line['first_carer_Id'];
    }

    $myCheck = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' 
    AND shift_end_time = 'Null' AND col_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
    $countRes = mysqli_num_rows($myCheck);
    if ($countRes != 0) {
      while ($myrowresult = mysqli_fetch_array($myCheck)) {
        $txtClientOngoingId = $myrowresult['uryyToeSS4'];
        $txtClientOngoingCareCall = $myrowresult['col_call_status'];
        $txtClientOngoingDate = $myrowresult['shift_date'];
        if ($txtClientOngoingId == $displayClientSpecId && $txtClientOngoingDate == $today) {
          print "
            <div style='width: 100%; height:auto; padding:16px; font-size:16px; background-color:rgba(25, 42, 86,1.0); color:#fff;'>
              Currently ongoing
             </div>
          ";
        } else {
          print "
            <div style='width: 100%; height:auto; padding:16px; font-size:16px; background-color:rgba(192, 57, 43,1.0); color:#fff'>
              End previous shift before moving to the next.
            </div>
          ";
        }
      }
    }
    ?>

    <div style="background-color: rgba(189, 195, 199,.3); width:100%; height:auto; border-bottom:2px solid rgba(189, 195, 199,.5); margin-bottom:50px; padding: 5px 0px 5px 18px;" class="font-semibold text-gray-700 dark:text-gray-200">
      <span style="font-size: 21px;">Care log</span>
      <p style="margin-top: -4px;font-size: 16px; color:rgba(44, 62, 80,.4);">
        <?php
        $myCheck_order2 = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (first_carer_Id != '" . $_SESSION['usr_carerId'] . "' 
          AND uryyToeSS4 = '$displayClientSpecId' AND Clientshift_Date = '$displayClientCareCallsDate' AND care_calls = '$display_client_carecall') GROUP BY first_carer_Id");
        if ($row_order2 = mysqli_fetch_array($myCheck_order2)) {
          $hold_carer2_Id = $row_order2['first_carer'];
          echo "
            <table border='0'>
              <tr>
                <td style='border: none;'><img src='./assets/img/users.svg' style='height: 12px; width:12px;' alt=''></td>
                <td style='border: none;'>&nbsp;
                <div id='body-Base-txt' style='width: 150px; margin-top:-30px; font-size:15px; text-overflow: ellipsis; white-space: nowrap;overflow: hidden; height:auto;'>
                &nbsp;" . $hold_carer2_Id . "
                </div>
                </td>
              </tr>
            </table>";
        } else {
          echo "
            <table border='0'>
              <tr>
                <td style='border: none;'><img src='./assets/img/users.svg' style='height: 12px; width:12px;' alt=''></td>
                <td style='border: none;'>&nbsp;
                <div id='body-Base-txt' class='text-sm font-semibold text-gray-700 dark:text-gray-200' style='width: 150px; margin-top:-30px; font-size:15px; text-overflow: ellipsis; white-space: nowrap;overflow: hidden; height:auto;'>
                &nbsp;Single visit
                </div>
                </td>
              </tr>
            </table>";
        }
        ?>
      </p>

      <button form="myStartForm" type="submit" id="btnStartButton" name="btnStartShift" style="position:absolute; right:10px; top:90px;"
        class="px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border 
        border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Start
      </button>
    </div>

    <div class="container px-2 mx-auto grid">
      <form action="./processing-start-shift" enctype="multipart/form-data" method="post" id="myStartForm" autocomplete="off">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' ");
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <input form="myStartForm" type="hidden" value="<?php echo "" . $_SESSION['usr_carerId'] . ""; ?>" name="txtCarerId" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $_SESSION['usr_carerNames'] . ""; ?>" name="txtCarerName" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $_SESSION['usr_carerPostCode'] . ""; ?>" name="txtCarerPC" />
          <input form="myStartForm" type="hidden" value="Checked in" name="txtStart" />
          <input form="myStartForm" type="hidden" value="<?php echo $displayClientCareCallsDate; ?>" name="txtStartDate" />
          <input form="myStartForm" type="hidden" value="<?php print $sTime; ?>" name="txtStartTime" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?>" name="txtClientName" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" name="txtClientId" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_area'] . ""; ?>" name="txtClientArea" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_address_line_1'] . ""; ?>" name="txtClientAddLi1" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_address_line_2'] . ""; ?>" name="txtClientAddLi2" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_city'] . ""; ?>" name="txtClientCity" />
          <input form="myStartForm" type="hidden" value="<?php echo "" . $row['client_poster_code'] . "";
                                                        } ?>" name="txtClientPostCode" />
          <input form="myStartForm" type="hidden" value="<?php echo date('Y-m-d') ?>" name="txtTimeSheetDate" />

          <?php
          $echomyTime = date("H:i");
          $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$displayClientSpecId' 
          AND Clientshift_Date = '$displayClientCareCallsDate' 
          AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_id='" . $_SESSION['usr_compId'] . "') 
          ORDER BY userId DESC LIMIT 1 ");
          while ($rowAreaDate = mysqli_fetch_array($result)) {
            $CureDay = $rowAreaDate['col_area_Id'];
            $currCallTime = $rowAreaDate['dateTime_in'];
            $companyId = $rowAreaDate['col_company_Id'];
          ?>
            <input form="myStartForm" type="hidden" value="<?php echo $myClientSpecialUserId; ?>" name="txtClientSpecialUserId" />
            <input form="myStartForm" type="hidden" value="<?php echo $CureDay; ?>" name="txtColAreaId" />
            <input form="myStartForm" type="hidden" value="<?php echo $companyId;
                                                          } ?>" name="txtcompanyId" />

            <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

            <input form="myStartForm" type="hidden" value="<?php echo $display_client_carecall; ?>" name="txtVariousCareCalls" />
            <input form="myStartForm" type="hidden" value="<?php echo $display_first_carerUserIdPin; ?>" name="txtFirstCarerIdPin" />
            <input form="myStartForm" type="hidden" value="<?php echo $displayClientCareCalls; ?>" name="txtCareCallsStartTime" />
            <input form="myStartForm" type="hidden" value="<?php echo $displayClientCareCallsEnd; ?>" name="txtCareCallsEndTime" />
            <input form="myStartForm" type="hidden" value="<?php echo $displayClientCareCallsDate; ?>" name="txtClientCareCallsDate" />
      </form>

      <?php
      $sel_client_carecallS_data_result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
      while ($sel_client_carecallS_data_row = mysqli_fetch_array($sel_client_carecallS_data_result)) {
      ?>

        <a href="./tasks-progress?<?php echo "uryyToeSS4=" . $sel_client_carecallS_data_row['uryyToeSS4'] . ""; ?>"></a>
        <div style="margin-top:-30px; font-size:20px;" class="grid gap-2 mb-8 md:grid-cols-2">
          <div class="min-w-0 p-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300"></h4>
            <table style="width: 100%; margin-top:33px;" class="w-full whitespace-no-wrap">

              <tbody style="font-size: 20px;" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-2 py-8">
                    <div class="flex items-center text-md">
                      <!-- Avatar with inset shadow -->
                      <div style="margin-top:-35px;" class="relative mr-6 rounded-full md:block">
                        <img style="width:80px; height:80px;" class="object-cover w-full h-full rounded-full" src="assets/img/user_icons.png" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold" style="font-size: 18px;"><?php echo "" . $sel_client_carecallS_data_row['client_first_name'] . " " . $sel_client_carecallS_data_row['client_last_name'] . "";
                                                                          ?></p>
                        <p id="title-Base-txt" class="text-xs text-gray-600 dark:text-gray-400">
                          <?php echo "" . $sel_client_carecallS_data_row['client_preferred_name'] . " in " . $sel_client_carecallS_data_row['client_area'] . ""; ?>
                        </p>
                        <br>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <hr>

            <div style="margin-top: -20px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
              <div style="width: 100%; height:auto; margin-top:15px; padding:8px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                <div class="flex" id="title-Base-txt">Prefered Pronoun</div>
                <div class="flex" id="body-Base-txt"> <?php echo "" . $sel_client_carecallS_data_row['client_referred_to'] . ""; ?></div>
              </div>


              <div style="width: 100%; height:auto; margin-top:15px; padding:8px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                <div class="flex" id="title-Base-txt">Phone number</div>
                <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_primary_phone'] . ""; ?></div>
              </div>
            </div>


            <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
              <div style="width: 100%; height:auto; margin-top:8px; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                <a target="_blank" style="color: rgba(9, 132, 227,1.0);" href="https://www.google.fr/maps/place/<?php echo " " . $sel_client_carecallS_data_row['client_poster_code'] . ""; ?>">
                  <div class="flex" id="title-Base-txt">Address</div>
                  <div class="flex" id="body-Base-txt">
                    <?php echo "" . $sel_client_carecallS_data_row['client_address_line_1'] . " " . $sel_client_carecallS_data_row['client_address_line_2'] . ""; ?>, <?php echo "" . $sel_client_carecallS_data_row['client_area'] . ""; ?>,
                    <?php echo "" . $sel_client_carecallS_data_row['client_city'] . ""; ?>, <?php echo " " . $sel_client_carecallS_data_row['client_poster_code'] . ""; ?>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div style="margin-top: 0px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">City</div>
              <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_city'] . ""; ?></div>
            </div>

            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">Postal code</div>
              <div class="flex" id="body-Base-txt">
                <?php echo " " . $sel_client_carecallS_data_row['client_poster_code'] . ""; ?></div>
            </div>
          </div>

          <div style="margin-top: -30px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">Key Safe</div>
              <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_access_details'] . ""; ?></div>
            </div>
          </div>

          <div style="margin-top: -30px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">Date of birth</div>
              <div class="flex" id="body-Base-txt">
                <?php echo date('d M, Y', strtotime("" . $sel_client_carecallS_data_row['client_date_of_birth'] . "")); ?></div>
            </div>
          </div>

          <div style="margin-top: -30px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">Required services</div>
              <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_service'] . ""; ?></div>
            </div>
          </div>

          <div style="margin-top: -30px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
              <div class="flex" id="title-Base-txt">Medicine support</div>
              <div class="flex" id="body-Base-txt">We provide <?php echo "" . $sel_client_carecallS_data_row['client_first_name'] . "";
                                                            } ?>'s medicine support</div>
            </div>
          </div>
        </div>

        <div style="margin-top: -40px;" class="container px-2 mx-auto grid">
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./wiitme?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/bookmark.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">What is important to me</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./mlad?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/thumbs-up.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">My likes and dislikes</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./mcc?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/alert-triangle.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">My current condition</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./mmh?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/book-open.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">My medical history</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./mph?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/activity.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">My physical health</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./mh?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/heart.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">My mental health</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./hic?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/message-square.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">How I communicate</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./aei?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div class="flex font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/figma.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">Assistive equipment issues</span>
              </div>
            </a>
          </div>
          <div class="grid gap-2 mb-4 md:grid-cols-6">
            <a href="./concern-form?uryyToeSS4=<?php echo $displayClientSpecId; ?>" style="text-decoration: none;">
              <div style="background-color: rgba(214, 48, 49,1.0); color:#fff;" class="flex font-semibold text-gray-600 dark:text-gray-300 items-center dark:bg-gray-800" id="care-plan-list">
                <span><img src="./assets/img/care-plan/alert-octagon.svg" alt=""></span>
                &nbsp;&nbsp;
                <span id="body-Base-txt">Raise a concern</span>
              </div>
            </a>
          </div>

        </div>


        <div style="margin-top: 10px;" class="grid gap-4 mb-8 md:grid-cols-6">
          <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
            <h3 style="color:rgba(236, 240, 241,.8);" class="mb-4 font-semibold">
              About me
            </h3>
            <p style="color:rgba(236, 240, 241,.8);">
              <?php
              $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
              while ($row = mysqli_fetch_array($result)) {
                echo nl2br(htmlspecialchars($row['client_highlights']));
              } ?>

              <br><br>
            <div style="text-align:left; font-size:14px;">
              <em>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
                while ($row = mysqli_fetch_array($result)) {
                  echo "-----------<br>" . $row['care_plan_status'] . "";
                } ?>
              </em>
            </div>
            <br>


            <div style="width: 100%; height:auto; padding:22px;">
              <form action="./processing-client-careplan-status" method="post" enctype="multipart/form-data" autocomplete="off">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
                while ($row = mysqli_fetch_array($result)) { ?>

                  <input type="hidden" value="<?php echo $myClientSpecialUserId;
                                            } ?>" name="txtClientId2" />
                  <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" name="txtCarerEmail2" />
                  <button type="submit" name="btnOfficiallyCert" style="float: left; margin-top:-30px; background-color:black; padding:12px; font-size:14px; border-radius:5px;">
                    Officially certified
                  </button>
              </form>
            </div>

            </p>
            <br>
          </div>
        </div>

    </div>

    <?php include('footer-contents.php'); ?>