<?php
$results = get_query_results($feedArgs);
$total_count = count($results);
$display_count = 0;
?>


<section id="feed-classes" class="section__wrapper">
    <div class="container">
        <div class="grid__header">
            <h3>Headline about Fitness Experiences</h3>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio.</p>
        </div>

        <?php echo do_shortcode('[td_fitness_experiences count="4"]'); ?>
        
    </div>
</section>
