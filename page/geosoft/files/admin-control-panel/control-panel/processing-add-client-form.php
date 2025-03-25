<?php

if (isset($_POST['btnSubmitClient'])) {
    $txtTitle = mysqli_real_escape_string($conn, trim($_REQUEST['txtTitle']));
    $txtFirstName = mysqli_real_escape_string($conn, trim($_REQUEST['txtFirstName']));
    $txtLastName = mysqli_real_escape_string($conn, trim($_REQUEST['txtLastName']));
    $txtMiddleName = mysqli_real_escape_string($conn, trim($_REQUEST['txtMiddleName']));
    $txtPreferredName = mysqli_real_escape_string($conn, trim($_REQUEST['txtPreferredName']));
    $txtEmailAddress = mysqli_real_escape_string($conn, trim($_REQUEST['txtEmailAddress']));
    $txtGenderBased = mysqli_real_escape_string($conn, trim($_REQUEST['txtGenderBased']));
    $txtDateofBirth = mysqli_real_escape_string($conn, trim($_REQUEST['txtDateofBirth']));
    $txtClientailment = mysqli_real_escape_string($conn, $_REQUEST['txtClientailment']);

    $txtPrimaryPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['txtPrimaryPhoneNumber']);
    $txtCultureReligion = mysqli_real_escape_string($conn, $_REQUEST['txtCultureReligion']);
    $txtSexuality = mysqli_real_escape_string($conn, $_REQUEST['txtSexuality']);
    $txtclientArea = mysqli_real_escape_string($conn, $_REQUEST['txtclientArea']);

    $txtCareServices = mysqli_real_escape_string($conn, $_REQUEST['txtCareServices']);
    $txtSupportCare = 'Support Care';

    $txtAddressLine1 = mysqli_real_escape_string($conn, $_REQUEST['txtAddressLine1']);
    $txtAddressLine2 = mysqli_real_escape_string($conn, $_REQUEST['txtAddressLine2']);
    $txtCity = mysqli_real_escape_string($conn, $_REQUEST['txtCity']);

    // Google Maps API Key 
    $GOOGLE_API_KEY = 'AIzaSyCkbQle_h40JIBtKNhYeAfLpLgs0JCbRvI';

    // Address from which the latitude and longitude will be retrieved 
    $address = $txtAddressLine1 . ', ' . $txtAddressLine2 . ', ' . $txtCity;

    // Formatted address 
    $formatted_address = str_replace(' ', '+', $address);

    // Get geo data from Google Maps API by address 
    $geocodeFromAddr = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$formatted_address}&key={$GOOGLE_API_KEY}");

    // Decode JSON data returned by API 
    $apiResponse = json_decode($geocodeFromAddr);

    // Retrieve latitude and longitude from API data 
    $latitude  = $apiResponse->results[0]->geometry->location->lat;
    $longitude = $apiResponse->results[0]->geometry->location->lng;

    $formatted_address  = $apiResponse->results[0]->formatted_address;

    // Render the latitude and longitude of the given address 


    $txtCounty = mysqli_real_escape_string($conn, $_REQUEST['txtCounty']);
    $txtPosterCode = mysqli_real_escape_string($conn, $_REQUEST['txtPosterCode']);
    $txtCountry = mysqli_real_escape_string($conn, $_REQUEST['txtCountry']);
    $txtAccessDetails = mysqli_real_escape_string($conn, $_REQUEST['txtAccessDetails']);
    $txtHighlights = mysqli_real_escape_string($conn, $_REQUEST['txtHighlights']);
    $txtOfficeIncharge = mysqli_real_escape_string($conn, $_REQUEST['txtOfficeIncharge']);


    $mysocialId = mysqli_real_escape_string($conn, $_REQUEST['mysocialId']);
    $mysocialIdEncrypt = mysqli_real_escape_string($conn, $_REQUEST['mysocialIdEncrypt']);


    $txtStartDate = mysqli_real_escape_string($conn, $_REQUEST['txtStartDate']);
    $txtEndDate = mysqli_real_escape_string($conn, $_REQUEST['txtEndDate']);

    $txtCompanyId = mysqli_real_escape_string($conn, $_REQUEST['txtCompanyId']);

    $txtCol29 = "Null";
    $txtCol30 = "Null";
    $txtCol31 = "Null";
    $txtCol32 = "Null";
    $txtCol33 = "Null";
    $txtCol34 = "Null";
    $txtCol35 = "Null";
    $txtCol36 = "Null";

    $myIdentity001 = hash('sha256', $mysocialId);

    $righttodisplay = "True";

    // This data is for client calls time in and out.
    $firstCarer = "Null";
    $secondCarer = "Null";
    $lcientCareCallsMorn = "Morning";
    $lcientCareCallsLunch = "Lunch";
    $lcientCareCallsTea = "Tea";
    $lcientCareCallsBed = "Bed";
    $supportWorker = "Support-work";
    $clientDateTimeIn = "Null";
    $clientDateTimeOut = "Null";
    $clientLocation = "Null";
    $clientResource = "Null";
    $clientTimelineColour = "Null";
    $clientLatitude = $latitude;
    $clientLongitude = $longitude;

    $clientResource = "Null";
    $clientTimelineColour = "Null";

    $myCheck = "SELECT * FROM tbl_general_client_form WHERE (client_first_name = '" . $txtFirstName . "' 
    AND client_last_name = '" . $txtLastName . "' AND client_poster_code = '" . $txtPosterCode . "') ";
    $myCheckres = mysqli_query($conn, $myCheck);
    $countRes = mysqli_num_rows($myCheckres);

    if ($countRes != 0) {
        echo "
      <script type='text/javascript'>
      $(document).ready(function() {
        $('#popupAlert').show();
      });
    </script>";
    } else {
        $sql_get_client_Id = mysqli_query($conn, "SELECT * FROM tbl_general_client_form ORDER BY userId DESC LIMIT 1");
        $row_get_client_Id = mysqli_fetch_array($sql_get_client_Id);
        $varSpecialId = $row_get_client_Id['uryyToeSS4'];
        if ($row_get_client_Id == 0) {
            $myIdentity = 1023;
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_general_client_form (client_title, client_first_name, client_last_name, client_middle_name, client_preferred_name, client_email_address, client_referred_to, client_date_of_birth, client_ailment, client_primary_phone, client_culture_religion, client_sexuality, client_area, client_address_line_1, client_address_line_2, client_city, client_county, client_poster_code, client_country, client_access_details, client_highlights, col_Office_Incharge, clientStart_date, clientEnd_date, uryyToeSS4, what_is_important_to_me, my_likes_and_dislikes, my_current_condition, my_medical_history, my_physical_health, my_mental_health, how_i_communicate, assistive_equipment_i_use, client_latitude, client_longitude,col_company_Id) 
            VALUES('" . $txtTitle . "', '" . $txtFirstName . "', '" . $txtLastName . "', '" . $txtMiddleName . "', '" . $txtPreferredName . "', '" . $txtEmailAddress . "', '" . $txtGenderBased . "', '" . $txtDateofBirth . "', '" . $txtClientailment . "', '" . $txtPrimaryPhoneNumber . "', '" . $txtCultureReligion . "', '" . $txtSexuality . "', '" . $txtclientArea . "', '" . $txtAddressLine1 . "', '" . $txtAddressLine2 . "', '" . $txtCity . "', '" . $txtCounty . "', '" . $txtPosterCode . "', '" . $txtCountry . "', '" . $txtAccessDetails . "', '" . $txtHighlights . "', '" . $txtOfficeIncharge . "', '" . $txtStartDate . "', '" . $txtEndDate . "', '" . $myIdentity . "', '" . $txtCol29 . "', '" . $txtCol30 . "', '" . $txtCol31 . "', '" . $txtCol32 . "', '" . $txtCol33 . "', '" . $txtCol34 . "', '" . $txtCol35 . "', '" . $txtCol36 . "', '" . $clientLatitude . "', '" . $clientLongitude . "', '" . $txtCompanyId . "') ");
            if ($queryIns) {
                if ($txtCareServices) {
                    $updateMysqlTable = mysqli_query($conn, "UPDATE `tbl_general_client_form` SET `client_service`= '$txtCareServices' WHERE uryyToeSS4 = '$myIdentity' ");
                    if ($updateMysqlTable) {
                        $queryIns0 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsMorn . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns1 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsLunch . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsTea . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns3 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsBed . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryInsClientNote = mysqli_query($conn, "INSERT INTO tbl_client_notes (uryyToeSS4, client_note, col_company_Id) VALUES('" . $myIdentity . "', 'Upload client latest update.', '" . $txtCompanyId . "') ");
                        if ($queryInsClientNote) {
                            header("Location: ./client-task?uryyToeSS4=$myIdentity");
                        }
                    }
                } else if ($txtSupportCare) {
                    $updateMysqlTable0 = mysqli_query($conn, "UPDATE `tbl_general_client_form` SET `client_service`= '$txtSupportCare' WHERE uryyToeSS4 = '$myIdentity' ");
                    if ($updateMysqlTable0) {

                        $queryIns4 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $supportWorker . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $txtCompanyId . "') ");

                        $queryInsClientNote2 = mysqli_query($conn, "INSERT INTO tbl_client_notes (uryyToeSS4, client_note, col_company_Id) VALUES('" . $myIdentity . "', 'Upload client latest update.', '" . $txtCompanyId . "') ");

                        if ($queryInsClientNote2) {
                            header("Location: ./client-task?uryyToeSS4=$myIdentity");
                        }
                    } else {
                    }
                }
            } else {
                echo "ERROR: Could not able to execute $conn. " . mysqli_error($conn);
            }
        } else {
            //If the current client social id is not already in the database, then add new client without adding one integer to the current id.
            $myIdentity = $varSpecialId + 1;
            $queryIns = mysqli_query($conn, "INSERT INTO tbl_general_client_form (client_title, client_first_name, client_last_name, client_middle_name, client_preferred_name, client_email_address, client_referred_to, client_date_of_birth, client_ailment, client_primary_phone, client_culture_religion, client_sexuality, client_area, client_address_line_1, client_address_line_2, client_city, client_county, client_poster_code, client_country, client_access_details, client_highlights, col_Office_Incharge, clientStart_date, clientEnd_date, uryyToeSS4, what_is_important_to_me, my_likes_and_dislikes, my_current_condition, my_medical_history, my_physical_health, my_mental_health, how_i_communicate, assistive_equipment_i_use, client_latitude, client_longitude,col_company_Id) 
            VALUES('" . $txtTitle . "', '" . $txtFirstName . "', '" . $txtLastName . "', '" . $txtMiddleName . "', '" . $txtPreferredName . "', '" . $txtEmailAddress . "', '" . $txtGenderBased . "', '" . $txtDateofBirth . "', '" . $txtClientailment . "', '" . $txtPrimaryPhoneNumber . "', '" . $txtCultureReligion . "', '" . $txtSexuality . "', '" . $txtclientArea . "', '" . $txtAddressLine1 . "', '" . $txtAddressLine2 . "', '" . $txtCity . "', '" . $txtCounty . "', '" . $txtPosterCode . "', '" . $txtCountry . "', '" . $txtAccessDetails . "', '" . $txtHighlights . "', '" . $txtOfficeIncharge . "', '" . $txtStartDate . "', '" . $txtEndDate . "', '" . $myIdentity . "', '" . $txtCol29 . "', '" . $txtCol30 . "', '" . $txtCol31 . "', '" . $txtCol32 . "', '" . $txtCol33 . "', '" . $txtCol34 . "', '" . $txtCol35 . "', '" . $txtCol36 . "', '" . $clientLatitude . "', '" . $clientLongitude . "', '" . $txtCompanyId . "') ");
            if ($queryIns) {
                if ($txtCareServices) {
                    $updateMysqlTable = mysqli_query($conn, "UPDATE `tbl_general_client_form` SET `client_service`= '$txtCareServices' WHERE uryyToeSS4 = '$myIdentity' ");
                    if ($updateMysqlTable) {

                        $queryIns0 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsMorn . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns1 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsLunch . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns2 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsTea . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");
                        $queryIns3 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_occurence, col_period_one, col_period_two, col_right_to_display, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity . "', '" . $lcientCareCallsBed . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $today . "', '', 'Daily', 'True', '" . $txtCompanyId . "') ");

                        $queryInsClientNote = mysqli_query($conn, "INSERT INTO tbl_client_notes (uryyToeSS4, client_note) VALUES('" . $myIdentity . "', 'Upload client latest update.') ");

                        if ($queryInsClientNote) {
                            header("Location: ./client-task?uryyToeSS4=$myIdentity");
                        }
                    }
                } else if ($txtSupportCare) {
                    $updateMysqlTable0 = mysqli_query($conn, "UPDATE `tbl_general_client_form` SET `client_service`= '$txtSupportCare' WHERE uryyToeSS4 = '$myIdentity' ");
                    if ($updateMysqlTable0) {

                        $queryIns4 = mysqli_query($conn, "INSERT INTO tbl_clienttime_calls (client_name, client_area, uryyToeSS4, care_calls, dateTime_in, dateTime_out, col_company_Id) VALUES('" . $txtFirstName . " " . $txtLastName . "', '" . $txtclientArea . "', '" . $myIdentity001 . "', '" . $supportWorker . "', '" . $clientDateTimeIn . "', '" . $clientDateTimeOut . "', '" . $txtCompanyId . "') ");

                        $queryInsClientNote2 = mysqli_query($conn, "INSERT INTO tbl_client_notes (uryyToeSS4, client_note) VALUES('" . $myIdentity . "', 'Upload client latest update.') ");

                        if ($queryInsClientNote2) {
                            header("Location: ./client-task?uryyToeSS4=$myIdentity");
                        }
                    }
                }
            } else {
                echo "ERROR: Could not able to execute $conn. " . mysqli_error($conn);
            }
        }
    }
}
