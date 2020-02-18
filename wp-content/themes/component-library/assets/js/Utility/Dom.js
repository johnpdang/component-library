const Dom = {
    'body'              : $('body'),

    // accesibility
    'focusable'         : ["a[href]", " area[href]", " input:not([disabled])", " select:not([disabled])", " textarea:not([disabled])", " button:not([disabled])", "object", "embed", " *[tabindex]", " *[contenteditable]", '*[data-notab]'],

    // Accordion
    'accordionHeader'   : $('.accordion__header'),
    'accordionBody'     : $('.accordion__body'),
    'toggleVidSrc'      : $('[data-toggle-src]'),

    // Modal
    'modalTrigger'      : $('[modal-target]'),
    'closeModal'        : $('[data-dismiss="modal"]'),
    'bntGroup'          : $('.close-btn-group'),
    'closeButton'       : $('[close-button]'),

    // Slider
    'instructorsSlider' : $('[js-instructors-slider]'),
    'introSlider'       : $('[js-intro-slider]'),
    'heroSlider'        : $('[js-hero-slider]'),
    'homeSlider'        : $('[js-home-hero-slider]'),
    'defaultSlider'     : $('[js-slider]'),
    'blogEventsSlider'  : $('[js-blog-events-feed]')
}

export default Dom;
