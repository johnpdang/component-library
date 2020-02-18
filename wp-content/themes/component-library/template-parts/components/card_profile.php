<div class="card-profile__wrapper traina-card flex-3" >
    <figure class="card-profile-image">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    </figure>
    <div class="card-profile-content">
        <h4 class="card-title"><?php echo $card_title; ?> </h4>
        <p class="card-desc"><?php echo $card_desc; ?> </p>
        <a href="<?php echo $btn_link; ?> " class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $modal_name; ?>" data-slide-index="<?php echo $slide_index; ?>">+</a>
    </div>
</div>