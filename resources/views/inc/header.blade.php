<header id="header-container" class="fixed fullwidth dashboard">
    <!-- Header -->
    <div id="header" class="not-sticky">
        <div class="container">
            
            <!-- Left Side Content -->
            <div class="left-side">
                
                <!-- Logo -->
                <div id="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    <a href="{{ route('home') }}" class="dashboard-logo"><img src="{{ asset('images/logo2.png')}}" alt=""></a>
                </div>

                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>

                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">
                        <li><a href="{{ route('home') }}">Home</a></li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
                
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">
                <!-- Header Widget -->
                <div class="header-widget">
                    
                    <!-- User Menu -->
                    <div class="user-menu">
                        
                        @auth
                            <div class="user-name">
                                <span>
                                    @if(!empty(Auth::user()->photo))
                                        <img src="{{ asset(Auth::user()->photo) }}" alt="">
                                    @else
                                        <img src="{{ asset('images/user-avatar.jpg') }}" alt="">
                                    @endif    
                                </span>
                                {{ Auth::user()->name }}</div>
                            <ul>
                                <li><a href="{{ route('dashboard') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Settings</a></li>
                                <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
                                <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
                            </ul>
                        @endauth
                        
                    </div>

                    @auth
                    
                        <a href="{{ route('listing.add') }}" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a>

                    @endauth

                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
    <!-- Header Container / End -->