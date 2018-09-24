@extends('layouts.app')

@section('content')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Hello, {{Auth::user()->name}}!</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Notice
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div> -->

    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ count(\App\Restaurant::where('user_id', Auth::user()->id)->where('status', 'Active')->get()) }}</h4> <span>Active Listings</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
            </div>
        </div>

        <!-- Item -->
        {{-- <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>726</h4> <span>Total Views</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
            </div>
        </div> --}}

        
        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>{{$total_review}}</h4> <span>Total Reviews</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>{{$total_bookmark}}</h4> <span>Times Bookmarked</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
            </div>
        </div>
    </div>


    <div class="row">
        
        
        <div class="col-lg-12 col-md-12">

            <div class="total-rating-box c-b-shadow">
                <div class="row" style="display:flex">
                    <div class="col-md-3">
                        <div class="your-rating text-center">
                            <div class="heading">Your Rating</div>
                            <div class="round-circle-large" data-value="{{($service+$waiting_time+$meal+$value)/(4*10)}}">
                                <strong></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="ratings-box">
                                    <div class="heading">Ratings</div>
                                    <div class="knob-box">
                                        <div class="title">Service</div>
                                        <div class="round-circle" data-value="{{$service/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <div class="knob-box">
                                        <div class="title">Waiting time</div>
                                        <div class="round-circle" data-value="{{$waiting_time/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <div class="knob-box">
                                        <div class="title">Meal</div>
                                        <div class="round-circle" data-value="{{$meal/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <div class="knob-box">
                                        <div class="title">Money</div>
                                        <div class="round-circle" data-value="{{$value/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 border-l">
                                <div class="overview-box">
                                    <div class="heading">Overview</div>
                                    <div class="sub-heading">Last 3 months</div>

                                    <div class="knob-box">
                                        <div class="title">{{date('M', strtotime('-3 month'))}}</div>
                                        <div class="round-circle" data-value="{{$rating_month3/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <div class="knob-box">
                                        <div class="title">{{date('M', strtotime('-2 month'))}}</div>
                                        <div class="round-circle" data-value="{{$rating_month2/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                    <div class="knob-box">
                                        <div class="title">{{date('M', strtotime('-1 month'))}}</div>
                                        <div class="round-circle" data-value="{{$rating_month1/10}}">
                                            <strong></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t"></div>
                        <div class="feedback-box">
                            <div class="heading">Feedback</div>
                            <div class="knob-box">
                                <div class="title">Positive</div>
                                <div class="round-circle-100" data-value="{{$positive}}">
                                    <strong></strong>
                                </div>
                            </div>
                            <div class="knob-box">
                                <div class="title">Negative</div>
                                <div class="round-circle-100" data-value="{{$negative}}">
                                    <strong></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="day-bar">
                <div class="day-box">
                    <button type="button" name="button" class="c-b-shadow active">Today</button>
                </div>
                <div class="day-box">
                    <button type="button" name="button" class="c-b-shadow">Monday</button>
                </div>
                <div class="day-box">
                    <button type="button" name="button" class="c-b-shadow">Sunday</button>
                </div>
                <div class="day-box">
                    <button type="button" name="button" class="c-b-shadow">Saturday</button>
                </div>
                <div class="day-box">
                    <button type="button" name="button" class="c-b-shadow">More days</button>
                </div>
            </div> --}}

            <div class="feedback-list-wrap">
                <div class="feedback-list c-b-shadow">
                    <div class="show-more">
                        @foreach(\App\Feedback::all() as $feedback)
                            <div class="single-feedback">
                                <div class="clearfix title c-b-shadow">
                                    <div class="pull-left">
                                        Feedback from <strong>{{max($feedback->email, 'guest')}}</strong> on <strong>{{date('d-m-Y', $feedback->date)}}</strong> at <strong>{{date('H:i', $feedback->date)}}</strong>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" name="button" class="c-b-shadow" onclick="delete_feedback({{$feedback->id}})">Delete</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="emoji-box">
                                            <div class="text-center">
                                                <div class="name">Service</div>
                                                @if($feedback->service<3)
                                                    <img src="{{ asset('images/emoji/1.png')}}" alt="" class="img-responsive">    
                                                @elseif($feedback->service<=5)
                                                    <img src="{{ asset('images/emoji/2.png')}}" alt="" class="img-responsive">
                                                @elseif($feedback->service<=7)
                                                    <img src="{{ asset('images/emoji/3.png')}}" alt="" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('images/emoji/4.png')}}" alt="" class="img-responsive">
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <div class="name">Waiting time</div>
                                                @if($feedback->waiting_time<3)
                                                    <img src="{{ asset('images/emoji/1.png')}}" alt="" class="img-responsive">    
                                                @elseif($feedback->waiting_time<=5)
                                                    <img src="{{ asset('images/emoji/2.png')}}" alt="" class="img-responsive">
                                                @elseif($feedback->waiting_time<=7)
                                                    <img src="{{ asset('images/emoji/3.png')}}" alt="" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('images/emoji/4.png')}}" alt="" class="img-responsive">
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <div class="name">Meal</div>
                                                @if($feedback->meal<=2)
                                                    <img src="{{ asset('images/emoji/1.png')}}" alt="" class="img-responsive">    
                                                @elseif($feedback->meal<=5)
                                                    <img src="{{ asset('images/emoji/2.png')}}" alt="" class="img-responsive">
                                                @elseif($feedback->meal<=7)
                                                    <img src="{{ asset('images/emoji/3.png')}}" alt="" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('images/emoji/4.png')}}" alt="" class="img-responsive">
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <div class="name">Value for Money</div>
                                                @if($feedback->value<3)
                                                    <img src="{{ asset('images/emoji/1.png')}}" alt="" class="img-responsive">    
                                                @elseif($feedback->value<=5)
                                                    <img src="{{ asset('images/emoji/2.png')}}" alt="" class="img-responsive">
                                                @elseif($feedback->value<=7)
                                                    <img src="{{ asset('images/emoji/3.png')}}" alt="" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('images/emoji/4.png')}}" alt="" class="img-responsive">
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <div class="reply-button">
                                            <button type="button" name="button" class="c-b-shadow">Reply on feedback</button>
                                            <button type="button" name="button" class="c-b-shadow">Send personal voucher</button>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-7">
                                        <div class="positive-negative-comment">
                                            <textarea name="name" rows="2" class="positive">{{$feedback->comment}}</textarea>
                                            <textarea name="name" rows="2" class="negative">{{$feedback->suggestion}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
                </div>
            </div>


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
        </div>
    </div>

@endsection


@section('script')

        <script>
            function delete_feedback(id){
                $.ajax({
                    type: "POST",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('feedback.delete') }}",
                    data: {
                     _token : $('meta[name="csrf-token"]').attr('content'), 
                     id : id
                    },
                    dataType: "text",
                    success: function(resultData) {
                        location.reload();
                    }
                });
            }
            $('.round-circle').circleProgress({
                startAngle: -1.55,
                size: 70,
                fill: {
                    color: '#491FFD'
                }
            }).on('circle-animation-progress', function(event, progress, stepValue) {
                $(this).find('strong').text(String( (stepValue * 10).toFixed(1) ));
            });;
            $('.round-circle-large').circleProgress({
                startAngle: -1.55,
                size: 100,
                fill: {
                    color: '#fff'
                }
            }).on('circle-animation-progress', function(event, progress, stepValue) {
                $(this).find('strong').text(String( (stepValue * 10).toFixed(1) ));
            });;
            $('.round-circle-100').circleProgress({
                startAngle: -1.55,
                size: 70,
                fill: {
                    color: '#491FFD'
                }
            }).on('circle-animation-progress', function(event, progress, stepValue) {
                $(this).find('strong').text(String( (stepValue * 100).toFixed(0) ));
            });;
        </script>

@endsection
