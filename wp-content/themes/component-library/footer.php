<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
global $footer_modals_array;

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				// OFFICE INFO
				$office_info = td_acf_options('td_global_office_info');
				$support_text = td_acf_options('td_support_text');
				$gym_hours = td_acf_options('td_global_gym_hours');
				$kids_hours = td_acf_options('td_global_kids_hours');
				$copyright = td_acf_options('td_global_copyright');

				// FOOTER LOGO
				$footer_logo = td_acf_options('td_footer_logo');
				?>

				<div class="row">
				<div class="footer__col footer-brand col-md-10 col-lg-10">
					<a href="/join-us" class="btn join-now"> Join Now</a>
						<figure class="logo footer__logo">
							<a href="/" title="Return to homepage"><img src="<?php echo $footer_logo['url']; ?>" alt="Kinective Logo" /></a>
						</figure>
					</div>
					<div class="footer__col footer-social col-md-2 col-lg-2">
					<?php if (have_rows('td_footer_social_info', 'options')): ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'traina' ); ?>">
							<?php
								while(have_rows('td_footer_social_info', 'options')): the_row();
									$social_icon = get_sub_field('social_icon');
									$social_url = get_sub_field('social_url');

									$social_output .= '<a href="' . $social_url . '" target="_blank"><img src="' . $social_icon . '" /></a>';
								endwhile;
								echo $social_output;
							?>
						</nav><!-- .social-navigation -->
					<?php endif; ?>
					</div>
				</div>

			<div class="row">
				<div class="footer__col col-lg-4">
					<span class="line"></span>
					<div class="office__info">
						<?php echo $office_info; ?>
					</div>
					<div class="footer__menu-wrapper">
					<?php // Default wordpress menu output
						wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
					) );  ?>
					</div>
				</div>
					<div class="footer__col col-lg-4">
					<span class="line"></span>
					<div class="row">
						<div class="footer__col col-lg-6">
							<h5>Gym Hours</h5>
							<?php echo $gym_hours;?>
						</div>
						<div class="footer__col col-lg-6">
							<h5>Kinective Kids</h5>
							<?php echo $kids_hours;?>
						</div>
					</div>

					</div>
				<div class="footer__col col-lg-4">
				<span class="line"></span>
				<?php get_template_part( 'template-parts/footer/footer', 'modal' )?>
				<p class="copyright"> <?php echo $copyright; ?></p>

				</div>
				<?php #get_template_part( 'template-parts/footer/site', 'info' ); ?>
			</div>


			</div><!-- .wrap -->

			<?php // if(!isset($_COOKIE["signupformclosed"])):?>
				<div class="sticky__footer__wrap sticky__footer" style="display:none;">
					<div class="sticky__footer__content">
						<h5><?php echo td_acf_options('td_footer_form_title');?></h5>
						<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]');?>
					</div>

					<a href="#" class="sticky__footer__close">CLOSE <?php traina_get_svg_icon('white-close');?></a>
				</div>
			<?php //endif;?>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php
	$output = '';
	foreach($footer_modals_array as $modal){
		$output .= $modal;
	};
	echo $output;
?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153459647-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153459647-1');
</script>

</body>
</html>
