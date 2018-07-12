@extends('layouts.blank')

<!-- Slider
================================================== -->

@section('content')

<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<a href="{{ asset('images/single-listing-01.jpg')}}" data-background-image="{{ asset('images/single-listing-01.jpg')}}" class="item mfp-gallery" title="Title 1"></a>
	<a href="{{ asset('images/single-listing-02.jpg')}}" data-background-image="{{ asset('images/single-listing-02.jpg')}}" class="item mfp-gallery" title="Title 3"></a>
	<a href="{{ asset('images/single-listing-03.jpg')}}" data-background-image="{{ asset('images/single-listing-03.jpg')}}" class="item mfp-gallery" title="Title 2"></a>
	<a href="{{ asset('images/single-listing-04.jpg')}}" data-background-image="{{ asset('images/single-listing-04.jpg')}}" class="item mfp-gallery" title="Title 4"></a>
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
						<div class="rating-counter"><a href="#listing-reviews">(31 reviews)</a></div>
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
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>(12)</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						<li>
							<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">Kathy Brown<span class="date">June 2017</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
								
								<div class="review-images mfp-gallery-container">
									<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>12</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">John Doe<span class="date">May 2017</span>
									<div class="star-rating" data-rating="4"></div>
								</div>
								<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>2</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">Kathy Brown<span class="date">June 2017</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
								
								<div class="review-images mfp-gallery-container">
									<a href="images/review-image-02.jpg" class="mfp-gallery"><img src="images/review-image-02.jpg" alt=""></a>
									<a href="images/review-image-03.jpg" class="mfp-gallery"><img src="images/review-image-03.jpg" alt=""></a>
								</div>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>4</span></a>
							</div>
						</li>

						<li>
							<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">John Doe<span class="date">May 2017</span>
									<div class="star-rating" data-rating="5"></div>
								</div>
								<p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris.</p>
								<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review</a>
							</div>

						</li>
					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
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
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
				
				<span class="leave-rating-title">Your rating for this listing</span>
				
				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input type="radio" name="rating" id="rating-1" value="1"/>
							<label for="rating-1" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-2" value="2"/>
							<label for="rating-2" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3"/>
							<label for="rating-3" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-4" value="4"/>
							<label for="rating-4" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-5" value="5"/>
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="col-md-6">
						<!-- Uplaod Photos -->
						<div class="add-review-photos margin-bottom-30">
							<div class="photoUpload">
							    <span><i class="sl sl-icon-arrow-up-circle"></i> Upload Photos</span>
							    <input type="file" class="upload" />
							</div>
						</div>
					</div>
				</div>
	
				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div>

						<div>
							<label>Review:</label>
							<textarea cols="40" rows="3"></textarea>
						</div>

					</fieldset>

					<button class="button">Submit Review</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->


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

					<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from">
					</div>

					<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
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
		

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<li>Monday <span>9 AM - 5 PM</span></li>
					<li>Tuesday <span>9 AM - 5 PM</span></li>
					<li>Wednesday <span>9 AM - 5 PM</span></li>
					<li>Thursday <span>9 AM - 5 PM</span></li>
					<li>Friday <span>9 AM - 5 PM</span></li>
					<li>Saturday <span>9 AM - 3 PM</span></li>
					<li>Sunday <span>Closed</span></li>
				</ul>
			</div>
			<!-- Opening Hours / End -->


			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> <a href="pages-user-profile.html">{{ $restaurant->user->name }}</a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> {{ $restaurant->phone }}</li>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<li><i class="fa fa-envelope-o"></i> <a href="#">{{ $restaurant->email }}</a></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
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
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
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
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
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


<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="{{asset('css/plugins/datedropper.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('js/datedropper.js')}}"></script>
<script>$('#booking-date').dateDropper();</script> 

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
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

<!-- Booking Widget - Quantity Buttons -->
<script src="{{ asset('js/quantityButtons.js') }}"></script>

@endsection
