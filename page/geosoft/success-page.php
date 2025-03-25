<?php include('header-contents.php'); ?>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <main class="h-full pb-16 overflow-y-auto">
        <div style="margin-top: -10px;" class="container px-2 mx-auto grid">
            <div style="margin-top: 20px;" class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <br><br><br>
                    <div class="items-center justify-center p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        <svg class="mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 10a8 8 0 1116 0A8 8 0 012 10zm8 3a1 1 0 100-2 1 1 0 000 2zm0-4a1 1 0 110-2 1 1 0 010 2z" clip-rule="evenodd" />
                        </svg>
                        <span style="font-size: 19px;"><strong>Submission Successful</strong></span>
                        <br><br>
                        <span>Thank you for submitting your concern. Your form has been successfully received, and our team will respond to you shortly.</span>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<?php include('footer-contents.php'); ?>