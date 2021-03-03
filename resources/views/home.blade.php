@extends('layouts.blank')

<!-- Titlebar
================================================== -->
@section('title')

<div class="main-search-container dark-overlay text-center" data-background-image="images/main-search-background-01.jpg">
    <div class="main-search-inner">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Find Nearby <span class="typed-words"></span></h2>
                    <h4>Expolore top-rated attractions, activities and more</h4>

                    <div class="main-search-input">

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

                        <button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

<!-- Content
================================================== -->
@section('content')

<!-- Content
================================================== -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline centered margin-top-75">
                Popular Categories
                <span>Browse <i>the most desirable</i> categories</span>
            </h3>
        </div>

    </div>
</div>


<!-- Categories Carousel -->
<div class="fullwidth-carousel-container margin-top-25">
    <div class="fullwidth-slick-carousel category-carousel">

        <!-- Item -->
        <div class="fw-carousel-item">
            <div class="category-box-container">
                <a href="listings-half-screen-map-grid-1.html" class="category-box" data-background-image="images/category-box-01.jpg">
                    <div class="category-box-content">
                        <h3>Hotels</h3>
                        <span>64 listings</span>
                    </div>
                    <span class="category-box-btn">Browse</span>
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="fw-carousel-item">
            <div class="category-box-container">
                <a href="listings-half-screen-map-grid-1.html" class="category-box" data-background-image="images/category-box-03.jpg">
                    <div class="category-box-content">
                        <h3>Events</h3>
                        <span>67 listings</span>
                    </div>
                    <span class="category-box-btn">Browse</span>
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="fw-carousel-item">
            <div class="category-box-container">
                <a href="listings-half-screen-map-grid-1.html" class="category-box" data-background-image="images/category-box-04.jpg">
                    <div class="category-box-content">
                        <h3>Fitness</h3>
                        <span>27 listings</span>
                    </div>
                    <span class="category-box-btn">Browse</span>
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="fw-carousel-item">
            <div class="category-box-container">
                <a href="listings-half-screen-map-list.html" class="category-box" data-background-image="images/category-box-05.jpg">
                    <div class="category-box-content">
                        <h3>Nightlife</h3>
                        <span>22 listings</span>
                    </div>
                    <span class="category-box-btn">Browse</span>
                </a>
            </div>
        </div>

        <!-- Item -->
        <div class="fw-carousel-item">
            <div class="category-box-container">
                <a href="listings-half-screen-map-list.html" class="category-box" data-background-image="images/category-box-06.jpg">
                    <div class="category-box-content">
                        <h3>Eat & Drink</h3>
                        <span>130 listings</span>
                    </div>
                    <span class="category-box-btn">Browse</span>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- Categories Carousel / End -->

