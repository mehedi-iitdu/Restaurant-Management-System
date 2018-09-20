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
        <button type="button" id="store_reservation">Save</button>
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
                    <input type="radio" name="title" value="MALE" checked required>
                    <span class="checkmark">Mr.</span>
                </label>

                <label>
                    <input type="radio" name="title" value="FEMALE" required>
                    <span class="checkmark">Ms.</span>
                </label>

                <label>
                    <input type="radio" name="title" value="FAMILY" required>
                    <span class="checkmark">Family</span>
                </label>
                <label>
                    <input type="checkbox" id="orderInfocompany">
                    <span class="checkmark">Company</span>
                </label>
            </div>
            <div class="booking-inputs clearfix">
                <div class="form-group full company-field" style="display:none">
                    <input name="company" type="text">
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
                    <input name="first_name" type="text" placeholder="First name" required>
                </div>
                <div class="form-group">
                    <input name="last_name" type="text" placeholder="Last name" required>
                </div>
                <div class="form-group">
                    <input name="email" required="" type="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input name="telephone" required="" type="tel" placeholder="Phone number" required>
                </div>
            </div>
            <div class="booking-pickers">

                <div class="form-group side-booking-date">
                    <input type="text" class="form-control side-rsvp-option-datepicker" name="date">
                </div>
                <div class="form-group side-booking-person">
                    <select class="form-control select2" placeholder="Select Person" name="number_of_people">
                        <option>Select Person</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </div>
                <div class="form-group side-booking-time">
                    <select id="start_time" class="form-control select2" placeholder="Select time" name="start_time">
                        
                    </select>
                </div>
                <div class="form-group side-booking-time">
                    <select id="end_time" class="form-control select2" placeholder="Select time" name="end_time">
                        
                    </select>
                </div>
                <div class="form-group side-booking-table">
                    <select class="form-control select2-table" placeholder="Select table" name="table_ids" multiple>
                        @foreach($restaurant->tables as $table)
                            <option value="{{ $table->id }}">{{ $table->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group side-booking-color">
                    <label>
                        <input type="radio" name="color" value="35c496">
                        <span class="checkmark color1"></span>
                    </label>
                    <label>
                        <input type="radio" name="color" value="00bbda">
                        <span class="checkmark color2"></span>
                    </label>
                    <label>
                        <input type="radio" name="color" value="aa85ef">
                        <span class="checkmark color3"></span>
                    </label>
                    <label>
                        <input type="radio" name="color" value="be6b7f">
                        <span class="checkmark color4"></span>
                    </label>
                    <label>
                        <input type="radio" name="color" value="ff3601">
                        <span class="checkmark color5"></span>
                    </label>
                    <label>
                        <input type="radio" name="color" value="ffd300">
                        <span class="checkmark color6"></span>
                    </label>
                </div>

            </div>
            <div class="booking-note">
                <div class="form-group">
                    <textarea name="note" rows="8"class="form-control side-booking-note" placeholder="Booking note" required></textarea>
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
        $( ".side-rsvp-option-datepicker" ).datepicker({
            defaultDate: 0,
            firstDay: 1,
            dateFormat: "d M"
        }).datepicker("setDate", new Date());

        $('.select2').select2();

        $('.select2-table').select2({
            placeholder: {
                id: '-1',
                text: 'Select table'
            }
        });

        $.ajax({
            type: "POST",
            url: '{{route('timeConfig.available-times')}}',
            data: {
             _token : '{{ csrf_token()}}',
             date: $("input[name=date]").val(),
             code : '{{ $restaurant->code }}'
            },
            dataType: "text",
            success: function(resultData) {
                console.log(resultData);
                $('#start_time').html(resultData);
                $('#end_time').html(resultData);
            }
        });

    });

    $("input[name=date]").on('change', function(){
        $.ajax({
            type: "POST",
            url: '{{route('timeConfig.available-times')}}',
            data: {
             _token : '{{ csrf_token()}}',
             date: $("input[name=date]").val(),
             code : '{{ $restaurant->code }}'
            },
            dataType: "text",
            success: function(resultData) {
                console.log(resultData);
                $('#start_time').html(resultData);
                $('#end_time').html(resultData);
            }
        });
    });

    $('#store_reservation').on('click', function(event){
        
        var title = $("input[name=title]:checked").val();
        var company = $("input[name=company]").val();
        var first_name = $("input[name=first_name]").val();
        var last_name = $("input[name=last_name]").val();
        var email = $("input[name=email]").val();
        var telephone = $("input[name=telephone]").val();
        var note = $("textarea[name=note]").val();
        var date = $("input[name=date]").val();
        var number_of_people = $("select[name=number_of_people]").val();
        var start_time = $("select[name=start_time]").val();
        var end_time = $("select[name=end_time]").val();
        var table_ids = $("select[name=table_ids]").val();
        var color = $("input[name=color]:checked").val();
        //console.log(note);

        $.ajax({
            type: "POST",
            url: '{{route('reservations.store_event')}}',
            data: {
             _token : '{{ csrf_token()}}',
             code : '{{ $restaurant->code }}',
             title : title,
             company : company,
             first_name: first_name,
             last_name : last_name,
             email : email,
             telephone : telephone,
             note : note,
             date : date,
             number_of_people : number_of_people,
             start_time : start_time,
             end_time : end_time,
             table_ids : table_ids,
             color : color
            },
            dataType: "text",
            success: function(resultData) {
                $("#calendar").fullCalendar("refetchEvents");
                tableSidebarClose();
            }
        });
        
    });

</script>