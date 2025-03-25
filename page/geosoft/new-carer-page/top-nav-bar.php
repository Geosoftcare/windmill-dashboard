<nav class="main-nav--bg">
    <div class="container main-nav">
        <div style="width:400px;" class="main-nav-start">
            <div class="search-wrapper">
                <div class="row">
                    <div class="col-sm-6 col-6 stat-cards-info__num">
                        <span><img style="height: 17px;" src="feather-icons/calendar.svg" alt=""></span>
                        <span><?php echo $currentDate; ?></span>
                    </div>
                    <div class="col-sm-6 col-6 stat-cards-info__num"">
                        <span><img style=" height: 17px;" src="feather-icons/clock.svg" alt=""></span>
                        <span>
                            <?php
                            $sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
                            while ($att_rw = mysqli_fetch_array($sel_dist_att)) {

                                $user_special_Id = "" . $att_rw['user_special_Id'] . "";
                                $currDateoftheYear = date("Y-m-d");

                                $chat_system_result = mysqli_query($conn, "SELECT dateTime_in FROM tbl_schedule_calls WHERE Clientshift_Date = '$currDateoftheYear' AND first_carer_Id = '$user_special_Id' OR second_carer_Id ='$user_special_Id' ORDER BY userId ASC LIMIT 1");
                                while ($result_trans_rows = mysqli_fetch_array($chat_system_result)) {
                                    $varDateTimeIn = $result_trans_rows['dateTime_in'];

                                    $chat_system_result1 = mysqli_query($conn, "SELECT dateTime_out FROM tbl_schedule_calls WHERE Clientshift_Date = '$currDateoftheYear' AND first_carer_Id = '$user_special_Id' OR second_carer_Id ='$user_special_Id' ORDER BY userId DESC LIMIT 1");
                                    while ($result_trans_rows1 = mysqli_fetch_array($chat_system_result1)) {
                                        $varDateTimeOut = $result_trans_rows1['dateTime_out'];
                                        $start_date = new DateTime($varDateTimeIn);
                                        $since_start = $start_date->diff(new DateTime($varDateTimeOut));

                                        $totalHour = $since_start->h . ':' . $since_start->i . '';
                                        echo "Total hours <span style='color:#e67e22;'>" . $totalHour . "</span>";
                                    }
                                }
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <div class="lang-switcher-wrapper">
                <button class="lang-switcher transparent-btn" type="button">
                    EN
                    <i data-feather="chevron-down" aria-hidden="true"></i>
                </button>
                <ul class="lang-menu dropdown">
                    <li><a href="##">English</a></li>
                </ul>
            </div>
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                <span class="sr-only">Switch theme</span>
                <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>
            <div class="notification-wrapper">
                <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                    <span class="sr-only">To messages</span>
                    <span class="icon notification active" aria-hidden="true"></span>
                </button>
                <ul class="users-item-dropdown notification-dropdown dropdown">
                    <li>
                        <a href="##">
                            <div class="notification-dropdown-icon info">
                                <i data-feather="check"></i>
                            </div>
                            <div class="notification-dropdown-text">
                                <span class="notification-dropdown__title">Message from admin</span>
                                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                                    here.</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="link-to-page" href="##">Go to Notifications page</a>
                    </li>
                </ul>
            </div>
            <div class="nav-user-wrapper">
                <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                    <span class="sr-only">My profile</span>
                    <span class="nav-user-img">
                        <picture>
                            <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                        </picture>
                    </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                    <li><a href="##">
                            <i data-feather="user" aria-hidden="true"></i>
                            <span>Profile</span>
                        </a></li>
                    <li><a href="##">
                            <i data-feather="settings" aria-hidden="true"></i>
                            <span>Account settings</span>
                        </a></li>
                    <li>
                        <a class="danger" href="./logout?logout">
                            <i data-feather="log-out" aria-hidden="true"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>