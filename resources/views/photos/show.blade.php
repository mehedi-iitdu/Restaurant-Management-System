@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Photo Gallery</h2>
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
                <h4>Photo(s)</h4>
                <ul>
                    @foreach($photos as $photo)
                    <li>
                        <div class="list-box-listing">
                            <div class="list-box-listing-content">
                                <div class="inner">
                                    <img src="{{ asset($photo->photo) }}" style="max-height: 300px; max-width: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="buttons-to-right">
                            <a href="{{ route('photos.delete', $photo->id) }}" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                           
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="submit-section">
                <form action="{{ route('photos.upload') }}" class="dropzone" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="code", value="{{ $code }}">
                </form>
            </div>

        </div>
    </div>


        

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
</div>

@endsection
