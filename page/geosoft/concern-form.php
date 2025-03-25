<?php
include('header-contents.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
$get_get_carerId = mysqli_query($conn, "SELECT * FROM tbl_general_team_form 
WHERE (uryyTteamoeSS4 = '" . $_SESSION['usr_carerId'] . "' 
AND col_company_Id='" . $_SESSION['usr_compId'] . "') 
ORDER BY userId DESC LIMIT 1 ");
$row_get_carerId = mysqli_fetch_array($get_get_carerId);

$get_get_clientId = mysqli_query($conn, "SELECT * FROM tbl_general_client_form 
WHERE (uryyToeSS4 = '$uryyToeSS4' AND col_company_Id='" . $_SESSION['usr_compId'] . "') 
ORDER BY userId DESC LIMIT 1 ");
$row_get_clientId = mysqli_fetch_array($get_get_clientId);
?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Raise a concern
                    </h4>

                    <div style="margin-top:20xp; width:100%; height:auto; padding:6px 0px 6px 18px; border-left:10px rgba(214, 48, 49,1.0) solid;" class="my-6 font-semibold text-gray-700 dark:text-gray-200">
                        Please raise a concern as soon as possible. If you have noticed a change in condition, environment, unusual behavior, or health concern. Let us know once this has been reported. Thank you.
                    </div>

                    <hr>
                    <div style="width:100%; height:auto; padding:2px;" class="my-6 font-semibold text-gray-700 dark:text-gray-200"></div>
                    <div style="margin-top: -20px;" class="flex mb-0 font-semibold text-gray-600 dark:text-gray-300 items-center p-1 bg-white dark:bg-gray-800">
                        <div style='width:100%; height:auto;display:block;'>

                            <form action="./processing-concern-form" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <input type="hidden" value="<?php echo "" . $row_get_clientId['client_first_name'] . " " . $row_get_clientId['client_last_name'] . ""; ?>" name="txtClientName" />
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['team_first_name'] . " " . $row_get_carerId['team_last_name'] . ""; ?>" name="txtCarerName" />
                                <input type="hidden" value="<?php echo "" . $row_get_clientId['uryyToeSS4'] . ""; ?>" name="txtClientId" />
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['uryyTteamoeSS4'] . ""; ?>" name="txtCarerId" />
                                <input type="hidden" value="<?php echo "" . $row_get_carerId['col_company_Id'] . ""; ?>" name="txtCompanyId" />

                                <div class="w-100 mb-2">
                                    <input name="txtTitle" type="text" id="input-box" placeholder="Title e.g Fell down, Sore, unusual behavior, or health concern ..."
                                        class="w-full px-4 py-2 border text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div style="width: 100%; height:auto;">
                                    <div class="flex">
                                        <textarea required name="txtNote" class="block w-full mt-1 text-md dark:text-gray-300 dark:border-gray-900
                                         dark:bg-gray-700 form-textarea focus:outline-none focus:ring-2 
                                         dark:focus:shadow-outline-gray" rows="5" placeholder="Write a concern"></textarea>
                                    </div>
                                </div>

                                <div class="w-100 bg-white rounded-lg shadow-lg text-center">
                                    <input type="file" id="fileInput" name="image" class="hidden" accept="image/*" onchange="previewFile()">
                                    <div onclick="document.getElementById('fileInput').click()" id="previewContainer" class="mt-4">
                                        <img id="previewImage" class="w-full h-auto rounded-lg shadow" />
                                    </div>
                                    <p class="text-gray-700 text-left text-md">Select Image</p>
                                </div>

                                <div style="width: 100%; height:auto; margin-top: 15px;">
                                    <div class="flex">
                                        <input value="Submit" name="btnSubmitConcern" type="submit" class="px-5 py-3 font-medium leading-5 
                                        text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg 
                                        active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    </div>
                                </div>
                            </form>
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


            function previewFile() {
                const file = document.getElementById('fileInput').files[0];
                const previewContainer = document.getElementById('previewContainer');
                const previewImage = document.getElementById('previewImage');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>

        <?php include('footer-contents.php'); ?>