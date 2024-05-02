$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        nav: true, 
        dots: false,
        stagePadding: 0,
        margin: 0,
        navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            700: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
        
        
    })
}
);