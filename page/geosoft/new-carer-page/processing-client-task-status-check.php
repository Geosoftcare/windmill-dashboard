<?php
include('dbconnection-string.php');

if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];

    $echomyTime = date("H");
    $echoCurDay = date("l");


    //-------------------------------------------------------------------------------------------------------------------------
    //Below is the query for Breakfast care calls
    //--------------------------------------------------------------------------------------------------------------------------

    if ($echomyTime > 06 and $echomyTime < 11) {

        //---------------------------------------------------------------------------------
        //Below is the query for Monday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Monday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND monday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Tuesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Tuesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND tuesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Wednesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Wednesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND wednesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Thursday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Thursday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND thursday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Friday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Friday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND friday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Saturday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Saturday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND saturday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Sunday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Sunday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call1='Breakfast' AND sunday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }
    }



    //-------------------------------------------------------------------------------------------------------------------------
    //Below is the query for Breakfast care calls
    //--------------------------------------------------------------------------------------------------------------------------

    if ($echomyTime > 11 and $echomyTime < 14) {

        //---------------------------------------------------------------------------------
        //Below is the query for Monday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Monday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND monday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Tuesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Tuesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND tuesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Wednesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Wednesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND wednesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Thursday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Thursday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND thursday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Friday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Friday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND friday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Saturday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Saturday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND saturday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Sunday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Sunday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call2='Lunch' AND sunday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }
    }


    //-------------------------------------------------------------------------------------------------------------------------
    //Below is the query for Breakfast care calls
    //--------------------------------------------------------------------------------------------------------------------------

    if ($echomyTime > 14 and $echomyTime < 18) {

        //---------------------------------------------------------------------------------
        //Below is the query for Monday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Monday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND monday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Tuesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Tuesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND tuesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Wednesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Wednesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND wednesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Thursday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Thursday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND thursday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Friday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Friday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND friday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Saturday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Saturday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND saturday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Sunday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Sunday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call3='Tea' AND sunday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }
    }


    //-------------------------------------------------------------------------------------------------------------------------
    //Below is the query for Breakfast care calls
    //--------------------------------------------------------------------------------------------------------------------------

    if ($echomyTime > 18 and $echomyTime < 23) {

        //---------------------------------------------------------------------------------
        //Below is the query for Monday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Monday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND monday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Tuesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Tuesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND tuesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Wednesday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Wednesday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND wednesday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Thursday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Thursday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND thursday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Friday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Friday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND friday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Saturday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Saturday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND saturday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }

        //---------------------------------------------------------------------------------
        //Below is the query for Sunday care calls
        //---------------------------------------------------------------------------------

        if ($echoCurDay == 'Sunday') {
            if ($result = mysqli_query($conn, "SELECT * FROM tbl_clients_task_records WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' ")); {
                $rowcount_clientTask_records = mysqli_num_rows($result);
            }
            $result_finiTask0 = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE uryyToeSS4='$uryyToeSS4' AND care_call4='Bed' AND sunday='$echoCurDay' ");
            if ($result_finiTask0) {
                if ($result_finiTask = mysqli_query($conn, "SELECT * FROM tbl_finished_tasks WHERE category='Task' AND task_date='$currentDate' ")); {
                    $rowcount_finclientTask = mysqli_num_rows($result_finiTask);

                    if ($rowcount_clientTask_records == $rowcount_finclientTask) {
                        header("Location: ./medication-progress?uryyToeSS4=$uryyToeSS4");
                    } else {
                        header("Location: ./client-task-not-completed?uryyToeSS4=$uryyToeSS4");
                    }
                }
            }
        }
    }
}
