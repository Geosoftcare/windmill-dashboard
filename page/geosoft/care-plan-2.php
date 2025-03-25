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
            $getUniversalSpecialId = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE userId='$myClientSpecialUserId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
            $row_select_line = mysqli_fetch_array($getUniversalSpecialId, MYSQLI_ASSOC);
            $displayClientSpecId = $row_select_line['uryyToeSS4'];
            $displayClientCareCalls = $row_select_line['dateTime_in'];
            $displayClientCareCallsEnd = $row_select_line['dateTime_out'];
            $displayClientCareCallsDate = $row_select_line['Clientshift_Date'];
        }
        ?>


        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <h2 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200">
                Care log
            </h2>
            <!-- <form>
        <?php
        //$url = 'https://api.ipgeolocation.io/ipgeo?apiKey=dfe5978c4c4546b7834a7a539ce6af71';

        // Get data from openweathermap and store in JSON object
        //$data = file_get_contents($url);
        //$json = json_decode($data, true);

        // Fetch required fields
        //$myCurLat = $json['latitude'];
        //$myCurLong = $json['longitude'];

        // $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' ");
        //while ($row = mysqli_fetch_array($result)) {
        ?>
          <input type="hidden" id="point1" value="<?php //echo "" . $row['client_latitude'] . "," . $row['client_longitude'] . "";
                                                    //} 
                                                    ?>" />

          <input type='hidden' id='point2' value="<?php //echo $myCurLat . ',' . $myCurLong; 
                                                    ?>">

          <button type="button" id="calc-dist" style="float: right; margin-top:-30px;" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Start call
          </button>
      </form>-->


            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////---->
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////---->
            <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////---->


            <form action="./processing-start-shift" enctype="multipart/form-data" method="post" id="numform" autocomplete="off">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
                while ($row = mysqli_fetch_array($result)) { ?>

                    <input type="hidden" value="<?php echo "" . $row['user_special_Id'] . ""; ?>" name="txtCarerId" />
                    <input type="hidden" value="<?php echo "" . $row['user_fullname'] . "";
                                            } ?>" name="txtCarerName" />
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' ");
                    while ($row = mysqli_fetch_array($result)) {
                    ?>

                        <input type="hidden" value="Checked in" name="txtStart" />
                        <input type="hidden" value="<?php echo $currentDate; ?>" name="txtStartDate" />
                        <input type="hidden" value="<?php date_default_timezone_set('Europe/London');
                                                    $sTime = date("H:i");
                                                    print $sTime; ?>" name="txtStartTime" />
                        <input type="hidden" value="<?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . ""; ?>" name="txtClientName" />
                        <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . ""; ?>" name="txtClientId" />
                        <input type="hidden" value="<?php echo "" . $row['client_area'] . ""; ?>" name="txtClientArea" />

                        <input type="hidden" value="<?php echo "" . $row['client_address_line_1'] . ""; ?>" name="txtClientAddLi1" />
                        <input type="hidden" value="<?php echo "" . $row['client_address_line_2'] . ""; ?>" name="txtClientAddLi2" />
                        <input type="hidden" value="<?php echo "" . $row['client_city'] . ""; ?>" name="txtClientCity" />
                        <input type="hidden" value="<?php echo "" . $row['client_poster_code'] . "";
                                                } ?>" name="txtClientPostCode" />
                        <input type="hidden" value="<?php echo date('Y-m-d') ?>" name="txtTimeSheetDate" />

                        <?php
                        $echomyTime = date("H:i");

                        $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE (uryyToeSS4='$displayClientSpecId' AND Clientshift_Date = '$displayClientCareCallsDate' AND first_carer_Id = '" . $_SESSION['usr_carerId'] . "' AND col_company_id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                        while ($rowAreaDate = mysqli_fetch_array($result)) {
                            $CureDay = $rowAreaDate['col_area_Id'];
                            $currCallTime = $rowAreaDate['dateTime_in'];
                            $companyId = $rowAreaDate['col_company_Id'];

                        ?>
                            <input type="text" value="<?php echo $myClientSpecialUserId; ?>" name="txtClientSpecialUserId" />
                            <input type="text" value="<?php echo $CureDay; ?>" name="txtColAreaId" />
                            <input type="text" value="<?php echo $companyId;
                                                    } ?>" name="txtcompanyId" />

                            <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

                            <input type="hidden" value="" name="txtDistance" id="result-distance" />

                            <?php
                            $sel_client_carecall_result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE userId = '$myClientSpecialUserId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
                            while ($sel_client_rowAreaDate = mysqli_fetch_array($sel_client_carecall_result)) {
                                $display_client_carecall = $sel_client_rowAreaDate['care_calls'];
                                $display_first_carerUserIdPin = $sel_client_rowAreaDate['first_carer_Id'];
                                $display_Clientshift_Date = $sel_client_rowAreaDate['Clientshift_Date'];
                            } ?>


                            <input type="hidden" value="<?php echo $display_client_carecall; ?>" name="txtVariousCareCalls" />
                            <input type="hidden" value="<?php echo $myClientSpecialUserId; ?>" name="txtVariosStatusNumber" />
                            <input type="hidden" value="<?php echo $display_first_carerUserIdPin; ?>" name="txtFirstCarerIdPin" />
                            <input type="hidden" value="<?php echo $displayClientCareCalls; ?>" name="txtCareCallsStartTime" />
                            <input type="hidden" value="<?php echo $displayClientCareCallsEnd; ?>" name="txtCareCallsEndTime" />
                            <input type="hidden" value="<?php echo $display_Clientshift_Date; ?>" name="txtClientCareCallsDate" />

                            <input type="hidden" name="txtLatitude" id="txtLatitude" value="">
                            <input type="hidden" name="txtLongitude" id="txtLongitude" value="">

                            <button type="submit" id="btnSubmitStartCallCheckthisOutcomeday" name="btnStartShift" style="float: right; margin-top:-30px;" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Check in
                            </button>
            </form>

            <?php
            $sel_client_carecallS_data_result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$displayClientSpecId' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
            while ($sel_client_carecallS_data_row = mysqli_fetch_array($sel_client_carecallS_data_result)) {
            ?>

                <a href="./tasks-progress?<?php echo "uryyToeSS4=" . $sel_client_carecallS_data_row['uryyToeSS4'] . ""; ?>"></a>

                <div style="margin-top: 10px; font-size:20px;" class="grid gap-2 mb-8 md:grid-cols-2">
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
                            <div style="width: 100%; height:auto; padding:8px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                                <div class="flex" id="title-Base-txt">Prefered Pronoun</div>
                                <div class="flex" id="body-Base-txt"> <?php echo "" . $sel_client_carecallS_data_row['client_referred_to'] . ""; ?></div>
                            </div>


                            <div style="width: 100%; height:auto; padding:8px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                                <div class="flex" id="title-Base-txt">Phone number</div>
                                <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_primary_phone'] . ""; ?></div>
                            </div>
                        </div>


                        <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                            <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
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

                    <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
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

                    <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                        <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                            <div class="flex" id="title-Base-txt">Key Safe</div>
                            <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_access_details'] . ""; ?></div>
                        </div>
                    </div>

                    <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                        <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                            <div class="flex" id="title-Base-txt">Date of birth</div>
                            <div class="flex" id="body-Base-txt">
                                <?php echo date('d M, Y', strtotime("" . $sel_client_carecallS_data_row['client_date_of_birth'] . "")); ?></div>
                        </div>
                    </div>

                    <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                        <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                            <div class="flex" id="title-Base-txt">Required services</div>
                            <div class="flex" id="body-Base-txt"><?php echo "" . $sel_client_carecallS_data_row['client_service'] . ""; ?></div>
                        </div>
                    </div>

                    <div style="margin-top: -40px; padding:15px 10px 15px 10px;" class="flex mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                        <div style="width: 100%; height:auto; padding:5px; border-bottom: solid 1px rgba(142, 68, 173,.4);">
                            <div class="flex" id="title-Base-txt">Medicine support</div>
                            <div class="flex" id="body-Base-txt">We provide <?php echo "" . $sel_client_carecallS_data_row['client_first_name'] . "";
                                                                        } ?>'s medicine support</div>
                        </div>
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
                                echo "" . $row['client_highlights'] . "";
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


                <?php include('footer-contents.php'); ?>