var BASE_URL = "http://localhost/restaurant/public";
var number_of_people = 8;
var date = null;
var time = null;
var SelectOutput = "today";
var checkout_email = null;

window.addEventListener('message', function (e) {
        $(document.body).find('#restaurant_code').val( e.data );
    });

function widgetOpen(booking){
    if($(document.body).hasClass('widget-open')){
        $(document.body).removeClass('widget-open').addClass('widget-closed');
        parent.postMessage({"command":"both", "addClass":"widget-closed", "removeClass":"widget-open"}, '*');
    }else {
        $(document.body).removeClass('widget-closed').addClass('widget-open');
        parent.postMessage({"command":"both", "addClass":"widget-open", "removeClass":"widget-closed"}, '*');
    }
    datepickOpen();
}
function widgetClose(){
    if($(document.body).hasClass('fullw-widget')){
        setTimeout(function() {
            parent.postMessage({"command":"removeClass", "removeClass":"fullw-widget"}, '*');
            $(document.body).removeClass('fullw-widget');
        }, 400);
        $('.widget-container').delay(400).queue(function( nxt ) {
            $('.widget-container').load('booking', function(){
                $('.widget-container').fadeIn('slow');
                datepickOpen();
            });
            nxt();
        });
        setTimeout(function() {
            $(".widget-container").removeClass('vouchers checkout').addClass('booking');
        }, 500);
    }
    if($(document.body).hasClass('widget-open')){
        $(document.body).removeClass('widget-open w-select-open').addClass('widget-closed');
        parent.postMessage({"command":"both", "addClass":"widget-closed", "removeClass":"widget-open w-select-open"}, '*');
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

    number_of_people = PersonInputNum;
    console.log(number_of_people);
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

function datepickOpen(){
    $( "#datepicker" ).datepicker({
        altField: "#dateAlter",
        altFormat: "MM d",
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

            var SelectOutput = "";
            var outputDayName = $.datepicker.formatDate("DD", $(this).datepicker("getDate"));
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
                default: SelectOutput = $("#dateAlter").val() + suffix;
            }

            $(".date-select.select .selected-value").html(SelectOutput);


            parent.postMessage({"command":"removeClass", "removeClass":"w-select-open"}, '*');
            $(document.body).removeClass('w-select-open');
            $('.dropdown.date-dropdown, .booking-field.date').removeClass('opened');

            date = $('#dateAlter').val();
            getAvailableTimes();
        },
    }).datepicker("setDate", new Date());

    date = $('#dateAlter').val();
    getAvailableTimes();
}

// $(document).on("click", function() {
//     datepickOpen();
// });
// $(document).addEventListener("change", function() {
//     datepickOpen();
// });

datepickOpen();


function redeemOpen(location){
    if (location == 'booking-form') {
        $(document.body).addClass('redeem-open');
        parent.postMessage({"command":"addClass", "addClass":"redeem-open"}, '*');
        $(".widget-container").removeClass('booking').addClass('redeem');
        $('.widget-container').fadeOut(300, function(){
            $('.widget-container').delay(100).queue(function( nxt ) {
                $(this).load('redeem', function(){
                    $('.widget-container').fadeIn(300);
                });
                nxt();
            });
        });
    }
}
function redeemClose(location){
    if (location == 'booking-form') {
        $(document.body).removeClass('redeem-open');
        parent.postMessage({"command":"removeClass", "removeClass":"redeem-open"}, '*');
        $(".widget-container").removeClass('redeem').addClass('booking');
        $('.widget-container').fadeOut(50, function(){
            $('.widget-container').delay(100).queue(function( nxt ) {
                $(this).load('booking', function(){
                    $('.widget-container').fadeIn(300);
                });
                nxt();
            });
        });
    }
}


function bookDirect(){
    // if($(document.body).hasClass('vouchers-active')){
    //     parent.postMessage({"command":"addClass", "addClass":"fullw-widget"}, '*');
    //     $(document.body).addClass('fullw-widget');
    //     $(".widget-container").removeClass('booking').addClass('checkout');
    //
    //     $('.widget-container').fadeOut(300, function(){
    //         $('.widget-container').delay(400).queue(function( nxt ) {
    //             $(this).load('checkout.html', function(){
    //                 $('.widget-container').fadeIn(400);
    //             });
    //             nxt();
    //         });
    //     });
    // }else {
        parent.postMessage({"command":"addClass", "addClass":"fullw-widget"}, '*');
        $(document.body).addClass('fullw-widget');
        setTimeout(function() {
            $(".widget-container").removeClass('booking').addClass('checkout');
        }, 400);
        $('.widget-container').fadeOut(300, function(){
            $('.widget-container').delay(400).queue(function( nxt ) {
                $(this).load('checkout', function(){
                    $('.widget-container').fadeIn(400);

                    $('#checkout-people').html(number_of_people + " people(s)");
                    $('#checkout-date').html(SelectOutput);
                    $('#checkout-time').html(DisplayCurrentTime(new Date(date + " "+ time)));

                });
                nxt();
            });
        });
    // }
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
    setTimeout(function() {
        $(".widget-container").removeClass('checkout').addClass('booking');
    }, 300);
    $('.widget-container').fadeOut(100, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('booking', function(){
                $('.widget-container').fadeIn('slow');
                datepickOpen();
            });

            nxt();
        });
    });

}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

