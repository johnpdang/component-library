import Dom from '../Utility/Dom';

// export default formButton;
const formButtonSVG = () => {
    var button = document.querySelectorAll('.gform_button.arrow-button');
    var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="12.815" height="11.223" viewBox="0 0 12.815 11.223"><g id="Group_2745" data-name="Group 2745" transform="translate(20516.5 -3281.293)"><g id="Group_750" data-name="Group 750" transform="translate(-20510 3282)"><line id="Line_17" data-name="Line 17" x2="5.608" y2="5.608" fill="none" stroke="#de3726" stroke-width="2"/><line id="Line_18" data-name="Line 18" y1="5.608" x2="5.608" transform="translate(0 4.2)" fill="none" stroke="#de3726" stroke-width="2"/></g><line id="Line_41" data-name="Line 41" x1="11" transform="translate(-20516.5 3286.9)" fill="none" stroke="#de3726" stroke-width="2"/></g></svg>';

    for(var i = 0; i < button.length; i++){
        $(button).append(svg);
    }
}

export default formButtonSVG;
