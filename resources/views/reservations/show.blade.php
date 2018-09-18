<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/fullcalendar.print.min.css') }}" rel='stylesheet' media="print"/>
    <link href="{{ asset('css/scheduler.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/select2.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/style_booking.css') }}" rel='stylesheet' />
</head>
<body>

    <div id='calendar'></div>

    <div class="table-sidebar-wrap opacity-0">
        <div class="table-sidebar-dark-overlay" onclick="tableSidebarClose()"></div>
        <div class="side-booking-option close">
            
            <div id="preloader" class="side-booking-preloader">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>

            <div id="side-content">
                
            </div>

        </div>
    </div>
</body>

    <script src="{{ asset('js/moment.min.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('js/scheduler.min.js')}}"></script>
    <script src="{{ asset('js/select2.min.js')}}"></script>
    <script src="{{ asset('js/jquery.kinetic.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>


    <script type="text/javascript">
        $(function () {
                //show it when the checkbox is clicked
                $('input#orderInfocompany').on('click', function () {
                    if ($(this).prop('checked')) {
                        $('.company-field').show();
                    } else {
                        $('.company-field').hide();
                    }
                });
            });
    </script>

    <script type="text/javascript">
        $(function() { // document ready
            var calendar = $('#calendar').fullCalendar({
                customButtons: {
                    addButton: {
                        text: 'Add a Booking',
                        click: function() {
                            //$('.table-sidebar-wrap').removeClass('opacity-0').addClass('opacity-1');
                            //$('.side-booking-option').removeClass('close').addClass('open');
                            //add invisible class in preloader
                            //setTimeout(function(){ $('.side-booking-preloader').addClass('invisible'); }, 1000);
                        }
                    }
                },
                defaultDate: moment(),
                disableResizing: false,
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                header: {
                    left: 'addButton',
                    center: 'title',
                    right: 'prev today next'
                },
                titleFormat: 'dddd D MMM ',
                // contentHeight: 700,
                // height: 'auto',
                height: 'parent',
                defaultView: 'timelineDay',
                resourceAreaWidth: '130',
                resourceGroupHeight: '50',
                maxTime: '24:00:00',
                minTime: '00:00:00',
                scrollTime: '00:00:00',
                slotWidth: '60',
                slotDuration: '00:15:00',
                resourceGroupField: 'type',
                resourceLabelText: ' ',
                resources: [<?php foreach($resources as $resource) echo "{ id: '".$resource['id']."', type: '".$resource['type']."', title: '".$resource['title']."' },"; ?>
                ],
                events: function(start, end, timezone, callback) {
                    //var b = $('#calendar').fullCalendar('getDate');
                    //var date = b.format('L');
                    $.ajax({
                        type: "POST",
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('reservations.events') }}",
                        data: {
                            _token : $('meta[name="csrf-token"]').attr('content'), 
                            code : '{{ $code }}'
                        },
                        success: function(doc) {
                            var events = [];
                            $(doc).each(function() {
                                events.push({
                                    id: $(this).attr('id'),
                                    resourceId: $(this).attr('resourceId'),
                                    start: $(this).attr('start'),
                                    end: $(this).attr('end'),
                                    title: $(this).attr('title'),
                                    backgroundColor: $(this).attr('backgroundColor'),
                                    person: $(this).attr('person'),
                                    note: $(this).attr('note')
                                });
                            });
                            callback(events);
                        }
                    });
                },
                viewRender: function (view, element) {
                    var b = $('#calendar').fullCalendar('getDate');
                    var date = b.format('L');
                },
                resourceRender: function(resourceObj, labelTds, bodyTds) {
                    //labelTds.find('.fc-cell-content').append('<span class="fc-resource-">'+resourceObj.id+'</span>');
                    var events = $("#calendar").fullCalendar('getResourceEvents', resourceObj);
                    var total_duration = events.reduce(function( accumulator, event ) {
                        return accumulator + moment.duration(event.end.diff(event.start)).asHours()
                    }, 0)
                    if (total_duration == 0) {
                        labelTds.find('.fc-cell-content').append('<span class="fc-available-table"></span>');
                    }

                    for (i = 0; i < events.length; i++) {
                        if(events[i].resourceIds !== null){
                            labelTds.find('.fc-cell-content').append('<span class="fc-table-connected"></span>');

                            if (events[i].resourceIds[0] == resourceObj.id) {
                                labelTds.find('.fc-table-connected').addClass('first');
                            }
                            if ((events[i].resourceIds[events[i].resourceIds.length -1]) == resourceObj.id) {
                                labelTds.find('.fc-table-connected').addClass('last');
                            }
                        }
                    }
                },
                eventClick: function(calEvent, jsEvent, view) {

                    $('.table-sidebar-wrap').removeClass('opacity-0').addClass('opacity-1');
                    $('.side-booking-option').removeClass('close').addClass('open');

                    $.ajax({
                        type: "POST",
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('reservations.edit') }}",
                        data: {
                            _token : $('meta[name="csrf-token"]').attr('content'), 
                            code : '{{ $code }}',
                            id : calEvent.id
                        },
                        success: function(result) {
                            $('#side-content').html(result);
                            $('#preloader').addClass('invisible');
                        }
                    });

                },
                eventRender: function(event, element) {
                    element.find('.fc-content').prepend('<span class="fc-person">' + event.person + '</span>');
                    if(typeof event.note !== 'undefined'){
                        element.find('.fc-content').append('<span class="fc-note">' + event.note + '</span>');
                    }
                    if(typeof event.price !== 'undefined'){
                        element.find('.fc-content').append('<span class="fc-price">' + event.price + '</span>');
                    }

                }
            });


    });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.fc-head .fc-time-area .fc-scroller').kinetic({
                y: false,
                slowdown: 0.7,
                maxvelocity: 40
            });
        });
    </script>

</html>
