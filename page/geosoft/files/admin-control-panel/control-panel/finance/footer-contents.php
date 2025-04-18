<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
<!-- Warning Section Ends -->
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script>
    let input = document.getElementById('litepicker');
    let now = new Date();
    let picker = new Litepicker({
        element: input,
        // format: 'DD/MM/YYYY',
        format: 'DD MMM YYYY',
        singleMode: false,
        numberOfMonths: 2,
        numberOfColumns: 2,
        showTooltip: true,
        scrollToDate: true,
        startDate: new Date(now).setDate(now.getDate() - 1),
        endDate: new Date(now),
        // minDate: new Date(now).setDate(now.getDate() - 7),
        // maxDate: new Date(now).setDate(now.getDate() + 7),
        setup: function(picker) {
            picker.on('selected', function(date1, date2) {
                console.log(`${date1.toDateString()}, ${date2.toDateString()}`)
            })
        }
    });
</script>
<script src="//code.tidio.co/zypfthde44m6lunlki6ohfmh3darewkf.js" async></script>
<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>

<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>
</body>
<script>
    $(document).ready(function() {
        display_events();
    }); //end document.ready block
</script>

</html>