<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="mobile-navigation" class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Menu', 'traina' ); ?>">

	<?php // Default wordpress menu output
	 wp_nav_menu( array(
		'menu' => 'Mobile Menu',
		'menu_id'        => 'top-menu',
	) );  ?>

	<?php // Default wordpress menu output
	//  wp_nav_menu( array(
	// 	'theme_location' => 'top',
	// 	'menu_id'        => 'top-menu',
	// ) );  ?>

	<a class="btn" href="<?php echo get_page_link(161);?>">Join Today</a>

	<div class="updates__wrap">
			<h5><?php echo td_acf_options('td_footer_form_title');?></h5>
			<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]');?>
	</div>

	<div class="office__info">
		<?php echo td_acf_options('td_global_office_info'); ?>
	</div>
</nav><!-- #site-navigation -->
