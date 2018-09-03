
function tableSidebarClose(){
    $('.table-sidebar-wrap').removeClass('opacity-1').addClass('opacity-0');
    $('.side-booking-option').removeClass('open').addClass('close');
}

$(document).ready(function(){
    $( ".side-booking-datepicker" ).datepicker({
        defaultDate: 0,
        minDate: 0,
        firstDay: 1,
        dateFormat: "d MM"
    }).datepicker("setDate", new Date());
    $( ".side-rsvp-option-datepicker" ).datepicker({
        defaultDate: 0,
        firstDay: 1,
        dateFormat: "M dd / yy"
    }).datepicker("setDate", new Date());

    $('.select2').select2();

    $('.select2-table').select2({
        placeholder: {
            id: '-1',
            text: 'Select table'
        }
    });
});
