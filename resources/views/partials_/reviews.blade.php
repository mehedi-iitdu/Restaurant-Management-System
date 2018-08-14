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