@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Gift Vouchers</h2>
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
                    <h4>Voucher(s)</h4>
                    <ul>
                        @foreach($vouchers as $voucher)
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset($voucher->photo) }}" alt="Image not found">
                                            </div>
                                            <div class="col-md-4">
                                                <h3><a href="#">{{ $voucher->title }}</a></h3>
                                                <h3>€{{ $voucher->price }}</h3>
                                                <span>{{ $voucher->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <form method="POST" action="{{ route('vouchers.edit') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $voucher->id }}">
                                    <button class="button gray"><i class="sl sl-icon-note"></i>Edit</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="add-listing">
                        <div class="add-listing-section">
                            <a href="{{ route('vouchers.add', $code) }}" class="button" style="padding: 9px 20px; line-height: 26px; font-size: 15px;">Add New Voucher</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2021 Rizervo. All Rights Reserved.</div>
</div>

@endsection
