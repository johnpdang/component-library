<?php
    global $footer_modals_array;
    $poster_image = get_field('poster_image');
    $vid_type     = get_field('fe_video_type');
    $vid_hosted   = get_field('fe_hosted_video');
    $vid_embed    = get_field('fe_embedded_video');
    $modalID      = 'video-'.round(uniqid(rand(), true));
?>

<?php if(get_field('fe_video_type', $curauth) != "none: No Video"): ?>
<section class="offset-video">
    <a href="#" id="video__playbutton_1" modal-target="<?php echo $modalID;?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70"><g id="Group_2733" data-name="Group 2733" transform="translate(-178 -472)"><circle id="Ellipse_14" data-name="Ellipse 14" cx="35" cy="35" r="35" transform="translate(178 472)" fill="#fff"/><path id="Polygon_1" data-name="Polygon 1" d="M7,0l7,12H0Z" transform="translate(221 500) rotate(90)" fill="#242424"/></g></svg>
        <span class="screen-reader-text"> Watch Video </span>
    </a>

    <?php if($vid_type === 'embedded' && $vid_embed):
        $modalVideo = $vid_embed;
    elseif($vid_hosted):
        $modalVideo = '<video width="100%" height="auto" controls';
        if($poster_image):
            $posterURL = $poster_image['sizes']['medium_large'];
            $modalVideo .= 'poster="'.$posterURL.'"';
        endif;
        $modalVideo .= '><source src="' . $vid_hosted["url"] . '" type="video/mp4">Your browser does not support the video tag.</video>';
    endif;
    ?>

    <?php
    $modal = array('title' => $modalID, 'video' => $modalVideo);
    array_push($footer_modals_array, render_modal($modal, 'video'));
    ?>
</section>
<?php endif; ?>
