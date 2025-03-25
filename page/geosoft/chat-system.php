<?php include('header-contents.php'); ?>

<div style="width: 100%; height:auto; padding:14px; background-color:rgba(44, 62, 80,1.0); color:#fff; font-size:19px;">
    Chat system
</div>


<div class="container">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            <div class="chatSystemBox">
                <!--Chat systme-->
                <?php
                $chat_system_result = mysqli_query($conn, "SELECT * FROM tbl_chat_system WHERE carer_email = '" . $_SESSION['usr_email'] . "' ORDER BY userId DESC");
                while ($result_trans_rows = mysqli_fetch_array($chat_system_result)) {
                    echo "

                    <div class='row'>
                        <div style='margin: 0; padding:0;' class='col-md-1 col-1'>
                            <div style='width: 100%; height:auto; padding:2px 0px 20px 0px;'>
                                <img src='./assets/img/9619263.png' style='width: 50px; height:50px; float:left; border-radius:100%;' alt=''>
                            </div>
                        </div>
                        <div style='margin: 0; padding:0;' class='col-md-8 col-8'>
                            <div style='border-radius:12px; width: 100%; height:auto; padding:22px; background-color:rgba(22, 160, 133,1.0); color:#fff;'>
                                <span style='color: rgba(236, 240, 241,.8);'><em>" . $result_trans_rows['admin_name'] . "</em></span>
                                <span style='color: rgba(236, 240, 241,.8); font-size:10px; float:right;'><em>" . $result_trans_rows['adTime_sent'] . " " . $result_trans_rows['adDate_sent'] . "</em></span>
                                <br>
                                " . $result_trans_rows['admin_chat'] . "
                            </div>
                        </div>
                        <div class='col-md-3 col-3'></div>
                    </div>

                    <br>
                    <div class='row'>
                        <div class='col-md-3 col-3'></div>
                        <div style='margin: 0; padding:0;' class='col-md-8 col-8'>
                            <div style='border-radius:12px; width: 100%; height:auto; padding:22px; background-color:rgba(41, 128, 185,1.0); color:#fff;'>
                                <span style='color: rgba(236, 240, 241,.8);'><em>" . $result_trans_rows['carer_name'] . "</em></span>
                                <span style='color: rgba(236, 240, 241,.8); font-size:10px; float:right;'><em>" . $result_trans_rows['time_sent'] . " " . $result_trans_rows['date_sent'] . "</em></span>
                                <br>
                                " . $result_trans_rows['carer_chat'] . "
                            </div>
                        </div>
                        <div style='margin: 0; padding:0;' class='col-md-1 col-1'>
                            <div style='width: 100%; height:auto; padding:2px 0px 20px 0px;'>
                                <img src='./assets/img/3210031.png' style='width: 50px; height:50px; float:left; border-radius:100%;' alt=''>
                            </div>
                        </div>
                    </div>

                    <br>
                    ";
                } ?>
            </div>

            <div style="width: 100%; height:auto; padding:5px; overflow:scroll; background-color:rgba(52, 73, 94,1.0); color:white;">
                <form action="./processing-chat-message" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "'");
                    while ($trans = mysqli_fetch_array($result)) { ?>

                        <input type="hidden" value="<?php echo "" . $trans['user_email_address'] . ""; ?>" name="txtCarerEmail" />
                        <input type="hidden" value="<?php echo "" . $trans['user_fullname'] . ""; ?>" name="txtCarerName" />
                        <input type="hidden" value="<?php echo "" . $trans['user_special_Id'] . "";
                                                } ?>" name="txtCarerSpecialId" />


                        <div class="form-group">
                            <textarea name="txtChatMessage" style="width: 100%; height:auto; padding:5px; color:#000;" id="" rows="5" class="form-control" required placeholder="Message"></textarea>
                        </div>

                        <input type="hidden" value="<?php $sTime = date("H:i");
                                                    print $sTime; ?>" name="txtCarerTimeSent" />
                        <input type="hidden" value="<?php print $currentDate; ?>" name="txtCarerDateSent" />
                        <input type="hidden" style="font-size: 12px; font-style:italic;" value="Please wait..." name="txtPending" />

                        <div class="form-group">
                            <input type="submit" style="padding:6px; width:150px; height:50px; background-color:rgba(22, 160, 133,1.0); color:#fff; cursor:pointer;" class="btn btn-md btn-primary" value="Send Chat" name="btnSendChat" />
                        </div>
                        <br>
                </form>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
</div>
</body>

</html>