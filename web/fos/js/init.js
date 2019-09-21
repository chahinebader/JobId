window.onload = function () {

    $('.carousel1').owlCarousel({
        loop: true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        margin: 0,
        nav: true,
        items: 1,
        itemsCustom: false,
        responsive: {
            0 : {
                items:1
            }
        }
    });




};


