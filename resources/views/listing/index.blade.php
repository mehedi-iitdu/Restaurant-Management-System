@extends('layouts.app')

@section('content')


<!-- Titlebar -->
<div id="titlebar">
	<div class="row">
		<div class="col-md-12">
			<h2>My Listings</h2>
		</div>
	</div>
</div>

<div class="row">
	<!-- Listings -->
	<div class="col-lg-12 col-md-12">
		<div class="dashboard-list-box margin-top-0">
			<h4>{{ $status }} Listings</h4>
			<ul>
				@foreach($restaurants as $restaurant)
				<li>
					<div class="list-box-listing">
						<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-01.jpg" alt=""></a></div>
						<div class="list-box-listing-content">
							<div class="inner">
								<h3><a href="#">{{ $restaurant->name }}</a></h3>
								<span>{{ $restaurant->address }}</span>
								<div class="star-rating" data-rating="{{ $restaurant->reviews->avg('rating') }}">
									<div class="rating-counter">({{ count($restaurant->reviews) }} reviews)</div>
								</div>
							</div>
						</div>
					</div>
					<div class="buttons-to-right">
						@if($restaurant->status != 'Active')
							<a href="{{ route('payment', $restaurant->code) }}" class="button gray"><i class="sl sl-icon-check"></i> Verify</a>
						@endif
						<a href="{{ route('restaurant.edit', $restaurant->code) }}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
						<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
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