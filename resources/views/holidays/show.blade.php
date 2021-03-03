@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>holidays</h2>
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

    @if(isset($holidays))

    <div class="row">
        <div class="col-md-12">
            @if(count($holidays) < 1)
                <div class="row">
                    <div class="col-md-8">
                        <h4>No holidays found.</h4>  
                    </div>
                </div>
            @else
                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>holidays ({{ \App\Restaurant::where('code', $code)->first()->name }})</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                
                                @foreach($holidays as $holiday)
                                    <tr class="pricing-list-item pricing-submenu">
                                        <td>
                                            <div class="fm-input pricing-name" style="margin-right: 20px;"><input type="text" placeholder="" value="{{ $holiday->purpose }}" disabled></div>

                                            <div class="fm-input pricing-ingredients" style="margin-right: 10px;"><input type="text" placeholder="" value="{{ date('m/d/Y', $holiday->date) }}" disabled></div>

                                            <div class="fm-input pricing-name" style="margin-right: 20px;"><input type="text" placeholder="" value="{{ date('h:i A', strtotime($holiday->opening_time)).' - '.date('h:i A', strtotime($holiday->closing_time)) }}" disabled></div>

                                                
                                            <button href="#holiday-{{ $holiday->id }}" class="button popup-with-zoom-anim" style="max-height: 44px;"><i class="sl sl-icon-note"></i></button>

                                            <div id="holiday-{{ $holiday->id }}" class="zoom-anim-dialog mfp-hide small-dialog">
                                                <div class="small-dialog-header">
                                                    <h3>Eidt holiday</h3>
                                                </div>
                                                <div class="message-reply margin-top-0">
                                                    <form  method="POST" action="{{ route('holidays.update') }}">
                                                     @csrf
                                                        <input type="hidden" name="id" value="{{ $holiday->id }}">
                                                        <input type="text" name="purpose" value="{{ $holiday->purpose }}">
                                                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" value="{{ date('m/d/Y', $holiday->date) }}">
                                                        <select class="chosen-select" data-placeholder="Opening Time" name="opening_time">
                                                            <option label="Opening Time"></option>
                                                            <option value="Closed" @if($holiday->opening_time == 'Closed') {{ 'selected' }} @endif>Closed</option>
                                                            <option value="01:00:00" @if($holiday->opening_time == '01:00:00') {{ 'selected' }} @endif>1 AM</option>
                                                            <option value="02:00:00" @if($holiday->opening_time == '02:00:00') {{ 'selected' }} @endif>2 AM</option>
                                                            <option value="03:00:00" @if($holiday->opening_time == '03:00:00') {{ 'selected' }} @endif>3 AM</option>
                                                            <option value="04:00:00" @if($holiday->opening_time == '04:00:00') {{ 'selected' }} @endif>4 AM</option>
                                                            <option value="05:00:00" @if($holiday->opening_time == '05:00:00') {{ 'selected' }} @endif>5 AM</option>
                                                            <option value="06:00:00" @if($holiday->opening_time == '06:00:00') {{ 'selected' }} @endif>6 AM</option>
                                                            <option value="07:00:00" @if($holiday->opening_time == '07:00:00') {{ 'selected' }} @endif>7 AM</option>
                                                            <option value="08:00:00" @if($holiday->opening_time == '08:00:00') {{ 'selected' }} @endif>8 AM</option>
                                                            <option value="09:00:00" @if($holiday->opening_time == '09:00:00') {{ 'selected' }} @endif>9 AM</option>
                                                            <option value="10:00:00" @if($holiday->opening_time == '10:00:00') {{ 'selected' }} @endif>10 AM</option>
                                                            <option value="11:00:00" @if($holiday->opening_time == '11:00:00') {{ 'selected' }} @endif>11 AM</option>
                                                            <option value="12:00:00" @if($holiday->opening_time == '12:00:00') {{ 'selected' }} @endif>12 PM</option>  
                                                            <option value="13:00:00" @if($holiday->opening_time == '13:00:00') {{ 'selected' }} @endif>1 PM</option>
                                                            <option value="14:00:00" @if($holiday->opening_time == '14:00:00') {{ 'selected' }} @endif>2 PM</option>
                                                            <option value="15:00:00" @if($holiday->opening_time == '15:00:00') {{ 'selected' }} @endif>3 PM</option>
                                                            <option value="16:00:00" @if($holiday->opening_time == '16:00:00') {{ 'selected' }} @endif>4 PM</option>
                                                            <option value="17:00:00" @if($holiday->opening_time == '17:00:00') {{ 'selected' }} @endif>5 PM</option>
                                                            <option value="18:00:00" @if($holiday->opening_time == '18:00:00') {{ 'selected' }} @endif>6 PM</option>
                                                            <option value="19:00:00" @if($holiday->opening_time == '19:00:00') {{ 'selected' }} @endif>7 PM</option>
                                                            <option value="20:00:00" @if($holiday->opening_time == '20:00:00') {{ 'selected' }} @endif>8 PM</option>
                                                            <option value="21:00:00" @if($holiday->opening_time == '21:00:00') {{ 'selected' }} @endif>9 PM</option>
                                                            <option value="22:00:00" @if($holiday->opening_time == '22:00:00') {{ 'selected' }} @endif>10 PM</option>
                                                            <option value="23:00:00" @if($holiday->opening_time == '23:00:00') {{ 'selected' }} @endif>11 PM</option>
                                                            <option value="00:00:00" @if($holiday->opening_time == '0:00:00') {{ 'selected' }} @endif>12 AM</option>
                                                        </select>
                                                        <select class="chosen-select" data-placeholder="Closing Time" name="closing_time">
                                                            <option label="Closing Time"></option>
                                                            <option value="Closed" @if($holiday->closing_time == 'Closed') {{ 'selected' }} @endif>Closed</option>
                                                            <option value="01:00:00" @if($holiday->closing_time == '01:00:00') {{ 'selected' }} @endif>1 AM</option>
                                                            <option value="02:00:00" @if($holiday->closing_time == '02:00:00') {{ 'selected' }} @endif>2 AM</option>
                                                            <option value="03:00:00" @if($holiday->closing_time == '03:00:00') {{ 'selected' }} @endif>3 AM</option>
                                                            <option value="04:00:00" @if($holiday->closing_time == '04:00:00') {{ 'selected' }} @endif>4 AM</option>
                                                            <option value="05:00:00" @if($holiday->closing_time == '05:00:00') {{ 'selected' }} @endif>5 AM</option>
                                                            <option value="06:00:00" @if($holiday->closing_time == '06:00:00') {{ 'selected' }} @endif>6 AM</option>
                                                            <option value="07:00:00" @if($holiday->closing_time == '07:00:00') {{ 'selected' }} @endif>7 AM</option>
                                                            <option value="08:00:00" @if($holiday->closing_time == '08:00:00') {{ 'selected' }} @endif>8 AM</option>
                                                            <option value="09:00:00" @if($holiday->closing_time == '09:00:00') {{ 'selected' }} @endif>9 AM</option>
                                                            <option value="10:00:00" @if($holiday->closing_time == '10:00:00') {{ 'selected' }} @endif>10 AM</option>
                                                            <option value="11:00:00" @if($holiday->closing_time == '11:00:00') {{ 'selected' }} @endif>11 AM</option>
                                                            <option value="12:00:00" @if($holiday->closing_time == '12:00:00') {{ 'selected' }} @endif>12 PM</option>  
                                                            <option value="13:00:00" @if($holiday->closing_time == '13:00:00') {{ 'selected' }} @endif>1 PM</option>
                                                            <option value="14:00:00" @if($holiday->closing_time == '14:00:00') {{ 'selected' }} @endif>2 PM</option>
                                                            <option value="15:00:00" @if($holiday->closing_time == '15:00:00') {{ 'selected' }} @endif>3 PM</option>
                                                            <option value="16:00:00" @if($holiday->closing_time == '16:00:00') {{ 'selected' }} @endif>4 PM</option>
                                                            <option value="17:00:00" @if($holiday->closing_time == '17:00:00') {{ 'selected' }} @endif>5 PM</option>
                                                            <option value="18:00:00" @if($holiday->closing_time == '18:00:00') {{ 'selected' }} @endif>6 PM</option>
                                                            <option value="19:00:00" @if($holiday->closing_time == '19:00:00') {{ 'selected' }} @endif>7 PM</option>
                                                            <option value="20:00:00" @if($holiday->closing_time == '20:00:00') {{ 'selected' }} @endif>8 PM</option>
                                                            <option value="21:00:00" @if($holiday->closing_time == '21:00:00') {{ 'selected' }} @endif>9 PM</option>
                                                            <option value="22:00:00" @if($holiday->closing_time == '22:00:00') {{ 'selected' }} @endif>10 PM</option>
                                                            <option value="23:00:00" @if($holiday->closing_time == '23:00:00') {{ 'selected' }} @endif>11 PM</option>
                                                            <option value="00:00:00" @if($holiday->closing_time == '0:00:00') {{ 'selected' }} @endif>12 AM</option>
                                                        </select>
                                                        <input type="hidden" name="code" value="{{ $code }}">
                                                        <button class="button">Save</button>  
                                                    </form>
                                                </div>
                                            </div>


                                            <form method="POST" action="{{ route('holidays.delete') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $holiday->id }}">
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

            <div class="add-listing">
                <div class="add-listing-section">
                    <a href="#test" class="button popup-with-zoom-anim">Add holiday</a>
                </div>
            </div>
            
            <div id="test" class="zoom-anim-dialog mfp-hide small-dialog">
                <div class="small-dialog-header">
                    <h3>Add holiday</h3>
                </div>
                <div class="message-reply margin-top-0">
                    <form  method="POST" action="{{ route('holidays.insert') }}">
                     @csrf
                        <input type="text" name="purpose" placeholder="Purpose" required>
                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" required>
                        <select class="chosen-select" data-placeholder="Opening Time" name="opening_time">
                                <option value="Closed">Closed</option>
                                <option value="01:00:00">1 AM</option>
                                <option value="02:00:00">2 AM</option>
                                <option value="03:00:00">3 AM</option>
                                <option value="04:00:00">4 AM</option>
                                <option value="05:00:00">5 AM</option>
                                <option value="06:00:00">6 AM</option>
                                <option value="07:00:00">7 AM</option>
                                <option value="08:00:00">8 AM</option>
                                <option value="09:00:00">9 AM</option>
                                <option value="10:00:00">10 AM</option>
                                <option value="11:00:00">11 AM</option>
                                <option value="12:00:00">12 PM</option>  
                                <option value="13:00:00">1 PM</option>
                                <option value="14:00:00">2 PM</option>
                                <option value="15:00:00">3 PM</option>
                                <option value="16:00:00">4 PM</option>
                                <option value="17:00:00">5 PM</option>
                                <option value="18:00:00">6 PM</option>
                                <option value="19:00:00">7 PM</option>
                                <option value="20:00:00">8 PM</option>
                                <option value="21:00:00">9 PM</option>
                                <option value="22:00:00">10 PM</option>
                                <option value="23:00:00">11 PM</option>
                                <option value="00:00:00">12 AM</option>
                            </select>
                            <select class="chosen-select" data-placeholder="Closing Time" name="closing_time">
                                <option value="Closed">Closed</option>
                                <option value="01:00:00">1 AM</option>
                                <option value="02:00:00">2 AM</option>
                                <option value="03:00:00">3 AM</option>
                                <option value="04:00:00">4 AM</option>
                                <option value="05:00:00">5 AM</option>
                                <option value="06:00:00">6 AM</option>
                                <option value="07:00:00">7 AM</option>
                                <option value="08:00:00">8 AM</option>
                                <option value="09:00:00">9 AM</option>
                                <option value="10:00:00">10 AM</option>
                                <option value="11:00:00">11 AM</option>
                                <option value="12:00:00">12 PM</option>  
                                <option value="13:00:00">1 PM</option>
                                <option value="14:00:00">2 PM</option>
                                <option value="15:00:00">3 PM</option>
                                <option value="16:00:00">4 PM</option>
                                <option value="17:00:00">5 PM</option>
                                <option value="18:00:00">6 PM</option>
                                <option value="19:00:00">7 PM</option>
                                <option value="20:00:00">8 PM</option>
                                <option value="21:00:00">9 PM</option>
                                <option value="22:00:00">10 PM</option>
                                <option value="23:00:00">11 PM</option>
                                <option value="00:00:00">12 AM</option>
                            </select>
                        <input type="hidden" name="code" value="{{ $code }}">
                        <button class="button">Save</button>  
                    </form>
                </div>
            </div>

        </div>
    </div>

    @endif

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2021 Rizervo. All Rights Reserved.</div>
</div>

@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('js/datedropper.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.holiday-date').dateDropper();
        });
    </script> 
@endsection
