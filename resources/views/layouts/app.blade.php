<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/main.css') }}" id="colors">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/datedropper.css') }}">

    @yield('css')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
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

        @include('inc.header')

        <div id="dashboard">

            @auth
                @if(Auth::user()->user_type == "Customer")
                    @include('inc.customer_sidenav')
                @elseif(Auth::user()->user_type == "Admin")
                    @include('inc.admin_sidenav')
                @endif
            @endauth

                <div class="dashboard-content">

                    <div id="alert" class="text-center col-md-12" align="right">
                        @include('flash::message')
                    </div>

                    @yield('content')

                </div>
        </div>
    </div>
</body>


<script type="text/javascript" src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/switcher.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/circle-progress.min.js') }}"></script>

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

@yield('script')

</html>