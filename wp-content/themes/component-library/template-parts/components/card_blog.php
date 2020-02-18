<div class="card-blog__wrapper traina-card flex-3 flex-grid">
    <div class="blog-card-top-half" style="background-color: <?php echo $bg_color; ?>">
        <p class="blog-tag"><?php echo $blog_tag; ?></p>
        <p class="blog-date"><?php echo $blog_date; ?></p>
        <h4 class="blog-title"><?php echo $blog_title; ?></h4>
    </div>
    <div class="blog-card-bottom-half">
        <p class="subheader"><?php echo $blog_subheader_1; ?></p>
        <p class="desc"><?php echo $blog_desc_1; ?></p>
        <?php if($blog_subheader_2): ?>
            <p class="subheader"><?php echo $blog_subheader_2; ?></p>
            <p class="desc"><?php echo $blog_desc_2; ?></p>
        <?php endif; ?>
        <a class="btn btn-primary" href="<?php echo $blog_btn_link; ?>"><?php echo $blog_btn_text; ?></a>
    </div>
</div>
