<!-- Navigation
    ================================================== -->
<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

<div class="dashboard-nav">
    <div class="dashboard-nav-inner">

        <ul data-submenu-title="Main">
            <li><a class="nav-link" href="<?php echo e(route('dashboard')); ?>"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
        </ul>
        
        <ul data-submenu-title="Listings">
             <li><a><i class="sl sl-icon-layers"></i> My Listings</a>
                <ul>
                    <li><a class="nav-link" href="<?php echo e(route('mylistings', "Active")); ?>">Active <span class="nav-tag green"><?php echo e(count(\App\Restaurant::where('user_id', Auth::user()->id)->where('status', 'Active')->get())); ?></span></a></li>
                    <li><a href="<?php echo e(route('mylistings', "Pending")); ?>">Pending <span class="nav-tag yellow"><?php echo e(count(\App\Restaurant::where('user_id', Auth::user()->id)->where('status', 'Pending')->get())); ?></span></a></li>
                    <li><a href="<?php echo e(route('mylistings', "Expired")); ?>">Expired <span class="nav-tag red"><?php echo e(count(\App\Restaurant::where('user_id', Auth::user()->id)->where('status', 'Expired')->get())); ?></span></a></li>
                </ul>   
             </li>
             <li><a class="nav-link" href="<?php echo e(route('photos.index')); ?>"><i class="sl sl-icon-heart"></i> Photos</a></li>
             <li><a class="nav-link" href="<?php echo e(route('tables.index')); ?>"><i class="sl sl-icon-heart"></i> Tables</a></li>
             <li><a class="nav-link" href="<?php echo e(route('timeConfig.index')); ?>"><i class="sl sl-icon-heart"></i> Time Configuration</a></li>
             <li><a class="nav-link" href="<?php echo e(route('fooditem.index')); ?>"><i class="sl sl-icon-heart"></i> Food Menu</a></li>
             <li><a href=""><i class="sl sl-icon-heart"></i> Bookings</a></li>
             <li><a class="nav-link" href="<?php echo e(route('review')); ?>"><i class="sl sl-icon-star"></i> Reviews</a></li>
         </ul>

        <ul data-submenu-title="Account">
            <li><a class="nav-link" href="<?php echo e(route('profile')); ?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
            <li><a class="nav-link" href="<?php echo e(route('logout')); ?>"><i class="sl sl-icon-power"></i> Logout</a></li>
        </ul>
        
    </div>
</div>
<!-- Navigation / End -->