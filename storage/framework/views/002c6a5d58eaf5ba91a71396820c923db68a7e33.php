<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/colors/main.css')); ?>" id="colors">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/plugins/datedropper.css')); ?>">

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->
    <!-- Latest compiled and minified JavaScript -->


    <!-- <div id="style-switcher">
        <h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
        
        <div>
            <ul class="colors" id="color1">
                <li><a href="#" class="main" title="Main"></a></li>
                <li><a href="#" class="blue" title="Blue"></a></li>
                <li><a href="#" class="green" title="Green"></a></li>
                <li><a href="#" class="orange" title="Orange"></a></li>
                <li><a href="#" class="navy" title="Navy"></a></li>
                <li><a href="#" class="yellow" title="Yellow"></a></li>
                <li><a href="#" class="peach" title="Peach"></a></li>
                <li><a href="#" class="beige" title="Beige"></a></li>
                <li><a href="#" class="purple" title="Purple"></a></li>
                <li><a href="#" class="celadon" title="Celadon"></a></li>
                <li><a href="#" class="red" title="Red"></a></li>
                <li><a href="#" class="brown" title="Brown"></a></li>
                <li><a href="#" class="cherry" title="Cherry"></a></li>
                <li><a href="#" class="cyan" title="Cyan"></a></li>
                <li><a href="#" class="gray" title="Gray"></a></li>
                <li><a href="#" class="olive" title="Olive"></a></li>
            </ul>
        </div>
    </div> -->
    <!-- Style Switcher / End -->


    <!-- Google Autocomplete -->
    <!-- <script>
      function initAutocomplete() {
        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
    
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
        });
    
        if ($('.main-search-input-item')[0]) {
            setTimeout(function(){ 
                $(".pac-container").prependTo("#autocomplete-container");
            }, 300);
        }
    }
    </script> -->
    
</head>
<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div id="dashboard">

            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->user_type == "Customer"): ?>
                    <?php echo $__env->make('inc.customer_sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Auth::user()->user_type == "Admin"): ?>
                    <?php echo $__env->make('inc.admin_sidenav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>

                <div class="dashboard-content">

                    <div id="alert" class="text-center col-md-12" align="right">
                        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
        </div>
    </div>
</body>


<script type="text/javascript" src="<?php echo e(asset('js/jquery-2.2.0.min.js')); ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('js/mmenu.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/chosen.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/rangeslider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/magnific-popup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/waypoints.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/counterup.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/tooltips.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/custom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/switcher.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/dropzone.js')); ?>"></script>

<script type="text/javascript">

    $( document ).ready(function() {
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        $('.nav-link').each(function(){
            var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/,''));
            if(urlRegExp.test(this.href)){
                $(this).parent().addClass('active');
            }  
        });
    });

</script>

<?php echo $__env->yieldContent('script'); ?>

</html>