<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-45">
                    Most Visited Places
                    <span>Discover top-rated local businesses</span>
                </h3>
            </div>

            <div class="col-md-12">
                <div class="simple-slick-carousel dots-nav">

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-01.jpg" alt="">

                            <div class="listing-badge now-open">Now Open</div>
                            
                            <div class="listing-item-content">
                                <span class="tag">Eat & Drink</span>
                                <h3>Tom's Restaurant <i class="verified-icon"></i></h3>
                                <span>964 School Street, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="3.5">
                            <div class="rating-counter">(12 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-02.jpg" alt="">
                            <div class="listing-item-details">
                                <ul>
                                    <li>Friday, August 10</li>
                                </ul>
                            </div>
                            <div class="listing-item-content">
                                <span class="tag">Events</span>
                                <h3>Sticky Band</h3>
                                <span>Bishop Avenue, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="5.0">
                            <div class="rating-counter">(23 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->     

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-03.jpg" alt="">
                            <div class="listing-item-details">
                                <ul>
                                    <li>Starting from $59 per night</li>
                                </ul>
                            </div>
                            <div class="listing-item-content">
                                <span class="tag">Hotels</span>
                                <h3>Hotel Govendor</h3>
                                <span>778 Country Street, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="2.0">
                            <div class="rating-counter">(17 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-04.jpg" alt="">

                            <div class="listing-badge now-open">Now Open</div>

                            <div class="listing-item-content">
                                <span class="tag">Eat & Drink</span>
                                <h3>Burger House <i class="verified-icon"></i></h3>
                                <span>2726 Shinn Street, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="5.0">
                            <div class="rating-counter">(31 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-05.jpg" alt="">
                            <div class="listing-item-content">
                                <span class="tag">Other</span>
                                <h3>Airport</h3>
                                <span>1512 Duncan Avenue, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="3.5">
                            <div class="rating-counter">(46 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->

                <!-- Listing Item -->
                <div class="carousel-item">
                    <a href="listings-single-page.html" class="listing-item-container">
                        <div class="listing-item">
                            <img src="images/listing-item-06.jpg" alt="">

                            <div class="listing-badge now-closed">Now Closed</div>

                            <div class="listing-item-content">
                                <span class="tag">Eat & Drink</span>
                                <h3>Think Coffee</h3>
                                <span>215 Terry Lane, New York</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                        <div class="star-rating" data-rating="4.5">
                            <div class="rating-counter">(15 reviews)</div>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->
                </div>
                
            </div>

        </div>
    </div>

</section>

<!-- Pricing Tables -->
<section class="fullwidth margin-top-70 margin-bottom-65" data-background-color="#fff">

    <!-- Container / Start -->
    <div class="container">


        <div class="row">
            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-50">
                    Get an Exposure For Your Listing
                </h3>
            </div>
        </div>


        <!-- Row / Start -->
        <div class="row">

            <div class="col-md-12">
                <div class="pricing-container margin-top-30">

                <!-- Plan #1 -->

                    <div class="plan">

                        <div class="plan-price">
                            <h3>Basic</h3>
                            <span class="value">Free</span>
                            <span class="period">Free of charge one standard listing active for 30 days</span>
                        </div>

                        <div class="plan-features">
                            <ul>
                                <li>One Listing</li>
                                <li>30 Days Availability</li>
                                <li>Standard Listing</li>
                                <li>Limited Support</li>
                            </ul>
                            <a class="button border" href="#">Get Started</a>
                        </div>

                    </div>

                    <!-- Plan #3 -->
                    <div class="plan featured">

                        <div class="listing-badge">
                            <span class="featured">Featured</span>
                        </div>

                        <div class="plan-price">
                            <h3>Extended</h3>
                            <span class="value">$9.99</span>
                            <span class="period">One time fee for one listing, highlighted in the search results</span>
                        </div>
                        <div class="plan-features">
                            <ul>
                                <li>One Time Fee</li>
                                <li>One Listing</li>
                                <li>90 Days Availability</li>
                                <li>Featured In Search Results</li>
                                <li>24/7 Support</li>
                            </ul>
                            <a class="button" href="#">Get Started</a>
                        </div>
                    </div>

                    <!-- Plan #3 -->
                    <div class="plan">

                        <div class="plan-price">
                            <h3>Professional</h3>
                            <span class="value">$19.99</span>
                            <span class="period">Monthly subscription for unlimited listings and availability</span>
                        </div>

                        <div class="plan-features">
                            <ul>
                                <li>Unlimited Listings</li>
                                <li>Unlimited Availability</li>
                                <li>Featured In Search Results</li>
                                <li>24/7 Support</li>
                            </ul>
                            <a class="button border" href="#">Get Started</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Row / End -->

    </div>
    <!-- Container / End -->

</section>
<!-- Pricing Tables / End -->

<!-- Fullwidth Section / End -->
<section class="fullwidth margin-bottom-0 padding-top-60 padding-bottom-65" data-background-color="#ffffff">
    <!-- Logo Carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-40 margin-top-10">Companies We've Worked With <span>We can assist you with your innovation or commercialisation journey!</span></h3>
            </div>
            
            <!-- Carousel -->
            <div class="col-md-12">
                <div class="logo-slick-carousel dot-navigation">
                    
                    <div class="item">
                        <img src="images/logo-01.png" alt="">
                    </div>
                    
                    <div class="item">
                        <img src="images/logo-02.png" alt="">
                    </div>
                    
                    <div class="item">
                        <img src="images/logo-03.png" alt="">
                    </div>
                    
                    <div class="item">
                        <img src="images/logo-04.png" alt="">
                    </div>
                    
                    <div class="item">
                        <img src="images/logo-05.png" alt="">
                    </div>      

                    <div class="item">
                        <img src="images/logo-06.png" alt="">
                    </div>  

                    <div class="item">
                        <img src="images/logo-07.png" alt="">
                    </div>


                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>
    <!-- Logo Carousel / End -->
</section>

<!-- Parallax -->
<div class="parallax"
    data-background="images/slider-bg-02.jpg"
    data-color="#36383e"
    data-color-opacity="0.6"
    data-img-width="800"
    data-img-height="505">

    <!-- Infobox -->
    <div class="text-content white-font text-center">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                    <h2>Streamline Your Business</h2>
                    <p>We’re full-service, local agents who know how to find people and home each together. We use online tools with an unmatched search capability to make you smarter and faster.</p>
                    <a href="listings-list-with-sidebar.html" class="button margin-top-25">Join With Us</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Infobox / End -->

</div>
<!-- Parallax / End -->

<!-- Footer
================================================== -->
<div id="footer" class="">
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
    <script type="text/javascript" src="{{ asset('js/typed.js') }}"></script>
    <script>
        var typed = new Typed('.typed-words', {
        strings: ["Cafe"," Restaurants"," Bar"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>
@endsection