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

            <div class="side-booking-head">
                <div class="side-booking-close">
                    <button type="button" name="" onclick="tableSidebarClose()"><img src="{{ asset('img/close.svg')}}" alt=""></button>
                </div>
                <div class="side-booking-tab">
                    <ul class="" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#side-booking-info" role="tab" data-toggle="tab"><img src="{{ asset('img/book.svg')}}" alt=""></a>
                        </li>
                        <li role="presentation">
                            <a href="#side-message-info" role="tab" data-toggle="tab"><img src="{{ asset('img/plane.svg')}}" alt=""></a>
                        </li>
                        <li role="presentation">
                            <a href="#side-payment-info" role="tab" data-toggle="tab"><img src="{{ asset('img/card.svg')}}" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="side-booking-save">
                    <button type="button" name="">Save</button>
                </div>
            </div>

            <div class="side-booking-content">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane side-booking-info active" id="side-booking-info">
                        <div class="check-in-out-btn">
                            <button type="button" class="btn btn-default">Check-in</button>
                            <button type="button" class="btn btn-default">Check-out</button>
                        </div>
                        <div class="booking-gender">
                            <label>
                                <input type="radio" checked="checked" name="bookingInfo.title">
                                <span class="checkmark">Mr.</span>
                            </label>

                            <label>
                                <input type="radio" name="bookingInfo.title">
                                <span class="checkmark">Ms.</span>
                            </label>

                            <label>
                                <input type="radio" name="bookingInfo.title">
                                <span class="checkmark">Family</span>
                            </label>
                            <label>
                                <input type="checkbox" id="orderInfocompany">
                                <span class="checkmark">Company</span>
                            </label>
                        </div>
                        <div class="booking-inputs clearfix">
                            <div class="form-group full company-field" style="display:none">
                             <input name="bookingInfo.company" type="text" required="" placeholder="Company">
                         </div>

                            <div class="form-group">
                                <input name="bookingInfo.firstName" required="" type="text" placeholder="First name">
                            </div>
                            <div class="form-group">
                                <input name="bookingInfo.lastName" required="" type="text" placeholder="Last name">
                            </div>
                            <div class="form-group">
                                <input name="bookingInfo.email" required="" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="bookingInfo.telephone" required="" type="tel" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="booking-pickers">

                            <div class="form-group side-booking-date">
                                <input type="text" class="form-control side-booking-datepicker" placeholder="Booking Date">
                            </div>
                            <div class="form-group side-booking-person">
                                <select class="form-control select2" placeholder="Select Person">
                                    <option>Select Person</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                </select>
                            </div>
                            <div class="form-group side-booking-time">
                                <select class="form-control select2" placeholder="Select time">
                                    <option>Select time</option>
                                    <option value="">09:00</option>
                                    <option value="">09:00</option>
                                    <option value="">09:15</option>
                                    <option value="">09:30</option>
                                    <option value="">09:45</option>
                                    <option value="">10:00</option>
                                    <option value="">10:15</option>
                                    <option value="">10:30</option>
                                    <option value="">10:45</option>
                                    <option value="">11:00</option>
                                    <option value="">11:15</option>
                                    <option value="">11:30</option>
                                    <option value="">11:45</option>
                                    <option value="">12:00</option>
                                    <option value="">12:15</option>
                                    <option value="">12:30</option>
                                    <option value="">12:45</option>
                                    <option value="">13:00</option>
                                    <option value="">13:15</option>
                                    <option value="">13:30</option>
                                    <option value="">13:45</option>
                                    <option value="">14:00</option>
                                </select>
                            </div>
                            <div class="form-group side-booking-table">
                                <select class="form-control select2-table" placeholder="Select table" multiple>
                                    <optgroup label="Bar">
                                        <option value="">bar 1</option>
                                        <option value="">bar 2</option>
                                        <option value="">bar 3</option>
                                        <option value="">bar 4</option>
                                        <option value="">bar 5</option>
                                    </optgroup>
                                    <optgroup label="Serre">
                                        <option value="">table 1</option>
                                        <option value="">table 2</option>
                                        <option value="">table 3</option>
                                        <option value="">table 4</option>
                                        <option value="">table 5</option>
                                    </optgroup>
                                    <optgroup label="Restaurant">
                                        <option value="">table 6</option>
                                        <option value="">table 7</option>
                                        <option value="">table 8</option>
                                        <option value="">table 9</option>
                                        <option value="">table 10</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group side-booking-color">
                                <label>
                                    <input type="radio" checked="checked" name="bookingInfo.color" value="35c496">
                                    <span class="checkmark color1"></span>
                                </label>
                                <label>
                                    <input type="radio" name="bookingInfo.color" value="00bbda">
                                    <span class="checkmark color2"></span>
                                </label>
                                <label>
                                    <input type="radio" name="bookingInfo.color" value="aa85ef">
                                    <span class="checkmark color3"></span>
                                </label>
                                <label>
                                    <input type="radio" name="bookingInfo.color" value="be6b7f">
                                    <span class="checkmark color4"></span>
                                </label>
                                <label>
                                    <input type="radio" name="bookingInfo.color" value="ff3601">
                                    <span class="checkmark color5"></span>
                                </label>
                                <label>
                                    <input type="radio" name="bookingInfo.color" value="ffd300">
                                    <span class="checkmark color6"></span>
                                </label>
                            </div>

                        </div>
                        <div class="booking-note">
                            <div class="form-group">
                                <textarea name="" rows="10"class="form-control side-booking-note" placeholder="Booking note"></textarea>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane side-message-info" id="side-message-info">
                        <div class="today-btn">
                            <button type="button" name="button">Today</button>
                        </div>
                        <div class="message-box">
                            <div class="clearfix">
                                <div class="time pull-left">07:53</div>
                                <div class="sent-by pull-right">Guest</div>
                            </div>
                            <div class="message-title">Confirmation send</div>
                            <div class="email">guest@live.com</div>
                        </div>
                        <div class="message-box">
                            <div class="clearfix">
                                <div class="time pull-left">07:53</div>
                                <div class="sent-by pull-right">Guest</div>
                            </div>
                            <div class="message-title">Confirmation send</div>
                            <div class="email">guest@live.com</div>
                        </div>
                        <div class="message-box">
                            <div class="clearfix">
                                <div class="time pull-left">07:53</div>
                                <div class="sent-by pull-right">Guest</div>
                            </div>
                            <div class="message-title">Confirmation send</div>
                            <div class="email">guest@live.com</div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane side-payment-info" id="side-payment-info">
                        <div class="head">
                            <div class="name">Payment</div>
                            <div class="price"><span>€</span>200</div>
                        </div>
                        <div class="details">
                            <div class="box">
                                <div class="clearfix">
                                    <div class="pull-left">Status</div>
                                    <div class="pull-right">Paid</div>
                                </div>
                                <div class="clearfix">
                                    <div class="pull-left">Method</div>
                                    <div class="pull-right">iDeal</div>
                                </div>
                                <div class="clearfix">
                                    <div class="pull-left">paid on</div>
                                    <div class="pull-right">July 25, 2017 at 17:00</div>
                                </div>
                            </div>
                            <a class="view-mollie" href="">View payment a <strong>Mollie</strong></a>
                        </div>
                        <div class="option">
                            <a class="btn" role="button" data-toggle="collapse" href="#RSVPOption" aria-expanded="false" aria-controls="RSVPOption">
                                Reservation in option
                            </a>
                            <div class="collapse" id="RSVPOption">
                                <div class="rsvp-option">
                                    <div class="form-group ticket">
                                        <label>Ticket</label>
                                        <select class="form-control select2" placeholder="Select Type">
                                            <option>Select Type</option>
                                            <option value="">Christmas</option>
                                            <option value="">Christmas</option>
                                            <option value="">Christmas</option>
                                            <option value="">Christmas</option>
                                            <option value="">Christmas</option>
                                            <option value="">Christmas</option>
                                        </select>
                                    </div>
                                    <div class="form-group expiration">
                                        <label>Expiration</label>
                                        <input type="text" class="form-control side-rsvp-option-datepicker" placeholder="Select Date">
                                        <select class="form-control select2" placeholder="Select time">
                                            <option>Select time</option>
                                            <option value="">09:00</option>
                                            <option value="">09:00</option>
                                            <option value="">09:15</option>
                                            <option value="">09:30</option>
                                            <option value="">09:45</option>
                                            <option value="">10:00</option>
                                            <option value="">10:15</option>
                                            <option value="">10:30</option>
                                            <option value="">10:45</option>
                                            <option value="">11:00</option>
                                            <option value="">11:15</option>
                                            <option value="">11:30</option>
                                            <option value="">11:45</option>
                                            <option value="">12:00</option>
                                            <option value="">12:15</option>
                                            <option value="">12:30</option>
                                            <option value="">12:45</option>
                                            <option value="">13:00</option>
                                            <option value="">13:15</option>
                                            <option value="">13:30</option>
                                            <option value="">13:45</option>
                                            <option value="">14:00</option>
                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="button" name="button">Create & Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="side-booking-foot clearfix">
                <div class="side-foot-left pull-left">
                    <div class="side-booking-created-by">
                        Created by Guest <br>
                        on <span>28 December 2017 - 15:31</span>
                    </div>
                </div>
                <div class="side-foot-right pull-right">
                    <div class="side-booking-id">
                        Q9SdefFG5gf
                    </div>
                    <div class="side-booking-delete">
                        <button type="button" name=""><img src="{{ asset('img/delete.svg')}}" alt=""></button>
                    </div>
                </div>
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
                defaultDate: moment(),
                disableResizing: false,
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                header: {
                    left: '',
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
