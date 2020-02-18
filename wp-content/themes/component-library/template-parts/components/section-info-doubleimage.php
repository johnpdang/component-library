<?php
/** Section Information
 *
 * Important to note for CSS Class names:
 *  - $column_type will control the layout. Values are the following:
 *      - text_left: this should set the text content in the left column and the image in the right column.
 *      - text_right: this should set the image in the left column and the text content in the right column.
 *
 *
 *
 *
 *
 *
*/
?>


<?php
    $pid = get_the_ID();
    $output;
    global $footer_modals_array;

    // This is repeater
    if(have_rows('2_column_layout')):
        while(have_rows('2_column_layout')): the_row();
            $section_type = get_sub_field('choose_layout');
            $section_class = get_sub_field('class_name');

            $output .= '<section class="section-info ' . $section_class . '" nav-item="grid">
            <div class="container__xl">
            <div class="row">';

            switch($section_type):
                case 'two-col-text-image' :
                    if(have_rows('2_col_image_text')):
                        while(have_rows('2_col_image_text')): the_row();
                            $column_type = get_sub_field('column_type');
                            // HTML Wrapper for the section goes here
                            $output .= '<div class="row ' . $column_type . '">';
                            // This is a group
                            if(have_rows('text_column')):
                                while(have_rows('text_column')): the_row();
                                    $text_eyebrow  = get_sub_field('eyebrow');
                                    $text_title    = get_sub_field('title');
                                    $text_content  = get_sub_field('content');
                                    $text_cta      = get_sub_field('cta');
                                endwhile;
                            endif;

                            // This is a group
                            if(have_rows('image_column')):
                                while(have_rows('image_column')): the_row();
                                    $featured_image = get_sub_field('featured_image');
                                endwhile;
                            endif;

                            $output .= '<div class="grid-item text-content col-lg-6">';
                                if($text_eyebrow):
                                $output .= '<h6 class="eyebrow">' . $text_eyebrow . '</h6>';
                                endif;
                                $output .= '<h2 class="column-title">' . $text_title . '</h2>
                                ' . $text_content . '';
                                $output .= '<a class="button cta_link" href="' . $text_cta['url'] . '" target="' . $text_cta['target']  . '">' . $text_cta['title'] . '</a>
                                    </div>
                                <div class="grid-item image-content col-lg-6">
                                    <figure class="image__wrapper">
                                        <img src="' . $featured_image['url'] . '" alt="' . $featured_image['alt'] . '">
                                    </figure>
                                </div>
                            </div>
                            ';
                        endwhile;
                    endif;
                break;

                case 'two-col-text-slider':
                    if(have_rows('2_col_image_slider')):
                        while(have_rows('2_col_image_slider')): the_row();
                            // HTML Wrapper for the section goes here
                            $output .= '<div class="flex-grid two-col-with-slider">';
                                // TEXT COLUMN
                                if(have_rows('text_row')):
                                    while(have_rows('text_row')): the_row();
                                        $text_eyebrow = get_sub_field('eyebrow');
                                        $text_title   = get_sub_field('header');
                                        $text_content = get_sub_field('copy');

                                        $output  .= '
                                            <div class="content__wrapper">
                                                <div class="left-column">
                                                    <h6 class="eyebrow">' . $text_eyebrow . '</h6>
                                                    <h2 class="column-title">' . $text_title . '</h2>
                                                </div>
                                                <div class="right-column">
                                                    <p class="column-content">' . $text_content . '</p>
                                                </div>
                                            </div>
                                        ';
                                    endwhile;
                                endif;
                            // SLIDER
                            $gallery_images = get_sub_field('slide_gallery');
                            $enable_lightbox = get_sub_field('enable_lightbox')[0] == 'enable' ? true : false ;

                            if($gallery_images):
                                $output .= '<div class="container section-slider" js-slider >';
                                if($enable_lightbox):
                                    foreach($gallery_images as $image):
                                        $modal_image = $image['sizes']['large'];
                                        $output .= '
                                            <div class="gallery-image__lightbox">
                                                <button class="btn btn-plus-icon"  modal-target="'. $image['title'] . '">+</button>
                                                <figure class="gallery-image">
                                                    <img src="' . $image['sizes']['large'] . '" alt="' . $image['alt'] . '" />
                                                </figure>
                                            </div>
                                        ';

                                        $modal = array('title' => $image['title'], 'image' => $modal_image);
                                        array_push($footer_modals_array, render_modal($modal));
                                    endforeach;
                                else:
                                    foreach($gallery_images as $image):
                                        $output .= '
                                            <figure class="gallery-image">
                                                <img src="' . $image['sizes']['large'] . '" alt="' . $image['alt'] . '" />
                                            </figure>
                                        ';
                                    endforeach;
                                endif;

                                $output .= '</div>';

                            endif;

                            $output .= '</div>';
                        endwhile;
                    endif;

                break;

                case 'two-col-text-doubleimage':
                    if(have_rows('2_col_imagebg_text')):
                        while(have_rows('2_col_imagebg_text')): the_row();
                            $column_type = get_sub_field('column_type');
                            // HTML Wrapper for the section goes here
                            $output .= '<div class="grid-container col-sm-12 col-md-12 col-lg-6 ' . $column_type . '">';
                            // This is a group
                            if(have_rows('text_column')):
                                while(have_rows('text_column')): the_row();
                                    $text_eyebrow  = get_sub_field('eyebrow');
                                    $text_title    = get_sub_field('title');
                                    $text_content  = get_sub_field('content');
                                    $text_cta      = get_sub_field('cta');

                                    $icons_html;
                                    if(have_rows('icons')):
                                        $icons_html = '<div class="icon__wrapper">';

                                        while(have_rows('icons')): the_row();
                                            $icon_image = get_sub_field('icon_image');
                                            $icon_title = get_sub_field('icon_title');
                                            $icon_url = get_sub_field('icon_url');

                                            if($icon_image && $icon_title):
                                                $icons_html .= '
                                                    <figure class="icon icon__content">
                                                        <a href="' . $icon_url . '" title="">
                                                            <img src="' . $icon_image['url'] . '" alt="' . $icon_title . '" />
                                                            <figcaption>' . $icon_title . '</figcaption>
                                                        </a>
                                                    </figure>
                                                ';
                                            endif;
                                        endwhile;
                                        $icons_html .= '</div>';
                                    endif;
                                endwhile;
                            endif;

                            // This is a group
                            if(have_rows('image_column')):
                                while(have_rows('image_column')): the_row();
                                    $bg_image = get_sub_field('background_image');
                                    $fg_image = get_sub_field('animated_foreground_image');
                                    $arrow_right = traina_get_svg_icon("white-arrow-small", false);
                                    $svg_url = get_sub_field('svg_url');
                                endwhile;
                            endif;

                            $output .= '
                                <div class=" grid-item image-content">
                                    <figure class="image__wrapper image__bg">
                                        <img src="' . $bg_image['url'] . '" alt="' . $bg_image['alt'] . '">
                                    </figure>

                                </div>

                                <div class="grid-item text-content">
                                  <div class="content__wrapper animate-in-down">';
                                  if($text_eyebrow):
                                      $output .= '<h6 class="eyebrow">' . $text_eyebrow . '</h6>';
                                  endif;

                                  $output .=
                                      '<h2 class="column-title">' . $text_title . '</h2>
                                      <p class="column-content">' . $text_content . '</p>';

                                      if($text_cta):
                                        $output .=
                                        '<a class="button cta_link" href="' . $text_cta['url'] . '" target="' . $text_cta['target']  . '">' . $text_cta['title'] . '</a>';
                                    endif;
                                    $output .=
                                      '</div>
                                      <figure class="image__wrapper image__fg animate-in-up fade-in-delay">
                                          <img src="' . $fg_image['url'] . '" alt="' . $fg_image['alt'] . '">
                                      </figure>';

                                if($svg_url):
                                    // In the custom field area under admin, the SVG is selected
                                    // under 'svg URL'. Only the link is selected, and the svg is
                                    // imported from the icon-store.php
                                    $output .=
                                    '<a href="' . $svg_url . '" title="">' . $arrow_right . '</a>';
                                endif;

                                $output .=
                                    $icons_html .
                                '</div>';
                $output .= '</div>
                            ';
                        endwhile;
                    endif;
                break;

            endswitch;

            $output .= '</div>
            </div>
            </section>';
        endwhile;

        echo $output;
    endif;
?>
