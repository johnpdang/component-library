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

?>


<section id="feed-classes" class="section__wrapper">
    <div class="grid__header">
        <h3>Blog & Events</h3>
    </div>
    <div class="container container__xl">
        <div class="row">
            <?php foreach($results as $rid): ?>
                <?php // varset
                  $result_img = get_the_post_thumbnail_url($rid);
                  $result_exc = get_the_excerpt($rid);
                ?>
                <div class="item col-lg-4">
					<a href="<?php echo get_the_permalink($rid); ?>" class="block-link">
	                    <?php if($result_img): ?>
	                        <img src="<?php echo $result_img; ?>" class="img-responsive"/>
                        <?php endif; ?>
                        <p class="eyebrow"><span>class</span> / Sep.16.19</p>
	                    <h6><?php echo get_the_title($rid); ?></h6>
	                    <?php //if($result_exc): ?>
	                        <p><?php //echo $result_exc; ?></p>
	                    <?php //endif; ?>
	                    <a href="<?php echo get_the_permalink($rid); ?>" class="button"><?php echo traina_get_svg_icon('white-arrow-small'); ?></a>
					</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
