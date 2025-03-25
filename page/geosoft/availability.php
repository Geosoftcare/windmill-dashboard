<?php include('header-contents.php'); ?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main style="width: 100%;" class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <!--<h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Report
            </h3>-->
            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Availability
                    </h4>

                    <div style="margin-top:20xp; width:100%; height:auto; padding:6px 0px 6px 18px; border-left:10px rgba(16, 172, 132,1.0) solid;" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        Absence records
                    </div>

                    <hr>
                    <br>

                    <div class="flex">
                        <a href="./book-absence" style="text-decoration: none;">
                            <button style="width: 150px; height:45px; border-radius:5px; cursor:pointer; font-size:16px; background-color:rgba(108, 92, 231,1.0); color:#fff;">
                                Book absence
                            </button>
                        </a>
                    </div>
                    <br>

                    <?php
                    $get_get_carerId = mysqli_query($conn, "SELECT * FROM tbl_team_status 
                    WHERE (uryyTteamoeSS4 = '" . $_SESSION['usr_carerId'] . "' AND col_company_Id='" . $_SESSION['usr_compId'] . "') 
                    ORDER BY userId DESC LIMIT 5 ");
                    while ($row_get_carer_detail = mysqli_fetch_array($get_get_carerId)) {
                        echo "
                    <div style='border-top-left-radius:12px; margin-bottom:12px; border-top-right-radius:12px; border-top:5px rgba(16, 172, 132,1.0) solid;box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 90px;' class='flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800'>
                        <div style='width:100%; height:auto;display:block;'>
                            <div class='relative overflow-x-auto'>
                                <table class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400'>
                                    <tbody>
                                        <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                            <td class='px-6 py-4'>
                                                <span id='title-Base-txt'>Start date</span>
                                                <span id='body-Base-txt'>" . $row_get_carer_detail['col_startDate'] . "</span>
                                            </td>
                                            <td class='px-6 py-4'>
                                                <span id='title-Base-txt'>End date</span>
                                                <span id='body-Base-txt'>" . $row_get_carer_detail['col_endDate'] . "</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style='width: 100%; font-size:16px; height:auto; padding:7px;'>
                                <span id='title-Base-txt'>Absence type</span>
                                <span id='body-Base-txt'>" . $row_get_carer_detail['col_team_condition'] . "</span>
                            </div>
                            <div style='width: 100%; font-size:16px; height:auto; padding:7px;'>
                                <span id='title-Base-txt'>Note</span>
                                <span id='body-Base-txt'>" . $row_get_carer_detail['col_note'] . "</span>
                            </div>
                            <div style='width: 100%; color:#fff; font-size:14px; font-style:italic; height:auto; padding:7px; background-color:rgba(52, 73, 94,1.0);'>
                                " . $row_get_carer_detail['col_approval'] . "
                            </div>
                        </div>
                    </div>
                    ";
                    } ?>


                </div>
            </div>
        </div>

        <?php include('footer-contents.php'); ?>