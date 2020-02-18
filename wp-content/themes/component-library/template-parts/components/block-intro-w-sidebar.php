<?php
    global $footer_modals_array;

    // $slider_header = get_field('intro_slider_header');
    // $slider_copy = get_field('intro_slider_copy');
    $sidebar_api = get_field('sidebar_api');

    $title = get_field('intro_slider_header');
    // Split content to stylize first letter
    $copy = get_field('intro_slider_copy');
    $copy = splitFirstLetter($copy);
?>

<div class="classes-cta">
    <a href="/class-schedule/" title="External link to sign up for classes" >Sign Up Today <?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
</div>
<section class="intro__section-wrapper">
    <section class="intro__main line-aside">
        <div class="page-intro intro__block">
            <?php if($title): ?>
                <h4 class="intro__header"><?php echo $title; ?></h4>
            <?php endif; ?>
            <?php if($copy): ?>
                <?php echo $copy; ?>
            <?php endif; ?>
        </div>
        <div class="gallery-slider">
            <?php
                if( get_field('slider_bg')):
                    $bg = get_field('slider_bg');?>
                    <figure class="gallery-bg">
                        <img src="<?php echo $bg['url'];?>" alt="<?php echo $bg['alt'];?>" />
                    </figure>
                <?php endif;
            ?>
            <div class="intro__slider" js-intro-slider>

                <?php
                    if(have_rows('slider_gallery')):
                        $html;
                        while(have_rows("slider_gallery")): the_row();
                            $image = get_sub_field('slider_image');
                            $modal_id = convert_string_to_slug($image['title']);

                            $html .= '<div class="slider-card gallery-image__lightbox">';
                                $html .= '<button class="btn btn-plus-icon" modal-target="' . $modal_id . '"></button>';
                                $html .= '<figure class="gallery-image">';
                                    $html .= '<img src="' . $image['url'] . '" alt="test-' . $image['alt'] . '" />';
                                $html .= '</figure>';
                            $html .= '</div>';

                            $modal = array('title' => $modal_id, 'image' => $image);
                            array_push($footer_modals_array, render_modal($modal, 'lightbox'));

                        endwhile;
                        echo $html;
                    endif;
                ?>
            </div>
        </div>
        <?php if(is_single('personal-training')):
        include(locate_template('template-parts/components/section-info.php'));
        endif;?>
    </section>
    <aside class="intro__sidebar sidebar">
        <div class="sidebar__card line-below">
            <?php
                $feedArgs = array(
                    'post_type'      => array( 'blogs-events' ),
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'published',
                    'order'          => 'DESC',
                );

                $results = get_query_results($feedArgs);
                $total_count = count($results);
                $display_count = 0;

                foreach($results as $rid):
                // varset
                $result_img = get_the_post_thumbnail_url($rid);
                $result_exc = get_the_excerpt($rid);
                $result_date = get_the_date($rid);
            ?>

        <div class="sidebar__card line-below">
            <?php if($result_img): ?>
                <a href="/join-us/<?php //echo get_the_permalink($rid); ?>" class="">
                    <figure class="card__image">
                        <img src="<?php echo $result_img; ?>" alt="" class="img-responsive"/>
                    </figure>
                </a>
            <?php endif; ?>

            <div class="card__body">
                <!-- <h5><span>Class</span> / SEP.16.19<?php //echo $result_date; ?></h5> -->
                <h6><?php echo get_the_title($rid); ?></h6>
                <a href="/join-us/<?php //echo get_the_permalink($rid); ?>" class="btn btn-default item-arrow"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </aside>
</section>
