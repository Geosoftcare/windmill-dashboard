<?php include('header-contents.php'); ?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">

    <main class="h-full pb-16 overflow-y-auto">

        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <h2 class="my-6 text-1xl font-semibold text-gray-700 dark:text-gray-200">
                Care log
            </h2>

            <div class="grid gap-4 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Chat system
                    </h4>
                    <div style="margin-top: -20px;" class="flex items-center p-4 bg-white dark:bg-gray-800">
                    </div>
                </div>
            </div>


        </div>
</div>

<?php include('footer-contents.php'); ?>