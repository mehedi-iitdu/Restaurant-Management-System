@extends('layouts.blank')

<!-- Titlebar
================================================== -->
@section('title')

<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Listings</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Listings</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


@endsection

<!-- Content
================================================== -->
@section('content')

<div class="container">

    <div class="row">
        
        <!-- Search -->
        <div class="col-md-12">
            <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                <div class="main-search-input-item">
                    <input type="text" placeholder="What are you looking for?" value=""/>
                </div>

                <div class="main-search-input-item location">
                    <div id="autocomplete-container">
                        <input id="autocomplete-input" type="text" placeholder="Location">
                    </div>
                    <a href="#"><i class="fa fa-map-marker"></i></a>
                </div>

                <div class="main-search-input-item">
                    <select data-placeholder="All Categories" class="chosen-select" id="restaurant_type">
                        <option>All Categories</option>
                        @foreach($restaurantTypes as $restaurantType)
                            <option value="{{ $restaurantType->id }}">{{ $restaurantType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="button">Search</button>
            </div>
        </div>
        <!-- Search Section / End -->


        <div class="col-md-12">

            <!-- Sorting - Filtering Section -->
            <div class="row margin-bottom-25 margin-top-30">

                <div class="col-md-6">
                    <!-- Layout Switcher -->
                    <div class="layout-switcher">
                        <a href="#" class="grid active"><i class="fa fa-th"></i></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="fullwidth-filters">
                        
                        <!-- Panel Dropdown -->
                        <div class="panel-dropdown wide float-right">
                            <a href="#">More Filters</a>
                            <div class="panel-dropdown-content checkboxes">

                                <!-- Checkboxes -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="check-a" type="checkbox" name="check[]" value="Elevator in building">
                                        <label for="check-a">Elevator in building</label>

                                        <input id="check-b" type="checkbox" name="check[]" value="Friendly workspace">
                                        <label for="check-b">Friendly workspace</label>

                                        <input id="check-c" type="checkbox" name="check[]" value="Instant Book">
                                        <label for="check-c">Instant Book</label>

                                        <input id="check-d" type="checkbox" name="check[]" value="Wireless Internet">
                                        <label for="check-d">Wireless Internet</label>
                                    </div>  

                                    <div class="col-md-6">
                                        <input id="check-e" type="checkbox" name="check[]" value="Free parking on premises">
                                        <label for="check-e">Free parking on premises</label>

                                        <input id="check-f" type="checkbox" name="check[]" value="Free parking on street">
                                        <label for="check-f">Free parking on street</label>

                                        <input id="check-g" type="checkbox" name="check[]" value="Smoking allowed">
                                        <label for="check-g">Smoking allowed</label>    

                                        <input id="check-h" type="checkbox" name="check[]" value="Events">
                                        <label for="check-h">Events</label>
                                    </div>
                                </div>
                                
                                <!-- Buttons -->
                                <div class="panel-buttons">
                                    <button class="panel-cancel" id="cancel">Cancel</button>
                                    <button class="panel-apply" id="apply">Apply</button>
                                </div>

                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->

                        <!-- Panel Dropdown-->
                        <div class="panel-dropdown float-right">
                            <a href="#">Distance Radius</a>
                            <div class="panel-dropdown-content">
                                <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
                                <div class="panel-buttons">
                                    <button class="panel-cancel">Disable</button>
                                    <button class="panel-apply">Apply</button>
                                </div>
                            </div>
                        </div>
                        <!-- Panel Dropdown / End -->

                        <!-- Sort by -->
                        <div class="sort-by">
                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single" id="order">
                                    <option value="0">Default Order</option>  
                                    <option value="1">Highest Rated</option>
                                    <option value="2">Most Reviewed</option>
                                    <option value="3">Newest Listings</option>
                                    <option value="4">Oldest Listings</option>
                                </select>
                            </div>
                        </div>
                        <!-- Sort by / End -->

                    </div>
                </div>

            </div>
            <!-- Sorting - Filtering Section / End -->
            
            <div id="restaurants">
            
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
                <!-- Pagination / End -->
            </div>
        </div>
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
    <script type="text/javascript">
        $('#order').change(function(){
            filterRestaurants();
        }); 

        $('#apply').click(function(){
            filterRestaurants();
        });

        $('#cancel').click(function(){
            $(':checkbox:checked').each(function(i){
              $(this).prop('checked', false);
            });
        });

        function filterRestaurants(){
            var amenities = [];
            $(':checkbox:checked').each(function(i){
              amenities[i] = $(this).val();
            });
            var order = $('#order').val();
            $.ajax({
                type: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('listings.filter') }}",
                data: {
                 _token : $('meta[name="csrf-token"]').attr('content'), 
                 order : order,
                 amenities : amenities
                },
                dataType: "text",
                success: function(resultData) {
                    $('#restaurants').html(resultData);
                }
            });
        }

    </script>
@endsection