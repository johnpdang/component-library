<?php /** Set variable for the height of the Hero Banner **/    ?>
<?php
    $feat_media_type = get_field('feat_media_bg_type');
    $vid_type        = get_field('video_type');
    $vid_hosted      = get_field('hero_featured_video_hosted');
    $vid_embed       = get_field('hero_featured_video_embed');
    $image_arr       = get_field('hero_featured_image');
    $image_logo       = get_field('hero_class_logo');
    $slider_arr      = get_field('hero_slider');
    $cta_eyebrow     = get_field('hero_eyebrow');
    $cta_header      = get_field('hero_header');
    $hero_subheader  = get_field('hero_sub_header');
    $cta_tagline     = get_field('hero_tagline');
    $cta_button      = get_field('hero_cta');
    $handle_title    = explode("::",get_the_title());
    $header_title    = $handle_title[0];
    $sub_title       = $handle_title[1];
    $date            = get_the_date('M.j.y');
?>


<div class="hero-section hero lp-hero ">
    <?php if(is_front_page()): ?>
        <h1 class="display_text">Find your Energy</h1>
    <?php endif; ?>
    <?php if ($image_arr && $feat_media_type === 'image'): ?>
    <div class="hero__wrapper">
        <figure class="hero-background__image">
            <img src="<?php echo $image_arr['url']; ?>" aria-hidden="true" alt="<?php echo $image_arr['alt']; ?>" />
            <figure class="hero-logo__image animate-in-right">
                <img src="<?php echo $image_logo['url']; ?>" aria-hidden="true" alt="<?php echo $image_logo['alt']; ?>" />
            </figure>
        </figure>
    <?php elseif ($feat_media_type === 'video'): ?>
        <div class="hero-background__video">
            <div class="video__wrapper">
                <?php if($vid_type === 'hosted'): ?>
                    <video autoplay muted loop>
                        <source src="<?php echo $vid_hosted['url']; ?>" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <div id="video__playbutton_1" class="video__playbutton"><svg height="124" viewBox="0 0 124 124" width="124"     xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" transform=""><path d="m62 0c-34.2397739 0-62 27.7567208-62 62s27.7567208 62 62 62 62-27.7567208 62-62-27.7567208-62-62-62z" fill="#6d2b8b"/><path d="m50 68.8802589v-14.7602779c0-3.3137085 2.6862915-6 6-6 1.0061578 0 1.99616.253027 2.8789288.7358031l13.4951111 7.3803212c2.9073357 1.5899885 3.9752566 5.2357901 2.3852682 8.1431257-.5506458 1.0068702-1.378496 1.8347032-2.3853776 2.385328l-13.4951112 7.3799566c-2.9073687 1.589928-6.5531481.5219313-8.1430761-2.3854374-.4827374-.8827418-.7357432-1.8727038-.7357432-2.8788193z" fill="#fff"/></g></svg> <span> Watch Video </span></div>
                    <div class="video-container" data-video="<?php echo $vid_embed; ?>"><div data-rel="<?php echo $vid_embed; ?>" class="player" data-video-player></div></div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif($slider_arr && $feat_media_type === 'slider'): ?>
        <div class="hero-background__slider" js-hero-slider>
            <?php if(have_rows('hero_slider')):
                $slider_html;
                while(have_rows('hero_slider')): the_row();
                    $slide_image        = get_sub_field('hero_slide_image');
                    $slide_hero_eyebrow = get_sub_field('hero_slide_eyebrow');
                    $slide_hero_header  = get_sub_field('hero_slide_header');
                    $slide_hero_tagline = get_sub_field('hero_slide_tagline');
                    $slide_hero_cta     = get_sub_field('hero_slide_cta');
                    $arrow_icon        = traina_get_svg_icon("small-orange-arrow", false);

                    $slider_html .= '
                        <div class="card__hero-slide">
                            <figure class="card__hero-slide__bg">
                                <img src="' . $slide_image['url'] . '" alt="' . $slide_image['title'] . '"/>
                            </figure>
                            <div class="container">
                                <div class="hero-content__wrapper">
                                    <div class="hero-content">
                                        <div class="hero-header-text">
                                            <p class="eyebrow page-eyebrow load-hidden">'. $slide_hero_eyebrow . '</p>
                                            <h2 class="h1 page-header load-hidden">'. $slide_hero_header . '</h2>
                                            <p class="page-tagline fade-in-delay load-hidden" >' . $slide_hero_tagline . '</p>
                                            <a class="btn btn-hero" href="' . $slide_hero_cta ['url'] . '">' . $arrow_icon . '</a>
                                        </div>
                                        <div class="hero-support">
                                            <a href="#content" class="chevron-icon smoothscroll skip-to-content" title="Skip to main content" tabindex="0">
                                                <div class="mouse">
                                                    <div class="scroll"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';

                    echo $slider_html;
                endwhile;
            endif;
        ?>
    </div>
    <?php else: ?>
        <div class="hero-background__default"></div>
    <?php endif; ?>

    <?php if($slider_arr !== '' && $feat_media_type != 'slider'):?>
            <div class="hero-content__wrapper">
                <div class="hero-content">
                    <div class="hero-header-text">
                        <?php if(get_page_template_slug() === 'page-blog-archive.php'): ?>
                            <h6 class="eyebrow"><span>EVENT</span> / <?php echo $date; ?></h6>
                        <?php endif; ?>
                        <h1 class="page-header animate-in-left load-hidden"><?php echo $cta_header; ?></h1>
                        <?php if($hero_subheader): ?>
                            <h2 class="h3 hero-subheader animate-in-down load-hidden"><?php echo $hero_subheader; ?></h2>
                        <?php endif; ?>
                    </div>
                    <p class="page-tagline fade-in-delay load-hidden" > <?php echo $cta_tagline; ?></p>
                        <?php if($cta_button): ?>
                            <a class="button cta_link" href="<?php echo $cta_button['url'] ?>" target="<?php echo $cta_button['target']  ?>"><?php echo $cta_button['title'] ?></a>
                        <?php endif; ?>
                    <div class="hero-support">
                        <a href="#content" class="chevron-icon smoothscroll skip-to-content" title="Skip to main content" tabindex="0">
                            <div class="mouse">
                                <div class="scroll"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="scroll-to">
        <button class="scroll-to_button">
            <span class="scroll-to_arrow" data-speed="1000">
            <?php if(is_front_page()):
                echo traina_get_svg_icon('orange-arrow-down');
                else:
                echo traina_get_svg_icon('white-arrow-down');
                endif; ?>
        </span>
        </button>
    </div>
</div>
