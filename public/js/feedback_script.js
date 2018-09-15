
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
        $("#regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

$('.range-slide').rangeslider({
    polyfill: false,
    // onInit: function() {
    //     if (this.value <= 3) {
    //         this.parentNode.classList.add("red");
    //         this.parentNode.classList.remove("normal","green");
    //     }else if (this.value >= 4 && this.value <= 6) {
    //         this.parentNode.classList.add("normal");
    //     }else if(this.value >= 7){
    //         this.parentNode.classList.add("green");
    //     }
    // }
}).on('input', function(e) {
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

        $(".select-language-btn img").attr('src', 'img/flags/' + flagName + '.svg');
    });




});