function checkout(){

    var isValid = true;
    var title = $("input[name=orderInfo_title]").val();
    var company = $("input[name=orderInfo_company]").val();
    var first_name = $("input[name=orderInfo_firstName]").val();
    var last_name = $("input[name=orderInfo_lastName]").val();
    var telephone = $("input[name=orderInfo_telephone]").val();
    var note = $("textarea[name=orderInfo_note]").val();

    checkout_email = $("input[name=orderInfo_email]").val();

    if(checkout_email == "" || !isValidEmailAddress(checkout_email)){
        $("input[name=orderInfo_email]").addClass('input-error');    
        isValid = false;
    }
    else{
        $("input[name=orderInfo_email]").removeClass('input-error');
    }
    if(first_name == ""){
        $("input[name=orderInfo_firstName]").addClass('input-error');
        isValid = false;
    }
    else{
        $("input[name=orderInfo_firstName]").removeClass('input-error');
    }
    if(last_name == ""){
        $("input[name=orderInfo_lastName]").addClass('input-error');
        isValid = false;
    }
    else{
        $("input[name=orderInfo_lastName]").removeClass('input-error');
    }
    if(telephone == ""){
        $("input[name=orderInfo_telephone]").addClass('input-error');
        isValid = false;
    }
    else{
        $("input[name=orderInfo_telephone]").removeClass('input-error');
    }
    if(isValid){
        $('.widget-container').fadeOut(400, function(){
            $(this).load(BASE_URL+'/widget/processing', function(){
                $('.widget-container').fadeIn(400);
                sendBookRequest(title, company, first_name, last_name, telephone, note);
            });
        });
    }
    
}

function voucherOpen() {
    parent.postMessage({"command":"both", "addClass":"widget-open fullw-widget", "removeClass":"widget-closed"}, '*');
    $(document.body).addClass('widget-open fullw-widget').removeClass('widget-closed');
    $(".widget-container").removeClass('booking').addClass('vouchers');

    $('.widget-container').fadeOut(300, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('/widget/allvouchers', function(){
                $('.widget-container').fadeIn(400);
            });
            nxt();
        });
    });
}

function selectVoucher(){
    $(".widget-container").removeClass('vouchers').addClass('voucherCheckout');
    $('.widget-container').fadeOut(300, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('voucher-checkout', function(){
                $('.widget-container').fadeIn(400);
            });
            nxt();
        });
    });
}


function selectPaymentMethod(el){

    if( $(el).hasClass('selected') ){
        return;
    }else {
        $(el).parent().find('.payment-method.selected').removeClass('selected');
        $(el).addClass('selected');
    }
}


function backToAllVouchers(){
    $(".widget-container").removeClass('voucherCheckout').addClass('vouchers');
    $('.widget-container').fadeOut(100, function(){
        $('.widget-container').delay(400).queue(function( nxt ) {
            $(this).load('/widget/allvouchers', function(){
                $('.widget-container').fadeIn('slow');
            });
            nxt();
        });
    });
}

function showSuggestion(){
    $(document.body).addClass('suggestion-open').removeClass('vouchers-active');
    parent.postMessage({"command":"addClass", "addClass":"suggestion-open"}, '*');
    $(".widget-container").addClass('suggestion');
    $('.widget-container').delay(100).queue(function( nxt ) {
        $('.booking-form-wrap').append(
            $('<div class="search-results"></div>').load('widget/suggestions', function(){
                $('.widget-container').fadeIn(100);
            })
        );
        nxt();
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
            timeSelect($('#time-option-0'));
        }
    });
}

function sendBookRequest(title, company, first_name, last_name, telephone, note){
    
    $.ajax({
        type: "POST",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: BASE_URL + "/widget/book-request",
        data: {
         _token : $('meta[name="csrf-token"]').attr('content'), 
         code : $('#restaurant_code').val(),
         date : date,
         number_of_people : number_of_people,
         time : time,
         title : title,
         company : company,
         first_name : first_name,
         last_name : last_name,
         email : checkout_email,
         telephone : telephone,
         note : note,
        },
        dataType: "text",
        success: function(resultData) {
            if (resultData == "success") {
                // alert(resultData);
                $('.widget-container').delay(1000).queue(function( nghfgxt ) {
                    $(this).load(BASE_URL+"/widget/confirm", function(){
                        $('.widget-container').fadeIn(400);

                        $('#checkout-date').html(SelectOutput);
                        $('#checkout-time').html(DisplayCurrentTime(new Date(date + " "+ time)));
                        $('#checkout-email').html(checkout_email);

                    });

                    nghfgxt();
                });
            }
            else{
                alert("Try again!");
            }
        }
    });
}
