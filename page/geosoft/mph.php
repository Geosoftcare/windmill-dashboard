<?php include('header-contents.php'); ?>

<style>
    #title-Base-txt,
    #body-Base-txt {
        font-size: 16px;
    }
</style>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main style="width:100%;" class="h-full pb-16 overflow-y-auto">
        <div class="container px-2 mx-auto grid">
            <?php
            if (isset($_GET['uryyToeSS4'])) {
                $uryyToeSS4 = $_GET['uryyToeSS4'];
            }
            $sql_client_care_plan = mysqli_query($conn, "SELECT * FROM tbl_general_client_form WHERE uryyToeSS4='$uryyToeSS4' AND col_company_id='" . $_SESSION['usr_compId'] . "' ");
            while ($row_mydata = mysqli_fetch_array($sql_client_care_plan)) {
            ?>
                <div style="margin-top: 10px; font-size:20px;" class="grid gap-2 mb-8 md:grid-cols-2">
                    <div class="min-w-0 p-0 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300"></h4>

                        <div style="margin-top: -20px; padding:15px 10px 15px 10px;" class="mb-4 font-semibold text-gray-600 dark:text-gray-300 items-center bg-white dark:bg-gray-800">
                            <div style="font-size:20px; margin-top:20x;" id="title-Base-txt">My physical health</div>
                            <hr style="margin-top: 13px; margin-bottom: 13px;">
                            <div class="flex" id="body-Base-txt">
                                <?php echo "" . $row_mydata['my_physical_health'] . ""; ?>
                            </div>
                        </div>
                    </div>
                </div>



                <div style="margin-top: 10px;" class="grid gap-4 mb-8 md:grid-cols-6">
                    <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
                        <h3 style="color:rgba(236, 240, 241,.8);" class="mb-4 font-semibold">
                            About me
                        </h3>
                        <div style="text-align:left; font-size:14px;">
                            <em>
                            <?php echo "" . $row_mydata['client_highlights'] . "";
                        } ?>
                            </em>
                        </div>
                    </div>
                </div>
        </div>