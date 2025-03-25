<?php include('client-header-contents.php'); ?>

<style>
    ul {
        list-style: none;
    }

    .list {
        width: 100%;
        background-color: #ffffff;
        border-radius: 0 0 5px 5px;
    }

    .list-items {
        padding: 10px 5px;
    }

    .list-items:hover {
        background-color: #dddddd;
    }
</style>

<?php
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_general_client_form 
    WHERE uryyToeSS4='$uryyToeSS4' AND col_company_Id = '" . $_SESSION['usr_compId'] . "'");
    $_SESSION['uryyToeSS4'] = $uryyToeSS4;
    while ($row = mysqli_fetch_array($result)) {
?>

        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Plan task(s)</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./dashboard.php"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!"><?php echo "" . $row['client_first_name'] . " " . $row['client_last_name'] . "" ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Client tasks</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <div class="client-form-body" style="width:100%; height:auto; padding:22px;">
                                        <div class="row">
                                            <div id="popupAlert" style="width: 100%; height:auto; display:none; margin-bottom:5px; padding:22px; background-color:rgba(192, 57, 43,1.0); color:white;">
                                                Client task already exist!!!
                                            </div>

                                            <div class="col-md-5">
                                                <form method="POST" action="./client-task?uryyToeSS4=<?php echo "" . $row['uryyToeSS4'] . ""; ?>" enctype="multipart/form-data" name="addClient-form" autocomplete="off">
                                                    <div class="form-group">
                                                        <input type="hidden" name="txtClientSocialId" value="<?php echo "" . $row['uryyToeSS4'] . "";
                                                                                                            }
                                                                                                        } ?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Select task<span style="color: red;"> *</span></label>
                                                        <div>
                                                            <input type="text" name="txtTask" required class="form-control" id="input" placeholder="Type a task here..." />
                                                        </div>
                                                        <ul class="list"></ul>
                                                    </div>


                                                    <div class="form-group">
                                                        <h5>Add details(optional)</h5>
                                                        <label for="exampleFormControlTextarea1">The carer will see this note in the app each time they complete this task.</label>
                                                        <textarea name="txtTaskDetails" class="form-control" placeholder="Highlights" id="exampleFormControlHighlights" rows="5"></textarea>
                                                    </div>


                                                    <br>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Select frequency 1 <span style="color: red;">*</span></h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                                    <div class="daysAlignment" style="width: 100%; height:auto; font-weight:600; padding:12px 0px 0px 20px;">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <input name="txtMorning" value="Morning" type="checkbox" class='checkboxes'>
                                                                                <span style="font-size:13px;">&nbsp; Mor</span>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <input name="txtLunch" value="Lunch" type="checkbox" class='checkboxes'>
                                                                                <span style="font-size:13px;">&nbsp; Lun</span>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <input name="txtTea" value="Tea" type="checkbox" class='checkboxes'>
                                                                                <span style="font-size:13px;">&nbsp; Tea</span>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <input name="txtBed" value="Bed" type="checkbox" class='checkboxes'>
                                                                                <span style="font-size:13px;">&nbsp; Bed</span>
                                                                            </div>
                                                                            <?php
                                                                            $select_client_carecalls = mysqli_query($conn, "SELECT * 
                                                                            FROM tbl_clienttime_calls WHERE (uryyToeSS4='$uryyToeSS4' AND col_startDate <= '$today' AND (col_endDate >= '$today' OR col_endDate = '') AND col_company_Id = '" . $_SESSION['usr_compId'] . "')");
                                                                            while ($row_client_carecalls = mysqli_fetch_array($select_client_carecalls)) {
                                                                                $txtExtraCalls = $row_client_carecalls['care_calls'];

                                                                                if ($txtExtraCalls == 'EM morning call') {
                                                                                    echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEM' value='EM morning call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EM</span>
                                                                                    </div>
                                                                                    ";
                                                                                } else if ($txtExtraCalls == 'EL lunch call') {
                                                                                    echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEL' value='EL lunch call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EL</span>
                                                                                    </div>
                                                                                    ";
                                                                                } else if ($txtExtraCalls == 'ET tea call') {
                                                                                    echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtET' value='ET tea call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; ET</span>
                                                                                    </div>
                                                                                    ";
                                                                                } else if ($txtExtraCalls == 'EB bed call') {
                                                                                    echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtEB' value='EB bed call' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; EB</span>
                                                                                    </div>
                                                                                    ";
                                                                                } else if ($txtExtraCalls == 'Extra visit') {
                                                                                    echo "
                                                                                    <div class='col-3'>
                                                                                        <input name='txtExtraVisit' value='Extra visit' type='checkbox'' class='checkboxes'>
                                                                                        <span style='font-size:13px;'>&nbsp; Extra</span>
                                                                                    </div>
                                                                                    ";
                                                                                }
                                                                            }
                                                                            ?>

                                                                            <div class="col-3">
                                                                                <input type="checkbox" id="selectAllCheckbox">
                                                                                <span style='font-size:13px;'>&nbsp; Check all</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div style="width: 100%; height:auto;">

                                                        <div class="card-header">
                                                            <h5>Select frequency 2 <span style="color: red;"></span></h5>
                                                        </div>
                                                        <nav>
                                                            <div style="font-size: 18px; color:black; font-weight: 600;" class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <button style="color:black;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Daily | Weekly</button>
                                                                <button style="color:black;" class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">One time</button>
                                                                <button style="color:black;" class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Custom</button>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                                <br>
                                                                <h6><strong>Daily | weekly</strong></h6>
                                                                <div style="width: 100%; height:auto; background-color:rgba(149, 175, 192,1.0); padding:12px;">
                                                                    <div>
                                                                        If you wish this task to popup once every month, kindly select a date for the popup.
                                                                    </div>
                                                                    <span>Popup date</span> &nbsp;
                                                                    <input type="checkbox" name="clickDisplayDaily" onclick="onlyOne(this)" id="clickDisplayDaily">
                                                                </div>
                                                                <div id="displayDailyCheckbox" class="card">
                                                                    <div class="card-body">
                                                                        <div class="tab-content">
                                                                            <div class="daysAlignment" style="width: 100%; height:auto; padding:12px 0px 0px 20px;">
                                                                                <div class="row">
                                                                                    <div class="col-3">
                                                                                        <input name="txtMonday" value="Monday" type="checkbox" id="customswitch5">
                                                                                        <span style="font-size:13px;">&nbsp; Mon</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtTuesday" value="Tuesday" type="checkbox" class=" " id="customswitch6">
                                                                                        <span style="font-size:13px;">&nbsp; Tue</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtWednesday" value="Wednesday" type="checkbox" class=" " id="customswitch7">
                                                                                        <span style="font-size:13px;">&nbsp; Wed</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtThursday" value="Thursday" type="checkbox" class=" " id="customswitch8">
                                                                                        <span style="font-size:13px;">&nbsp; Thu</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtFriday" value="Friday" type="checkbox" class=" " id="customswitch9">
                                                                                        <span style="font-size:13px;">&nbsp; Fri</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtSaturday" value="Saturday" type="checkbox" class=" " id="customswitch10">
                                                                                        <span style="font-size:13px;">&nbsp; Sat</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input name="txtSunday" value="Sunday" type="checkbox" class=" " id="customswitch11">
                                                                                        <span style="font-size:13px;">&nbsp; Sun</span>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <input type="checkbox" name="select-all" id="select-alldays" />
                                                                                        <span style="font-size:13px;">&nbsp; All</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                                <br>
                                                                <h6><strong>One time</strong></h6>
                                                                <div style="width: 100%; height:auto; padding:6px; font-size:17px; font-weight:600;">
                                                                    <div style="width: 100%; height:auto; background-color:rgba(22, 160, 133,.3); padding:12px;">
                                                                        <div>
                                                                            If you wish this task to popup once every month, kindly choose the start date and the end date below.
                                                                        </div>
                                                                        <span>Select choice</span> &nbsp;
                                                                        <input type="checkbox" name="clickDisplayOneTime" onclick="onlyOne(this)" id="clickDisplayOneTime" />
                                                                    </div>
                                                                    <div id="displayOneTimeCheckBox" style="width: 100%; height:auto; background-color:rgba(189, 195, 199,.3); padding:12px;">
                                                                        <h6><strong>Once every month</strong></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                                <br>
                                                                <h6><strong>Custom</strong></h6>
                                                                <div style="width: 100%; height:auto; padding:6px; font-size:17px; font-weight:600;">
                                                                    <div style="width: 100%; height:auto; background-color:rgba(25, 42, 86,1.0); color:white; padding:12px;">
                                                                        <div>
                                                                            Custom
                                                                            <br>
                                                                            If you wish this task to popup on every other day, please select the checkbox below.
                                                                        </div>
                                                                        <span>Every other day</span> &nbsp;
                                                                        <input type="checkbox" name="clickDisplayCustom" onclick="onlyOne(this)" id="clickDisplayCustom">
                                                                    </div>
                                                                    <div id="displayCustomCheckBox" style="width: 100%; height:auto; background-color:rgba(189, 195, 199,.3); padding:12px;">
                                                                        <div class="row">
                                                                            <div class="col-md-5 col-5">
                                                                                <label for="exampleInputPassword1">Period<span style="color: red;"></span></label>
                                                                                <input type="number" min="2" max="7" value="2" class="form-control" name="txtPeriod" id="txtMedPopupDate" placeholder="Enter Period">
                                                                            </div>
                                                                            <div class="col-md-7 col-7">
                                                                                <label for="exampleInputPassword1">Select option<span style="color: red;"></span></label>
                                                                                <select name="txtPeriodCategory" value="Null" class="form-control" id="exampleFormControlSelect1">
                                                                                    <option value="Days">Days</option>
                                                                                    <option value="Weeks">Weeks</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="tab-content">
                                                                                <div class="daysAlignment" style="width: 100%; height:auto; padding:12px 0px 0px 20px;">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <input name="txtMonday" value="Monday" type="checkbox" id="customswitch5">
                                                                                            <span style="font-size:13px;">&nbsp; Mon</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtTuesday" value="Tuesday" type="checkbox" class=" " id="customswitch6">
                                                                                            <span style="font-size:13px;">&nbsp; Tue</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtWednesday" value="Wednesday" type="checkbox" class=" " id="customswitch7">
                                                                                            <span style="font-size:13px;">&nbsp; Wed</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtThursday" value="Thursday" type="checkbox" class=" " id="customswitch8">
                                                                                            <span style="font-size:13px;">&nbsp; Thu</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtFriday" value="Friday" type="checkbox" class=" " id="customswitch9">
                                                                                            <span style="font-size:13px;">&nbsp; Fri</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtSaturday" value="Saturday" type="checkbox" class=" " id="customswitch10">
                                                                                            <span style="font-size:13px;">&nbsp; Sat</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input name="txtSunday" value="Sunday" type="checkbox" class=" " id="customswitch11">
                                                                                            <span style="font-size:13px;">&nbsp; Sun</span>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <input type="checkbox" name="select-all" id="select-alldays" />
                                                                                            <span style="font-size:13px;">&nbsp; All</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>

                                                    <hr>

                                                    <br>

                                                    <div class="form-group">
                                                        <h5><span style="color: red;"></span></h5>
                                                        <div class="custom-control custom-switch">
                                                            <input name="txtAnytimeSession" type="checkbox" class="custom-control-input" id="customswitch12">
                                                            <label class="custom-control-label" for="customswitch12">Anytime / Sessions</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6 col-6">
                                                                <label for="exampleInputStarts1">Start date<span style="color: red;"> *</span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                                                            <img src="assets/images/icons/pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" style="width: 20px; height:20px;" alt="">
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" required name="txtStarts" class="form-control" id="exampleInputStarts" aria-describedby="StartDate" value="<?php echo $today; ?>">
                                                                    <div class="invalid-tooltip">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-6">
                                                                <label for="exampleInputStarts1">End date<span style="color: red;"></span></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                                                            <img src="assets/images/icons/pngtree-calendar-icon-logo-2023-date-time-png-image_6310337.png" style="width: 20px; height:20px;" alt="">
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" name="txtEnd" class="form-control" id="exampleInputStarts" aria-describedby="StartDate" placeholder="Starts">
                                                                    <div class="invalid-tooltip">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-grou">
                                                        <input type="hidden" value="<?php
                                                                                    $currentDate = date('F j, Y');
                                                                                    echo $currentDate; ?>" name="current_Date">

                                                        <input type="hidden" value="<?php echo date("h:i a"); ?>" name="current_Time">
                                                    </div>


                                                    <?php
                                                    for ($a = 1; $a <= 50; $a++) {
                                                        $usdd = "0";
                                                        $rand = rand(0000, 9999);
                                                        $rand1 = rand(0000, 9999);
                                                        $rand2 = rand(0000, 9999);
                                                        $rand3 = rand(0000, 9999);
                                                        $rand4 = rand(0000, 9999);
                                                        $randpx = rand(00000000, 99999999);
                                                        $randpx1 = rand(00000000, 99999999);
                                                        $randpx2 = rand(00000000, 99999999);
                                                        $randpx3 = rand(00000000, 99999999);
                                                        $rand5 = rand(0000, 9999);
                                                        $rand6 = rand(0000, 9999);
                                                        $rand7 = rand(0000, 9999);
                                                        $rand8 = rand(0000, 9999);
                                                        $rand9 = rand(00000000, 99999999);
                                                        $rand0 = rand(000000000, 999999999);
                                                        $ud = "45";
                                                        $udsep = "-";
                                                        $udsep1 = "45-";
                                                        $udsep2 = "cl10-";
                                                        $udsep3 = "i94-";
                                                        $id = "$usdd$rand$ud$rand1$rand2$udsep1$rand3$rand4$rand5$udsep2$rand6$rand7$randpx$udsep3$rand8$rand9$rand0$udsep1$randpx1$randpx2$randpx3";
                                                    }

                                                    // Return current date from the remote server

                                                    ?> <input type="hidden" value="<?php echo $id; ?>" name="client_task_id" />


                                                    <?php
                                                    require_once('dbconnections.php');
                                                    for ($a = 1; $a <= 50; $a++) {
                                                        $rand = rand(0, 9);
                                                        $idEncrypt = "$rand";
                                                    }

                                                    // Return current date from the remote server
                                                    ?> <input type="hidden" value="<?php echo $idEncrypt; ?>" name="mysocialIdEncrypt" />

                                                    <button style='height:50px;' type="submit" name="btnSubmitClientTastForm" class="btn btn-primary">Upload task</button>

                                                </form>
                                            </div>

                                            <div class="col-md-7">
                                                <?php include_once('client-task-table.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php include('bottom-panel-block.php'); ?>


                </div>
                <!-- Latest Customers end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
        </div>




        <script type="text/javascript">
            /**/
            let names = [
                <?php
                include('dbconnect.php');
                //change this line in your query as well
                $result = mysqli_query($myConnection, "SELECT * FROM tbl_task_list ");
                while ($trans = mysqli_fetch_array($result)) {
                    echo "
                '" . $trans['task_title'] . "',
                ";
                } ?>

            ];
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
        </script>
        <?php include('footer-contents.php'); ?>