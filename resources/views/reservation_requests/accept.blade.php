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
                                        <select data-placeholder="Select Tables" class="chosen-select" name="tables_ids" multiple>
                                            @foreach($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->name }}</option>
                                            @endforeach
                                        </select>
                                        <span></span>
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
