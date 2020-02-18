import debouncer from '../Utility/debouncer';


$(document).ready(() => {
  const navScroll = () => {
      const scrollPos = $(window).scrollTop();
      if(scrollPos > 300){
        $('.site-header').addClass('scrolled');
      } else {
        $('.site-header').removeClass('scrolled');
      }
  }
  navScroll();

  $( window ).scroll( debouncer( function ( e ) {
      navScroll();
  }, 15 ) );
});
