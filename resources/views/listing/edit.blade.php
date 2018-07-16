@extends('layouts.app')

@section('content')
<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>My Listing</h2>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<form method="POST" action="{{ route('listing.update') }}">
			@csrf

			<div id="add-listing">

				<!-- Section -->
				<div class="add-listing-section">

					<!-- Headline -->
					<div class="add-listing-headline">
						<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
					</div>

					<!-- Title -->
					<div class="row with-forms">
						<div class="col-md-12">
							<h5>Restaurant Name <i class="tip" data-tip-content="Name of your business"></i></h5>
							<input class="search-field" type="text" value="{{ $restaurant->name }}" id="name" name="name" required="true" />
						</div>
					</div>

					<!-- Row -->
					<div class="row with-forms">

						<!-- Status -->
						<div class="col-md-6">
							<h5>Category</h5>
							<select data-placeholder="Select Restaurant Categories" class="chosen-select" style="display: none;" name="restaurant_type_id" required="true">
								<option label="blank">Select Category</option>

								@foreach($restaurantTypes as $restaurantType)	
								<option value="{{ $restaurantType->id }}" <?php if($restaurantType->id == $restaurant->restaurant_type_id) echo "selected"; ?> >{{ $restaurantType->name }}</option>
								@endforeach
							</select>
						</div>

						<!-- Type -->
						<div class="col-md-6">
							<h5>Keywords <i class="tip" data-tip-content="Maximum of 100 keywords related with your restaurant"></i></h5>
							<input type="text" placeholder="Keywords should be separated by commas" id="keywords" name="keywords" value="{{ $restaurant->keywords }}">
						</div>

					</div>
					<!-- Row / End -->

				</div>
				<!-- Section / End -->


				<!-- Section -->
				<div class="add-listing-section margin-top-45">

					<!-- Headline -->
					<div class="add-listing-headline">
						<h3><i class="sl sl-icon-docs"></i> Details</h3>
					</div>

					<!-- Description -->
					<div class="form">
						<h5>Description <span>(max 1000 characters)</span></h5>
						<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true">{{ $restaurant->description }}</textarea>
					</div>

					<!-- Row -->
					<div class="row with-forms">

						<!-- Phone -->
						<div class="col-md-4">
							<h5>Phone <span>(optional)</span></h5>
							<input type="text" id="phone" name="phone" value="{{ $restaurant->phone }}">
						</div>

						<!-- Website -->
						<div class="col-md-4">
							<h5>Website <span>(optional)</span></h5>
							<input type="text" id="website" name="website" value="{{ $restaurant->website }}">
						</div>

						<!-- Email Address -->
						<div class="col-md-4">
							<h5>E-mail <span>(optional)</span></h5>
							<input type="email" id="email" name="email" value="{{ $restaurant->email }}">
						</div>

					</div>
					<!-- Row / End -->


					<!-- Row -->
					<div class="row with-forms">

						<!-- Facebook -->
						<div class="col-md-4">
							<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
							<input type="text" placeholder="https://www.facebook.com/" id="facebook" name="facebook" value="{{ $restaurant->facebook }}">
						</div>

						<!-- Twitter -->
						<div class="col-md-4">
							<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
							<input type="text" placeholder="https://www.twitter.com/" name="twitter" value="{{ $restaurant->twitter }}">
						</div>

						<!-- Google Plus -->
						<div class="col-md-4">
							<h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
							<input type="text" placeholder="https://plus.google.com" name="google_plus" value="{{ $restaurant->google_plus }}">
						</div>

					</div>
					<!-- Row / End -->

					<!-- Checkboxes -->
					<h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
					<div class="checkboxes in-row margin-bottom-20">

						<?php 
							$amenities = array();
							if($restaurant->amenities != null){
								$amenities = json_decode($restaurant->amenities);
							}
					 	?>
					
						<input id="check-a" type="checkbox" name="check[]" value="Elevator in building" @if(in_array("Elevator in building", $amenities)) {{ "checked"}} @endif>
						<label for="check-a">Elevator in building</label>

						<input id="check-b" type="checkbox" name="check[]" value="Friendly workspace" @if(in_array("Friendly workspace", $amenities)) {{ "checked"}} @endif>
						<label for="check-b">Friendly workspace</label>

						<input id="check-c" type="checkbox" name="check[]" value="Instant Book" @if(in_array("Instant Book", $amenities)) {{ "checked"}} @endif>
						<label for="check-c">Instant Book</label>

						<input id="check-d" type="checkbox" name="check[]" value="Wireless Internet" @if(in_array("Wireless Internet", $amenities)) {{ "checked"}} @endif>
						<label for="check-d">Wireless Internet</label>

						<input id="check-e" type="checkbox" name="check[]" value="Free parking on premises" @if(in_array("Free parking on premises", $amenities)) {{ "checked"}} @endif>
						<label for="check-e">Free parking on premises</label>

						<input id="check-f" type="checkbox" name="check[]" value="Free parking on street" @if(in_array("Free parking on street", $amenities)) {{ "checked"}} @endif>
						<label for="check-f">Free parking on street</label>

						<input id="check-g" type="checkbox" name="check[]" value="Smoking allowed" @if(in_array("Smoking allowed", $amenities)) {{ "checked"}} @endif>
						<label for="check-g">Smoking allowed</label>	

						<input id="check-h" type="checkbox" name="check[]" value="Events" @if(in_array("Events", $amenities)) {{ "checked"}} @endif>
						<label for="check-h">Events</label>
					
					</div>
					<!-- Checkboxes / End -->

				</div>
				<!-- Section / End -->

								<!-- Section -->
				<div class="add-listing-section margin-top-45">

					<!-- Headline -->
					<div class="add-listing-headline">
						<h3><i class="sl sl-icon-location"></i> Location</h3>
					</div>

					<div class="submit-section">

						<!-- Row -->
						<div class="row with-forms">

							<!-- City -->
							<div class="col-md-6">
								<h5>City</h5>
								<select class="chosen-select-no-single" name="city">
									<option label="blank">Select City</option>	
									<option value="Den Haag" @if($restaurant->city == "Den Haag") {{ "selected"}} @endif >Den Haag</option>
									<option value="Leiden" @if($restaurant->city == "Leiden") {{ "selected"}} @endif>Leiden</option>
									<option value="Voorschoten" @if($restaurant->city == "Voorschoten") {{ "selected"}} @endif>Voorschoten</option>
									<option value="Amsterdam" @if($restaurant->city == "Amsterdam") {{ "selected"}} @endif>Amsterdam</option>
									<option value="Haarlem" @if($restaurant->city == "Haarlem") {{ "selected"}} @endif>Haarlem</option>
									<option value="Hoofddorp" @if($restaurant->city == "Hoofddorp") {{ "selected"}} @endif>Hoofddorp</option>
								</select>
							</div>

							<!-- Address -->
							<div class="col-md-6">
									<h5>Address</h5>
									<input type="text" id="address" name="address" value="{{ $restaurant->address }}">
							</div>
							
							<input type="hidden"  id="lat" name="latitude" required="true" value="{{ $restaurant->latitude }}">
							
							<input type="hidden"  id="lon" name="longitude" required="true" value="{{ $restaurant->longitude}}">
						
						</div>
						<!-- Row / End -->

						<div class="row with-forms">
							<div class="col-md-12" id="map" style="height: 400px;">

							</div>
							<div id="infowindow-content">
							    <img src="" width="16" height="16" id="place-icon">
							    <span id="place-name"  class="title"></span><br>
							    <span id="place-address"></span>
							</div>
						</div>

					</div>
				</div>
				<!-- Section / End -->

				<div class="form-row">
					<input type="hidden" name="id" value="{{ $restaurant->id }}">
					<button type="submit" class="button border margin-top-5">Update <i class="fa fa-arrow-circle-right"></i> </button>
				</div>

			</div>
		</form>
	</div>

	<!-- Copyrights -->
	<div class="col-md-12">
		<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
	</div>
</div>

@endsection

@section('script')

<script>

	var markers = [];
	var map, infoWindow;

	var latitude = parseFloat($('#lat').val());
	var longitude = parseFloat($('#lon').val());

	var pos = {lat: latitude, lng: longitude};

	function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: pos,
          zoom: 13
        });

        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });
        marker.setPosition(pos);
        marker.setVisible(true);

        var card = document.getElementById('pac-card');
        var input = document.getElementById('address');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          console.log(place);
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          $('#lat').val(place.geometry.location.lat());
          $('#lon').val(place.geometry.location.lng());

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });
      }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvqs8yr7xpLK7yXT7I2lDMpgGtor6KR8w&libraries=places&callback=initMap"
        async defer></script>

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>


@endsection