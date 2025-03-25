<br><br>

<div class="card table-card">
    <div class="card-header">
        <h5>My task record</h5>


        <a href="./client-extra-morning-medication?uryyToeSS4=<?php echo $myclientSpecial; ?>" style='position: absolute; right:50px; top:6px;'>
            <button type='button' class='btn btn-outline-info'><i class='feather mr-2 icon-eye'></i>View meds</button>
        </a>
        <!--<div class=" card-header-right">
            <div class="btn-group card-option">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                </button>
            </div>
    </div>-->
    </div>
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>Tasks</th>
                        <th>When</th>
                        <th>Frequency</th>
                        <th>Occurrence</th>
                        <th class="text-right">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $result = mysqli_query($conn, "SELECT client_taskName,client_Id,col_period_two,col_period_one, SUBSTRING(monday, 1, 1) AS MDay, SUBSTRING(tuesday, 1, 1) AS TDay, SUBSTRING(wednesday, 1, 1) AS WDay, SUBSTRING(thursday, 1, 1) AS THDay, SUBSTRING(friday, 1, 1) AS FDay, SUBSTRING(saturday, 1, 1) AS SDay, SUBSTRING(sunday, 1, 1) AS SATDay, 
                        SUBSTRING(care_call1, 1, 1) AS BCall, SUBSTRING(care_call2, 1, 1) AS LCall, SUBSTRING(care_call3, 1, 1) AS TCall, SUBSTRING(care_call4, 1, 2) AS BdCall, SUBSTRING(extra_call1, 1, 2) AS EBCall, SUBSTRING(extra_call2, 1, 2) AS ELCall, SUBSTRING(extra_call3, 1, 2) AS ETCall, SUBSTRING(extra_call4, 1, 2) AS EBdCall 
                        FROM tbl_clients_task_records WHERE (uryyToeSS4='$myclientSpecial' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ORDER BY client_Id ASC");
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class='d-inline-block align-middle'>
                                                                                            <div class='d-inline-block'>
                                                                                                <h6>" . $row['client_taskName'] . "</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <ul class='pagination justify-content-center pagination-sm'>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['MDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['TDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['WDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['THDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['FDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['SDay'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:rgba(46, 204, 113,1.0); color:white; font-size:12px;'>" . $row['SATDay'] . "</li>
                                                                                        </ul>
                                                                                        </td>
                                                                                        <td>
                                                                                        <ul class='pagination justify-content-center pagination-sm'>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['BCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['EBCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['LCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['ELCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['TCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['ETCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['BdCall'] . "</li>
                                                                                            <li style='padding:2px; margin-right:3px; border-radius:3px; font-weight:600; width:23px; text-align:center; background-color:#192a56; color:white; font-size:12px;'>" . $row['EBdCall'] . "</li>
                                                                                        </ul>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span style='height: 20px; width:20px; border-radius:50px; padding:3px; font-size:14px; font-weight:600;'>" . $row['col_period_one'] . " </span>
                                                                                            <span style='height: 20px; width:20px; padding:3px;font-size:14px; font-weight:600;'>" . $row['col_period_two'] . "</span>
                                                                                        </td>
                                                                                    <td class='text-right'>
                                                                                    <div class='d-inline-block align-middle'> 
                                                                                        <a style='text-decoration:none;' href='./edit-client-task?client_Id=" . $row['client_Id'] . "'> <button title='Edit client task' type='button' class='btn btn-primary btn-sm'>Edit</button> </a>
                                                                                        <a style='text-decoration:none;' href='./delete-client-task?client_Id=" . $row['client_Id'] . "'> <button title='Delete client task' type='button' class='btn btn-danger btn-sm'>Delete</button> </a>
                                                                                    </div>
                                                                                    </td>
                                                                                </tr>
                                                                                ";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>