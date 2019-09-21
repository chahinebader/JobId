$(document).ready(function(){
    $(".menu-icon").click(function(){
        $(".nav").fadeIn();

    });

    $(".close-icon").click(function(){
        $(".nav").fadeOut();

    });

    $( ".sidebar-open" ).click(function() {
        $( ".sidebar" ).css("left","0");

    });

    $( ".sidebar-close" ).click(function() {
        $( ".sidebar" ).css("left","-100%");
    });

    $(function () {

        $("#rateYo").rateYo({
            rating: 3.6
        });

    });


});
