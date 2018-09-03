@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-lg-12">
                <h2>Gift Voucher</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('vouchers.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="add-listing">
                            <div class="add-listing-section">
                                <div class="add-listing-headline">
                                    <h3><i class="sl sl-icon-doc"></i>Voucher Details</h3>
                                </div>

                                <input type="hidden" name="id" value="{{$voucher->id}}">

                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Voucher Status</h5>
                                        <select name="status" required="true" class="chosen-select">
                                            <option value="1" <?php if($voucher->status == 1) echo "selected";?> >Enabled</option>
                                            <option value="0" <?php if($voucher->status == 0) echo "selected";?> >Disabled</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Title</h5>
                                        <input type="text" name="title" required="true" value="{{ $voucher->title }}">
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Price</h5>
                                        <input type="number" min="0" step="0.01" name="price" required="true" value="{{ $voucher->price }}">
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <h5>Descriptiom<span>(maximum 500 characters)</span></h5>
                                        <textarea class="WYSIWYG" name="description" rows="2" id="description" spellcheck="true">{{ $voucher->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row with-forms edit-profile-photo">
                                    <img id="image" src="{{ asset($voucher->photo) }}" alt="" style="max-width: 400px; max-height: 250px; padding: 20px;">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload" name="photo" id="photo" accept="image/*" />
                                    </div>
                                </div>
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" class="button" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>                         
            </div>
        </div>
    </div>

    <!-- Copyrights -->
    <div class="col-lg-12">
        <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
        var _URL = window.URL || window.webkitURL;
        $("#photo").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function () {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                        $('#image').show();
                    }
                    reader.readAsDataURL(file);
                };
                img.src = _URL.createObjectURL(file);
            }
        });
</script>
@endsection
