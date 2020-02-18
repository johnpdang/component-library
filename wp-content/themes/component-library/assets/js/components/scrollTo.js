import accessibility from './accessibility';
import Dom from '../Utility/Dom';
import debouncer from '../Utility/debouncer';

// export default ScrollTo;
const ScrollTo = () => {
        $('.scroll-to')
                .eq(0)
                .click(() => {
                        $('html, body').animate(
                                {
                                        scrollTop: $('.page-intro')
                                                .eq(0)
                                                .offset().top,
                                },
                                100
                        );
                });

        // For home slider, make sure scroll to button doesn't go behind footer signup bar
        function homeHeroScrollLink() {
                const homeHero = $('.sticky-footer-active .hero.hero-home');
                const homeScroll = $('.home .scroll-to');

                if (homeHero.length) {
                        const heroBottom = $(homeHero).offset().top + $(homeHero).outerHeight();
                        const stickyFooter = $('.sticky-footer-active .sticky__footer__wrap').offset().top;
                        // console.log(`stickyFooter offset: ${stickyFooter}`);
                        // console.log(`heroBottom: ${heroBottom}`);

                        if (stickyFooter < heroBottom) {
                                const linkPos = heroBottom - stickyFooter;
                                $(homeScroll).css('bottom', linkPos);
                        } else {
                                $(homeScroll.css('bottom', 0));
                        }
                }
        }

        // On page load, wait a moment to check positioning
        setTimeout(function() {
                homeHeroScrollLink();
        }, 300);

        $(window).scroll(
                debouncer(function(e) {
                        homeHeroScrollLink();
                }, 20)
        );

        $(window).resize(
                debouncer(function(e) {
                        homeHeroScrollLink();
                }, 20)
        );
};
export default ScrollTo;
