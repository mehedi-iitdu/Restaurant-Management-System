var BASE_URL = "http://127.0.0.1:8000";
var number_of_people = null;
var date = null;
var time = null;
var SelectOutput = "today";

window.addEventListener('message', function (e) {
        $(document.body).find('#restaurant_code').val( e.data );
    });

function widgetOpen(booking){
    if(booking == 'booking'){
        $(document.body).addClass('widget-open');
        parent.postMessage({"command":"both", "addClass":"widget-open", "removeClass":"widget-closed"}, '*');
    }
    getMaximumPeopleNumber();
    openDatePicker();
}
function widgetClose(){
    if($(document.body).hasClass('fullw-widget')){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $('.widget-container').load('booking.html', function(){
                $('.widget-container').fadeIn('slow');
            });
            nxt();
        });
    }
    if($(document.body).hasClass('widget-open')){
        $(document.body).removeClass('widget-open w-select-open fullw-widget');
        parent.postMessage({"command":"both", "addClass":"widget-closed", "removeClass":"widget-open w-select-open fullw-widget"}, '*');
        $('.options.dropdown, .booking-field.person').removeClass('opened');
    }
}
function openSelect(type) {
    if ( type == 'person' ) {
        if ($('.dropdown.person-dropdown').hasClass('opened')) {
            parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
            $(document.body).removeClass('w-select-open');
            $('.dropdown.person-dropdown, .booking-field.person').removeClass('opened');
        }else {
            parent.postMessage({"command":"addClass", "addClass":"w-select-open"}, '*');
            $(document.body).addClass('w-select-open');
            $('.dropdown.person-dropdown, .booking-field.person').addClass('opened');
            $('.dropdown.date-dropdown, .booking-field.date').removeClass('opened');
            $('.dropdown.time-dropdown, .booking-field.time').removeClass('opened');
        }
    }else if ( type == 'date' ) {
        if ($('.dropdown.date-dropdown').hasClass('opened')) {
            parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
            $(document.body).removeClass('w-select-open');
            $('.dropdown.date-dropdown, .booking-field.date').removeClass('opened');
        }else {
            parent.postMessage({"command":"addClass", "addClass":"w-select-open"}, '*');
            $(document.body).addClass('w-select-open');
            $('.dropdown.date-dropdown, .booking-field.date').addClass('opened');
            $('.dropdown.person-dropdown, .booking-field.person').removeClass('opened');
            $('.dropdown.time-dropdown, .booking-field.time').removeClass('opened');
        }
    }else if ( type == 'time' ) {
        if ($('.dropdown.time-dropdown').hasClass('opened')) {
            parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
            $(document.body).removeClass('w-select-open');
            $('.dropdown.time-dropdown, .booking-field.time').removeClass('opened');
        }else {
            parent.postMessage({"command":"addClass", "addClass":"w-select-open"}, '*');
            $(document.body).addClass('w-select-open');
            $('.dropdown.time-dropdown, .booking-field.time').addClass('opened');
            $('.dropdown.person-dropdown, .booking-field.person').removeClass('opened');
            $('.dropdown.date-dropdown, .booking-field.date').removeClass('opened');
        }
    }
}

function personSelect(el){

    var PersonInputNum = $(el).children('span').text();

    $('.person-select.select').find('.selected-value').children('span').html( PersonInputNum + ' people');
    parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
    $(document.body).removeClass('w-select-open');
    $('.dropdown.person-dropdown, .booking-field.person').removeClass('opened');

    if( $(el).hasClass('selected') ){
        return;
    }else {
        $(el).parent().find('.persons-option.selected').removeClass('selected');
        $(el).addClass('selected');
    }

    number_of_people = $(el).children('#people').text();
}

function timeSelect(el){

    var TimeInputTimePart = $(el).children('.time-time').text();
    var TimeInputDayPart = $(el).children('.day-part').text();
    var TimeInputArea = $(el).children('.area-name').text();

    $('.time-select.select').find('.selected-value').html( TimeInputTimePart + TimeInputDayPart + '<span class="area-filter">' + TimeInputArea + '</span>');
    parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
    $(document.body).removeClass('w-select-open');
    $('.dropdown.time-dropdown, .booking-field.time').removeClass('opened');

    if( $(el).hasClass('selected') ){
        return;
    }else {
        $(el).parent().find('.time-option.selected').removeClass('selected');
        $(el).addClass('selected');
    }

    time = $(el).children("input[name=time]").val();
    
}

