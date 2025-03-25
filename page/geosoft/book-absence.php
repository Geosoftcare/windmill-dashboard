<?php include('header-contents.php'); ?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Report
            </h3>-->
            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Book absence
                    </h4>

                    <div style="margin-top:20xp; width:100%; height:auto; padding:6px 0px 6px 18px; border-left:10px rgba(16, 172, 132,1.0) solid;" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        Kindly fill in the form appropriately.
                    </div>

                    <hr>
                    <div style="width:100%; height:auto; padding:2px;" class="my-6 font-semibold text-gray-700 dark:text-gray-200"></div>
                    <!--<h4 style="width: 100%; height:auto; padding:8px; border-radius:5px; color:white; background-color:rgba(39, 174, 96,1.0);">Help with meal preparation</h4>-->
                    <div style="margin-top: -20px;" class="flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>
                            <!--Task submit form start here -->
                            <?php
                            $get_get_carerId = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (uryyTteamoeSS4 = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                            $row_get_carerId = mysqli_fetch_array($get_get_carerId); ?>

                            <form action="./processing-absence-form" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['team_first_name'] . " " . $row_get_carerId['team_last_name'] . ""; ?>" name="txttCarerName" />
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['uryyTteamoeSS4'] . ""; ?>" name="txtCarerId" />
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['col_company_Id'] . ""; ?>" name="txttCompanyId" />

                                <div style="width: 100%; height:auto; margin-top: 15px;">
                                    <label style="padding: 0px 0px 0px 7px; font-size:16px" for="carer-absence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start date</label>
                                    <div class="flex">
                                        <input id="start-date" type="date" value="<?php print $today; ?>" style="margin-top: -12px;height:50px;" name="txtStartDate" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" placeholder="Start date"></input>
                                    </div>
                                </div>

                                <div style="width: 100%; height:auto; margin-top: 15px;">
                                    <label style="padding: 0px 0px 0px 7px; font-size:16px" for="carer-absence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End date</label>
                                    <div class="flex">
                                        <input id="start-date" type="date" value="<?php print $today; ?>" style="margin-top: -12px;height:50px;" name="txtEndDate" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" placeholder="Start date"></input>
                                    </div>
                                </div>

                                <div style="width: 100%; height:auto; margin-top: 15px;">
                                    <label style="padding: 0px 0px 0px 7px; font-size:16px" for="carer-absence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Absence type</label>
                                    <div class="flex">
                                        <select required style="margin-top: -12px;height:50px;" name="txtTeamStatus" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="0" selected>Select type</option>
                                            <option value="Hospitalized">Hospitalized</option>
                                            <option value="On a trip">On a trip</option>
                                            <option value="With family">With family</option>
                                            <option value="Annual Leave">Annual Leave (Holiday Entitlement)</option>
                                            <option value="Bank Holidays">Bank Holidays</option>
                                            <option value="Casual Leave">Casual Leave</option>
                                            <option value="Compassionate Leave">Compassionate Leave (Bereavement Leave)</option>
                                            <option value="Duvet Day">Duvet Day</option>
                                            <option value="Gardening Leave">Gardening Leave</option>
                                            <option value="Maternity Leave">Maternity Leave (Parental Leave)</option>
                                            <option value="Paid Time Off">Paid Time Off (PTO)</option>
                                            <option value="Sabbatical Leave">Sabbatical Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Time Off In Lieu Leave">Time Off In Lieu (TOIL) Leave</option>
                                            <option value="Unpaid Leave">Unpaid Leave</option>
                                            <option value="Miscellaneous Leave">Miscellaneous Leave</option>
                                            <option value="None">None</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="width: 100%; height:auto; margin-top: 20px;">
                                    <div style="margin-top: 15px;" class="flex">
                                        <textarea required name="txtNote" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="5" placeholder="Note"></textarea>
                                    </div>
                                </div>

                                <div style="width: 100%; height:auto; margin-top: 15px;">
                                    <div class="flex">
                                        <input value="Submit" name="btnTeamStatus" type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    </div>
                                </div>
                            </form>
                            <!--Task submit form start here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Set today's date as the minimum value and default value
            const today = new Date().toISOString().split('T')[0];
            const dateInput = document.getElementById('start-date');
            dateInput.min = today;
            dateInput.value = today;
        </script>

        <?php include('footer-contents.php'); ?>