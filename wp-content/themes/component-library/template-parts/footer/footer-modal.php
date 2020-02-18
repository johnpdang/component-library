<?php
    $footer_form = td_acf_options('td_footer_form');
    $form_title = td_acf_options('td_footer_form_title');
    $form_desc = td_acf_options('td_footer_form_desc');
    $form_cta = td_acf_options('td_footer_form_cta');
    $modal_enabled = td_acf_options('td_open_form_in_modal');
    $modal_cta = td_acf_options('td_form_modal_cta');
?>

<?php if($footer_form || $form_cta): ?>
    <div class="footer__form__wrapper">
        <h5 class="footer__form__title"><?php echo $form_title; ?></h5>
        <?php if ($form_desc): ?><h6 class="footer__form__desc"><?php echo $form_desc; ?></h6><?php endif; ?>
        <?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]');?>
    </div>
<?php endif; ?>
