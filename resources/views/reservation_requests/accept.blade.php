@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Accept Reservation Request</h2>
            </div>
        </div>
    </div>

    <!-- Notice
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div> -->


        <div class="row">
            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <div class="list-box-listing">
                        <div class="list-box-listing-content">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>{{ date('d-m-Y', $reservation_request->date).'  '.date('h:i A', strtotime($reservation_request->time)) }}</h4>
                                        <h4>{{$reservation_request->number_of_people }} Person(s)</h4>
                                        <h4>{{ $reservation_request->first_name.' '.$reservation_request->last_name }}</h4>
                                        <h4>{{ $reservation_request->email }}</h4>
                                        <h4>{{ $reservation_request->telephone }}</h4>
                                        <span></span>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{ route('reservations.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="reservation_request_id" value="{{ $reservation_request->id }}">
                                            <select id="table-select" data-placeholder="Select Tables" class="chosen-select" name="table_ids[]" multiple required>
                                                @foreach($tables as $table)
                                                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                                                @endforeach
                                            </select>
                                            <span></span>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="chosen-select" name="hours" required>
                                                        <option value="+0 hour">For (Hours)</option>
                                                        <option value="+1 hours">1 Hour</option>
                                                        <option value="+2 hours">2 Hour</option>
                                                        <option value="+3 hours">3 Hour</option>
                                                        <option value="+4 hours">4 Hour</option>
                                                        <option value="+5 hours">5 Hour</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="chosen-select" name="minutes" required>
                                                        <option value="+0 minutes">For (Minutes)</option>
                                                        <option value="+15 minutes">15 Minutes</option>
                                                        <option value="+30 minutes">30 Minutes</option>
                                                        <option value="+45 minutes">45 Minutes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="side-booking-color">
                                                <label>
                                                    <input type="radio" checked="checked" name="color" value="35c496" required>
                                                    <span class="checkmark color1"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="00bbda" required>
                                                    <span class="checkmark color2"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="aa85ef" required>
                                                    <span class="checkmark color3"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="be6b7f" required>
                                                    <span class="checkmark color4"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="ff3601" required>
                                                    <span class="checkmark color5"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="color" value="ffd300" required>
                                                    <span class="checkmark color6"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-12" align="center">
                                                <button style="padding: 9px 20px; line-height: 26px; font-size: 15px;" type="submit" class="button border margin-top-5">Confirm <i class="fa fa-arrow-circle-right"></i> </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 id="capacity"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    
    $('#capacity').hide();

    $('#table-select').on('change', function(){
        var table_ids = $('#table-select').val();
        if(table_ids == null){
            $('#capacity').hide();
        } 
        $.ajax({
            type: "POST",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('tables.capacity') }}",
            data: {
             _token : $('meta[name="csrf-token"]').attr('content'), 
             table_ids : table_ids
            },
            success: function(resultData) {
                $('#capacity').html('Total Capacity: '+ resultData+' Person(s)');
                $('#capacity').show();
            }
        });
    });
</script>

@endsection
