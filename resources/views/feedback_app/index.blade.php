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
            <form action="{{route('feedback.store')}}" id="regForm" method="POST">
                @csrf
                <input type="hidden" name="code" value="{{$code}}">
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
                                        <div class="box">
                                            <div class="subscribe-box">
                                                <p>Please confirm the review/feedback with your email address and win free Scooper Vouchers</p>
                                                <div class="email-form">
                                                    <input type="email" name="email" value="" placeholder="guest@scooper.eu" id="email">
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <span class="text">Yes, I would like to be informed about promotions and free vouchers from Scoopers.eu</span>
                                                        <input type="checkbox" name="sub_1" value="1">
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <label>
                                                        <span class="text">Yes, I would like to be informed about promotions of The Source</span>
                                                        <input type="checkbox" name="sub_2" value="1">
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
                                                Your review/feedback is send! <br>
                                                We thank you for your time And hope to see u again at [RestaurantName]
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




    <script src="{{asset('js/feedback_script.js')}}"></script>
</body>
</html>
