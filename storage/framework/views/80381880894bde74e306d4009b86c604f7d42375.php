<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Widget | Scooper</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/widget-style.css')); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="widget-normal show-redeem vouchers-active">
    
    <input type="hidden" name="restaurant_code" id="restaurant_code"/>

    <div class="widget">
        <div class="tooltip" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
            <div class="tooltip-content">gesloten, restaurant x is wel open.</div>
            <a class="select-btn"></a>
        </div>
        <div class="widget-wrap">
            <div class="widget-container booking">
                <div class="widget-view">
                    <div class="booking-form-wrapper">
                        <div class="widget-header">

                            <div class="back">
                                <a class="close-button" onclick="widgetClose()">
                                    <svg id="close" viewBox="0 0 10.5 10.5" width="100%" height="100%">
                                        <path d="M6.7,5.2l3.5-3.5c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L5.2,3.8L1.7,0.3c-0.4-0.4-1-0.4-1.4,0
                                c-0.4,0.4-0.4,1,0,1.4l3.5,3.5L0.3,8.8c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0l3.5-3.5l3.5,3.5c0.4,0.4,1,0.4,1.4,0
                                c0.4-0.4,0.4-1,0-1.4L6.7,5.2z"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="widget-title">
                                <span>Book a table</span>
                            </div>

                            <div class="btn-language-switch" onclick="">
                                <svg  width="23" height="23" viewBox="0 0 128 128"  role="img">
                                    <style type="text/css">
                                        .uk-st0{fill:#CE142B;}
                                        .uk-st1{fill:#FCFCFD;}
                                        .uk-st2{fill:#01257D;}
                                        .uk-st3{fill:#00247D;}
                                        .uk-st4{fill:#CF172D;}
                                        .uk-st5{fill:#CF162D;}
                                    </style>
                                    <g>
                                        <path class="uk-st0" d="M119,64c0,3.8-0.4,7.4-1.1,11H70.3v43.6c-2.1,0.2-4.2,0.4-6.3,0.4s-4.2-0.1-6.3-0.4V75H10.1
                                            C9.4,71.4,9,67.8,9,64s0.4-7.4,1.1-11h47.6V9.4C59.8,9.1,61.9,9,64,9s4.2,0.1,6.3,0.4V53h47.6C118.6,56.6,119,60.2,119,64z"/>
                                        <path class="uk-st1" d="M57.7,9.4V53H10.1c0.5-2.5,1.2-5,2.1-7.4h16c0.1,0,0.3,0,0.6-0.1c-0.4-0.4-0.6-0.6-0.8-0.8
                                            c-3.6-3.2-7.2-6.3-10.8-9.5c0.5-0.9,1.1-1.8,1.7-2.6c4.7,4.1,9.4,8.2,14,12.3c0.4,0.4,0.9,0.6,1.3,0.6c2.7,0.1,5.4,0,8,0
                                            c0.2,0,0.3-0.1,0.6-0.2c-0.3-0.3-0.5-0.5-0.8-0.7c-6.5-5.7-13-11.3-19.4-17c2-2.3,4.3-4.5,6.7-6.5c7.8,6.9,15.7,13.7,23.5,20.5
                                            c0.2,0.2,0.4,0.3,0.7,0.5v-1.7c0-7.6,0-15.3,0-22.9c0-2.6,0-5.2,0-7.8C54.8,9.7,56.3,9.5,57.7,9.4z"/>
                                        <path class="uk-st1" d="M99.9,82.4c-0.1,0-0.3,0.1-0.5,0.2c0.4,0.3,0.6,0.5,0.8,0.7c3.6,3.1,7.2,6.3,10.8,9.4
                                            c-0.5,0.9-1.1,1.8-1.7,2.6c-4.7-4.1-9.4-8.2-14.1-12.3c-0.4-0.3-0.9-0.6-1.3-0.6c-2.6,0-5.3,0-7.9,0c-0.2,0-0.4,0.1-0.7,0.1
                                            c0.4,0.3,0.6,0.5,0.8,0.7c6.5,5.7,13,11.3,19.4,17c-2,2.3-4.3,4.5-6.7,6.5C90.8,99.8,83,92.8,75.1,86c-0.2-0.1-0.3-0.2-0.6-0.3v1.6
                                            c0,7.8,0,15.7,0,23.5c0,2.4,0,4.8,0,7.2c-1.4,0.3-2.8,0.5-4.3,0.7V75h47.6c-0.5,2.5-1.2,5-2.1,7.4H99.9z"/>
                                        <path class="uk-st1" d="M57.7,75v43.6c-1.4-0.2-2.8-0.4-4.2-0.7c0-10.5,0-20.9,0-31.4c0-0.3,0-0.6,0-1c-0.3,0.2-0.5,0.3-0.6,0.5
                                            c-7.8,6.8-15.7,13.7-23.5,20.5c-0.8-0.7-1.6-1.3-2.4-2c8.1-7.1,16.3-14.2,24.4-21.3c0.3-0.2,0.5-0.4,0.9-0.8
                                            c-0.3-0.1-0.4-0.1-0.5-0.1c-2.8,0-5.5,0-8.3,0c-0.4,0-0.8,0.3-1.2,0.6c-6.6,5.7-13.1,11.5-19.7,17.2c-2-2.3-3.9-4.8-5.5-7.5
                                            c3.7-3.2,7.5-6.5,11.2-9.8c0.1-0.1,0.2-0.3,0.5-0.6H12.2c-0.9-2.4-1.5-4.8-2.1-7.4H57.7z"/>
                                        <path class="uk-st1" d="M117.9,53H70.3V9.4c1.4,0.2,2.8,0.4,4.2,0.7c0,10.5,0,21,0,31.4c0,0.3,0,0.6,0,1c0.3-0.3,0.5-0.4,0.8-0.6
                                            C83.2,35,91,28.2,98.8,21.4c0.8,0.7,1.6,1.3,2.4,2C93,30.5,84.8,37.6,76.7,44.8c-0.2,0.2-0.5,0.4-0.7,0.6c2.8,0.3,5.5,0.3,8.2,0.2
                                            c0.6,0,1.2-0.3,1.7-0.7c6.5-5.7,13-11.4,19.6-17.1c2,2.3,3.9,4.8,5.5,7.5c-3.7,3.2-7.4,6.5-11.1,9.7c-0.1,0.1-0.2,0.3-0.4,0.4
                                            c0,0.1,0,0.2,0,0.2h16.3C116.7,48,117.4,50.5,117.9,53z"/>
                                        <path class="uk-st2" d="M98.8,21.4C91,28.2,83.2,35,75.3,41.8c-0.2,0.2-0.5,0.4-0.8,0.6c0-0.4,0-0.7,0-1c0-10.5,0-20.9,0-31.4
                                            C83.6,11.8,91.9,15.8,98.8,21.4z"/>
                                        <path class="uk-st2" d="M98.8,106.6c-6.9,5.6-15.1,9.6-24.2,11.3c0-2.4,0-4.8,0-7.2c0-7.8,0-15.7,0-23.5v-1.6c0.2,0.1,0.4,0.2,0.6,0.3
                                            C83,92.8,90.8,99.8,98.8,106.6z"/>
                                        <path class="uk-st3" d="M53.5,40.7v1.7c-0.3-0.2-0.5-0.3-0.7-0.5c-7.8-6.8-15.7-13.7-23.5-20.5c6.9-5.6,15.1-9.6,24.2-11.3
                                            c0,2.6,0,5.2,0,7.8C53.5,25.4,53.5,33.1,53.5,40.7z"/>
                                        <path class="uk-st3" d="M53.5,86.6c0,10.5,0,20.9,0,31.4c-9.1-1.8-17.3-5.7-24.2-11.3c7.8-6.9,15.7-13.7,23.5-20.5
                                            c0.2-0.2,0.4-0.3,0.6-0.5C53.5,86,53.5,86.3,53.5,86.6z"/>
                                        <path class="uk-st4" d="M52.2,82.5c-0.4,0.4-0.6,0.6-0.9,0.8c-8.1,7.1-16.3,14.2-24.4,21.3c-1.5-1.4-3-2.9-4.3-4.4
                                            c6.6-5.7,13.1-11.5,19.7-17.2c0.4-0.3,0.8-0.6,1.2-0.6c2.8,0,5.5,0,8.3,0C51.8,82.4,51.9,82.4,52.2,82.5z"/>
                                        <path class="uk-st4" d="M105.4,27.8c-6.5,5.7-13,11.4-19.6,17.1c-0.5,0.4-1.1,0.7-1.7,0.7c-2.7,0.1-5.4,0-8.2-0.2
                                            c0.2-0.2,0.5-0.4,0.7-0.6c8.1-7.1,16.3-14.2,24.4-21.3C102.6,24.8,104.1,26.3,105.4,27.8z"/>
                                        <path class="uk-st2" d="M28.7,45.5c-0.3,0-0.5,0.1-0.6,0.1h-16c1.3-3.6,2.9-7.1,4.9-10.3c3.6,3.2,7.2,6.3,10.8,9.5
                                            C28.1,45,28.3,45.2,28.7,45.5z"/>
                                        <path class="uk-st2" d="M28.7,82.4c-0.2,0.3-0.3,0.5-0.5,0.6c-3.7,3.3-7.5,6.5-11.2,9.8c-2-3.2-3.6-6.7-4.9-10.3H28.7z"/>
                                        <path class="st3" d="M115.8,45.6H99.5c0-0.1,0-0.2,0-0.2c0.1-0.1,0.2-0.3,0.4-0.4c3.7-3.2,7.4-6.5,11.1-9.7
                                            C112.9,38.6,114.6,42,115.8,45.6z"/>
                                        <path class="uk-st3" d="M115.8,82.4c-1.3,3.6-2.9,7.1-4.9,10.3c-3.6-3.1-7.2-6.3-10.8-9.4c-0.2-0.2-0.5-0.4-0.8-0.7
                                            c0.3-0.1,0.4-0.2,0.5-0.2H115.8z"/>
                                        <path class="uk-st4" d="M42.8,45.5c-0.3,0.1-0.4,0.2-0.6,0.2c-2.7,0-5.3,0-8,0c-0.4,0-0.9-0.3-1.3-0.6c-4.7-4.1-9.4-8.2-14-12.3
                                            c1.2-1.7,2.4-3.3,3.8-4.9c6.5,5.7,13,11.3,19.4,17C42.2,45,42.4,45.2,42.8,45.5z"/>
                                        <path class="uk-st5" d="M109.2,95.3c-1.2,1.7-2.4,3.3-3.8,4.9c-6.5-5.6-13-11.3-19.4-17c-0.2-0.2-0.4-0.4-0.8-0.7
                                            c0.3-0.1,0.5-0.1,0.7-0.1c2.6,0,5.3,0,7.9,0c0.4,0,0.9,0.3,1.3,0.6C99.8,87.1,104.5,91.2,109.2,95.3z"/>
                                    </g>
                                </svg>
                            </div>

                        </div>
                        <div class="widget-content">
                            <div class="booking-form-wrap">
                                <div class="field-wrapper">

                                    <div class="booking-field person">
                                        <div class="person-select select" onclick="openSelect('person')">
                                            <div class="field-selection">
                                                <span>People</span>
                                                <div class="selected-value">
                                                    <span>8 people</span>
                                                </div>
                                                <div class="dropdown-arrow">
                                                    <svg class="arrow-down">
                                                        <path d="M0.2,1.6l3.4,3.8c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3l3.4-3.7l0,0c0.2-0.2,0.2-0.4,0.2-0.6C8.8,0.4,8.3,0,7.8,0
                                                C7.5,0,7.3,0.1,7.1,0.3l0,0l-2.7,3l-2.7-3l0,0C1.5,0.1,1.2,0,0.9,0C0.4,0,0,0.4,0,0.9C0,1.2,0.1,1.4,0.2,1.6L0.2,1.6z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="options dropdown person-dropdown">
                                        <div class="dropdown-wrapper clear">
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>1</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>2</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>3</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>4</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>5</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>6</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>7</span>
                                            </div>
                                            <div class="persons-option selected" onclick="personSelect(this)">
                                                <span>8</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>9</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>10</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>11</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>12</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>13</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>14</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>15</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>16</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>17</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>18</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>19</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>20</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>21</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>22</span>
                                            </div>
                                            <div class="persons-option" onclick="personSelect(this)">
                                                <span>23</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="booking-field date">
                                        <div class="date-select select" onclick="openSelect('date')">
                                            <div class="field-selection">
                                                <span>Date</span>
                                                <div class="selected-value">
                                                    <span>today</span>
                                                </div>
                                                <input type="hidden" id="dateAlter" name="" value="">
                                                <div class="dropdown-arrow">
                                                    <svg class="arrow-down">
                                                        <path d="M0.2,1.6l3.4,3.8c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3l3.4-3.7l0,0c0.2-0.2,0.2-0.4,0.2-0.6C8.8,0.4,8.3,0,7.8,0
                                                C7.5,0,7.3,0.1,7.1,0.3l0,0l-2.7,3l-2.7-3l0,0C1.5,0.1,1.2,0,0.9,0C0.4,0,0,0.4,0,0.9C0,1.2,0.1,1.4,0.2,1.6L0.2,1.6z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="options dropdown date-dropdown">
                                        <div class="dropdown-wrapper clear">
                                            <div id="datepicker">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="booking-field time">
                                        <div class="time-select select" onclick="openSelect('time')">
                                            <div class="field-selection">
                                                <span>Time</span>
                                                <div class="selected-value">
                                                    11:45 AM
                                                    <span class="area-filter">Restaurant</span>
                                                </div>
                                                <div class="dropdown-arrow">
                                                    <svg class="arrow-down">
                                                        <path d="M0.2,1.6l3.4,3.8c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3l3.4-3.7l0,0c0.2-0.2,0.2-0.4,0.2-0.6C8.8,0.4,8.3,0,7.8,0
                                                C7.5,0,7.3,0.1,7.1,0.3l0,0l-2.7,3l-2.7-3l0,0C1.5,0.1,1.2,0,0.9,0C0.4,0,0,0.4,0,0.9C0,1.2,0.1,1.4,0.2,1.6L0.2,1.6z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="options dropdown time-dropdown">
                                        <div class="dropdown-wrapper clear" id="time_slots">

                                            

                                        </div>
                                    </div>

                                    <div class="widget-book-button">
                                        <a onclick="bookDirect()">Book now</a>
                                    </div>

                                    <div class="options redeem-option">
                                        <a onclick="redeemOpen('booking-form')" >Got a gift voucher?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-button">
            <div class="widget-btn-wrapper">
                <div class="btn-language-switch" onclick="">
                    <svg  width="23" height="23" viewBox="0 0 128 128"  role="img">
                        <style type="text/css">
                            .uk-st0{fill:#CE142B;}
                            .uk-st1{fill:#FCFCFD;}
                            .uk-st2{fill:#01257D;}
                            .uk-st3{fill:#00247D;}
                            .uk-st4{fill:#CF172D;}
                            .uk-st5{fill:#CF162D;}
                        </style>
                        <g>
                            <path class="uk-st0" d="M119,64c0,3.8-0.4,7.4-1.1,11H70.3v43.6c-2.1,0.2-4.2,0.4-6.3,0.4s-4.2-0.1-6.3-0.4V75H10.1
                                C9.4,71.4,9,67.8,9,64s0.4-7.4,1.1-11h47.6V9.4C59.8,9.1,61.9,9,64,9s4.2,0.1,6.3,0.4V53h47.6C118.6,56.6,119,60.2,119,64z"/>
                            <path class="uk-st1" d="M57.7,9.4V53H10.1c0.5-2.5,1.2-5,2.1-7.4h16c0.1,0,0.3,0,0.6-0.1c-0.4-0.4-0.6-0.6-0.8-0.8
                                c-3.6-3.2-7.2-6.3-10.8-9.5c0.5-0.9,1.1-1.8,1.7-2.6c4.7,4.1,9.4,8.2,14,12.3c0.4,0.4,0.9,0.6,1.3,0.6c2.7,0.1,5.4,0,8,0
                                c0.2,0,0.3-0.1,0.6-0.2c-0.3-0.3-0.5-0.5-0.8-0.7c-6.5-5.7-13-11.3-19.4-17c2-2.3,4.3-4.5,6.7-6.5c7.8,6.9,15.7,13.7,23.5,20.5
                                c0.2,0.2,0.4,0.3,0.7,0.5v-1.7c0-7.6,0-15.3,0-22.9c0-2.6,0-5.2,0-7.8C54.8,9.7,56.3,9.5,57.7,9.4z"/>
                            <path class="uk-st1" d="M99.9,82.4c-0.1,0-0.3,0.1-0.5,0.2c0.4,0.3,0.6,0.5,0.8,0.7c3.6,3.1,7.2,6.3,10.8,9.4
                                c-0.5,0.9-1.1,1.8-1.7,2.6c-4.7-4.1-9.4-8.2-14.1-12.3c-0.4-0.3-0.9-0.6-1.3-0.6c-2.6,0-5.3,0-7.9,0c-0.2,0-0.4,0.1-0.7,0.1
                                c0.4,0.3,0.6,0.5,0.8,0.7c6.5,5.7,13,11.3,19.4,17c-2,2.3-4.3,4.5-6.7,6.5C90.8,99.8,83,92.8,75.1,86c-0.2-0.1-0.3-0.2-0.6-0.3v1.6
                                c0,7.8,0,15.7,0,23.5c0,2.4,0,4.8,0,7.2c-1.4,0.3-2.8,0.5-4.3,0.7V75h47.6c-0.5,2.5-1.2,5-2.1,7.4H99.9z"/>
                            <path class="uk-st1" d="M57.7,75v43.6c-1.4-0.2-2.8-0.4-4.2-0.7c0-10.5,0-20.9,0-31.4c0-0.3,0-0.6,0-1c-0.3,0.2-0.5,0.3-0.6,0.5
                                c-7.8,6.8-15.7,13.7-23.5,20.5c-0.8-0.7-1.6-1.3-2.4-2c8.1-7.1,16.3-14.2,24.4-21.3c0.3-0.2,0.5-0.4,0.9-0.8
                                c-0.3-0.1-0.4-0.1-0.5-0.1c-2.8,0-5.5,0-8.3,0c-0.4,0-0.8,0.3-1.2,0.6c-6.6,5.7-13.1,11.5-19.7,17.2c-2-2.3-3.9-4.8-5.5-7.5
                                c3.7-3.2,7.5-6.5,11.2-9.8c0.1-0.1,0.2-0.3,0.5-0.6H12.2c-0.9-2.4-1.5-4.8-2.1-7.4H57.7z"/>
                            <path class="uk-st1" d="M117.9,53H70.3V9.4c1.4,0.2,2.8,0.4,4.2,0.7c0,10.5,0,21,0,31.4c0,0.3,0,0.6,0,1c0.3-0.3,0.5-0.4,0.8-0.6
                                C83.2,35,91,28.2,98.8,21.4c0.8,0.7,1.6,1.3,2.4,2C93,30.5,84.8,37.6,76.7,44.8c-0.2,0.2-0.5,0.4-0.7,0.6c2.8,0.3,5.5,0.3,8.2,0.2
                                c0.6,0,1.2-0.3,1.7-0.7c6.5-5.7,13-11.4,19.6-17.1c2,2.3,3.9,4.8,5.5,7.5c-3.7,3.2-7.4,6.5-11.1,9.7c-0.1,0.1-0.2,0.3-0.4,0.4
                                c0,0.1,0,0.2,0,0.2h16.3C116.7,48,117.4,50.5,117.9,53z"/>
                            <path class="uk-st2" d="M98.8,21.4C91,28.2,83.2,35,75.3,41.8c-0.2,0.2-0.5,0.4-0.8,0.6c0-0.4,0-0.7,0-1c0-10.5,0-20.9,0-31.4
                                C83.6,11.8,91.9,15.8,98.8,21.4z"/>
                            <path class="uk-st2" d="M98.8,106.6c-6.9,5.6-15.1,9.6-24.2,11.3c0-2.4,0-4.8,0-7.2c0-7.8,0-15.7,0-23.5v-1.6c0.2,0.1,0.4,0.2,0.6,0.3
                                C83,92.8,90.8,99.8,98.8,106.6z"/>
                            <path class="uk-st3" d="M53.5,40.7v1.7c-0.3-0.2-0.5-0.3-0.7-0.5c-7.8-6.8-15.7-13.7-23.5-20.5c6.9-5.6,15.1-9.6,24.2-11.3
                                c0,2.6,0,5.2,0,7.8C53.5,25.4,53.5,33.1,53.5,40.7z"/>
                            <path class="uk-st3" d="M53.5,86.6c0,10.5,0,20.9,0,31.4c-9.1-1.8-17.3-5.7-24.2-11.3c7.8-6.9,15.7-13.7,23.5-20.5
                                c0.2-0.2,0.4-0.3,0.6-0.5C53.5,86,53.5,86.3,53.5,86.6z"/>
                            <path class="uk-st4" d="M52.2,82.5c-0.4,0.4-0.6,0.6-0.9,0.8c-8.1,7.1-16.3,14.2-24.4,21.3c-1.5-1.4-3-2.9-4.3-4.4
                                c6.6-5.7,13.1-11.5,19.7-17.2c0.4-0.3,0.8-0.6,1.2-0.6c2.8,0,5.5,0,8.3,0C51.8,82.4,51.9,82.4,52.2,82.5z"/>
                            <path class="uk-st4" d="M105.4,27.8c-6.5,5.7-13,11.4-19.6,17.1c-0.5,0.4-1.1,0.7-1.7,0.7c-2.7,0.1-5.4,0-8.2-0.2
                                c0.2-0.2,0.5-0.4,0.7-0.6c8.1-7.1,16.3-14.2,24.4-21.3C102.6,24.8,104.1,26.3,105.4,27.8z"/>
                            <path class="uk-st2" d="M28.7,45.5c-0.3,0-0.5,0.1-0.6,0.1h-16c1.3-3.6,2.9-7.1,4.9-10.3c3.6,3.2,7.2,6.3,10.8,9.5
                                C28.1,45,28.3,45.2,28.7,45.5z"/>
                            <path class="uk-st2" d="M28.7,82.4c-0.2,0.3-0.3,0.5-0.5,0.6c-3.7,3.3-7.5,6.5-11.2,9.8c-2-3.2-3.6-6.7-4.9-10.3H28.7z"/>
                            <path class="st3" d="M115.8,45.6H99.5c0-0.1,0-0.2,0-0.2c0.1-0.1,0.2-0.3,0.4-0.4c3.7-3.2,7.4-6.5,11.1-9.7
                                C112.9,38.6,114.6,42,115.8,45.6z"/>
                            <path class="uk-st3" d="M115.8,82.4c-1.3,3.6-2.9,7.1-4.9,10.3c-3.6-3.1-7.2-6.3-10.8-9.4c-0.2-0.2-0.5-0.4-0.8-0.7
                                c0.3-0.1,0.4-0.2,0.5-0.2H115.8z"/>
                            <path class="uk-st4" d="M42.8,45.5c-0.3,0.1-0.4,0.2-0.6,0.2c-2.7,0-5.3,0-8,0c-0.4,0-0.9-0.3-1.3-0.6c-4.7-4.1-9.4-8.2-14-12.3
                                c1.2-1.7,2.4-3.3,3.8-4.9c6.5,5.7,13,11.3,19.4,17C42.2,45,42.4,45.2,42.8,45.5z"/>
                            <path class="uk-st5" d="M109.2,95.3c-1.2,1.7-2.4,3.3-3.8,4.9c-6.5-5.6-13-11.3-19.4-17c-0.2-0.2-0.4-0.4-0.8-0.7
                                c0.3-0.1,0.5-0.1,0.7-0.1c2.6,0,5.3,0,7.9,0c0.4,0,0.9,0.3,1.3,0.6C99.8,87.1,104.5,91.2,109.2,95.3z"/>
                        </g>
                    </svg>
                </div>

                <div class="widget-action-wrap">
                    <a href="#" onclick="widgetOpen('booking');">  Book a table  </a>
                    <a onclick="voucherOpen()" href="#"> Buy gift voucher
                        <div class="promote-label"><span>New </span></div>
                    </a>
                </div>
                <div class="scooper-logo">
                    <a href="http://scooper.eu/" target="_blank" title="Reservations and gift vouchers are processed by Formitable">
                        <svg id="scooper_logo" width="11" height="15" viewBox="0 0 110.8 157.7" class="widget-logo" aria-hidden="true" role="img">
                            <path d="M110.8,29.4c0-4.7-1.5-9.1-4.1-13.1C102.4,9.9,95.2,4.9,86.3,2.2C81.7,0.8,76.7,0,71.4,0c-0.2,0-0.3,0-0.5,0
                                                            c-0.2,0-0.3,0-0.5,0c-5.5,0-10.8,0.7-15.9,2h0c-2.1,0.5-4.2,1.2-6.2,1.9c-4.6,1.8-8.7,3.9-12.1,6.3c-4,3.2-7.6,6.8-10.7,10.9
                                                            c-0.1,0.1-0.2,0.3-0.3,0.4c-0.1,0.2-0.3,0.4-0.4,0.5c-0.6,0.8-1.1,1.6-1.6,2.5c0,0,0,0,0,0c-0.8,1.3-1.6,2.7-2.2,4
                                                            c-0.7,1.4-1.4,3-2,4.6c-0.4,1-0.7,2.1-1.1,3.2c-0.5,1.8-1,3.6-1.5,5.6c-0.4,1.7-0.7,3.4-1,5.2c0,0.2-0.1,0.3-0.1,0.5
                                                            c-0.7,4.4-1.2,9.4-1.4,15.1c-0.2,3.5-0.3,12.9-0.3,12.9h0H5.1v5.8h8.5V135c0,0.9,0,1.7-0.1,2.4c-0.8,8.8-6,16.2-13.4,20.2
                                                            c4.8,0.3,10,0,13.5-1c4-1.1,6.1-2.1,8.8-3.6c0.4-0.2,3.1-2,3.2-2c21.5-15.3,28.9-35.8,28.8-59.3c0-1.2,0.1-10.2,0.1-10.2h17v-5.8
                                                            h-17v-0.1V25.1C54.6,16.8,59.7,9.7,67,6.8c0.4-0.2,0.8-0.3,1.2-0.4c0.3-0.1,0.7-0.2,1-0.3c0,0,0,0,0,0c1.7-0.5,3.5-0.7,5.3-0.7
                                                            c0.1,0,0.2,0,0.4,0c3.4,0.1,6.5,0.9,9.3,2.5c0.5,0.3,1,0.6,1.5,1c-0.2,0-0.4,0-0.5,0.1C75.4,10.8,68,19.4,68,29.8c0,0,0,0.1,0,0.1
                                                            c0,0,0,0.1,0,0.1c0,11.8,9.6,21.4,21.4,21.4c6.1,0,11.5-2.5,15.4-6.6c0.8-0.8,1.5-1.6,2.1-2.5c0.2-0.3,0.4-0.6,0.6-1
                                                            c1.2-2,2.1-4.2,2.6-6.5c0.4-1.6,0.6-3.3,0.6-5.1c0-0.1,0-0.1,0-0.2C110.8,29.5,110.8,29.5,110.8,29.4
                                                            C110.8,29.4,110.8,29.4,110.8,29.4z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="<?php echo e(asset('js/widget-script.js')); ?>"></script>

</script>
</body>
</html>
