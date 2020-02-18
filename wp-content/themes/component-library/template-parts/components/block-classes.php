<div class="class__group-wrapper">
    <div class="class__container">
        <?php
            /* ==============================
            class type repeater
            ============================== */
            if(have_rows('class_type')):
                $html = '';
                while(have_rows('class_type')): the_row();
                    $class_type = get_sub_field('class_header');
                    $bg = get_sub_field('class_bg');
                    $video_type = get_sub_field('class_vid_type');
                    $video_hosted = get_sub_field('class_vid_hosted');
                    $video_embedded = get_sub_field('class_vid_embedded');

                    $html .= '<div class="class__featured featured__large">';
                        $html .= '<figure class="class__featured-image">';
                            $html .= '<img src="'. $bg['url'] . '" alt="' . $bg['title'] . '" />';
                        $html .= '</figure>';
                    $html .= '<h5 class="class__group-title">' . $class_type . '</h5>';

                    // if($video_type):
                    if(get_field('class_vid_type', $curauth) != "none: No Video"):
                        $html .= '<div class="classes__video-wrapper">';
                        if(get_field('class_vid_type', $curauth) != "hosted : Hosted Video"):
                            $html .= '<video preload="metadata" controls>
                                        <source src="' . $video_hosted['url'] . '#t=0.01"  type="video/mp4" />
                                        Your browser does not support the video tag.
                                    </video>';
                        else:
                            $html .= '<div id="video__playbutton_class" class="video__playbutton">
                            <svg height="124" viewBox="0 0 124 124" width="124" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd" transform=""><path d="m62 0c-34.2397739 0-62 27.7567208-62 62s27.7567208 62 62 62 62-27.7567208 62-62-27.7567208-62-62-62z" fill="#ABABAB"/><path d="m50 68.8802589v-14.7602779c0-3.3137085 2.6862915-6 6-6 1.0061578 0 1.99616.253027 2.8789288.7358031l13.4951111 7.3803212c2.9073357 1.5899885 3.9752566 5.2357901 2.3852682 8.1431257-.5506458 1.0068702-1.378496 1.8347032-2.3853776 2.385328l-13.4951112 7.3799566c-2.9073687  1.589928-6.5531481.5219313-8.1430761-2.3854374-.4827374-.8827418-.7357432-1.8727038-.7357432-2.8788193z" fill="#fff"/></g></svg>
                            <span>Play Video</span>
                            </div>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_embedded . '" frameborder="0" data-toggle-src allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        endif;
                        $html .= '</div>';
                    endif;
                    $html .= '</div>';

                        /* ==============================
                        class card repeater
                        ============================== */
                        $html .= '<div class="class__card-container">';
                        //Loops through the repeater
                        while (have_rows('class_card')) {
                            the_row();

                            //fetches the post object field
                            $class_post = get_sub_field('class_post');
                            if($class_post){
                                $image = get_field('class_picture', $class_post->ID);
                                $title = get_field('class_title', $class_post->ID);
                                $desc = get_field('class_desc', $class_post->ID);
                                $link = get_field('class_link', $class_post->ID);
                                $schedule = get_field('class_schedule', $class_post->ID);
                                $arrow_right = traina_get_svg_icon("white-arrow-small", false);

                                $html .= '<div class="class__card col-lg-4">';
                                    $html .= '<figure class="class__card-image">';
                                        $html .= '<img src="'. $image['url'] . '" alt="' . $image['title'] . '" />';
                                    $html .= '</figure>';
                                    $html .= '<h5 class="class__title">' . $title . '</h5>';
                                    $html .= '<p class="class_desc">' . $desc . '</p>';
                                    $html .= '<a  href="/class-schedule/" class="item-arrow">' . $arrow_right . '</a>';
                                    $html .= '<a href="/class-schedule/" class="class_schedule">' . $schedule['title'] . '</a>';
                                $html .= '</div>';
                            }
                        }
                        $html .= '</div>';

                endwhile;
                echo $html;
            endif;

        ?>
    </div>
</div>
<?php if(is_single('cardio-weight-training')):
     include(locate_template('template-parts/components/section-info.php'));
endif; ?>
