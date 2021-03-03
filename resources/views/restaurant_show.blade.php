@extends('layouts.blank')

<!-- Slider
================================================== -->

@section('content')

<div class="listing-slider mfp-gallery-container margin-bottom-0">
	@foreach($restaurant->photos as $key => $photo)
		<a href="{{ asset($photo->photo)}}" data-background-image="{{ asset($photo->photo)}}" class="item mfp-gallery" title="Title {{ $key }}"></a>
	@endforeach
</div>

<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2> {{ $restaurant->name }} <span class="listing-tag">Eat & Drink</span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{ $restaurant->address }}
						</a>
					</span>
					<div class="star-rating" data-rating="5">
						<div class="rating-counter"><a href="#listing-reviews">({{ count($restaurant->reviews) }} reviews)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-pricing-list">Pricing</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div> -->
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">
				
				@if(!empty($restaurant->description))
				<!-- Description -->
				<h3 class="listing-desc-headline">Description</h3>

				{{ $restaurant->description }}

				@endif

				@if(!empty($restaurant->amenities))

				<!-- Amenities -->
				<h3 class="listing-desc-headline">Amenities</h3>
				<ul class="listing-features checkboxes margin-top-0">
					@foreach(json_decode($restaurant->amenities) as $amenity)
						<li>{{ $amenity }}</li>
					@endforeach
				</ul>

				@endif
			</div>


			<!-- Food Menu -->
			<div id="listing-pricing-list" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

				<div class="show-more">
					<div class="pricing-list-container">
						
						<!-- Food List -->
						@foreach($restaurant->foodCategories as $category)
						<h4>{{ $category->name }}</h4>
						<ul>
							@foreach($category->foodItems as $foodItem)
							<li>
								<h5>{{ $foodItem->name }}</h5>
								<p>{{ $foodItem->varient }}</p>
								<p>{{ $foodItem->description }}</p>
								<span>{{ $foodItem->price }}</span>
							</li>
							@endforeach
						</ul>
						@endforeach
					</div>
				</div>
				<a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
			</div>
			<!-- Food Menu / End -->

		
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="{{ $restaurant->latitude }}" data-longitude="{{ $restaurant->longitude }}" data-map-icon="im im-icon-Hamburger"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>({{ count($restaurant->reviews) }})</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						@foreach($restaurant->reviews as $key => $review)
						<li>
							@if($review->user->photo != null)
								<div class="avatar"><img src="{{ asset($review->user->photo) }}" alt="" /></div>
							@else
								<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""></div>
							@endif
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">{{ $review->user->name }}<span class="date">{{ date('F Y', $review->date)}}</span>
									<div class="star-rating" data-rating="5">
										@for($i=0; $i<$review->rating; $i++)
											<span class="star"></span>
										@endfor
									</div>
								</div>
								<p>{{ $review->review_content }}</p>
								
								<div class="review-images mfp-gallery-container">
									<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>{{ $review->likes }}</span></a>
							</div>
						</li>
						@endforeach
					 </ul>
				</section>

				<!-- Pagination -->
				<!-- <div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div> -->
				<!-- Pagination / End -->
			</div>

			@if(Auth::check())

			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
				
				<span class="leave-rating-title">Your rating for this listing</span>
				
				<form id="add-comment" class="add-comment" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
				<!-- Rating / Upload Button -->
					<div class="row">
						<div class="col-md-6">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<div class="leave-rating margin-bottom-30">
								<input type="radio" name="rating" id="rating-1" value="5"/>
								<label for="rating-1" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-2" value="4"/>
								<label for="rating-2" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-3" value="3"/>
								<label for="rating-3" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-4" value="2"/>
								<label for="rating-4" class="fa fa-star"></label>
								<input type="radio" name="rating" id="rating-5" value="1"/>
								<label for="rating-5" class="fa fa-star"></label>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="col-md-6">
							<!-- Uplaod Photos -->
							<div class="add-review-photos margin-bottom-30">
								<img id="image" src="" alt="" style="width: 250; height: 250px; padding: 20px;">
								<div class="photoUpload">
								    <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
								    <input type="file" class="upload" name="photo" id="photo" accept="image/*"/>
								</div>
							</div>
						</div>
					</div>
	
				<!-- Review Comment -->
					<fieldset>

						<!-- <div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div> -->

						<div>
							<label>Review:</label>
							<textarea cols="40" rows="3" name="review_content" required></textarea>
						</div>

						<input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

					</fieldset>

					<button class="button">Submit Review</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->

			@endif


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				<i class="sl sl-icon-check"></i> Verified Listing
			</div>

			<!-- Book Now -->
			<div class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i> Book a Table</h3>
				<div class="row with-forms  margin-top-0">

					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from">
					</div>

					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-time" value="9:00 am">
					</div>

					<!-- Panel Dropdown -->
					<div class="col-lg-12">
						<div class="panel-dropdown">
							<a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
							<div class="panel-dropdown-content">

								<!-- Quantity Buttons -->
								<div class="qtyButtons">
									<div class="qtyTitle">Adults</div>
									<input type="text" name="qtyInput" value="1">
								</div>

								<div class="qtyButtons">
									<div class="qtyTitle">Childrens</div>
									<input type="text" name="qtyInput" value="0">
								</div>

							</div>
						</div>
					</div>
					<!-- Panel Dropdown / End -->

				</div>
				
				<!-- progress button animation handled via custom.js -->
				<a href="pages-booking.html" class="button book-now fullwidth margin-top-5">Book Now</a>
			</div>
			<!-- Book Now / End -->
		

			@if(count($restaurant->timeConfigs)>0)
				<!-- Opening Hours -->
				<div class="boxed-widget opening-hours margin-top-35">
					@php
						$time = date('H:i:s');
            			$timeConfig = $restaurant->timeConfigs->where('day', date('l'))->first();
            			if($timeConfig != null){
            				if($time >= $timeConfig->opening_time && $time <= $timeConfig->closing_time){
            					$status = 'now-open';
            					$msg = 'Now Open';
            				}
            				else{
            					$status = 'now-closed';
            					$msg = 'Now Closed';
            				}
            			}
            			else{
                            $status = '';
                            $msg = '';
                        }
					@endphp
					<div class="listing-badge {{ $status }}">{{ $msg }}</div>
					<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
					<ul>
						@foreach($restaurant->timeConfigs as $timeConfig)
						    @if($timeConfig->opening_time == 'Closed' || $timeConfig->closing_time == 'Closed')
						        <li>{{ $timeConfig->day}} <span>Closed</span></li>
						    @else
						        <li>{{ $timeConfig->day}} <span>{{ date('h:i A', strtotime($timeConfig->opening_time)).'-'.date('h:i A', strtotime($timeConfig->closing_time)) }}</span></li>
						    @endif
						@endforeach
					</ul>
				</div>
				<!-- Opening Hours / End -->
			@endif


			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> <a >{{ $restaurant->user->name }}</a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> {{ $restaurant->phone }}</li>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<li><i class="fa fa-envelope-o"></i> <a href="#">{{ $restaurant->email }}</a></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="{{ $restaurant->facebook }}" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="{{ $restaurant->twitter }}" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

				<!-- Reply to review popup -->
				<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div>
			<!-- Contact / End-->


			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				@if(Auth::check())
					<button class="like-button" id="bookmark-button"><span class="like-icon <?php if(\App\Bookmark::where('user_id', Auth::user()->id)->where('restaurant_id', $restaurant->id)->first() != null) echo "liked" ?>"></span> Bookmark this listing</button> 
				@endif
				<span id="total-bookmark">{{ count(\App\Bookmark::where('restaurant_id', $restaurant->id)->get()) }} people bookmarked this place</span>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u="><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="https://twitter.com/home?status="><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="https://plus.google.com/share?url="><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div>

		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Listing</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Partners</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#">office@example.com</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Rizervo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

@endsection


@section('script')

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{ asset('js/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/maps.js')}}"></script>	


<link href="{{asset('css/plugins/datedropper.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('js/datedropper.js')}}"></script>
<script>$('#booking-date').dateDropper();</script> 

<script src="{{asset('js/timedropper.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/timedropper.css') }}"> 
<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script> 
<script type="text/javascript">
	$('#image').hide();
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

<!-- Booking Widget - Quantity Buttons -->
<script src="{{ asset('js/quantityButtons.js') }}"></script>

<script type="text/javascript">
	$('#bookmark-button').on('click', function(){

		var code = '{{ $restaurant->code }}';
		
		$.ajax({
			type: "POST",
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{ route('bookmarks.store') }}",
			data: {
		     _token : $('meta[name="csrf-token"]').attr('content'), 
		     code : code
			},
			dataType: "text",
			success: function(resultData) {
		   		$('#total-bookmark').html(resultData+' people bookmarked this place');
		  	}
		});
	});
</script>

@endsection
