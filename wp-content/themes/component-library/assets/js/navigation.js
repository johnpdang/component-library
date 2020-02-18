// /* global trainaScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function($) {
    var masthead, menuToggle, siteNavContain, siteNavigation;

    function initMainNavigation(container) {
        container.find('.has-mega-menu > a').attr('aria-expanded', 'false').next('.sub-menu').addClass('mega-menu');

        container.find('.has-mega-menu > a').click(function(e) {
            var _this = $(this),
                _parent = $(this).parent('.has-mega-menu');
            // var screenReaderSpan = _this.find('.screen-reader-text');

            e.preventDefault();
            _this.blur();
            _this.toggleClass('toggled-on');
            _this.next('.children, .sub-menu').toggleClass('toggled-on');

            _this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
            // screenReaderSpan.text(screenReaderSpan.text() === trainaScreenReaderText.expand ? trainaScreenReaderText.collapse : trainaScreenReaderText.expand);

            // Close other menus that may be open
            container.find('.has-mega-menu').not(_parent).each(function(e){
                var _this = $(this);
                _this.children('a, .children, .sub-menu').removeClass('toggled-on');
                _this.children('a').attr('aria-expanded', 'false');
            });

            // Toggle container class
            if(container.find('.mega-menu.toggled-on').length){
              container.addClass('mega-menu-active');
            } else {
              container.removeClass('mega-menu-active');
            }
        });

        // Allow for user to click off the menu to close the mega menu
        $('body').on('click keydown', function(e){

            // return if mega menu isn't open
            if(!$('.main-navigation').hasClass('mega-menu-active') || (e.type == 'keydown' && e.keyCode != 27)){
                return;
            }

            var target = e.target;

            if(! $('.main-navigation').find(target).length || (e.type == 'keydown' && e.keyCode == 27)){
                container.removeClass('mega-menu-active')
                .find('.has-mega-menu > a').attr('aria-expanded', 'false').removeClass('toggled-on')
                .next('.children, .sub-menu').removeClass('toggled-on');
            };
        });

        // Fix menu classes to not include current-... if the current menu item is a button, instead of a list item menu link (e.g. Join Today)
        container.find('li.current-menu-item.btn').each(function(){
          var _this = $(this),
              _topLevelParent = _this.closest('.mega-menu').parent('li');

          // if there are no other menu items that have the current class, remove the current class from the top level li
          if(!_topLevelParent.find('.current-menu-item').not(_this).length){
            _topLevelParent.removeClass('current-menu-ancestor');
          }
        });
    }
    initMainNavigation($('.main-navigation'));

    masthead = $('#masthead');
    menuToggle = masthead.find('.menu-toggle');
    siteNavContain = masthead.find('.main-navigation');
    siteNavigation = masthead.find('.main-navigation > div > ul');
    mobileNav = masthead.find('.mobile-navigation');

    // Enable menuToggle.
    (function() {

        // Return early if menuToggle is missing.
        if (!menuToggle.length) {
            return;
        }

        // Add an initial value for the attribute.
        menuToggle.attr('aria-expanded', 'false');

        menuToggle.on('click.traina', function() {
            mobileNav.toggleClass('toggled-on');
            menuToggle.toggleClass('toggled-on');
            menuToggle.find('.toggle').blur();
            menuToggle.find('span').fadeToggle();

            $(this).attr('aria-expanded', mobileNav.hasClass('toggled-on'));
        });
    })();

    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
    (function() {
        if (!siteNavigation.length || !siteNavigation.children().length) {
            return;
        }

        // Toggle `focus` class to allow submenu access on tablets.
        function toggleFocusClassTouchScreen() {
            if ('none' === $('.menu-toggle').css('display')) {

                $(document.body).on('touchstart.traina', function(e) {
                    if (!$(e.target).closest('.main-navigation li').length) {
                        $('.main-navigation li').removeClass('focus');
                    }
                });

                siteNavigation.find('.menu-item-has-children > a, .page_item_has_children > a')
                    .on('touchstart.traina', function(e) {
                        var el = $(this).parent('li');

                        if (!el.hasClass('focus')) {
                            e.preventDefault();
                            el.toggleClass('focus');
                            el.siblings('.focus').removeClass('focus');
                        }
                    });

            } else {
                siteNavigation.find('.menu-item-has-children > a, .page_item_has_children > a').unbind('touchstart.traina');
            }
        }

        if ('ontouchstart' in window) {
            $(window).on('resize.traina', toggleFocusClassTouchScreen);
            toggleFocusClassTouchScreen();
        }

        siteNavigation.find('a').on('focus.traina blur.traina', function() {
            $(this).parents('.menu-item, .page_item').toggleClass('focus');
        });
    })();
})(jQuery);
