import debouncer from '../Utility/debouncer';
$(document).ready(() => {

    const stickyFooterVisiblity = () => {
        let scrollPosition = $(document).scrollTop() + $(window).height();
        let pageBottom = $(document).height() - 900;
        const stickyFooter = $('.sticky__footer');
        if(scrollPosition > pageBottom){
            $(stickyFooter).addClass('sticky-hidden');
        } else {
            $(stickyFooter).removeClass('sticky-hidden');
        }
    }
    stickyFooterVisiblity();

    $('.sticky__footer__close').click(function(e){
        e.preventDefault();
        $('.sticky__footer').slideUp();
        document.cookie = "signupformclosed=true;path=/";
        $('body').removeClass('sticky-footer-active');

        // On homepage, remove css from home scroll button
        if($('body.home').length){
          $('.scroll-to').css('bottom', '');
        }
    });

    $( window ).scroll( debouncer( function ( e ) {
        stickyFooterVisiblity();
    }, 20 ) );

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    if (getCookie('signupformclosed') !== 'true') {
      $('.sticky__footer').slideDown();
      $('body').addClass('sticky-footer-active');
    };
});
