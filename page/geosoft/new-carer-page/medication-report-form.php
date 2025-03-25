<?php include('header-contents.php'); ?>


<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: 10px;" class="container px-2 mx-auto grid">
            <!--<h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Report
            </h3>-->

            <div style="margin-top: -10px;" class="grid gap-6 mb-8 md:grid-cols-2">

                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h3 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Report form
                    </h3>


                    <div id="popupAlert" style="width: 100%; height:auto; margin-bottom:5px; padding:16px; background-color:rgba(192, 57, 43,1.0); color:white;">
                        Select medication status!
                    </div>

                    <hr>
                    <h5 class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        Medication must be completed before filling and submiting this form. Carers must ensure all medication are properly attended to and confirmed completed.
                    </h5>

                    <!--<h4 style="width: 100%; height:auto; padding:8px; border-radius:5px; color:white; background-color:rgba(39, 174, 96,1.0);">Help with meal preparation</h4>-->

                    <div style="margin-top: -20px;" class="flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>

                            <!--Task submit form start here -->

                            <form action="./medication-report-form" method="POST" enctype="multipart/form-data" autocomplete="off">

                                <?php
                                if (isset($_GET['client_med_Id'])) {
                                    $client_med_Id = $_GET['client_med_Id'];

                                    $result = mysqli_query($conn, "SELECT * FROM tbl_clients_medication_records WHERE client_med_Id='$client_med_Id' ");
                                    while ($row = mysqli_fetch_array($result)) { ?>

                                        <input type="hidden" value="<?php echo "" . $row['med_name'] . ""; ?>" name="txtTaskName" />
                                        <input type="hidden" value="<?php echo "" . $row['med_dosage'] . ""; ?>" name="txtDosage" />
                                        <input type="hidden" value="<?php echo $currentDate; ?>" name="txtTaskDate" />
                                        <input type="hidden" value="<?php echo "" . date("h:ia", $d); ?>" name="txtTaskTimeIn" />
                                        <input type="hidden" value="<?php echo "" . $row['client_med_Id'] . ""; ?>" name="txtTaskId" />
                                        <input type="hidden" value="<?php echo "" . $row['uryyToeSS4'] . "";
                                                                }
                                                            } ?>" name="txtClientId" />


                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address='" . $_SESSION['usr_email'] . "' ");
                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <input type="hidden" value="<?php echo "" . $row['user_fullname'] . "";
                                                                    } ?>" name="txtCarerName" />

                                            <input type="hidden" value="<?php echo "" . $_SESSION['usr_email'] . ""; ?>" name="txtCarerEmail" />

                                            <hr>
                                            <br>
                                            <h5>Medication status</h5>

                                            <br>

                                            <div class="form-group">
                                                &nbsp; <input type="checkbox" value="Not taken" name="txtcheckNObox" class="form-control" /> &nbsp; <label for="No">No / Not taken</label>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                &nbsp; <input type="checkbox" value="Fully taken" name="txtcheckYesbox" class="form-control" /> &nbsp; <label for="Yes">Yes / fully taken</label>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>

                                            <textarea required name="txtTaskNote" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="5" placeholder="Note"></textarea>
                                            <br>
                                            <button name="btnSubmitMedNote" type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Submit note
                                            </button>
                            </form>

                            <!--Task submit form start here -->
                        </div>

                    </div>
                </div>



                <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                    <h4 class="mb-4 font-semibold">
                        General details/Incident
                    </h4>

                    <p>
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