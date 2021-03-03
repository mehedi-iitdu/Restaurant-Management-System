@extends('layouts.app')

@section('content')


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>My Profile</h2>
		</div>
	</div>
</div>

<div class="row">

	<!-- Profile -->
	<div class="col-lg-6 col-md-12">
		<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
			@csrf
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Profile Details</h4>
				<div class="dashboard-list-box-static">
					
					<!-- Avatar -->
					<div class="edit-profile-photo">
						@if(!empty($user->photo))
						<img id="image" src="{{ asset($user->photo) }}" alt="" style="width: 250; height: 250px;">
						@else
						<img id="image" src="{{ asset('images/user-avatar.jpg') }}" alt="" style="width: 250; height: 250px;">
						@endif
						<div class="change-photo-btn">
							<div class="photoUpload">
								<span><i class="fa fa-upload"></i> Upload Photo</span>
								<input type="file" class="upload" name="photo" id="photo" accept="image/*" />
							</div>
						</div>
					</div>

					<!-- Details -->
					<div class="my-profile">

						<label>Your Name</label>
						<input value="{{ $user->name }}" type="text" name="name">

						<label>Phone</label>
						<input value="{{ $user->phone }}" type="text" name="phone">

						<label>Email</label>
						<input value="{{ $user->email }}" type="text" name="email">

					</div>

					<button class="button margin-top-15" >Save Changes</button>

				</div>
			</div>
		</form>
	</div>

	<!-- Change Password -->
	<div class="col-lg-6 col-md-12">
		<form method="POST" action="{{ route('profile.changePassword') }}">
			@csrf
			<div class="dashboard-list-box margin-top-0">
				<h4 class="gray">Change Password</h4>
				<div class="dashboard-list-box-static">

					<!-- Change Password -->
					<div class="my-profile">
						<label class="margin-top-0">Current Password</label>
						<input type="password" required="true" name="current_password">

						<label>New Password</label>
						<input type="password" required="true" name="new_password">

						<label>Confirm New Password</label>
						<input type="password" required="true" name="confirm_password">

						<button class="button margin-top-15">Change Password</button>
					</div>

				</div>
			</div>
		</form>
	</div>


	<!-- Copyrights -->
	<div class="col-md-12">
		<div class="copyrights">© 2021 Rizervo. All Rights Reserved.</div>
	</div>

</div>

@endsection

@section('script')

<script type="text/javascript">
	
	$(document).ready(function(){
		var _URL = window.URL || window.webkitURL;
		$("#photo").change(function (e) {
		    var file, img;
		    if ((file = this.files[0])) {
		        img = new Image();
		        img.onload = function () {
		            if(this.width == this.height){
		            	flag = true;
		            	var reader = new FileReader();
		            	reader.onload = function (e) {
		            	    $('#image').attr('src', e.target.result);
		            	}
		            	reader.readAsDataURL(file);
		            }
		            else{
		            	$("#photo").val(null);
		            	alert("The height and width must be equal. (Recommended 300px*300px)");
		            }
		        };
		        img.src = _URL.createObjectURL(file);
		    }
		});
	});

</script>

@endsection