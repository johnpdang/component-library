import accessibility from './accessibility';
import Dom from '../Utility/Dom';

// export default MobileMenu;

const MobileMenu = () => {
    var toggle = document.querySelector(".toggle");
    var mobileNav = document.querySelector(".navigation-mobile");
    var megaMenuLinks = mobileNav.querySelectorAll('.menu-item-has-children > a');

    function toggleAria(link) {
      const subMenuClose = link.nextElementSibling.childNodes[0];

      let aria = link.getAttribute('aria-expanded');

      if(aria == 'false'){
          link.setAttribute('aria-expanded', 'true');
          subMenuClose.setAttribute('aria-expanded', 'true');
      } else {
          link.setAttribute('aria-expanded', 'false');
          subMenuClose.setAttribute('aria-expanded', 'false');
      }
    }

    // Listen for click event on toggle var
    toggle.addEventListener('click', function() {
      // toggle class "active" on topNav var
      mobileNav.classList.toggle("active");
      for(var i = 0; i < megaMenuLinks.length; i++){
        const link = megaMenuLinks[i];
        const submenu = link.nextElementSibling;
        toggleAria(link);
        submenu.classList.remove('toggled');
      }
    }, false);

    // Handle sub-menu items
    for(var i = 0; i < megaMenuLinks.length; i++){
        const link = megaMenuLinks[i];
        const submenu = link.nextElementSibling;
        const linkClone = link.cloneNode(true);
        const subMenuCloseLi = document.createElement("li");
        subMenuCloseLi.appendChild(linkClone);
        subMenuCloseLi.classList.add('submenu-close');
        const subMenuClose = subMenuCloseLi.childNodes[0];

        // Set up aria attributes
        link.setAttribute('aria-expanded', 'false');
        subMenuClose.setAttribute('aria-expanded', 'false');
        link.id = 'menu-parent-'+(i+1);
        subMenuClose.id = 'menu-close-'+(i+1);
        submenu.setAttribute('aria-labelledby', link.id + ' ' + subMenuClose.id);

        submenu.insertBefore(subMenuCloseLi, submenu.childNodes[0]);

        link.addEventListener('click', function(e){
            e.preventDefault();

            submenu.classList.toggle('toggled');

            toggleAria(link);
        });

        subMenuClose.addEventListener('click', function(e){
          e.preventDefault();
          toggleAria(link);
          submenu.classList.toggle('toggled');
        })
    }
}

// mobileNav
// closeMobileNav
export default MobileMenu;
