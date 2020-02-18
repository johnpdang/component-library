<?php
/*
	Use this to build out the documentation for a developer for this theme
	TODO: create a way to dynamically build a navigation for each new section.
	TODO: create a general guideline for how to build out this page.
*/


/* Template Name: Theme Guide Page */
add_filter( 'body_attributes', 'template_custom_body_attributes' );
function template_custom_body_attributes( $attributes = [] ) {
	$attributes[] = 'data-spy="scroll" data-target="#doc-sidebar" data-offset="0"';
	return $attributes;
}

?>

<?php get_header(); ?>
<section id="section-top" class="section section-top section-gray-dark">
	<div class="section-inner">
		<div class="section-container py-6">
			<!-- Replace with site Name -->
			<h1>Site Name</h1>
			<h5>Theme Developer documentation</h5>
		</div>
	</div>
</section>

<?php get_footer(); ?>