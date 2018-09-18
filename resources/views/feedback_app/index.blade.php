<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' />
    <link href="{{asset('css/rangeslider.css')}}" rel='stylesheet' />
    <link href="{{asset('css/feedback_style.css')}}" rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:400,700" rel="stylesheet">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/rangeslider.min.js')}}"></script>
    <!-- <style media="screen">
        body{
            background: #ddd;
        }
        .main-wrap{
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
        }
    </style> -->
</head>
<body>
        <div class="main-wrap"> <!-- 'dark-version' class will be added here for dark version -->
        <div class="top-bar text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="logo-wrap">
                            <button type="button" class="back-icon" id="prevBtn" onclick="nextPrev(-1)"><img src="{{asset('feedback_img/left.svg')}}" alt=""></button>
                            <img src="{{asset('feedback_img/logo.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="restaurant-banner" style="background-image:url({{asset('feedback_img/banner.jpg')}})">
        </div>
        <div class="feedback-form">
            <form action="" id="regForm" method="POST">
                @csrf
                <input type="hidden" id="restaurant_code" name="code" value="{{$code}}">
                <div class="steps-wrap">
                    <div class="single-step active">
                        <div class="steps-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="box">
                                            <div class="intro-text">
                                                We hope that you enjoy your meal and our service. Please leave a review/feedback and win free Scooper Vouchers. It will take 2 minutes of your time.
                                            </div>
                                        </div>
                                        <div class="box m-top-20">
                                            <div class="select-language-btn">
                                                <button class="oswald" type="button" data-toggle="collapse" data-target="#select_language" aria-expanded="false" aria-controls="select_language">
                                                    Change language
                                                    <img src="{{asset('feedback_img/flags/uk.svg')}}" alt="" class="flag-icon">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="collapse" id="select_language">
                                            <div class="language-radio">
                                                <label>
                                                    <input type="radio" checked="checked" name="select.Language" value="netherlands">
                                                    <span class="checkmark"><img src="{{asset('feedback_img/flags/netherlands.svg')}}" alt="" class="flag-icon"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="select.Language" value="uk" checked>
                                                    <span class="checkmark"><img src="{{asset('feedback_img/flags/uk.svg')}}" alt="" class="flag-icon"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="select.Language" value="germany">
                                                    <span class="checkmark"><img src="{{asset('feedback_img/flags/germany.svg')}}" alt="" class="flag-icon"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="select.Language" value="france">
                                                    <span class="checkmark"><img src="{{asset('feedback_img/flags/france.svg')}}" alt="" class="flag-icon"></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="select.Language" value="spain">
                                                    <span class="checkmark"><img src="{{asset('feedback_img/flags/spain.svg')}}" alt="" class="flag-icon"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="steps-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="box m-bottom-20">
                                            <div class="question-slider">
                                                <div class="question">
                                                    <p class="oswald">How Was the <span>service</span>?</p>
                                                </div>
                                                <div class="slider normal">
                                                    <input type="range" min="0" max="10" class="range-slide" value="5" name="service">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box m-bottom-20">
                                            <div class="question-slider">
                                                <div class="question">
                                                    <p class="oswald">How Was the <span>waiting time</span>?</p>
                                                </div>
                                                <div class="slider normal">
                                                    <input type="range" min="0" max="10" class="range-slide" value="5" name="waiting_time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box m-bottom-20">
                                            <div class="question-slider">
                                                <div class="question">
                                                    <p class="oswald">How Was the <span>meal</span>?</p>
                                                </div>
                                                <div class="slider normal">
                                                    <input type="range" min="0" max="10" class="range-slide" value="5" name="meal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="steps-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="box m-bottom-20">
                                            <div class="comment positive">
                                                <div class="oswald">positive comments</div>
                                                <textarea name="comment"  rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="comment negative">
                                                <div class="oswald">Ipprovement suggestions</div>
                                                <textarea name="suggestion" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="steps-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="box">
                                            <div class="subscribe-box">
                                                <p>Please confirm the review/feedback with your email address and win free Scooper Vouchers</p>
                                                <div class="email-form">
                                                    <input type="email" name="email" value="" placeholder="guest@scooper.eu" id="email">
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <span class="text">Yes, I would like to be informed about promotions and free vouchers from Scoopers.eu</span>
                                                        <input type="checkbox" name="sub_1">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label>
                                                        <span class="text">Yes, I would like to be informed about promotions of The Source</span>
                                                        <input type="checkbox" name="sub_2">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="privacy-link text-center">
                                                    <a href="" class="">Scooper respects your privacy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="steps-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="box">
                                            <div class="intro-text">
                                                Your feedback is send! <br>
                                                We thank you for your time And hope to see u again at <b>{{ \App\Restaurant::where('code', $code)->first()->name}}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="next-btn">
                    <button type="button" class="start-btn oswald" id="nextBtn" onclick="nextPrev(1)">Start</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script type="text/javascript">
    
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = $(".single-step");
        x.eq(n).removeClass("done").addClass("active");
        if(x.eq(n+1).hasClass("done")){
            x.eq(n+1).removeClass("done");
        }
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            $("#prevBtn").hide();
        } else {
            $("#prevBtn").show();
        }
        if (n == 0) {
            $("#nextBtn").html("Start");
        } else if (n == (x.length - 1)){
            $("#nextBtn").html("Close");
        } else {
            $("#nextBtn").html("Next");
        }
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = $(".single-step");
        // Hide the current tab:
        x.eq(currentTab).removeClass("active").addClass("done");
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            //$("#regForm").submit();
            location.reload();
            return false;
        }

        if (currentTab >= x.length - 1) {
            submit();
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function submit(){
        var service = $("input[name=service]").val();
        var waiting_time = $("input[name=waiting_time]").val();
        var meal = $("input[name=meal]").val();
        var comment = $("input[name=comment]").val();
        var suggestion = $("input[name=suggestion]").val();
        var email = $("input[name=email]").val();

        if($("input[name=sub_1]").prop('checked')){
            var sub_1 = 1;
        }
        else{
            var sub_1 = 0;
        }

        if($("input[name=sub_2]").prop('checked')){
            var sub_2 = 1;
        }
        else{
            var sub_2 = 0;
        }

        $.ajax({
            type: "POST",
            url: '{{route('feedback.store')}}',
            data: {
             _token : '{{ csrf_token()}}', 
             code : $('#restaurant_code').val(),
             service : service,
             waiting_time : waiting_time,
             meal : meal,
             comment : comment,
             suggestion : suggestion,
             email : email,
             sub_1 : sub_1,
             sub_2 : sub_2
            },
            dataType: "text",
            success: function(resultData) {
                console.log(resultData);
            }
        });
    }

    function updateHandle(el, val) {
        el.textContent = val;
    }
    $('.range-slide').rangeslider({
        polyfill: false,
        onInit: function() {
            var $handle = $('.rangeslider__handle', this.$range);
            updateHandle($handle[0], this.value);
        }
    }).on('input', function(e) {
        var $handle = $('.rangeslider__handle', e.target.nextSibling);
        updateHandle($handle[0], this.value);

        if (this.value <= 3) {
            this.parentNode.classList.add("red");
            this.parentNode.classList.remove("normal","green");
        }else if (this.value >= 4 && this.value <= 6) {
            this.parentNode.classList.add("normal");
            this.parentNode.classList.remove("red","green");
        }else if(this.value >= 7){
            this.parentNode.classList.add("green");
            this.parentNode.classList.remove("normal","red");
        }
    });


    $(document).ready(function() {

        //change flag when language change is changed
        $('#select_language input:radio').change(function() {
            var flagName = $("#select_language input[type='radio']:checked").val();

            $(".select-language-btn img").attr('src', '{{ url('/') }}' + '/feedback_img/flags/' + flagName + '.svg');
        });

    });

</script>

</html>
