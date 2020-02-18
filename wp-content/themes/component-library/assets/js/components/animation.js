$(document).ready(() => {
    const sr = ScrollReveal({reset: true});
    const duration = 1000;

    sr.reveal('.animate-in-up', {
        duration: duration,
        delay: 0,
        viewFactor: 0,
        origin: 'bottom',
        distance: '50px',
        reset: false,
        easing: 'ease-in-out',
        // mobile:false
    });
    sr.reveal('.animate-in-down', {
        duration: duration,
        delay: 125,
        viewFactor: 0,
        origin: 'top',
        distance: '100px',
        reset: false,
        easing: 'ease-in-out',
    });
    sr.reveal('.animate-in-left', {
        duration: duration,
        delay: 500,
        viewFactor: .3,
        origin: 'left',
        distance: '100px',
        reset: false,
        easing: 'ease-in-out',
    });
    sr.reveal('.animate-in-right', {
        duration: duration,
        delay: 500,
        viewFactor: .3,
        origin: 'right',
        distance: '100px',
        reset: false,
        easing: 'ease-in-out',
    });
    sr.reveal('.fade-in', {
        duration: duration,
        delay: 200,
        viewFactor: 0,
        reset: false,
        easing: 'ease-in-out',
        // mobile:false
    });
    sr.reveal('.fade-in-delay', {
        duration: duration,
        delay: 200,
        viewFactor: .3,
        origin: 'bottom',
        distance: '50px',
        reset: false,
        easing: 'ease-in-out',
        // mobile:false
    });
    sr.reveal('.card__grid .card__wrapper', {
        duration: duration,
        interval: 200,
        viewFactor: .3,
        origin: 'top',
        distance: '50px',
        reset: false,
        easing: 'ease-in-out',
        // mobile:false
    });
    sr.reveal('.section-gallery-slider .content__wrapper', {
        duration: duration,
        interval: 200,
        viewFactor: .3,
        origin: 'bottom',
        distance: '50px',
        reset: false,
        easing: 'ease-in-out',
        // mobile:false
    });
})
