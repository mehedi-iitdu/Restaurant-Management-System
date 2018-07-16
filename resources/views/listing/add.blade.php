@extends('layouts.app')

@section('content')


	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>Add Listing</h2>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<form method="POST" action="{{ route('listing.add') }}">
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
								<input class="search-field" type="text" value="" id="name" name="name" required="true" />
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
									<option value="{{ $restaurantType->id }}">{{ $restaurantType->name }}</option>
									@endforeach
								</select>
							</div>

							<!-- Type -->
							<div class="col-md-6">
								<h5>Keywords <i class="tip" data-tip-content="Maximum of 100 keywords related with your restaurant"></i></h5>
								<input type="text" placeholder="Keywords should be separated by commas" id="keywords" name="keywords">
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
							<h5>Description (max 1000 characters)</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true"></textarea>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input type="text" id="phone" name="phone">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input type="text" id="website" name="website">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input type="email" id="email" name="email">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Facebook -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.facebook.com/" id="facebook" name="facebook" value="">
							</div>

							<!-- Twitter -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" placeholder="https://www.twitter.com/" name="twitter" value="">
							</div>

							<!-- Google Plus -->
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
								<input type="text" placeholder="https://plus.google.com" name="google_plus" value="">
							</div>

						</div>
						<!-- Row / End -->

						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					
							<input id="check-a" type="checkbox" name="check[]" value="Elevator in building">
							<label for="check-a">Elevator in building</label>

							<input id="check-b" type="checkbox" name="check[]" value="Friendly workspace">
							<label for="check-b">Friendly workspace</label>

							<input id="check-c" type="checkbox" name="check[]" value="Instant Book">
							<label for="check-c">Instant Book</label>

							<input id="check-d" type="checkbox" name="check[]" value="Wireless Internet">
							<label for="check-d">Wireless Internet</label>

							<input id="check-e" type="checkbox" name="check[]" value="Free parking on premises">
							<label for="check-e">Free parking on premises</label>

							<input id="check-f" type="checkbox" name="check[]" value="Free parking on street">
							<label for="check-f">Free parking on street</label>

							<input id="check-g" type="checkbox" name="check[]" value="Smoking allowed">
							<label for="check-g">Smoking allowed</label>	

							<input id="check-h" type="checkbox" name="check[]" value="Events">
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
									<select class="chosen-select-no-single" name="city" required>
										<option label="blank">Select City</option>	
										<option value="Den Haag">Den Haag</option>
										<option value="Leiden">Leiden</option>
										<option value="Voorschoten">Voorschoten</option>
										<option value="Amsterdam">Amsterdam</option>
										<option value="Haarlem">Haarlem</option>
										<option value="Hoofddorp">Hoofddorp</option>
									</select>
								</div>

								<!-- Address -->
								<div class="col-md-6">
									<h5>Address</h5>
									<input type="text" id="address" name="address" placeholder="e.g. Spaarndammerdijk 302, 1013 ZX Amsterdam">
								</div>
							
								<input type="hidden" id="lat" name="latitude" required="true">
								
								<input type="hidden" id="lon" name="longitude" required="true">
								
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
                            <button type="submit" class="button border margin-top-5">Submit <i class="fa fa-arrow-circle-right"></i> </button>
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

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
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
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

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