function ini_on_demand() {

     if (jQuery('.responsive').length > 0) {
     jQuery('.responsive').slick({
        // dots: true,
        infinite: true,
        speed: 300,
        prevArrow: false,
        slidesToShow: 12,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 2,
                // centerMode: true,
            }

        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 2,
                dots: true,
                infinite: true,

            }


        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2,
                dots: true,
                infinite: true,
                
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
            }
        }]
    });
}

    if (jQuery(".formvalidate").length > 0) {
        jQuery(".formvalidate").validate({
            rules: {
                'cardsdetails[credit_card]' : {
                    required: true,
                    creditcard: true
                }
            }
        });
        jQuery('#expiration_date').inputmask("99/9999");
        jQuery('#cvv').inputmask("999");
    }

    if (jQuery(".formbasicvalidate").length > 0) {
        jQuery(".formbasicvalidate").validate();
    }







}


function slots_slider() {
    if (jQuery('.responsive_1').length > 0) {

        jQuery('.responsive_1').slick({
        // dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 12,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 2,
                // centerMode: true,
            }

        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 2,
                dots: true,
                infinite: true,

            }


        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2,
                dots: true,
                infinite: true,
                
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2000,
            }
        }]
    });


    }
}