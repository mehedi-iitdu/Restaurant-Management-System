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
        </div>
        <div class="widget-content">
            <div class="booking-form-wrap">
                <div class="field-wrapper">

                    <input type="hidden" name="restaurant_code" id="restaurant_code"/>

                    <div class="booking-field person">
                        <div class="person-select select" onclick="openSelect('person')">
                            <div class="field-selection">
                                <span>People</span>
                                <div class="selected-value">
                                    <span>1 people</span>
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
                        <div class="dropdown-wrapper clear" id="people-select">
                            
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
                        <div class="dropdown-wrapper clear">

                            <span id="time_slots">
                                
                            </span>

                        </div>
                    </div>

                    <div class="widget-book-button">
                        <a onclick="bookDirect()">Book now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
