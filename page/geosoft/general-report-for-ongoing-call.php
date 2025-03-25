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
                        General Report
                    </h4>

                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:16px; background-color:rgba(192, 57, 43,1.0); color:white;">

                    </div>

                    <?php
                    if (isset($_GET['uryyToeSS4'])) {
                        $uryyToeSS4 = $_GET['uryyToeSS4'];
                    } ?>

                    <div style="margin-top:20xp; width:100%; height:auto; padding:6px 0px 6px 18px; border-left:10px rgba(192, 57, 43,1.0) solid;" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        You have an ongoing <?php echo "" . $careCall_row['col_care_call'] . "" ?> call for <?php echo "" . $careCall_row['client_name'] . "" ?> kindly write a report to check out, before proceeding to the next.
                    </div>

                    <br>
                    <!--<h4 style="width: 100%; height:auto; padding:8px; border-radius:5px; color:white; background-color:rgba(39, 174, 96,1.0);">Help with meal preparation</h4>-->
                    <div style="margin-top: -20px;" class="flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>
                            <!--Task submit form start here -->
                            <?php
                            $get_care_callId = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE (shift_date = '$today' AND col_carer_Id='" . $_SESSION['usr_carerId'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                            while ($careCall_row = mysqli_fetch_array($get_care_callId)) {
                                $varCarerId = $careCall_row['col_carer_Id'];
                                $get_get_carerId = mysqli_query($conn, "SELECT * FROM tbl_general_team_form WHERE (uryyTteamoeSS4 = '$varCarerId' AND col_company_Id='" . $_SESSION['usr_compId'] . "') ORDER BY userId DESC LIMIT 1 ");
                                $row_get_carerId = mysqli_fetch_array($get_get_carerId); ?>

                                <form action="./processing-general-report?uryyToeSS4=<?php echo "" . $careCall_row['uryyToeSS4'] . ""; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <input type="hidden" value="<?php echo "" . $careCall_row['uryyToeSS4'] . "" ?>" name="txtClientSpecialIds" />
                                    <input type="hidden" value="<?php echo "" . $careCall_row['col_care_call'] . "" ?>" name="txtVariousCareCalls" />
                                    <input type="hidden" value="<?php echo "" . $careCall_row['col_carer_Id'] . "" ?>" name="txtCarerId" />
                                    <input type="hidden" value="<?php echo "" . $careCall_row['col_miles'] . "" ?>" name="txtMiles" />
                                    <input type="hidden" value="<?php echo "" . $careCall_row['col_mileage'] . ""; ?>" name="txtCarerMileage" />
                                    <input type="hidden" value="<?php echo "" . $careCall_row['col_company_Id'] . "";
                                                            } ?>" name="txtClientCompanyId" />

                                    <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" name="txtCarerEmail" />
                                    <hr>
                                    <textarea required style="margin-top: -12px;" name="txtTaskNote" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="5" placeholder="Note"></textarea>
                                    <br>
                                    <input value="Submit note" name="btnSubmitMedNote" type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                </form>
                                <!--Task submit form start here -->
                        </div>
                    </div>
                </div>



                <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        Highlight
                    </h4>

                    <p>
                        Task must be completed before filling and submiting this form, carers must ensure all task are properly attended to and confirmed completed.
                        <br><br>
                        Did you know that June is Alzheimer’s and Brain Awareness Month? Alzheimer’s disease (frequently abbreviated as simply “Alzheimer’s”) and related brain disorders have become increasingly prevalent in our aging society. These conditions can significantly impact individuals and their families, making it crucial to raise awareness about their causes, symptoms, and available treatments.
                        <br><br>
                        Here’s what everyone should know about Alzheimer’s disease and dementia, the importance of early detection, ongoing research and treatments, and practical tips for maintaining a healthy brain.
                        <br><br>
                        What Is Alzheimer’s?
                        <br><br>
                        Alzheimer’s disease is a progressive neurodegenerative disorder that affects the brain, causing memory loss, cognitive decline, and behavioral changes. It is the most common form of dementia, accounting for approximately 60-80% of all dementia cases. The disease is thought to be caused by the accumulation of beta-amyloid plaques and tau protein tangles in the brain, leading to the destruction of nerve cells and disruption of communication between them.
                    </p>
                    <br>
                    <hr>
                </div>
            </div>
        </div>

        <?php include('footer-contents.php'); ?>