document.addEventListener('DOMContentLoaded', () => {
    $('.owl-carousel').owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        nav: true,
        dots: false,
        stagePadding: 0,
        margin: 0,
        lazyLoadEager: 1,
        autoPlayHoverPause: true,
        navText: [
            "<i class='fa-solid fa-angle-left'></i>",
            "<i class='fa-solid fa-angle-right'></i>"
        ],

    });
});
