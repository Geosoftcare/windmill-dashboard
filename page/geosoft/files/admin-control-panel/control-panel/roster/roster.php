<?php
include_once('header-panel.php');
include_once('flat-header-panel.php');

$txtDate = mysqli_real_escape_string($myConnection, $_REQUEST['txtDate']);
$rotaDateByDay = date('d l M, Y', strtotime($txtDate));
$currentDateRota = date('Y-m-d', strtotime($txtDate));
$viewRotaByDate = date('D m Y', strtotime($txtDate));
$_SESSION['currentDateRota'] = $currentDateRota;

$curRotaDay = $txtDate;
$currentRotaDay = date('l', strtotime($curRotaDay));
$_SESSION['currentRotaDay'] = $currentRotaDay;
?>

<script>
    mobiscroll.setOptions({
        locale: mobiscroll.localeEn,
        theme: 'ios',
        themeVariant: 'light'
    });

    function getfirstCarerString(firstCarer) {
        return firstCarer.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var calendar;
    var popup;
    var range;
    var oldEvent;
    var tempEvent = {};
    var deleteEvent;
    var restoreEvent;
    var titleInput = document.getElementById('work-order-title');
    var locationInput = document.getElementById('work-order-location');
    var firstCarerInput = document.getElementById('work-order-firstCarer');
    var StatusTextarea = document.getElementById('work-order-status');
    var deleteButton = document.getElementById('work-order-decision');
    var resourceCont = document.getElementById('work-order-resources');
    var myResources = [{
        id: 'contractors',
        name: 'Team(Carers)',

        // This is to collapsed the schedule drop down
        collapsed: false,
        eventCreation: false,
        children: [{
            id: 'builders',
            name: 'Team',
            eventCreation: false,
            children: [
                <?php
                $sel_dist_att = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date = '$txtDate' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' 
                AND col_area_city = '" . $_COOKIE["companyCity"] . "') GROUP BY first_carer ");
                while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                    $db_worker_name = $att_rw['first_carer'];
                    echo "
                    {
                        id: '" . $att_rw["team_resource"] . "',
                        name: '" . $att_rw['first_carer'] . "'
                    },
                ";
                } ?>
            ]
        }]
    }];

    function createAddPopup(elm) {
        // hide delete button inside add popup
        deleteButton.style.display = 'none';
        deleteEvent = true;
        restoreEvent = false;

        // set popup header text and buttons for adding
        popup.setOptions({
            headerText: 'New work order', // More info about headerText: https://mobiscroll.com/docs/javascript/eventcalendar/api#opt-headerText
            buttons: [ // More info about buttons: https://mobiscroll.com/docs/javascript/eventcalendar/api#opt-buttons
                'cancel',
                {
                    text: 'Add',
                    keyCode: 'enter',
                    handler: function() {
                        calendar.updateEvent(tempEvent);
                        deleteEvent = false;
                        // navigate the calendar to the correct view
                        calendar.navigateToEvent(tempEvent);
                        popup.close();
                    },
                    cssClass: 'mbsc-popup-button-primary',
                },
            ],
        });

        // fill popup with a new event data
        mobiscroll.getInst(titleInput).value = ev.title || '';
        mobiscroll.getInst(locationInput).value = ev.location || '';
        mobiscroll.getInst(firstCarerInput).value = ev.firstCarer || 0;
        mobiscroll.getInst(StatusTextarea).value = ev.Status || '';
        range.setVal([ev.start, ev.end]);
        setCheckboxes(ev.resource);
        // set anchor for the popup
        popup.setOptions({
            anchor: elm
        });

        popup.open();
    }


    function createEditPopup(args) {
        var ev = args.event;

        // show delete button inside edit popup
        deleteEvent = false;
        restoreEvent = true;

        // set popup header text and buttons for editing
        popup.setOptions({
            headerText: 'View details',
            buttons: [
                'cancel',
                {
                    text: '',
                    keyCode: 'enter',
                    handler: function() {
                        var date = range.getVal();
                        // update event with the new properties on save button click
                        var s = "<a title=\"Blah\" href=\"javascript:BlahFunc('" + options.rowId + "')\">This is blah</a>";

                        // navigate the calendar to the correct view
                        calendar.navigate(date[0]);;
                        restoreEvent = false;
                        popup.close();
                    },
                    cssClass: 'mbsc-popup-button-primary'
                }
            ]
        });

        // fill popup with the selected event data
        mobiscroll.getInst(titleInput).value = ev.title || '';
        mobiscroll.getInst(locationInput).value = ev.location || '';
        mobiscroll.getInst(firstCarerInput).value = ev.firstCarer || 0;
        mobiscroll.getInst(StatusTextarea).value = ev.Status || '';
        range.setVal([ev.start, ev.end]);
        setCheckboxes(ev.resource);
        // set anchor for the popup
        popup.setOptions({
            anchor: args.domEvent.currentTarget
        });
        popup.open();
    }

    calendar = mobiscroll.eventcalendar('#demo-work-order-scheduling', {
        clickToCreate: false,
        dragToCreate: false,
        dragToMove: false,
        dragToResize: false,
        dragTimeStep: 30,
        view: {
            timeline: {
                type: 'day', // 'day', 'week', 'month'
                startDay: 0,
                endDay: 6
            }
        },


        data: [
            <?php
            $sel_dist_att = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date = '$txtDate' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' AND col_area_city = '" . $_COOKIE["companyCity"] . "') GROUP BY first_carer ");
            while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                $db_worker_name = $att_rw['first_carer'];

                $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date = '$txtDate' AND first_carer = '$db_worker_name' AND rightTo_display = 'True' AND col_company_Id = '" . $_SESSION['usr_compId'] . "') ");
                while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {
                    echo "
                {
                    title: '" . $att_cor_rw["client_name"] . "',
                    location: '" . $att_cor_rw["client_area"] . " " . $att_cor_rw["col_area_city"] . "',
                    resource: ['" . $att_cor_rw["team_resource"] . "'],
                    color: '" . $att_cor_rw["timeline_colour"] . "',
                    myUserId: '" . $att_cor_rw["userId"] . "',
                    firstCarer: '" . $att_cor_rw["first_carer"] . "',
                    Status: '" . $att_cor_rw["call_status"] . " | " . $att_cor_rw["care_calls"] . " Call',

                    start: '" . $att_cor_rw["Clientshift_Date"] . "T" . $att_cor_rw["dateTime_in"] . "',
                    end: '" . $att_cor_rw["Clientshift_Date"] . "T" . $att_cor_rw["dateTime_out"] . "',
                },
                ";
                }
            } ?>
        ],


        resources: myResources,
        extendDefaultEvent: function() {
            return {
                title: 'Schedule order',
                location: '',
                firstCarer: 0
            };
        },
        onEventClick: function(args) {
            oldEvent = {
                ...args.event
            };
            tempEvent = args.event;

            if (!popup.isVisible()) {
                createEditPopup(args);
            }
        },
        onEventCreated: function(args) {
            popup.close();
            // store temporary event
            tempEvent = args.event;
            createAddPopup(args.target);
        },
        onEventDeleted: function(args) {
            mobiscroll.snackbar({
                button: {
                    action: function() {
                        calendar.addEvent(args.event);
                    },
                    text: 'Undo'
                },
                message: 'Schedule deleted'
            });
        },
        renderDay: function(args) {
            var formatDate = mobiscroll.formatDate;
            var events = args.events;
            var firstCarers = 0;

            if (events) {
                for (var i = 0; i < events.length; ++i) {
                    firstCarers += events[i].firstCarer;
                }
            }
            var mydate = '2014-11-07';
            return '<div class="md-work-order-date">' + formatDate('DD DDD MMM YYYY', args.date) + '</div>' +
                '<div class="md-work-order-date-title">Daily rota</div>';

        },
        renderScheduleEventContent: function(event) {
            return '<div>' + event.title + '<span class="md-work-order-price-tag"></span></div>';
        }
    });

    popup = mobiscroll.popup('#demo-work-order-popup', {
        display: 'bottom',
        contentPadding: false,
        fullScreen: true,
        scrollLock: false,
        onClose: function() {
            if (deleteEvent) {
                calendar.removeEvent(tempEvent);
            } else if (restoreEvent) {
                calendar.updateEvent(oldEvent);
            }
        },
        responsive: {
            medium: {
                display: 'anchored',
                width: 520,
                fullScreen: false,
                touchUi: true
            }
        }
    });

    titleInput.addEventListener('input', function(ev) {
        // update current event's title
        tempEvent.title = ev.target.value;
    });

    locationInput.addEventListener('input', function(ev) {
        // update current event's location
        tempEvent.location = ev.target.value;
    });

    firstCarerInput.addEventListener('input', function(ev) {
        // update current event's firstCarer
        tempEvent.firstCarer = +ev.target.value || 0;;
    });

    StatusTextarea.addEventListener('button', function(ev) {
        // update current event's description
        tempEvent.Status = ev.target.value;
    });

    range = mobiscroll.datepicker('#work-order-date', {
        controls: ['time'],
        select: 'range',
        startInput: '#work-order-start',
        endInput: '#work-order-end',
        showRangeLabels: false,
        touchUi: false,
        stepMinute: 30,
        minTime: '06:00',
        maxTime: '23:30',
        onChange: function(args) {
            var date = args.value;
            // update event's start date
            tempEvent.start = date[0];
            tempEvent.end = date[1];
        }
    });

    deleteButton.addEventListener('click', function() {
        // delete current event on button click
        window.location.href = '../care-call-details?userId=' + tempEvent.myUserId + '';
        popup.close();
        // save a local reference to the deleted event
        var deletedEvent = tempEvent;
    });

    document.querySelectorAll('input[name=event-status]').forEach(function(elm) {
        elm.addEventListener('change', function() {
            // update current event's free property
            tempEvent.free = mobiscroll.getInst(freeSegmented).checked;
        });
    });

    function setCheckboxes(resources) {
        var checkboxes = document.getElementsByClassName('work-order-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            var checkbox = checkboxes[i];
            mobiscroll.getInst(checkbox).checked = resources.indexOf(checkbox.getAttribute('data-value')) !== -1;
        }
    }

    function appendChekboxes() {
        var checkboxes = '<div class="mbsc-grid mbsc-no-padding"><div class="mbsc-row">';
        for (var i = 0; i < myResources.length; ++i) {
            for (var j = 0; j < myResources[i].children.length; ++j) {
                var resource = myResources[i].children[j];
                checkboxes += '<div class="mbsc-col-sm-4"><div class="mbsc-form-group-title">' + resource.name + '</div>';
                for (var k = 0; k < resource.children.length; ++k) {
                    var r = resource.children[k];
                    checkboxes += '<div style="padding:12px;"><a href="../care-call-details?col_team_resource=' +
                        r.id + '"><button class="btn btn-outline-secondary">' + r.name + '</button></a></div>';
                }
                checkboxes += '</div>';
            }
        }
        checkboxes += '</div></div>';
        resourceCont.innerHTML = checkboxes;
        mobiscroll.enhance(resourceCont);
    }

    appendChekboxes();


    //For client view display
    let show = true;

    function showCheckboxes() {
        let checkboxes = document.getElementById("checkBoxes");

        if (show) {
            checkboxes.style.display = "block";
            show = false;
        } else {
            checkboxes.style.display = "none";
            show = true;
        }
    }
    //For carer view display
    let cshow = true;

    function showCarerCheckboxes() {
        let checkboxes = document.getElementById("carercheckBoxes");
        if (cshow) {
            CcheckBoxes.style.display = "block";
            cshow = false;
        } else {
            CcheckBoxes.style.display = "none";
            cshow = true;
        }
    }
</script>




</body>

</html>