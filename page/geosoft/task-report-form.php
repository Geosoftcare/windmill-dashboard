<?php include('header-contents.php'); ?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">

            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Report form
                        <hr>
                    </h4>

                    <?php
                    if (isset($_GET['col_taskId'])) {
                        $col_taskId = $_GET['col_taskId'];

                        $select_task_data_result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE col_taskId='$col_taskId' AND col_company_Id='" . $_SESSION['usr_compId'] . "' ");
                        while ($get_task_data_row = mysqli_fetch_array($select_task_data_result)) { ?>

                            <div style="width:100%; height:auto; padding:2px;" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                                <?php echo "" . $get_task_data_row['client_taskName'] . ""; ?>
                            </div>

                            <div style="width:100%; height:auto; padding:2px; margin-top:-20px; color:rgba(44, 62, 80,.7);" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                                <?php echo "" . $get_task_data_row['client_task_details'] . "" ?>
                            </div>

                            <!--<h4 style="width: 100%; height:auto; padding:8px; border-radius:5px; color:white; background-color:rgba(39, 174, 96,1.0);">Help with meal preparation</h4>-->
                            <div style="margin-top: -20px;" class="flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800">
                                <div style='width:100%; height:auto;display:block;'>

                                    <!--Task submit form start here -->
                                    <form action="./processing-task-submision?col_taskId=<?php echo "" . $get_task_data_row['col_taskId'] . ""; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['client_Id'] . ""; ?>" name="txtTask_IdNo" />
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['col_occurence'] . ""; ?>" name="txtTask_Date" />
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['client_taskName'] . ""; ?>" name="txtTaskName" />
                                        <input type="hidden" value="<?php echo $today; ?>" name="txtTaskDate" />
                                        <input type="hidden" value="<?php echo "" . date("H:i"); ?>" name="txtTaskTimeIn" />
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['col_taskId'] . ""; ?>" name="txtTaskId" />
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['uryyToeSS4'] . "";  ?>" name="txtClientId" />
                                        <input type="hidden" value="<?php echo "" . $get_task_data_row['col_company_Id'] . "";
                                                                }
                                                            } ?>" name="txtClientCompId" />

                                        <?php
                                        $select_carer_data_result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1 ");
                                        while ($get_carer_data_row = mysqli_fetch_array($select_carer_data_result)) { ?>

                                            <input type="hidden" value="<?php echo "" . $get_carer_data_row['user_fullname'] . "";
                                                                    } ?>" name="txtCarerName" />

                                            <?php
                                            $get_care_callId = mysqli_query($conn, "SELECT * FROM tbl_daily_shift_records WHERE shift_date = '$today' AND col_carer_Id='" . $_SESSION['usr_carerId'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "' ORDER BY userId DESC LIMIT 1 ");
                                            while ($careCall_row = mysqli_fetch_array($get_care_callId)) { ?>

                                                <input type="hidden" value="<?php echo "" . $careCall_row['col_care_call'] . "" ?>" name="txtCurerCall" />
                                                <input type="hidden" value="<?php echo "" . $careCall_row['col_care_call_Id'] . "";
                                                                        } ?>" name="txtClientCareCallId" />

                                                <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" name="txtCarerEmail" />

                                                <hr>
                                                <h5 style="margin-top: 12px;">Tasks status</h5>
                                                <br>

                                                <div class="form-group">
                                                    &nbsp; <input type="checkbox" value="Not successful" class="bedroomsCheck" id="displayPopupNoOption" name="txtcheckNObox" /> &nbsp; <label for="No">No / Not successful</label>
                                                </div>
                                                <div id="popupNoOptions" style="width: 100%; height:auto;margin-top: 10px;">
                                                    <textarea style="resize:none;" name="txtTaskNoteNoOp" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Note"></textarea>
                                                </div>
                                                <br>

                                                <div class="form-group">
                                                    &nbsp; <input type="checkbox" value="Successful" class="bedroomsCheck" id="displayPopupYesOption" name="txtcheckYesbox" /> &nbsp; <label for="Yes">Yes / successful</label>
                                                </div>

                                                <div id="popupYesOptions" style="width: 100%; height:auto; margin-top:12px;">
                                                    <textarea style="resize:none;" name="txtTaskNoteYesOp" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-900 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Note"></textarea>
                                                </div>
                                                <br>
                                                <button name="btnSubmitTaskNote" type="submit" class="px-2 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                    Submit note
                                                </button>
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