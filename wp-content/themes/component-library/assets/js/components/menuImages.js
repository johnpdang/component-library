import accessibility from './accessibility';
import Dom from '../Utility/Dom';

const menuImages = () => {
    const menuItems = $('.main-navigation .sub-menu li');

    let imageLoader,
        image,
        alt,
        imageContainer;

    // Set up an image container to put the images in
    $('.mega-menu-image-column').each(function(){
        $(this).append('<div class="image-container"></div>');
        $(this).find('a, ul').remove();
    });

    // Loop through each sub-menu item, and if it has an image associated with it, create the image element.
    menuItems.each(function(index, element){
        $(element).attr('data-menu-index', index);

        imageLoader = $(element).children('a').children('.menu-item-image-loader');
        imageContainer = $(element).closest('.mega-menu').find('.image-container');

        if($(imageLoader).length){
            $(element).addClass('menu-item-has-image');
            image = $(imageLoader).attr('data-image');
            alt = $(imageLoader).attr('data-alt');
            $(imageContainer).append('<img src="'+image+'" alt="'+alt+'" data-menu-item="'+index+'"/>');
        }
    });

    // Set active state for first image in each menu, so non active images can be hidden with css
    $('.image-container').each(function(){
        $(this).children('img:first-child').addClass('active');
    });

    // Hover event to display the correct image
    $('body').on('mouseenter touch', '.main-navigation .menu-item-has-image', function(){
        imageContainer = $(this).closest('.mega-menu').find('.image-container');
        let index = $(this).attr('data-menu-index');
        image = $(imageContainer).find('img[data-menu-item="'+index+'"]');
        if(! $(image).hasClass('active')){
            $(imageContainer).find('img.active').removeClass('active');
            $(image).addClass('active');
        }
    });
}

export default menuImages;
