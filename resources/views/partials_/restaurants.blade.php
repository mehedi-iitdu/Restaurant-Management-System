<div class="row">

    @foreach($restaurants as $restaurant)

    <!-- Listing Item -->
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('restaurant.show', $restaurant->code) }}" class="listing-item-container compact">
            <div class="listing-item">
                <img src="images/listing-item-01.jpg" alt="">

                <div class="listing-badge now-open">Now Open</div>

                <div class="listing-item-content">
                    <div class="numerical-rating" data-rating="3.5"></div>
                    <h3>{{ $restaurant->name }} <i class="verified-icon"></i></h3>
                    <span>{{ $restaurant->address }}</span>
                </div>
                <span class="like-icon"></span>
            </div>
        </a>
    </div>
    <!-- Listing Item / End -->

    @endforeach

</div>

<!-- Pagination -->
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <!-- Pagination -->
        <div class="pagination-container margin-top-20 margin-bottom-40">
            <nav class="pagination">
                {{ $restaurants->links() }}
                <!-- <ul>
                    <li><a href="#" class="current-page">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                </ul> -->
            </nav>
        </div>
    </div>
</div>