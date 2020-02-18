<?php
    $title = get_field('title_for_sidebar');
    $sidebar_shortcode = get_field('shortcode_for_sidebar');
    $style = get_field('sidebar_item_style');
?>

<aside class="sidebar__wrapper sidebar__<?php echo $style; ?>">
    <h3 class="sidebar__title"><?php echo $title; ?></h3>
    <div class="sidebar__content">
        <?php //echo do_shortcode($sidebar_shortcode); ?>

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
                $result_exc = get_the_excerpt($rid);
                $result_date = get_the_date('M.j.y', $rid);
            ?>

        <div class="sidebar__card line-below">
            <div class="card__body">
                <h5><span>Event</span> / <?php echo $result_date; ?></h5>
                <h6><?php echo get_the_title($rid); ?></h6>
                <a href="<?php echo get_the_permalink($rid); ?>" class="btn btn-default item-arrow"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
            </div>
        </div>
        <?php endforeach; ?>


    </div>
</aside>

