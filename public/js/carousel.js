document.addEventListener('DOMContentLoaded', () => {
    $('.owl-carousel').owlCarousel({
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
    });

    setTimeout(() => {
        document.querySelectorAll('.owl-prev, .owl-next').forEach(button => {
            button.setAttribute('role', 'button');
            button.setAttribute('aria-label', button.classList.contains('owl-prev') ? 'Deslizar hacia atrás' : 'Deslizar hacia adelante');
        });
    }, 100);
});
