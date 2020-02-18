import "babel-polyfill";
import './components/stickyFooter';
import slider from './components/Slider/slider';
import modal from './components/modal';
import accordion from './components/accordion';
import youtubeApi  from "./components/youtube-api";
import scrollTo from './components/scrollTo';
import mobileMenu from './components/mobilemenu';
import menuImages from './components/menuImages';
import animation from './components/animation';
import formButtonSVG from './components/formButtons';
import './components/navScroll';

// Use this file for all your js need
$(document).ready(() => {
   accordion();
   mobileMenu();
   menuImages();
   scrollTo();
   formButtonSVG();
   objectFitImages();
});
