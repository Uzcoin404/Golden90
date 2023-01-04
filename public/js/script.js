// $(function() {
//   $('a[href]').each(function() {
//     let url = $(this).attr('href');
//     $(this).attr('href', url.replace('https://182golden90.com', 'https://sports.' + window.location.host).replace('www.', ''));
//   })
// })
$('.mob-mainslider').slick({
    arrows: false,
    dots: false,
    speed: 300,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000
});

$('.mainslider').slick({
    autoplay: true,
    autoplaySpeed: 2000
});
$('.navigate-slider').slick({
    dots: false,
    arrows: false,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '60px',
        }
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '60px',
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
        }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$('.slider-cards').slick({
    dots: false,
    arrows: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 991,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
        }
    },
    {
        breakpoint: 767,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
        }
    },
    {
        breakpoint: 479,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '60px',
        }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});