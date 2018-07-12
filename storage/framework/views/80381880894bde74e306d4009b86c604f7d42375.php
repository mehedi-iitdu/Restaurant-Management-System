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
    <script type="text/javascript" src="<?php echo e(asset('js/widget-script.js')); ?>"></script>
</head>
<body class="widget-normal">

    <input type="hidden" name="restaurant_code" id="restaurant_code"/>

    <div class="widget">
        <div class="tooltip" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">
            <div class="tooltip-content">gesloten, restaurant x is wel open.</div>
            <a class="select-btn"></a>
        </div>
        <div class="widget-wrap">
            <div class="widget-container booking">
                
            </div>
        </div>

        <div class="widget-button">
            <div class="widget-btn-wrapper">
                <div class="scooper-logo">
                    <a href="http://scooper.eu/" target="_blank" title="Reservations and gift vouchers are processed by Formitable">
                        <svg id="scooper_logo" width="14" height="20" viewBox="0 0 110.8 157.7" class="widget-logo" aria-hidden="true" role="img">
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
                <div class="widget-action-wrap">
                    <a href="#" onclick="widgetOpen('booking');">  Book a table  </a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
