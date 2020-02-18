<?php
    global $footer_modals_array;
    function shortcode_query_params($post_type, $atts){
        extract(shortcode_atts(array(
            'orderby'        => 'published',
            'order'          => 'ASC',
            'count'          => -1,
            'category_name'  => ''
        ), $atts));

        $atts['count'] = intval($atts['count']);

        $feedArgs = array(
            'post_type'      => array( $post_type ),
            'posts_per_page' => $atts['count'],
            'post_status'    => 'publish',
            'orderby'        => $atts['orderby'],
            'order'          => $atts['order'],
            'category_name'  => $atts['category_name']
        );

        return get_query_results($feedArgs);
    }
    // Membership Plan Shortcode
    function td_fitness_plans($atts){
        global $footer_modals_array;

        $classes = get_posts([
            'post_type'         => 'fitness-plan',
            'posts_per_page'    => -1
        ]);

        $card_output .= '<div class="card__grid flex-grid">';

        foreach( $classes as $i => $class){
            setup_postdata($class);

            $pid         = $class->ID;
            $title       = $class->post_title;
            $content     = $class->post_content;
            $excerpt     = $class->post_excerpt;

            $modal_image = get_the_post_thumbnail($pid);
            $price       = get_field('pricing', $pid);
            $cta         = get_field('cta', $pid);

            $card_data   = array('title' => $title, 'excerpt' => $excerpt, 'price' => $price, 'cta' => $cta);
            $modal       = array('title' => $title, 'content' => $content, 'price' => $price, 'cta' => $cta, 'image' => $modal_image);

            // render_card & render_modal functions are in the functions.php file
            // Search for Helper functions in functions.php
            $card_output .= render_card($card_data);
            array_push($footer_modals_array, render_modal($modal));
        }

        $card_output .= '</div>';

        return $card_output;
    }

    add_shortcode('td_fitness_plans', 'td_fitness_plans');


    function td_fitness_experiences($atts){
        $results = shortcode_query_params('class', $atts);

        $output = '<div class="flex-grid flex-start">';

        foreach($results as $rid):
            $result_img = get_the_post_thumbnail_url($rid);
            $result_exc = get_the_excerpt($rid);
            $output .= '<div class="item flex-2">';
                if($result_img):
                    $output .= '<img src="' . $result_img.'" class="img-responsive"/>';
                endif;

                $output .= '<h6>' . get_the_title($rid) . '</h6>';

                if($result_exc):
                    $output .= '<p>' . $result_exc .'</p>';
                endif;
                $output .= '<a href="' . get_the_permalink($rid) . '" class="button">LEARN MORE</a>';
            $output .= '</div>';
        endforeach;

        $output .= '</div>';

        return $output;
    }

    add_shortcode('td_fitness_experiences', 'td_fitness_experiences');

    function td_amenities_list($atts){
        $results = shortcode_query_params('amenity', $atts);
        $output = '<div class="flex-grid amenities__grid">';
        $curr_link = get_permalink();
        $display = $atts['display'] ? $atts['display'] : 'full';

        if($display === 'short'):
            foreach($results as $rid):
                $result_img = get_the_post_thumbnail_url($rid);
                $amenity_link = get_the_permalink($rid);

                if($curr_link != $amenity_link):
                    $output .= '<div class="item flex-3">';
                        if($result_img):
                            $output .= '<img src="' . $result_img.'" class="img-responsive"/>';
                        endif;
                        $output .= '<h6><a href="' . get_the_permalink($rid) . '" class="button">' . get_the_title($rid) . '</a></h6>';
                    $output .= '</div></a>';
                endif;
            endforeach;
        else:
            foreach($results as $rid):
                $result_img = get_the_post_thumbnail_url($rid);
                $result_exc = get_the_excerpt($rid);
                $amenity_link = get_the_permalink($rid);
                $arrow_right = traina_get_svg_icon("white-arrow-small", false);
                if($curr_link != $amenity_link):
                    $output .= '<a href="' . get_the_permalink($rid) . '"><div class="item flex-3 fade-in">';
                        if($result_img):
                            $output .= '<img src="' . $result_img.'" class="img-responsive"/>';
                        endif;

                        $output .= '<h6 class="animate-in-down">' . get_the_title($rid) . '</h6>';

                        if($result_exc):
                            $output .= '<p class="animate-in-up">' . $result_exc .'</p>';
                        endif;
                        $output .= '<a href="' . get_the_permalink($rid) . '" class="item-arrow">' . $arrow_right . '</a>';
                    $output .= '</div>';
                endif;
            endforeach;
        endif;

        return $output;
    }
    add_shortcode('td_amenities_list', 'td_amenities_list');

    function td_blogs_list($atts){
        $atts = is_array($atts) ? $atts : array();
        $blog_tax = array(
            'category_name' => 'blog',
            'featured'      => $atts['featured'] ? $atts['featured'] : 'false',
            'has-featured'  => $atts['has-featured'] ? $atts['has-featured'] : 'false',
        );

        $atts = array_merge($atts, $blog_tax);
        $isFeatured = $atts['featured'] === 'true' && $atts['has-featured'] === 'false' ? true : false;
        $hasFeatured = $atts['featured'] === 'false' && $atts['has-featured']  === 'true'  ? true : false;
        $results = shortcode_query_params('blogs-events', $atts);

        // setPostViews(get_the_ID());
        // echo getPostViews(get_the_ID());

        if($isFeatured){
            foreach($results as $index=>$rid){
                $title       = get_the_title($rid);
                $result_exc  = get_the_excerpt($rid);
                $blog_link   = get_the_permalink($rid);
                $result_img  = get_the_post_thumbnail_url($rid);
                $date        = get_the_date('M.j.y');
                $cat_name    = get_the_category(["postCat"], $rid);
                $arrow_right = traina_get_svg_icon("white-arrow-small", false);

                $output .= '<div class="item featured-post">';
                if($result_img):
                    $output .= '<a href="'.$blog_link .'"><img src="' . $result_img.'" class="img-responsive"/></a>';
                endif;
                $output .= '<div class="item-content">';
                if(get_page_template_slug() === 'page-blog-archive.php'):
                    $output .= '<h6 class="eyebrow"><span>' . $cat_name. '</span> / ' . $date. '</h6>';
                endif;
                $output .= '<h6>' . get_the_title($rid) . '</h6>';
                // if($result_exc):
                //     $output .= '<p>' . $result_exc .'</p>';
                // endif;
                $output .= '<a href="' . $blog_link . '" class="button">'. $arrow_right .'</a>';

                $output .= '</div>';
                $output .= '</div>';
                // print_r ($cat_name);
            }
        }elseif($hasFeatured){
            foreach($results as $index=>$rid){
                if($index >=2){
                    $title = get_the_title($rid);
                    $result_exc = get_the_excerpt($rid);
                    $blog_link = get_the_permalink($rid);
                    $result_img = get_the_post_thumbnail_url($rid);

                    $output .= '<div class="item flex-4">';
                    if($result_img):
                        $output .= '<a href="'.$blog_link .'"><img src="' . $result_img.'" class="img-responsive"/></a>';
                    endif;

                    $output .= '<h6><a href="'.$blog_link .'">' . get_the_title($rid) . '</a></h6>';

                    if($result_exc):
                        $output .= '<p>' . $result_exc .'</p>';
                    endif;
                    $output .= '</div>';
                }
            }
        }else {
            foreach($results as $index=>$rid){
                $title = get_the_title($rid);
                $result_exc = get_the_excerpt($rid);
                $blog_link = get_the_permalink($rid);
                $result_img = get_the_post_thumbnail_url($rid);

                $output .= '<div class="item flex-4">';
                if($result_img):
                    $output .= '<a href="'.$blog_link .'"><img src="' . $result_img.'" class="img-responsive"/></a>';
                endif;

                $output .= '<h6><a href="'.$blog_link .'">' . get_the_title($rid) . '</a></h6>';

                if($result_exc):
                    $output .= '<p>' . $result_exc .'</p>';
                endif;
                $output .= '</div>';
            }
        }

        return $output;
    }

    add_shortcode('td_blogs_list', 'td_blogs_list');

    function td_blogs_related(){
        $post = get_post();
        $tags = get_the_tags();

        $tags_list = array();
        $tags_args = array();

        // Check if post has tags
        if($tags){
            //loop through tags and build out tags_list array
            foreach($tags as $tag){
                array_push($tags_list, $tag->term_id);
            }

            //check that there are more than 3 tags in our list of tags
            if(count($tags_list) > 3){
                // grab 3 random indicies from the tag list and build out an array of indices
                $tags_indices = array_rand($tags_list, 3);
                foreach($tags_indices as $i){
                    // get the tagfrom our tag list at the random index and push into our tags_args array
                    array_push($tags_args, $tags_list[$i]);
                }
            }else {
                // if our tag list is less than 3 then we want to just push our list of tags into the tags_args array
                array_push($tags_args, $tags_list);
            }
        }

        $args = array(
            'post_type'      => 'blogs-events',
            'posts_per_page' => 4,
            'post_status'    => 'publish',
            'category_name'  => 'blog',
            'tag__in'        => $tags_list,
            'post__not_in'   => array($post->ID)
        );

        $results =  get_posts($args);

        $output .= '<div class="related-articles__wrapper">';

        foreach($results as $result){
            $rid            = $result->ID;
            $title          = $result->post_title;
            $featured_image = get_the_post_thumbnail($rid);
            $date           = get_the_date('M.j.y', $rid);

            $output .= '<div class="card__related">';
                $output .= '<figure class="card__image">';
                    $output .= $featured_image ;
                $output .= '</figure>';
                $output .= '<div class="card__content">';
                    $output .= '<p class="eyebrow">' . $date . '</p>';
                    $output .= '<h5 class="card__title">' . $title . '</h5>';
                $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '</div>';

        return $output;
    }

    add_shortcode('td_blogs_related', 'td_blogs_related');

    function td_blog_events_feed($atts){

        $results = shortcode_query_params('blogs-events', $atts);

        $output = '<div class="blog-events-feed" js-blog-events-feed>';

        foreach($results as $rid){
            $title = get_the_title($rid);
            $result_exc = get_the_excerpt($rid);
            $blog_link = get_the_permalink($rid);
            $result_img = get_the_post_thumbnail_url($rid);

            $output .= '<div class="item">';
            $output .= '<a href="'.$blog_link .'">';

            if($result_img):
                $output .= '<img src="' . $result_img.'" class="img-responsive"/>';
            endif;

            $output .= '<h6>' . get_the_title($rid) . '</h6>';

            if($result_exc):
                $output .= '<p>' . $result_exc .'</p>';
            endif;
            $output .= '</a></div>';

        }
        $output .= '</div>';
        return $output;
    }
    add_shortcode('td_blog_events_feed', 'td_blog_events_feed');

    function td_events_list($atts){
        $atts = is_array($atts) ? $atts : array();
        $event_tax = array( 'category_name' => 'event');
        $atts = array_merge($atts, $event_tax);

        $results = shortcode_query_params('blogs-events', $atts);

        foreach($results as $rid){
            // $eyebrow = get_the_eyebrow($rid);
            $title = get_the_title($rid);
            $result_exc = get_the_excerpt($rid);
            $event_link = get_the_permalink($rid);
            $arrow_right = traina_get_svg_icon("white-arrow-small", false);

            $output .= '<div class="item">';

            // $output .= '<p class="eyebrow">' . get_the_eyebrow($rid) . '</p>';
            $output .= '<h6>' . get_the_title($rid) . '</h6>';

            if($result_exc):
                $output .= '<p>' . $result_exc .'</p>';
            endif;

            $output .= '<a href="' . $event_link . '" class="button">'. $arrow_right .'</a>';
            $output .= '</div>';

        }
        return $output;
    }
    add_shortcode('td_events_list', 'td_events_list');

    function td_class_widget($atts){
        $output .= '<p>To reserve your spot in the class of your choice – download the Kinective App and sign up to get started today.</p>';
        $output .= '<!-- This is the placeholder that contains the widget. -->';
        $output .= '<div id="_mwcloudCTT"></div>';
        // $output .= '<!-- Script that loads the widget in the container. -->';
        // $output .= '<script src="https://www.mywellness.com/ac1366512/ClassTimetable/?isWidget=True&language=en-GB"></script>';

        return $output;
    }
    add_shortcode('td_class_widget', 'td_class_widget');



?>
