@extends('layouts.app')

@section('content')


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>Reviews</h2>
		</div>
	</div>
</div>


<div class="row">
	
	<!-- Listings -->
	<div class="col-lg-6 col-md-12">

		<div class="dashboard-list-box margin-top-0">

			<!-- Sort by -->
			<div class="sort-by">
				<div class="sort-by-select">
					<select data-placeholder="Default order" class="chosen-select-no-single" id="code">
						<option value="all">All Listings</option>	
						@foreach($restaurants as $restaurant)
							<option value="{{ $restaurant->code }}">{{ $restaurant->name }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<h4>Visitor Reviews</h4> 

			<!-- Reply to review popup -->
			<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
				<div class="small-dialog-header">
					<h3>Reply to review</h3>
				</div>
				<div class="message-reply margin-top-0">
					<textarea cols="40" rows="3"></textarea>
					<button class="button">Reply</button>
				</div>
			</div>
			
			<div id="visitor_reviews">
				<ul>
					@foreach($visitor_reviews as $key => $visitor_review)
					<li>
						<div class="comments listing-reviews">
							<ul>
								<li>
									@if($visitor_review->user->photo != null)
										<div class="avatar"><img src="{{ asset($visitor_review->user->photo) }}" alt="" /></div>
									@else
										<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""></div>
									@endif
									<div class="comment-content"><div class="arrow-comment"></div>
										<div class="comment-by">{{ $visitor_review->user->name }} <div class="comment-by-listing">on <a href="#">{{ $visitor_review->restaurant->name }}</a></div> <span class="date">{{ date('d-m-Y', $visitor_review->date) }}</span>
											<div class="star-rating" data-rating="{{ $visitor_review->rating }}"></div>
										</div>
										<p>{{ $visitor_review->review_content }}</p>
										
										<div class="review-images mfp-gallery-container">
											<a href="{{ asset($visitor_review->photo) }}" class="mfp-gallery"><img src="{{ asset($visitor_review->photo) }}" alt=""></a>
										</div>
										<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-action-undo"></i> Reply to this review</a>
									</div>
								</li>
							</ul>
						</div>
					</li>
					@endforeach
				</ul>
			</div>

		</div>

		<!-- Pagination -->
		<div class="clearfix"></div>
<!-- 		<div class="pagination-container margin-top-30 margin-bottom-0">
	<nav class="pagination">
		<ul>
			<li><a href="#" class="current-page">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
		</ul>
	</nav>
</div> -->
		<!-- Pagination / End -->

	</div>

	<!-- Listings -->
	<div class="col-lg-6 col-md-12">
		<div class="dashboard-list-box margin-top-0">
			<h4>Your Reviews</h4>
			<ul>
				@foreach($my_reviews as $my_review)
				<li>
					<div class="comments listing-reviews">
						<ul>
							<li>
								@if($my_review->user->photo != null)
									<div class="avatar"><img src="{{ asset($my_review->user->photo) }}" alt="" /></div>
								@else
									<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt=""></div>
								@endif
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">Your review <div class="comment-by-listing own-comment">on <a href="#">{{ $my_review->restaurant->name }}</a></div> <span class="date">{{ date('d-m-Y', $my_review->date) }}</span>
										<div class="star-rating" data-rating="{{ $my_review->rating }}"></div>
									</div>
									<p>{{ $my_review->review_content }}</p>
									<div class="review-images mfp-gallery-container">
										<a href="{{ asset($my_review->photo) }}" class="mfp-gallery"><img src="{{ asset($my_review->photo) }}" alt=""></a>
									</div>
									<a href="#" class="rate-review"><i class="sl sl-icon-note"></i> Edit</a>
								</div>

							</li>
						</ul>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>


	<!-- Copyrights -->
	<div class="col-md-12">
		<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript">
		$('#code').change(function(){
			
			var code = $('#code').val();
			
			$.ajax({
				type: "POST",
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('review.show') }}",
				data: {
			     _token : $('meta[name="csrf-token"]').attr('content'), 
			     code : code
				},
				dataType: "text",
				success: function(resultData) {
			   		$('#visitor_reviews').html(resultData);
			  	}
			});
		}); 
	</script>
@endsection