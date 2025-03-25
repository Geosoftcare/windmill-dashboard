<?php include('header-contents.php'); ?>
<?php include('top-nav-bar.php'); ?>

<!-- ! Main -->
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">


            <?php
            $sel_dist_att = mysqli_query($conn, "SELECT * FROM tbl_goesoft_carers_account 
      WHERE user_email_address = '" . $_SESSION['usr_email'] . "' AND user_special_Id != '' ");
            while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                $worker_specialId = $att_rw['user_special_Id'];
            ?>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE DATE(Clientshift_Date) = '$today'
        AND first_carer_Id = '$worker_specialId' OR second_carer_Id = '$worker_specialId' ORDER BY dateTime_in ASC ");
                while ($trans = mysqli_fetch_array($result)) {
                    echo "

                    <div class='col-md-6 col-xl-3'>
                        <a style='text-decoration: none;' href='./care-plan?uryyToeSS4=" . $trans['uryyToeSS4'] . "'>
                            <div style='width:100%; height:auto;'>
                                <article class='stat-cards-item'>                                 
                                        <div class='stat-cards-icon primary'>
                                            <img src='./feather-icons/user.svg' style='width: px;' alt=''>
                                        </div>
                                        <div class='stat-cards-info'>
                                            <p class='stat-cards-info__num'>" . $trans['client_name'] . "</p>
                                            <p class='stat-cards-info__title'>" . $trans['dateTime_in'] . " -  " . $trans['dateTime_out'] . "</p>
                                            <p class='stat-cards-info__progress'>
                                                <span class='stat-cards-info__profit success'>
                                                    <i data-feather='trending-up' aria-hidden='true'></i>" . $trans['call_status'] . "
                                                </span>
                                            </p>
                                        </div>
                                </article>
                            </div>
                        </a>
                    </div>
                    ";
                }

                ?>



        </div>
        <div class=" row">
            <div class="col-lg-12">
                <div class="users-table table-wrapper">
                    <table class="table table-striped">
                        <thead>
                            <tr class="users-table-info">
                                <th>Name</th>
                                <th>Area</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result2 = mysqli_query($conn, "SELECT * FROM tbl_schedule_calls WHERE first_carer_Id = '$worker_specialId' OR second_carer_Id = '$worker_specialId' GROUP BY uryyToeSS4 ORDER BY userId DESC LIMIT 100");
                        while ($rows = mysqli_fetch_array($result2)) {
                            echo "
                            <tr>
                                <td>
                                " . $rows['client_name'] . "
                                </td>
                                <td>
                                " . $rows['client_area'] . "
                                </td>
                                <td><span class='badge-pending'>Active</span></td>
                            </tr>
                            ";
                        }
                    } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ! Footer -->

<?php include('footer-contents.php'); ?>