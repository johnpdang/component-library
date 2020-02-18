<?php
    // Instructors
    $instructor_type = get_field('instructor_type');
    // Repeater Field
    $instructor_group = count(get_field('instructor_group'));
    $slider_checkbox = get_field('enable_slider');
    $enable_slider = $slider_checkbox && $instructor_group > 4 || $instructor_group > 4  ? true : false;
?>
<div class="instructors__group-wrapper">
    <h5 class="instructors__group-title">Meet our <?php echo $instructor_type; ?></h5>
    <div class="instructors__container" <?php if($enable_slider): ?> js-instructors-slider <?php endif; ?>>
        <?php
            if(have_rows('instructor_group')):
                $html = '';
                $image_size = $enable_slider ? 'featured__large' : 'featured__small';

                while(have_rows('instructor_group')): the_row();
                    $instructor = get_sub_field('instructor');
                    $instructor_id = $instructor->ID;
                    $title = get_field('instructor_title', $instructor_id);
                    $picture = get_field('instructor_picture', $instructor_id);
                    $expertise = get_field('instructor_expertise', $instructor_id);
                    $desc = get_field('instructor_desc', $instructor_id);

                    $html .= '<div class="instructor__card ' . $image_size . '">';
                        $html .= '<figure class="instructor__image">';
                            $html .= '<img src="'. $picture['url'] . '" alt="' . $picture['title'] . '" />';
                        $html .= '</figure>';
                        $html .= '<div class="instructor__body">';
                            $html .= '<h5 class="instructor__name">' . $instructor->post_title . '</h5>';
                            $html .= '<p class="instructor__title eyebrow">' . $title . '</p>';
                            $html .= '<p class="instructor__desc">' . $desc . '</p>';
                            if($enable_slider):
                                $html .= '<h6 class="instructor__expertise">Expertise:</h6>';
                                $html .= '<p class="instructor__expertise">' . $expertise . '</p>';
                            endif;
                        $html .= '</div>';
                    $html .= '</div>';
                endwhile;

                echo $html;
            endif;
        ?>
    </div>
</div>
