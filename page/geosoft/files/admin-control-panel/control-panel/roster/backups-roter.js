<?php
include_once('header-panel.php');
include_once('flat-header-panel.php');
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

    var calendar,
        popup,
        range,
        oldEvent,
        tempEvent = {},
        deleteEvent,
        restoreEvent,
        titleInput = document.getElementById('work-order-title'),
        locationInput = document.getElementById('work-order-location'),
        firstCarerInput = document.getElementById('work-order-firstCarer'),
        decisionInput = document.getElementById('work-order-decision'),
        StatusTextarea = document.getElementById('work-order-status'),
        resourceCont = document.getElementById('work-order-resources');

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
                $sel_dist_att = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE (Clientshift_Date = '$currentDateRota' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' AND col_area_city = '" . $_COOKIE["companyCity"] . "') GROUP BY first_carer ");
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


    function createEditPopup(args) {
        var ev = args.event;

        // show delete button inside edit popup

        deleteEvent = false;
        restoreEvent = true;

        // set popup header text and buttons for editing
        popup.setOptions({
            headerText: 'Edit event',
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
        mobiscroll.getInst(decisionInput).value = ev.decision || '';
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
            $sel_dist_att = mysqli_query($myConnection, "SELECT DISTINCT first_carer FROM tbl_schedule_calls WHERE first_carer != ' ' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
            while ($att_rw = mysqli_fetch_array($sel_dist_att)) {
                $db_worker_name = $att_rw['first_carer'];

                $sel_corr_data = mysqli_query($myConnection, "SELECT * FROM tbl_schedule_calls WHERE first_carer = '$db_worker_name' AND rightTo_display = 'True' AND col_company_Id = '" . $_SESSION['usr_compId'] . "' ");
                while ($att_cor_rw = mysqli_fetch_array($sel_corr_data)) {

                    echo "
                {
                    title: '" . $att_cor_rw["client_name"] . "',
                    location: '" . $att_cor_rw["client_area"] . " " . $att_cor_rw["col_area_city"] . "',
                    resource: ['" . $att_cor_rw["team_resource"] . "'],
                    color: '" . $att_cor_rw["timeline_colour"] . "',
                    firstCarer: '" . $att_cor_rw["first_carer"] . "',
                    decision: '" . $att_cor_rw["first_carer"] . "',
                    Status: 'Call',

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

            return '<div class="md-work-order-date">' + formatDate('<?php echo $viewRotaByDate; ?>', args.date) + '</div>' +
                '<div class="md-work-order-date-title">New week rota</div>';

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

    decisionInput.addEventListener('input', function(ev) {
        // update current event's decisionInput
        tempEvent.decision = +ev.target.value || 0;;
    });

    StatusTextarea.addEventListener('change', function(ev) {
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
                    checkboxes += '<label class="work-order-checkbox-label"><input class="work-order-checkbox" data-value="' +
                        r.id + '" type="checkbox" mbsc-checkbox data-theme="material" data-label="' + r.name + '"/></label>';

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