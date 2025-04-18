<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Geosoft | Roster - work order scheduling</title>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="css/mobiscroll.javascript.min.css">
    <script src="js/mobiscroll.javascript.min.js"></script>

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100%;
        }

        .md-work-order-checkbox-label.mbsc-checkbox {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .md-work-order-date {
            font-size: 14px;
            border-bottom: 1px solid #ccc;
            padding: 5px 10px;
        }

        .md-work-order-date-title {
            font-size: 13px;
            color: #959595;
            padding: 5px 10px;
            line-height: 18px;
        }

        .md-work-order-price-tag {
            display: inline-block;
            font-size: 11px;
            line-height: 16px;
            vertical-align: middle;
            border: 1px solid #959595;
            color: #959595;
            border-radius: 5px;
            margin: 0 10px;
            padding: 0px 5px;
        }

        .md-work-order-scheduling .mbsc-timeline-parent {
            height: 32px;
        }
    </style>

</head>

<body>

    <div mbsc-page class="demo-work-order-scheduling">
        <div style="height:100%">
            <div id="demo-work-order-scheduling" class="md-work-order-scheduling"></div>

            <div style="display:none;">
                <div id="demo-work-order-popup">
                    <div class="mbsc-form-group">
                        <label>
                            Title
                            <input mbsc-input id="work-order-title" />
                        </label>
                        <label>
                            Location
                            <input mbsc-input id="work-order-location" />
                        </label>
                        <label>
                            Bill to customer ($)
                            <input mbsc-input id="work-order-bill" />
                        </label>
                        <label>
                            Notes
                            <textarea mbsc-textarea id="work-order-notes"></textarea>
                        </label>
                    </div>
                    <div class="mbsc-form-group">
                        <label>
                            Starts
                            <input mbsc-input id="work-order-start" />
                        </label>
                        <label>
                            Ends
                            <input mbsc-input id="work-order-end" />
                        </label>
                        <div id="work-order-date"></div>
                    </div>
                    <div id="work-order-resources" class="mbsc-form-group">

                    </div>

                    <div class="mbsc-button-group">
                        <button class="mbsc-button-block" id="work-order-delete" mbsc-button data-color="danger" data-variant="outline">Delete work order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        mobiscroll.setOptions({
            locale: mobiscroll.localeEn, // Specify language like: locale: mobiscroll.localePl or omit setting to use default
            theme: 'ios', // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light' // More info about themeVariant: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-themeVariant
        });

        function getCostString(cost) {
            return cost.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
            billInput = document.getElementById('work-order-bill'),
            notesTextarea = document.getElementById('work-order-notes'),
            deleteButton = document.getElementById('work-order-delete'),
            resourceCont = document.getElementById('work-order-resources');

        var myResources = [{
            id: 'contractors',
            name: 'Contractors',
            collapsed: true,
            eventCreation: false,
            children: [{
                id: 'builders',
                name: 'Builders',
                eventCreation: false,
                children: [{
                    id: 'b1',
                    name: 'Jude Chester'
                }, {
                    id: 'b2',
                    name: 'Willis Kane'
                }]
            }]
        }];

        function createAddPopup(elm) {
            // hide delete button inside add popup
            deleteButton.style.display = 'none';

            deleteEvent = true;
            restoreEvent = false;

            // set popup header text and buttons for adding
            popup.setOptions({
                headerText: 'New work order', // More info about headerText: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-headerText
                buttons: [ // More info about buttons: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-buttons
                    'cancel',
                    {
                        text: 'Add',
                        keyCode: 'enter',
                        handler: function() {
                            calendar.updateEvent(tempEvent);
                            deleteEvent = false;

                            // navigate the calendar to the correct view
                            calendar.navigate(tempEvent.start);

                            popup.close();
                        },
                        cssClass: 'mbsc-popup-button-primary'
                    }
                ]
            });

            // fill popup with a new event data
            mobiscroll.getInst(titleInput).value = tempEvent.title;
            mobiscroll.getInst(locationInput).value = tempEvent.location;
            mobiscroll.getInst(billInput).value = tempEvent.cost;
            mobiscroll.getInst(notesTextarea).value = '';
            range.setVal([tempEvent.start, tempEvent.end]);
            setCheckboxes(tempEvent.resource);

            // set anchor for the popup
            popup.setOptions({
                anchor: elm
            });

            popup.open();
        }

        function createEditPopup(args) {
            var ev = args.event;

            // show delete button inside edit popup
            deleteButton.style.display = 'block';

            deleteEvent = false;
            restoreEvent = true;

            // set popup header text and buttons for editing
            popup.setOptions({
                headerText: 'Edit event', // More info about headerText: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-headerText
                buttons: [ // More info about buttons: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-buttons
                    'cancel',
                    {
                        text: 'Save',
                        keyCode: 'enter',
                        handler: function() {
                            var date = range.getVal();
                            // update event with the new properties on save button click
                            calendar.updateEvent({
                                id: ev.id,
                                title: titleInput.value,
                                location: locationInput.value,
                                cost: +billInput.value || 0,
                                notes: notesTextarea.value,
                                start: date[0],
                                end: date[1],
                                color: ev.color,
                                resource: ev.resource,
                            });

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
            mobiscroll.getInst(billInput).value = ev.cost || 0;
            mobiscroll.getInst(notesTextarea).value = ev.notes || '';
            range.setVal([ev.start, ev.end]);
            setCheckboxes(ev.resource);

            // set anchor for the popup
            popup.setOptions({
                anchor: args.domEvent.currentTarget
            });
            popup.open();
        }

        calendar = mobiscroll.eventcalendar('#demo-work-order-scheduling', {
            clickToCreate: true, // More info about clickToCreate: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-clickToCreate
            dragToCreate: true, // More info about dragToCreate: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-dragToCreate
            dragToMove: true, // More info about dragToMove: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-dragToMove
            dragToResize: true, // More info about dragToResize: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-dragToResize
            dragTimeStep: 30, // More info about dragTimeStep: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-dragTimeStep
            view: { // More info about view: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-view
                timeline: {
                    type: 'week',
                    startDay: 1,
                    endDay: 5
                }
            },
            data: [{ // More info about data: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-data
                start: '2024-02-09T06:00',
                end: '2024-02-09T14:00',
                title: 'Farmhouse TPH',
                location: '3339 Spruce Drive',
                resource: ['d2', 'cm2', 'd4', 'cp1', 'cm2', 'ce2', 'b1'],
                color: '#12ca6c',
                cost: 48000
            }, {
                start: '2024-02-10T08:00',
                end: '2024-02-10T18:00',
                title: 'Block of flats KXT',
                location: '4698 Mercer Street',
                resource: ['d1', 'cm1', 'd3', 'cp1', 'cm3', 'ce2', 'b2'],
                color: '#c170c3',
                cost: 36000
            }, {
                start: '2024-02-11T12:00',
                end: '2024-02-11T20:00',
                title: 'Apartment house UGL',
                location: '3647 Tavern Place',
                resource: ['d3', 'cm2', 'd4', 'cp2', 'cm3', 'ce1', 'b2'],
                color: '#03c9d2',
                cost: 50000
            }, {
                start: '2024-02-12T11:00',
                end: '2024-02-12T19:00',
                title: 'Detached house WKB',
                location: '956 Dovetail Estates',
                resource: ['d1', 'cm3', 'd4', 'cp3', 'cm4', 'c2', 'b1', 'ce2'],
                color: '#ff1515',
                cost: 55000
            }, {
                start: '2024-02-13T10:00',
                end: '2024-02-13T18:00',
                title: 'Apartment house XAZ',
                location: '4919 Jett Lane, Inglewood',
                resource: ['d1', 'cm4', 'd4', 'cp1', 'cm2', 'c2', 'b2'],
                color: '#12ca6c',
                cost: 62000
            }, {
                start: '2024-02-13T08:00',
                end: '2024-02-13T16:00',
                title: 'Block of flats DRG',
                location: '486 Sycamore Fork Road',
                resource: ['d2', 'cm1', 'd3', 'cp2', 'ce2', 'c1', 'b1'],
                color: '#efd414',
                cost: 39000
            }, {
                start: '2024-02-14T09:00',
                end: '2024-02-14T17:00',
                title: 'Farmhouse YQK',
                location: '1563 Retreat Avenue',
                resource: ['d2', 'cm4', 'd4', 'cm2', 'cp1', 'c2', 'b2'],
                color: '#cf49d8',
                cost: 45000
            }, {
                start: '2024-02-15T07:00',
                end: '2024-02-15T15:00',
                title: 'Apartment house SWP',
                location: '628 Daylene Drive',
                resource: ['d2', 'cm3', 'd3', 'cm1', 'cp2', 'c1', 'b1'],
                color: '#c170c3',
                cost: 53000
            }, {
                start: '2024-02-16T10:00',
                end: '2024-02-16T18:00',
                title: 'Detached house OZL',
                location: '1830 Rinehart Road',
                resource: ['d3', 'cm2', 'd4', 'cp2', 'cm3', 'ce1', 'b2'],
                color: '#ff1515',
                cost: 47000
            }, {
                start: '2024-02-17T11:00',
                end: '2024-02-17T19:00',
                title: 'Farmhouse PSZ',
                location: '2410 Union Street',
                resource: ['d1', 'cm3', 'd4', 'cp3', 'cm4', 'c2', 'b1', 'ce2'],
                color: '#ff1515',
                cost: 64000
            }],
            resources: myResources, // More info about resources: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-resources
            extendDefaultEvent: function() { // More info about extendDefaultEvent: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-extendDefaultEvent
                return {
                    title: 'Work order',
                    location: '',
                    cost: 0
                };
            },
            onEventClick: function(args) { // More info about onEventClick: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#event-onEventClick
                oldEvent = {
                    ...args.event
                };
                tempEvent = args.event;

                if (!popup.isVisible()) {
                    createEditPopup(args);
                }
            },
            onEventCreated: function(args) { // More info about onEventCreated: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#event-onEventCreated
                popup.close();
                // store temporary event
                tempEvent = args.event;
                createAddPopup(args.target);
            },
            onEventDeleted: function(args) { // More info about onEventDeleted: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#event-onEventDeleted
                mobiscroll.snackbar({
                    button: {
                        action: function() {
                            calendar.addEvent(args.event);
                        },
                        text: 'Undo'
                    },
                    message: 'Event deleted'
                });
            },
            renderDay: function(args) { // More info about renderDay: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-renderDay
                var formatDate = mobiscroll.formatDate;
                var events = args.events;
                var costs = 0;

                if (events) {
                    for (var i = 0; i < events.length; ++i) {
                        costs += events[i].cost;
                    }
                }

                return '<div class="md-work-order-date">' + formatDate('DD DDD MMM YYYY', args.date) + '</div>' +
                    '<div class="md-work-order-date-title">Total revenue: $' + getCostString(costs) + '</div>';

            },
            renderScheduleEventContent: function(event) { // More info about renderScheduleEventContent: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-renderScheduleEventContent
                return '<div>' + event.title + '<span class="md-work-order-price-tag">$' + getCostString(event.original.cost) + '</span></div>';
            }
        });

        popup = mobiscroll.popup('#demo-work-order-popup', {
            display: 'bottom', // Specify display mode like: display: 'bottom' or omit setting to use default
            contentPadding: false,
            fullScreen: true,
            scrollLock: false,
            onClose: function() { // More info about onClose: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#event-onClose
                if (deleteEvent) {
                    calendar.removeEvent(tempEvent);
                } else if (restoreEvent) {
                    calendar.updateEvent(oldEvent);
                }
            },
            responsive: { // More info about responsive: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-responsive
                medium: {
                    display: 'anchored', // Specify display mode like: display: 'bottom' or omit setting to use default
                    width: 520, // More info about width: https://docs.mobiscroll.com/5-28-3/javascript/eventcalendar#opt-width
                    fullScreen: false,
                    touchUi: false
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

        billInput.addEventListener('input', function(ev) {
            // update current event's cost
            tempEvent.cost = +ev.target.value || 0;;
        });

        notesTextarea.addEventListener('change', function(ev) {
            // update current event's description
            tempEvent.notes = ev.target.value;
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
            maxTime: '22:00',
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

        deleteButton.addEventListener('click', function() {
            // delete current event on button click
            calendar.removeEvent(tempEvent);
            popup.close();

            // save a local reference to the deleted event
            var deletedEvent = tempEvent;

            mobiscroll.snackbar({
                button: {
                    action: function() {
                        calendar.addEvent(deletedEvent);
                    },
                    text: 'Undo'
                },
                message: 'Event deleted'
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
    </script>

</body>

</html>