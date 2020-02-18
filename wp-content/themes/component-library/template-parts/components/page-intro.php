<?php
    $title = get_field('intro_header');
    $shortcode = get_field('page_shortcode');
    $sidebar = get_field('title_for_sidebar');

    // Split content to stylize first letter
    $copy = get_field('intro_copy');
    $copy = splitFirstLetter($copy);
?>

<div class="page-intro container__xl">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 animate-in-down">
            <?php if($title): ?>
                <h2 class="page-intro__header"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if($copy): ?>
                <?php echo $copy; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if($sidebar): ?>
        <?php include(locate_template('template-parts/components/page-sidebar.php')); ?>
<?php endif; ?>
<?php if($shortcode): ?>
    <div class="page-intro-shortcode__wrapper">
        <?php echo do_shortcode($shortcode); ?>
    </div>
<?php endif; ?>
