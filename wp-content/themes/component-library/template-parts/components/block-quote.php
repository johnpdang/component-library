<?php
    $quote_title = get_field('block_quote_title');
    $quote_copy = get_field('block_quote_text');
    $quote_source = get_field('block_quote_src');
    $quote_button = get_field('block_quote_cta');
    $quote_bg = get_field('block_quote_bg');
?>

<section class="section-quote">
    <figure class="image__wrapper">
        <img src="<?php echo $quote_bg["url"]; ?>" alt="<?php echo $quote_bg["alt"]; ?>">
    </figure>
    <blockquote class="animate-in-left fade-in">
        <h5><?php echo $quote_title; ?></h5>
        <p><?php echo $quote_copy; ?></p>
        <p class="quote-source"><span class="line"></span><?php echo $quote_source; ?></p>
        <?php if($quote_button): ?><button><a class="button" href="<?php echo $quote_button["url"]; ?>"><?php echo $quote_button["title"]; ?></a></button><?php endif; ?>
    </blockquote>
</section>
