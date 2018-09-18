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
        <button type="button" id="update_reservation">Save</button>
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
                    <input type="radio" name="bookingInfo.title" <?php if($reservation->reservationRequest->title == "MALE") echo "checked"; ?> disabled>
                    <span class="checkmark">Mr.</span>
                </label>

                <label>
                    <input type="radio" name="bookingInfo.title" <?php if($reservation->reservationRequest->title == "FEMALE") echo "checked"; ?> disabled>
                    <span class="checkmark">Ms.</span>
                </label>

                <label>
                    <input type="radio" name="bookingInfo.title" <?php if($reservation->reservationRequest->title == "FAMILY") echo "checked"; ?> disabled>
                    <span class="checkmark">Family</span>
                </label>
                <label>
                    <input type="checkbox" id="orderInfocompany" <?php if($reservation->reservationRequest->title == "COMPANY") echo "checked"; ?> disabled>
                    <span class="checkmark">Company</span>
                </label>
            </div>
            <div class="booking-inputs clearfix">
                <div class="form-group full company-field" style="display:none">
                    <input name="bookingInfo.company" type="text" required="" value="{{$reservation->reservationRequest->company}}" disabled>
                </div>
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

                <div class="form-group">
                    <input name="bookingInfo.firstName" required="" type="text" placeholder="First name" value="{{ $reservation->reservationRequest->first_name }}" disabled>
                </div>
                <div class="form-group">
                    <input name="bookingInfo.lastName" required="" type="text" placeholder="Last name" value="{{ $reservation->reservationRequest->last_name }}" disabled>
                </div>
                <div class="form-group">
                    <input name="bookingInfo.email" required="" type="email" placeholder="Email" value="{{ $reservation->reservationRequest->email }}" disabled>
                </div>
                <div class="form-group">
                    <input name="bookingInfo.telephone" required="" type="tel" placeholder="Phone number" value="{{ $reservation->reservationRequest->telephone }}" disabled>
                </div>
            </div>
            <div class="booking-pickers">

                <div class="form-group side-booking-date">
                    <input type="text" class="form-control side-booking-datepicker" name="date" value="{{ date('d M', $reservation->date) }}">
                </div>
                <div class="form-group side-booking-person">
                    <select class="form-control select2" placeholder="Select Person" name="number_of_people">
                        <option>Select Person</option>
                        <option value="1" <?php if($reservation->reservationRequest->number_of_people == 1) echo "selected"; ?> >1</option>
                        <option value="2" <?php if($reservation->reservationRequest->number_of_people == 2) echo "selected"; ?> >2</option>
                        <option value="3" <?php if($reservation->reservationRequest->number_of_people == 3) echo "selected"; ?> >3</option>
                        <option value="4" <?php if($reservation->reservationRequest->number_of_people == 4) echo "selected"; ?> >4</option>
                        <option value="5" <?php if($reservation->reservationRequest->number_of_people == 5) echo "selected"; ?> >5</option>
                        <option value="6" <?php if($reservation->reservationRequest->number_of_people == 6) echo "selected"; ?> >6</option>
                        <option value="7" <?php if($reservation->reservationRequest->number_of_people == 7) echo "selected"; ?> >7</option>
                        <option value="8" <?php if($reservation->reservationRequest->number_of_people == 8) echo "selected"; ?> >8</option>
                        <option value="9" <?php if($reservation->reservationRequest->number_of_people == 9) echo "selected"; ?> >9</option>
                        <option value="10" <?php if($reservation->reservationRequest->number_of_people == 10) echo "selected"; ?> >10</option>
                        <option value="11" <?php if($reservation->reservationRequest->number_of_people == 11) echo "selected"; ?> >11</option>
                        <option value="12" <?php if($reservation->reservationRequest->number_of_people == 12) echo "selected"; ?> >12</option>
                        <option value="13" <?php if($reservation->reservationRequest->number_of_people == 13) echo "selected"; ?> >13</option>
                        <option value="14" <?php if($reservation->reservationRequest->number_of_people == 14) echo "selected"; ?> >14</option>
                        <option value="15" <?php if($reservation->reservationRequest->number_of_people == 15) echo "selected"; ?> >15</option>
                        <option value="16" <?php if($reservation->reservationRequest->number_of_people == 16) echo "selected"; ?> >16</option>
                        <option value="17" <?php if($reservation->reservationRequest->number_of_people == 17) echo "selected"; ?> >17</option>
                        <option value="18" <?php if($reservation->reservationRequest->number_of_people == 18) echo "selected"; ?> >18</option>
                        <option value="19" <?php if($reservation->reservationRequest->number_of_people == 19) echo "selected"; ?> >19</option>
                        <option value="20" <?php if($reservation->reservationRequest->number_of_people == 20) echo "selected"; ?> >20</option>
                        <option value="21" <?php if($reservation->reservationRequest->number_of_people == 21) echo "selected"; ?> >21</option>
                        <option value="22" <?php if($reservation->reservationRequest->number_of_people == 22) echo "selected"; ?> >22</option>
                        <option value="23" <?php if($reservation->reservationRequest->number_of_people == 23) echo "selected"; ?> >23</option>
                    </select>
                </div>
                <div class="form-group side-booking-time">
                    <select class="form-control select2" placeholder="Select time" name="start_time">
                        <option>Select start time</option>
                        @if($timeConfig->opening_time != 'Closed' || $timeConfig->closing_time != 'Closed')
                            @php
                                $i = 0;
                            @endphp
                            @for($time = strtotime($timeConfig->opening_time); $time <= strtotime($timeConfig->closing_time); $time = strtotime('+15 minutes', $time))
                                    <option value="{{ date("H:i:s", $time) }}" <?php if($reservation->start_time == date("H:i:s", $time)) echo "selected"; ?> >{{ date("H:i:s", $time) }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endfor
                        @endif
                    </select>
                </div>
                <div class="form-group side-booking-time">
                    <select class="form-control select2" placeholder="Select time" name="end_time">
                        <option>Select end time</option>
                        @if($timeConfig->opening_time != 'Closed' || $timeConfig->closing_time != 'Closed')
                            @php
                                $i = 0;
                            @endphp
                            @for($time = strtotime($timeConfig->opening_time); $time <= strtotime($timeConfig->closing_time); $time = strtotime('+15 minutes', $time))
                                    <option value="{{ date("H:i:s", $time) }}" <?php if($reservation->end_time == date("H:i:s", $time)) echo "selected"; ?> >{{ date("H:i:s", $time) }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endfor
                        @endif
                    </select>
                </div>
                <div class="form-group side-booking-table">
                    <select class="form-control select2-table" placeholder="Select table" name="table_id">
                        @foreach(\App\RestaurantTable::all() as $table)
                            <option value="{{ $table->id }}" <?php if($reservation->restaurant_table_id == $table->id) echo "selected";?>>{{ $table->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group side-booking-color">
                    <label>
                        <input type="radio" name="bookingInfo.color" value="35c496" <?php if($reservation->color == "35c496") echo "checked";?> >
                        <span class="checkmark color1"></span>
                    </label>
                    <label>
                        <input type="radio" name="bookingInfo.color" value="00bbda" <?php if($reservation->color == "00bbda") echo "checked";?> >
                        <span class="checkmark color2"></span>
                    </label>
                    <label>
                        <input type="radio" name="bookingInfo.color" value="aa85ef" <?php if($reservation->color == "aa85ef") echo "checked";?> >
                        <span class="checkmark color3"></span>
                    </label>
                    <label>
                        <input type="radio" name="bookingInfo.color" value="be6b7f" <?php if($reservation->color == "be6b7f") echo "checked";?> >
                        <span class="checkmark color4"></span>
                    </label>
                    <label>
                        <input type="radio" name="bookingInfo.color" value="ff3601" <?php if($reservation->color == "ff3601") echo "checked";?> >
                        <span class="checkmark color5"></span>
                    </label>
                    <label>
                        <input type="radio" name="bookingInfo.color" value="ffd300" <?php if($reservation->color == "ffd300") echo "checked";?> >
                        <span class="checkmark color6"></span>
                    </label>
                </div>

            </div>
            <div class="booking-note">
                <div class="form-group">
                    <textarea name="" rows="8"class="form-control side-booking-note" placeholder="Booking note" disabled>{{ $reservation->reservationRequest->note }}</textarea>
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
            <button type="button" name=""><img src="{{asset('img/delete.svg')}}" alt=""></button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $( ".side-booking-datepicker" ).datepicker({
            defaultDate: 0,
            minDate: 0,
            firstDay: 1,
            dateFormat: "d M"
        });
        $( ".side-rsvp-option-datepicker" ).datepicker({
            defaultDate: 0,
            firstDay: 1,
            dateFormat: "M dd / yy"
        }).datepicker("setDate", new Date());

        $('.select2').select2();

        $('.select2-table').select2({
            placeholder: {
                id: '-1',
                text: 'Select table'
            }
        });
    });

    $('#update_reservation').on('click', function(){
        
        /*var service = $("input[name=service]").val();
        var waiting_time = $("input[name=waiting_time]").val();
        var meal = $("input[name=meal]").val();
        var comment = $("input[name=comment]").val();
        var suggestion = $("input[name=suggestion]").val();
        var email = $("input[name=email]").val();

        if($("input[name=sub_1]").prop('checked')){
            var sub_1 = 1;
        }
        else{
            var sub_1 = 0;
        }

        if($("input[name=sub_2]").prop('checked')){
            var sub_2 = 1;
        }
        else{
            var sub_2 = 0;
        }

        $.ajax({
            type: "POST",
            url: '{{route('feedback.store')}}',
            data: {
             _token : '{{ csrf_token()}}', 
             code : $('#restaurant_code').val(),
             service : service,
             waiting_time : waiting_time,
             meal : meal,
             comment : comment,
             suggestion : suggestion,
             email : email,
             sub_1 : sub_1,
             sub_2 : sub_2
            },
            dataType: "text",
            success: function(resultData) {
                console.log(resultData);
            }
        });*/
    });

</script>