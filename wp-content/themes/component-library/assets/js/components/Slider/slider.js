import Dom from '../../Utility/Dom';
import settings from './settings';
import debouncer from '../../Utility/debouncer';

const {heroSlide, oneSlide, twoSlide, threeSlide, fourSlide, fiveSlide } = settings

// SLIDER
Dom.instructorsSlider.slick(fourSlide)
Dom.introSlider.slick(oneSlide)
Dom.heroSlider.slick(heroSlide)
Dom.defaultSlider.slick(oneSlide)
Dom.blogEventsSlider.slick(threeSlide)
Dom.homeSlider.slick(heroSlide);


// For the home hero, we unslick at desktop sizes to handle sliding by scroll
function homeSliderResponsive() {
  if ($(window).width() > 767) {
    if (Dom.homeSlider.hasClass('slick-initialized')) {
      Dom.homeSlider.slick('unslick');
      scrollSliderAnimInit();
    }
  } else {
    if (!Dom.homeSlider.hasClass('slick-initialized')) {
      Dom.homeSlider.slick(heroSlide);
    }
    if($('html').hasClass('scroll-lock')){
      $('html').removeClass('scroll-lock');
    }
  }
}
homeSliderResponsive();

// Handle the scrolling animation of the home slider on desktop
// Function to set the limit on scrolling
// Used to calculate the animation progress percentage and to lock/unclock normal scrolling.
function getDeltaLimit(slider){
  // Change the scroll speed based on if it's a touch device, a mac or a pc
  const isMac = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);
  let deltaLimit;
  if ($(slider).hasClass('touchmove')){
    deltaLimit = -400;
  }
  else if (isMac){
      deltaLimit = -45;
  }
  else {
      deltaLimit = -20;
  }

  return deltaLimit;
}

// Function to get current delta scroll progress
function getCurrentDelta(element){
  const deltaLimit = getDeltaLimit(element);
  const progress = $(element).attr('data-progress');
  let delta = deltaLimit * progress;
  $(element).attr('data-delta', delta);
  //let delta = parseInt($(element).attr('data-delta'));
  // if(!delta){
  //   delta = 0;
  //   $(element).attr('data-delta', delta);
  // }
  return delta;
}

function getWindowScroll(){
  const windowScroll = $(window).scrollTop();
  return windowScroll;
}

function getTouchCompare(element){
  let touchCompareY = parseInt($(element).attr('data-touch-compare-y'));
  let startingY;
  if(touchCompareY){
    startingY = touchCompareY;
  } else {
    startingY = parseInt($(element).attr('data-touch-start-y'));
  }
  let touchCompareX = parseInt($(element).attr('data-touch-compare-x'));
  let startingX;
  if(touchCompareX){
    startingX = touchCompareX;
  } else {
    startingX = parseInt($(element).attr('data-touch-start-x'));
  }

  let touchCompare = {
    "x" : startingX,
    "y" : startingY
  }

  return touchCompare;
}

// On page load, add scroll-lock class to html to initially prevent scrolling
if($('.home-hero').length && $(window).innerWidth() > 767){
  // $('html').addClass('scroll-lock');
}

