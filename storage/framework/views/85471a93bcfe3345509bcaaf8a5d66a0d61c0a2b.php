<!-- Header Container
================================================== -->
<header id="header-container">

    <!-- Header -->
    <div id="header">
        <div class="container">
            
            <!-- Left Side Content -->
            <div class="left-side">
                
                <!-- Logo -->
                <div id="logo">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt=""></a>
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
                        <li><a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li><a href="<?php echo e(route('listings')); ?>">Listings</a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->
                
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">
                <div class="header-widget">
                    <div class="user-menu">
                        <?php if(auth()->guard()->check()): ?>
                            <div class="user-name">
                                <span>
                                    <?php if(!empty(Auth::user()->photo)): ?>
                                        <img src="<?php echo e(asset(Auth::user()->photo)); ?>" alt="">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/user-avatar.jpg')); ?>" alt="">
                                    <?php endif; ?>    
                                </span>
                                <?php echo e(Auth::user()->name); ?></div>
                            <ul>
                                <li><a href="<?php echo e(route('dashboard')); ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                                <li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Settings</a></li>
                                <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li>
                                <li><a href="<?php echo e(route('logout')); ?>"><i class="sl sl-icon-power"></i> Logout</a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Right Side Content / End -->

            <!-- Sign In Popup -->
            <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                <div class="small-dialog-header">
                    <h3>Sign In</h3>
                </div>

                <!--Tabs -->
                <div class="sign-in-form style-1">

                    <ul class="tabs-nav">
                        <li class=""><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form method="POST" action="<?php echo e(route('login')); ?>" class="login" >
                                <?php echo csrf_field(); ?>

                                <p class="form-row form-row-wide">
                                    <label for="email">Email:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="email" id="email" value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password"/>
                                    </label>
                                    <span class="lost_password">
                                        <a href="#" >Lost Your Password?</a>
                                    </span>
                                </p>

                                <div class="form-row">
                                    <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                                </div>
                                
                            </form>
                        </div>

                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form method="POST" action="<?php echo e(route('register')); ?>" class="register">
                                <?php echo csrf_field(); ?>
                            <p class="form-row form-row-wide">
                                <label for="name">Name:
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" name="name" id="name" value="" required="true" />
                                </label>
                            </p>
                                
                            <p class="form-row form-row-wide">
                                <label for="email">Email Address:
                                    <i class="im im-icon-Mail"></i>
                                    <input type="text" class="input-text" name="email" id="email" value="" required="true"/>
                                </label>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="phone">Phone:
                                    <i class="im im-icon-Phone-2"></i>
                                    <input type="text" class="input-text" name="phone" id="phone" value="" required="true"/>
                                </label>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password">Password:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password" required="true"/>
                                </label>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password-confirm">Repeat Password:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password_confirmation" id="password-confirm" required="true"/>
                                </label>
                            </p>

                            <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
            
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Sign In Popup / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->