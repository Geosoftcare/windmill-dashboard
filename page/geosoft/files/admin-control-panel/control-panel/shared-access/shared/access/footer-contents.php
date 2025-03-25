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
    <![endif]
<script>
    $("#frmrecord").submit(function() {
        var txtAllClientIds = $("#txtAllClientIds").val();
        var txtAllClientCalls = $("#txtAllClientCalls").val();
        var txtAllRunsId = $("#txtAllRunsId").val();
        var txtAllRunCity = $("#txtAllRunCity").val();
        var txtRunCompanyId = $("#txtRunCompanyId").val();

        $.ajax({
            type: "POST",
            url: "processing-attach-client-run.php",
            data: "txtAllClientIds=" + txtAllClientIds + "&txtAllClientCalls=" + txtAllClientCalls + "&txtAllRunsId=" + txtAllRunsId + "&txtAllRunCity=" + txtAllRunCity + "&txtRunCompanyId=" + txtRunCompanyId,
            success: function(data) {
                alert("sucess");
            }
        });


    });
</script>
-->

<script>
    /////////////////////////////////To select all the medication names from database/////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Sort names in ascending order
    let sortedNames = names.sort();

    //reference
    let input = document.getElementById("input");

    //Execute function on keyup
    input.addEventListener("keyup", (e) => {
        //loop through above array
        //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
        removeElements();
        for (let i of sortedNames) {
            //convert input to lowercase and compare with each string

            if (
                i.toLowerCase().startsWith(input.value.toLowerCase()) &&
                input.value != ""
            ) {
                //create li element
                let listItem = document.createElement("li");
                //One common class name
                listItem.classList.add("list-items");
                listItem.style.cursor = "pointer";
                listItem.setAttribute("onclick", "displayNames('" + i + "')");
                //Display matched part in bold
                let word = "<b>" + i.substr(0, input.value.length) + "</b>";
                word += i.substr(input.value.length);
                //display the value in array
                listItem.innerHTML = word;
                document.querySelector(".list").appendChild(listItem);
            }
        }
    });

    function displayNames(value) {
        input.value = value;
        removeElements();
    }

    function removeElements() {
        //clear all the item
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
            item.remove();
        });
    }




    $('button').on("click", function() {
        //$('button').not(this).removeClass();
        $(this).toggleClass('active');

    });


    $(".cost-box").hide();
    $(".item").click(function() {
        if ($(this).is(":checked")) {
            $(this).parent().siblings().find(".cost-box").show();
        } else {
            $(this).parent().siblings().find(".cost-box").hide();
        }
    });


    $('#SelectAllLunch').click(function() {
        //This will select all inputs with id starting with green
        $("input[id^='customswitchLunch']").prop('checked', $(this).prop("checked"));
    });
</script>
<!-- Warning Section Ends -->
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