function scrollSliderAnimInit() {
  if($(window).innerWidth() > 767){
    const homeSlider = document.getElementById('home-hero');
    if(homeSlider){
      let windowScroll = getWindowScroll();
      let progress = $(homeSlider).attr('data-progress');
      if(!progress){
        $(homeSlider).attr('data-progress', 0);
      }
      let deltaLimit = getDeltaLimit(homeSlider);
      let delta = getCurrentDelta(homeSlider);

      // If we're at the top of the page, run the homeSliderDelta() function
      if(windowScroll <= 0) {
        scrollLockClass(homeSlider);
        if(delta > deltaLimit){
          //$('html').addClass('scroll-lock');
        }
        if (homeSlider.addEventListener) {
        	// IE9, Chrome, Safari, Opera
        	homeSlider.addEventListener("mousewheel", homeSliderDelta, false);
        	// Firefox
        	homeSlider.addEventListener("DOMMouseScroll", homeSliderDelta, false);
        }
        // IE 6/7/8
        else homeSlider.attachEvent("onmousewheel", homeSliderDelta);

        // Touch screen support
        // First, set the start of the touch, to measure if we're going up or down
        $(homeSlider).on("touchstart", function(e) {
            const startingY = e.originalEvent.touches[0].pageY;
            const startingX = e.originalEvent.touches[0].pageX;
            $(homeSlider).attr('data-touch-start-y', startingY).attr('data-touch-start-x', startingX).addClass('touchmove');
        });

        $(homeSlider).on("touchmove", function(e) {
            // update the window scroll variable
            windowScroll = getWindowScroll();
            deltaLimit = getDeltaLimit(homeSlider);
            delta = getCurrentDelta(homeSlider);

            // kill scrolling until you've reached the end of the delta limit
            if(windowScroll == 0 && delta > deltaLimit) {
              if(e.cancelable){
                e.preventDefault();
              }
            }
            // Set the comparison variable that will help to tell if we're scrolling up or down.
            let touchCompare = getTouchCompare(homeSlider);

            // Then, get the current y position of the touchmove event
            let currentY = e.originalEvent.touches[0].pageY;
            let currentX = e.originalEvent.touches[0].pageX;

            // Determine the dominant swipe direction to measure against.
            let direction;
            let difY = Math.abs(currentY - touchCompare.y);
            let difX = Math.abs(currentX - touchCompare.x);
            if (difY > difX && difY > 5){
              direction = 'vertical';
            } else if(difX > difY && difX > 5){
              direction = 'horizontal';
            }

            // Once a direction is determined, set the delta variables and run the homeSliderDelta() function.
            if(direction) {
              // Compare against eachother to decide if we're moving the animation forward or backward
              let touchDelta;
              if(direction == 'vertical'){
                touchDelta = (currentY - touchCompare.y) * .5;
              } else {
                touchDelta = (currentX - touchCompare.x) * .5;
              }

              // determine if we're scrolling down (progressing the animation forward)
              let upDown;
              if(touchDelta < 0){
                upDown = 'down';
              } else {
                upDown = 'up';
              }

              // Now reset the comparison variable to compare against
              $(homeSlider)
                .attr('data-touch-compare-y', currentY)
                .attr('data-touch-compare-x', currentX)
                .attr('data-touch-delta', touchDelta);

              // If we're not at the end of the delta limit, animate
              if(windowScroll <= 0 && !(touchDelta == deltaLimit && upDown == 'down')) {
                homeSliderDelta();
              }
            }

        });
        $(homeSlider).on("touchend", function(e){
          scrollLockClass(homeSlider);

          $(homeSlider)
            .removeClass('touchmove')
            .attr('data-touch-compare-y', '')
            .attr('data-touch-compare-x', '');
            deltaLimit = getDeltaLimit(homeSlider);
        });


      }
      // Else, if not at the top of the page, scroll as normal and remove the event listener
      else {
        $('html').removeClass('scroll-lock');
        if (homeSlider.addEventListener) {
        	// IE9, Chrome, Safari, Opera
        	homeSlider.removeEventListener("mousewheel", homeSliderDelta, false);
        	// Firefox
        	homeSlider.removeEventListener("DOMMouseScroll", homeSliderDelta, false);
        }
        // IE 6/7/8
        else homeSlider.detachEvent("onmousewheel", homeSliderDelta);

        // make sure to set the animation to the end if the page is refreshed down the page, or the scroll button is clicked
        scrollSliderComplete(homeSlider, deltaLimit);
      }
    }
  }
}
scrollSliderAnimInit();

