// import Dom from '../Utility/Dom';
// import accessibility from './accessibility';
//
// const { accModal } = accessibility;
//
// const Modal = () => {
//     Dom.modalTrigger.on('click keypress', e => {
//         e.preventDefault();
//         if(e.type === 'click' || e.key === 'Enter' ){
//             let target = $(e.currentTarget).attr('modal-target');
//             $(`#${target}`).addClass('active').attr('aria-hidden', 'false').attr('tabindex','1')
//             Dom.body.addClass('scroll-lock modal-active');
//             // Handles trapping focus in modal
//             accModal.open($(`#${target}`))
//         }
//     });
//
//     Dom.closeModal.on('click keypress', e => {
//         if(e.key === 'Enter' || e.type === 'click'){
//             let target = $(e.currentTarget).data('target');
//             $(`${target}`).removeClass('active').attr('aria-hidden', 'true').attr('tabindex','-1');
//             Dom.body.removeClass('scroll-lock modal-active');
//
//             // Handles un-trapping focus in modal
//             accModal.close($(`${target}`));
//
//             if(e.key === 'Enter'){
//                 const dataTarget = target.split('#')[1];
//                 $(`[modal-target="${dataTarget}"]`).focus();
//             }
//         }
//     });
//
//     // Handles focus states
//     Dom.btnGroup.focus((e) => { $(e.currentTarget).find(Dom.closeButton).addClass('hover-active') });
//     Dom.btnGroup.focusout((e) => { $(e.currentTarget).find(Dom.closeButton).removeClass('hover-active') });
//
//     Dom.btnGroup.hover(
//         // On hover add this class
//         (e) => { $(e.currentTarget).find(Dom.closeButton).addClass('hover-active'); },
//         // on hover exit remove this class
//         (e) => {
//             $(e.currentTarget).find(Dom.closeButton).removeClass('hover-active');
//         }
//     )
// }
//
// export default Modal;


import Modal from './accessibility';
import Dom from '../Utility/Dom';
$(document).ready(() => {
    // MODAL
    const modalTrigger = $(Dom.modalTrigger);
    const closeModal   = $('[data-dismiss="modal"]');
    const btnGroup     = $(Dom.btnGroup);
    const closeButton  = $(Dom.closeButton);
    const bodyElem     = $(Dom.body);
    Dom.modalTrigger.on('click keypress', e => {
        e.preventDefault();
        if(e.type === 'click' || e.key === 'Enter' ){
            let target = $(e.currentTarget).attr('modal-target');
            $(`#${target}`).addClass('active').attr('aria-hidden', 'false').attr('tabindex','1')
            bodyElem.addClass('scroll-lock modal-active');

            // Handles trapping focus in modal
            //Modal.open($(`#${target}`));

            if ($(`#${target}`).find('iframe').length) {
               var _modalFrame = $(`#${target}`).find('iframe');
               _modalFrame[0].src += '&autoplay=1';
            }

            if ($(`#${target}`).find('video').length) {
               var _modalVideo = $(`#${target}`).find('video');
               _modalVideo[0].play();
            }
        }
    });

    closeModal.on('click keypress', e => {
        if(e.key === 'Enter' || e.type === 'click'){
            e.preventDefault();
            let target = $(e.currentTarget).data('target');
            $(`${target}`).removeClass('active').attr('aria-hidden', 'true').attr('tabindex','-1');
            bodyElem.removeClass('scroll-lock modal-active');

            // Handles un-trapping focus in modal
            //Modal.close($(`${target}`));

            if(e.key === 'Enter'){
                const dataTarget = target.split('#')[1];
                $(`[modal-target="${dataTarget}"]`).focus();
            }
            if ($(`${target}`).find('iframe').length) {
              // reset the iframe src to stop iframe playing
              var _modalFrame = $(`${target}`).find('iframe');
              var src = _modalFrame.attr('src');

              var newsrc = src.replace('&autoplay=1', '');
              $(`${target}`).find('iframe').attr('src', newsrc);
            }

            if ($(target).find('video').length) {
               var _modalVideo = $(target).find('video');
               _modalVideo[0].pause();
            }
        }
    });

    // Handles focus states
    btnGroup.focus((e) => { $(e.currentTarget).find(closeButton).addClass('hover-active') });
    btnGroup.focusout((e) => { $(e.currentTarget).find(closeButton).removeClass('hover-active') });

    btnGroup.hover(
        // On hover add this class
        (e) => { $(e.currentTarget).find(closeButton).addClass('hover-active'); },
        // on hover exit remove this class
        (e) => {
            $(e.currentTarget).find(closeButton).removeClass('hover-active');
        }
    )

});
