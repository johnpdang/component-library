<?php 

    $column_type = get_sub_field('column_type');
    // HTML Wrapper for the section goes here
    $two_col_html .= '<div class="flex-grid ' . $column_type . '">';
    // This is a group
    if(have_rows('text_column')){
        while(have_rows('text_column')){
            the_row();
            $eyebrow  = get_sub_field('eyebrow');
            $title    = get_sub_field('title');
            $content  = get_sub_field('content');
            $cta      = get_sub_field('cta');
        }
    }

    // This is a group
    if(have_rows('image_column')){
        while(have_rows('image_column')){
            the_row();
            $featured_image = get_sub_field('featured_image');
            $icon           = get_sub_field('icon');
            $icon_position  = get_sub_field('icon_position');
        }
    }

    $two_col_html .= '
        <div class="grid-item text-content flex-2">
            <h6 class="eyebrow">' . $eyebrow . '</h6>
            <h2 class="column-title">' . $title . '</h2>
            <p class="column-content">' . $content . '</p>
            <a class="button cta_link" href="' . $cta['url'] . '" target="' . $cta['target']  . '">' . $cta['title'] . '</a>
        </div>
        <div class="grid-item flex-2 image-content">
            <div class="icon  icon__' . $icon_position . '">
                <img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '">
            </div>
            <figure class="image__wrapper">
                <img src="' . $featured_image['url'] . '" alt="' . $featured_image['alt'] . '">
            </figure>
        </div>
    ';

    return $two_col_html .= '</div>';
?>