// Function to handle the delta position of the mousewheel event, to control the animation progress
function homeSliderDelta(e){
  const homeSlider = $('.hero.hero-home');
  let windowScroll = getWindowScroll();
  let deltaLimit = getDeltaLimit(homeSlider);
  let currentDelta = getCurrentDelta(homeSlider);
  // cross-browser wheel delta
  var e = window.event || e; // old IE support
  let delta = parseInt(Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail))));
  if($(homeSlider).hasClass("touchmove")){
    delta = delta + parseInt($(homeSlider).attr('data-touch-delta'));
  }

  currentDelta = currentDelta + delta;

  if(currentDelta > 0){
    currentDelta = 0;
  }
  // If we scroll past the limit, scroll the window to 1 pixel down to break out of the mousewheel event, and set the current delta back to the limit
  if(currentDelta < deltaLimit){
    //$(window).scrollTo(1,0);
    currentDelta = deltaLimit;
  }
  let progress = currentDelta / deltaLimit;
  $(homeSlider).attr('data-progress', progress);
  $(homeSlider).attr('data-delta', currentDelta);

  scrollSliderAnimation(homeSlider, currentDelta, deltaLimit);

  scrollLockClass(homeSlider);

  return false;
}

// Function to handle the actual animation based on the delta position
function scrollSliderAnimation(element, currentDelta, deltaLimit) {
  const sliderHeading = $(element).find('h1');
  const sliderTrack = $(element).find('.hero-background__slider');
  const scrollPercent = (currentDelta / deltaLimit) * -1;

  const heading = {
    "elem"        : sliderHeading,
    "width"       : $(sliderHeading).outerWidth(),
    "left"        : parseInt($(sliderHeading).css("left")),
  }

  const track = {
    "elem"        : sliderTrack,
    "width"       : $(sliderTrack).outerWidth(),
  }

  const headingPos = Math.round(((heading.width + heading.left) - ($(window).innerWidth() - heading.left)) * scrollPercent);
  const trackPos = Math.round((track.width - $(window).innerWidth()) * scrollPercent);

  heading.elem.css("transform", "translate("+headingPos+"px, 0)");
  track.elem.css("transform", "translate("+trackPos+"px, 0)");
}

// Function to auto complete the animation
// function scrollSliderComplete(element, deltaLimit) {
function scrollSliderComplete(element) {
  // if(deltaLimit > -0){
  //   deltaLimit = deltaLimit * -1;
  // }
  // if($(element).attr('data-delta') !== deltaLimit){
  //   $(element).attr('data-delta', deltaLimit);
  //   scrollSliderAnimation(element, deltaLimit, deltaLimit);
  // }

  // set a class for smooth transition of slider elements
  $(element).addClass('auto-scrolling');
  setTimeout(function(){
    $(element).removeClass('auto-scrolling');
  }, 1000);

  $(element).attr('data-progress', 1);
  scrollSliderAnimation(element, 100, 100);

  if($('html').hasClass('scroll-lock')){
    $('html').removeClass('scroll-lock');
  }
}

// When the user clicks the scroll button, set the animation to the end and remove the scroll-lock class
$('.home .scroll-to button').click(function(e){
  this.blur();
  const slider = $('.hero-home');
  const deltaLimit = getDeltaLimit(slider);
  // scrollSliderComplete(slider, deltaLimit);
  scrollSliderComplete(slider);
});

// Function to prevent/resume normal scrolling behavior
function scrollLockClass(element) {
  let deltaLimit = getDeltaLimit(element);
  let delta = getCurrentDelta(element);
  let windowScroll = getWindowScroll();

  if(windowScroll == 0 && delta > deltaLimit){
    $('html').addClass('scroll-lock');
  }
  else {
    $('html').removeClass('scroll-lock');
  }
}

function isScrollLock(element) {
  let scrollStatus;
  if($(element).hasClass('scroll-lock')){
    scrollStatus = true;
  }
  else {
    scrollStatus = false;
  }
  return scrollStatus;
}

$(window).on('resize', function() {
  homeSliderResponsive();
});

$( window ).scroll( debouncer( function ( e ) {
    scrollSliderAnimInit();
}, 15 ) );
