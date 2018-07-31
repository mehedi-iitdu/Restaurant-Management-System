@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Reservation Requests</h2>
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

    <!-- Content -->

    @if(isset($reservation_requests))

    <div class="row">

        <div class="col-md-12">
            @if(count($reservation_requests) < 1)
                <h4>No request found.</h4>
            @else

                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Reservation Requests ({{ \App\Restaurant::where('code', $code)->first()->name }})</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                @foreach($reservation_requests as $key => $reservation_request)

                                    <tr class="pricing-list-item pattern ui-sortable-handle">
                                        <td>
                                            <div class="" style="margin-right: 10px;">
                                                <input type="text" placeholder="" value="{{ date('d-m-Y', $reservation_request->date).'  '.date('h:i A', strtotime($reservation_request->time)) }}" disabled>
                                                <input type="text" placeholder="" value="{{ $reservation_request->number_of_people }} Person(s)" disabled>
                                            </div>

                                            <div class="fm-input pricing-ingredients">
                                                <input type="text" placeholder="" value="{{ $reservation_request->first_name.' '.$reservation_request->last_name }}" disabled>
                                                <input type="text" placeholder="" value="{{ $reservation_request->email.', '.$reservation_request->telephone }}" disabled>
                                            </div>

                                                <form method="POST" action="">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $reservation_request->id }}">
                                                    <button class="button" style="background: green"><i class="im im-icon-Yes"></i></button>
                                                </form>

                                                <form method="POST" action="">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $reservation_request->id }}">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form>  
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @endif
        </div>
    </div>
    @endif

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

@endsection
