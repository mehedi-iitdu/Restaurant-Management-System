@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Holidays</h2>
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
                            <h3><i class="sl sl-icon-doc"></i>Holidays ({{ \App\Restaurant::where('code', $code)->first()->name }})</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                
                                @foreach($holidays as $holiday)
                                    <tr class="pricing-list-item pricing-submenu">
                                        <td>
                                            <div class="fm-input pricing-name" style="margin-right: 20px;"><input type="text" placeholder="" value="{{ $holiday->purpose }}" disabled></div>

                                            <div class="fm-input pricing-ingredients" style="margin-right: 10px;"><input type="text" placeholder="" value="{{ date('m/d/Y', $holiday->date) }}" disabled></div>

                                                
                                            <button href="#holiday-{{ $holiday->id }}" class="button popup-with-zoom-anim" style="max-height: 44px;"><i class="sl sl-icon-note"></i></button>

                                            <div id="holiday-{{ $holiday->id }}" class="zoom-anim-dialog mfp-hide small-dialog">
                                                <div class="small-dialog-header">
                                                    <h3>Eidt Holiday</h3>
                                                </div>
                                                <div class="message-reply margin-top-0">
                                                    <form  method="POST" action="{{ route('holidays.update') }}">
                                                     @csrf
                                                        <input type="hidden" name="id" value="{{ $holiday->id }}">
                                                        <input type="text" name="purpose" value="{{ $holiday->purpose }}">
                                                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" value="{{ date('m/d/Y', $holiday->date) }}">
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
                    <a href="#test" class="button popup-with-zoom-anim">Add Holiday</a>
                </div>
            </div>
            
            <div id="test" class="zoom-anim-dialog mfp-hide small-dialog">
                <div class="small-dialog-header">
                    <h3>Add Holiday</h3>
                </div>
                <div class="message-reply margin-top-0">
                    <form  method="POST" action="{{ route('holidays.insert') }}">
                     @csrf
                        <input type="text" name="purpose" placeholder="Purpose" required>
                        <input type="text" name="date" class="holiday-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2018" data-max-year="2099" data-lock="from" required>
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
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
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