function openDatePicker(){
    $( "#datepicker" ).datepicker({
        altField: "#dateAlter",
        altFormat: "dd-mm-yy",
        defaultDate: 0,
        minDate: 0,
        firstDay: 1,
        dayNamesMin: [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
        onSelect: function(selectedDate, inst){

            var suffix = "";
            switch(inst.selectedDay) {
                case '1': case '21': case '31': suffix = 'st'; break;
                case '2': case '22': suffix = 'nd'; break;
                case '3': case '23': suffix = 'rd'; break;
                default: suffix = 'th';
            }

            var outputDayName = $.datepicker.formatDate("DD", $(this).datepicker("getDate"));
            var outputDate = $.datepicker.formatDate("MM d", $(this).datepicker("getDate"));
            var today = new Date();
            var day1 = today.getDate().toString();
            var day2 = (new Date(today.getTime() + 24 * 60 * 60 * 1000).getDate()).toString();
            var day3 = (new Date(today.getTime() + 2 * (24 * 60 * 60 * 1000)).getDate()).toString();
            var day4 = (new Date(today.getTime() + 3 * (24 * 60 * 60 * 1000)).getDate()).toString();
            var day5 = (new Date(today.getTime() + 4 * (24 * 60 * 60 * 1000)).getDate()).toString();
            var day6 = (new Date(today.getTime() + 5 * (24 * 60 * 60 * 1000)).getDate()).toString();
            var day7 = (new Date(today.getTime() + 6 * (24 * 60 * 60 * 1000)).getDate()).toString();

            switch(inst.selectedDay) {
                case day1: SelectOutput = 'today'; break;
                case day2: SelectOutput = 'tomorrow'; break;
                case day3 : case day4 : case day5 : case day6 : case day7 : SelectOutput = 'next ' + outputDayName; break;
                default: SelectOutput = outputDate + suffix;
            }

            $(".date-select.select .selected-value").html(SelectOutput);

            parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
            $(document.body).removeClass('w-select-open');
            $('.dropdown.date-dropdown, .booking-field.date').removeClass('opened');

            date = $('#dateAlter').val();
            getAvailableTimes();
        },
    });

    date = $('#dateAlter').val();
    getAvailableTimes();
}

// $(document).on("click", function() {
//     openDatePicker();
// });

$(document).ready(function() {
    $('.widget-container').load('/widget/booking');
    openDatePicker();
});

function bookDirect(){
    parent.postMessage({"command":"addClass", "addClass":"fullw-widget"}, '*');
    $(document.body).addClass('fullw-widget');
    $(".widget-container").removeClass('booking').addClass('checkout');

    $('.widget-container').fadeOut(300, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('/widget/checkout', function(){
                $('.widget-container').fadeIn(400);

                $('#checkout-people').html(number_of_people + " people(s)");
                $('#checkout-date').html(SelectOutput);
                $('#checkout-time').html(DisplayCurrentTime(new Date(date + " "+ time)));
            });
            nxt();
        });
    });
}

function DisplayCurrentTime(date) {
    var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    hours = hours < 10 ? "0" + hours : hours;
    var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
    //var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
    converted_time = hours + ":" + minutes + " " + am_pm;
    
    return converted_time;
}

function backToBooking(){
    parent.postMessage({"command":"hasDelayRemove", "removeClass":"fullw-widget", "duration":300}, '*');
    $(document.body).removeClass('fullw-widget');
    $(".widget-container").removeClass('checkout').addClass('booking');

    $('.widget-container').fadeOut(100, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('/widget/booking', function(){
                $('.widget-container').fadeIn('slow');
                openDatePicker();
            });
            nxt();
        });
    });
}

function checkout(){
    $('.widget-container').fadeOut(400, function(){
        $(this).load('/widget/processing', function(){
            $('.widget-container').fadeIn(400);
        });
    });
    $('.widget-container').delay(300).queue(function( nghfgxt ) {
        $(this).load('/widget/confirm', function(){
            $('.widget-container').fadeIn(400);
        });
        nghfgxt();
    });
}


function getAvailableTimes(){
    $.ajax({
        type: "POST",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/widget/available-times",
        data: {
         _token : $('meta[name="csrf-token"]').attr('content'), 
         code : $('#restaurant_code').val(),
         date : date
        },
        dataType: "text",
        success: function(resultData) {
            $('#time_slots').html(resultData);
        }
    });
}

function getMaximumPeopleNumber(){
    $.ajax({
        type: "POST",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/widget/maximum-people",
        data: {
         _token : $('meta[name="csrf-token"]').attr('content'), 
         code : $('#restaurant_code').val()
        },
        dataType: "text",
        success: function(resultData) {
            number_of_people = 1;
            for(var i=1; i <= resultData; i++){
                var str = '<div class="persons-option" onclick="personSelect(this)"><span id="people">'+ i +'</span></div>';
                $('#people-select').append(str);
            }
        }
    });
}
