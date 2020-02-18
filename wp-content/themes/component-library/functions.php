<?php
/**
 * TODO: Replace kinective with theme name
 *
 * kinective functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since 1.0
 */

/**
 * kinective only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/* GLOBALS */


global $footer_modals_array;
$footer_modals_array = array();

include('inc/icon-store.php');

function get_query_results($args) {
	$items = array();
	$items_query = new WP_Query($args);

	if($items_query->have_posts()):
		while ($items_query->have_posts()) : $items_query->the_post();
			$pid = get_the_ID();
			array_push($items, $pid);
		endwhile;
	endif;
	wp_reset_postdata();
	return $items;
}

require(get_template_directory() . '/inc/shortcodes.php');
/* GOOGLE MAPS API KEY ENTRY */
// global $google_map_api_key;
// $google_map_api_key = 'ENTER_KEY_HERE';
// function my_acf_init() {
// 	acf_update_setting('google_api_key', $google_map_api_key);
// }
// add_action('acf/init', 'my_acf_init');



/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function traina_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/kinective
	 * If you're building a theme based on kinective, use a find and replace
	 * to change 'kinective' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kinective' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'kinective-featured-image', 2000, 1200, true );

	add_image_size( 'kinective-thumbnail-avatar', 100, 100, true );

	add_image_size( 'kinective-menu-image', 900, 550 );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'kinective' ),
		'footer'    => __( 'Footer Menu', 'kinective' ),
		'social' => __( 'Social Links Menu', 'kinective' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	if (function_exists('acf_add_options_page'))
	{
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_page(array(
			'page_title' 	=> 'Theme Blocks',
			'menu_title'	=> 'Theme Blocks',
			'menu_slug' 	=> 'theme-blocks',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_page(array(
			'page_title' 	=> 'Nav tooltips',
			'menu_title'	=> 'Nav tooltips',
			'menu_slug' 	=> 'navigation-general-tooltips',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}

	// Function to handle-ize a string
	function convert_string_to_slug($string){
		if($string){
			$string = str_replace(' ', '-', $string);
			$string = str_replace(',', '', $string);
			$string = str_replace("'", '', $string);
			$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
			return strtolower($string);
		}else{
			return;
		}

	}




	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	// add_editor_style( array( 'assets/css/editor-style.css', traina_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'kinective' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'kinective' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'kinective' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'kinective' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'kinective' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters kinective array of starter content.
	 *
	 * @since kinective 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'traina_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'traina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function traina_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( traina_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter kinective content width of the theme.
	 *
	 * @since kinective 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'traina_content_width', $content_width );
}
add_action( 'template_redirect', 'traina_content_width', 0 );

/**
 * Register custom fonts.
 */
function traina_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'kinective' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since kinective 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function traina_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'kinective-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'traina_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function traina_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kinective' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'kinective' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'kinective' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kinective' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'kinective' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kinective' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'traina_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since kinective 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function traina_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kinective' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'traina_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since kinective 1.0
 */
function traina_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'traina_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function traina_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'traina_pingback_header' );

/**
 * Display custom color CSS.
 */
function traina_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo traina_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'traina_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function traina_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'kinective-fonts', traina_fonts_url(), array(), null );
	// Bootstrap styling
	wp_enqueue_style('kinective-boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style('slick-css', get_theme_file_uri('/assets/css/slick.min.css'));

	// Theme stylesheet.
	wp_enqueue_style( 'kinective-style', get_stylesheet_uri() );
	// Traina Styles
	wp_enqueue_style( 'kinective-style-local', get_theme_file_uri('/assets/build/main.min.css') );
	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'kinective-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'kinective-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'kinective-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'kinective-style' ), '1.0' );
		wp_style_add_data( 'kinective-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'kinective-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'kinective-style' ), '1.0' );
	wp_style_add_data( 'kinective-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	$traina_l10n = array(
		'quote'          => traina_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'kinective-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$traina_l10n['expand']         = __( 'Expand child menu', 'kinective' );
		$traina_l10n['collapse']       = __( 'Collapse child menu', 'kinective' );
		$traina_l10n['icon']           = traina_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'kinective-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'kinective-skip-link-focus-fix', 'kinectiveScreenReaderText', $traina_l10n );
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');
	wp_enqueue_script('kinective-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js');
	wp_enqueue_script( 'kinective-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'kinective-slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array( 'jquery' ), '1.0', false  );
	wp_enqueue_script( 'scrollreveal', get_theme_file_uri( '/assets/js/vendor/scrollreveal.min.js' ), array(	), '4.0.5', true );
	wp_enqueue_script('object-fit-poly', get_theme_file_uri('/assets/js/vendor/ofi.min.js'), array(), '1.0', true);
	wp_enqueue_script('kinective-script', get_theme_file_uri('/assets/build/main.min.js'), array(), '1.0', true);
	if(is_page('class-schedule')) {
		wp_enqueue_script('kinective-classes', 'https://www.mywellness.com/ac1366512/ClassTimetable/?isWidget=True&language=en-GB');
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'traina_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since kinective 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function traina_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'traina_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since kinective 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function traina_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'traina_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since kinective 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function traina_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'traina_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since kinective 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function traina_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'traina_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since kinective 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function traina_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'traina_widget_tag_cloud_args' );


// This function loops through the specific column array to build out each column;
function handleMultiColumn($column, $count, $column_count) {
	// loops through the columns array to pull out the specific values
	foreach($column as $key => $val){
		switch($key){
			case 'title':
				$column_title = $val;
				break;
			case 'desc':
				$column_desc = $val;
				break;
			case 'image_url':
				$column_image_url = $val;
				break;
		}
	}
	// checks if there is an image src or not
	if($column_image_url){
		$column_image = '<img src="' . $column_image_url . '" alt="column-image" />';
	}else {
		$column_image = '';
	}

	// builds column html, using the $column_count to create the flex box grid items
	$html = '<div class="column-' . $count . ' flex-' . $column_count .'">'
			. $column_image .
			'<h3>' . $column_title . '</h3>
			<p>' . $column_desc . '</p>
			</div>';

	echo $html;
};

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


/* ADMIN UTILITIES */

/* HIDE EDITOR FROM SPECIFIC POST TYPES ::: */
// add_action( 'admin_init', 'hide_editor' );
// function hide_editor() {
//   // Get the Post ID.
//   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
//   if( !isset( $post_id ) ) return;
//   // Hide the editor on page by post ID
//   if($post_id == 23){
//     remove_post_type_support('page', 'editor');
//   }
//   // Hide the editor on a page with a specific page template
//   // Get the name of the Page Template file.
//   $template_file = get_post_meta($post_id, '_wp_page_template', true);
//   if($template_file == 'page-contact.php'){ // the filename of the page template
//     remove_post_type_support('page', 'editor');
//   }
// }


// Helper Functions
//
function td_acf_options($field){
	return get_field($field, 'options');
}

function render_card($content){
	$slug = convert_string_to_slug($content['title']);

	$html .= '<div class="card__wrapper col-sm-12 col-md-6 col-lg-4">';
		$html .= '<div class="card__header">';
		$html .= '<h6 class="card__title">' . $content['title'] . '</h6>';
		// $html .= '<button class="btn btn-plus-icon" modal-target="' . $slug . '">+</button>';
		$html .= '</div>';
		$html .= '<div class="card__body">';
		if($content['excerpt']):
		$html .= '<p class="card__copy">' . $content['excerpt'] . '</p>';
		endif;
		$html .= '<h5 class="card__pricing">$<span class="large-text">' . $content['price'] . '</span>/mo</h5>';
		$html .= '<a href="' . $content['cta']['url'] . '" class="btn card__btn" modal-target="' . $slug . '">' . $content['cta']['title'] . '</a>';
		$html .= '</div>';
	$html .= '</div>';

	return $html;
}

function render_modal($content, $type = null){
	$html;

	if($type == 'lightbox'):
		$image = $content['image'];

		$html .= '<div id="' . $content['title'] . '" class="modal modal__lightbox">';
			$html .= '<div class="modal__wrapper">';
				$html .= '<button class="close-btn" data-dismiss="modal" data-target="#' .$content['title'] . '">' . traina_get_svg_icon('white-close', false) . '</button>';
				$html .= '<figure class="modal__image-container"><img src="'.$image['url'].'" alt="'.$image['alt'].'"/></figure>';
			$html .= '</div>';
		$html .= '</div>';
	elseif($type == 'video'):
		$video = $content['video'];

		$html .= '<div id="' . $content['title'] . '" class="modal modal__video">';
			$html .= '<div class="modal__wrapper">';
				$html .= '<button class="close-btn" data-dismiss="modal" data-target="#' .$content['title'] . '">' . traina_get_svg_icon('white-close', false) . '</button>';
				//$html .= '<div class="video-container"><div class="video-sizer"><iframe width="560" height="315" src="' . $content['video'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>';
				$html .= '<div class="video-container"><div class="video-sizer">'.$content['video'].'</div></div>';
			$html .= '</div>';
		$html .= '</div>';
	elseif($type == 'form'):
		$html .= '<div id="' . $content['target'] . '-form" class="modal modal__form">';
		$html .= '<div class="modal__wrapper">';
			$html .= '<button class="close-btn" data-dismiss="modal" data-target="#' .$content['target'] . '-form">' . traina_get_svg_icon('white-close', false) . '</button>';
			$html .= do_shortcode($content['shortcode']);
		$html .= '</div>';
	$html .= '</div>';
	else:
		$slug = convert_string_to_slug($content['title']);
		if($content['image']):
			$contentClass = 'col-xs-12 col-sm-8';
		else:
			$contentClass = 'col-xs-12';
		endif;

		$html .= '<div id="' . $slug . '" class="modal">';
			$html .= '<div class="modal__wrapper">';
				$html .= '<button class="close-btn" data-dismiss="modal" data-target="#' . $slug . '">' . traina_get_svg_icon('white-close', false) . '</button>';
				$html .= '<div class="row">';
					if($content['image']):
						$html .= '<figure class="modal__image-container col-xs-12 col-sm-4">' . $content['image'] . '</figure>';
					endif;
					$html .= '<div class="modal__content '. $contentClass .'">';
					  $html .= '<div class="modal__copy">' . $content['content'] . '</div>';
					  $html .= '<div class="modal__footer">';
						$html .= '<h5 class="card__pricing">$<span class="large-text">' . $content['price'] . '</span>/mo</h5>';
						$html .= '<a href="' . $content['cta']['url'] . '" target="_blank" class="card__btn btn">Select</a>';
					  $html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
	endif;


	return $html;
}


function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function handle_section_data($data, $echo = false){
	$type = $data['content_type'];
	/*

	<div class="section-grid flex-grid featured">
	<div class="grid-item flex-2 load-hidden" data-sr-id="5">
		<h2 class="column-header"></h2>
		</div>
		<div class="grid-item flex-2 load-hidden" data-sr-id="5">
			<p class="column-content"></p>
		</div>
	</div>
	<div class="section-grid flex-grid">
	<div class="grid-item flex-2 load-hidden" data-sr-id="5">
	<span class="line"></span>
		<h4 class="column-header"></h4>
		</div>
		<div class="grid-item flex-2 load-hidden" data-sr-id="5">
		<p class="column-content"></p>
		</div>
	</div>


	<div class="section-grid flex-grid">
	<div class="grid-item flex-1 load-hidden" data-sr-id="5">
	<span class="eyebrow"></span>
		<h2 class="column-header"></h2>
		</div>
	<div class="grid-item flex-2 load-hidden" data-sr-id="5">
		<p class="column-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere placeat cum minus necessitatibus mollitia ab fugit nemo voluptates inventore, quam magni saepe enim quae voluptas delectus natus cupiditate ea unde. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque odio quos minima ab exercitationem error praesentium expedita. <strong>Unde animi deleniti iusto fugit quasi laborum consequuntur id fugiat numquam recusandae. Tempora. Lorem ipsum dolor sit amet consectetur adipisicing elit.</strong> Molestias iusto natus reiciendis ab omnis libero labore, ad aperiam beatae consequuntur, quis totam! Porro saepe ipsa possimus natus odio, delectus libero.</p>
		</div>
		<div class="grid-item flex-2 load-hidden" data-sr-id="5">
		<p class="column-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. <strong>Consectetur corporis ut sunt quas dolorum voluptatum</strong> consequatur autem doloremque beatae incidunt facere explicabo iure perferendis accusamus, omnis expedita optio! At, eveniet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci sunt iusto delectus? Dignissimos hic et quisquam, quo assumenda alias accusantium recusandae eligendi, veniam rem quas possimus repellat unde inventore dolor? Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora aliquam in, alias, earum, molestias quae obcaecati perferendis harum mollitia quidem rem blanditiis ut eaque sed culpa nesciunt. Veritatis, minima repellendus?</p>
		</div>
	</div>

	*/
	switch($type){
		case 'text':
			// $html = '<span class="eyebrow" style="color:#' . $data['header_color'] . ';">'. $data['index'] . '<span class="line" style="background-color:#' . $data['header_color'] . ';"></span>' . $data['eyebrow'] . '</span>';
			if($data["eyebrow"]) {
				$html .= '<span class="eyebrow">' . $data["eyebrow"] . '</span>';

			}
			if($data['header']) {
				if($data['block_style'] == 'feature'):
					$header = '<h2 class="column-title" style="color:#' . $data['header_color'] . ';">' . $data['header'] . '</h2>';
				else:
					$header = '<h3 class="column-title" style="color:#' . $data['header_color'] . ';">' . $data['header'] . '</h3>';
				endif;
				if(strpos($data['header'], '::') != false ){
					$title = explode('::',$data['header']);
					$header = '<h2 class="column-title" style="color:#' . $data['header_color'] . ';">' . $title[0] . '<br class="hidden-tablet" /> ' . $title[1] . '</h2>';
				}
				$html .= $header;
			}
			$html .='<div class="column-content"  style="color:#' . $data['header_color'] . ';">';
			if($data['content']) {
				$html .= '<div>' . $data['content'] . '</div>';
			}
			if($data['cta']) {
				$html .= '<a href="' . $data['cta']['url'] . '" class="btn" alt="' . $data['cta']['title'] . '">' . $data['cta']['title'] . '</a>';
			}
			$html .= '</div>';
		break;
		case 'image':
			$html = '
				<figure class="image__wrapper">
					<img src="' . $data['image']['sizes']['img_info_section'] . '" alt="' . $data['image']['alt'] . '" />
				</figure>
			';
		break;
		case 'slider':
			$html = '<div class="slider__wrapper" js-sponsor-slider>';
			$count = 0;
			$group_start = '<div class="group-' . $count . ' slide-item">';
			$column_start = '<div class="column">';
			$div_end = '</div>';
			$divider = '<div class="divider fader"></div>';
			$image_count = count($data['slider_image']);
			$evenly_dist = $image_count - ($image_count % 6);
			$image_in_column = 1;

			foreach ($data['slider_image'] as $index=>$img){
				// Start Group
				if($index === 0){
					$html .= $group_start;
				}
				if($count === 6){
					$count = 0;
					$html .= $div_end;
					$html .= $group_start;
				}

				if($index >= $evenly_dist){
					$html .= $column_start . '<figure class="sponsor fader" ><img src="' . $img['slider_image']['url'] . '" alt="' . $img['slider_image']['alt'] . '"/></figure>' . $divider . $div_end;
				}else {
					if($image_in_column === 1){
						$html .= $column_start . '<figure class="sponsor fader"><img src="' . $img['slider_image']['url'] . '" alt="' . $img['slider_image']['alt'] . '"/></figure>';
						// Increment the number of images in a column
						$image_in_column++;
					} else if($image_in_column === 2){
						$html .= '<figure class="sponsor fader"><img src="' . $img['slider_image']['url'] . '" alt="' . $img['slider_image']['alt'] . '"/></figure>' . $divider . $div_end;
						$image_in_column = 1;
					}
				}

				// Increment our count
				$count++;
				// decrement our image count to know how many images we have left
				$image_count--;
				if($count < 6 && $image_count === 0){
					$html .= $div_end;
				}
			}
			$html .= '</div>';

		break;
	}

	if($echo){
		echo $html;
	}else{
		return $html;
	}
}


function handle_info_section($template_to_include, $pid, $elem_index = 0){
	$rows = get_field('informational_section', $pid);
	if($rows) {

			$bg_color = $rows[$elem_index]['background_color'];
			$txt_color = $rows[$elem_index]['text_color'];
			$left_column = $rows[$elem_index]['left_column'];
			$right_column = $rows[$elem_index]['right_column'];
			$top_column = $rows[$elem_index]['top_column_group'];
			$block_style = 'feature';
			if($elem_index > 0) {
				$block_style = 'sub-feature';
			}
			$data = array(
				'layout_cols'	   => $rows[$elem_index]['info_sec_cols'],
				'bg_color'     	   => $bg_color,
				'txt_color'		   => $txt_color,
				'top_content'	   => array(
					'content_type' => $top_column['content_type'],
					'header'       => $top_column['column_title'],
					'eyebrow'      => $top_column['eyebrow'],
				),
				'left_content'     => array(
					'block_style' 	   => $block_style,
					'index'        => $left_column['section_index'],
					'col_width'	   => $left_column['column_width'],
					'eyebrow'      => $left_column['eyebrow'],
					'header'       => $left_column['column_title'],
					'content'      => $left_column['column_content'],
					'cta'		   => $left_column['column_cta'],
					'header_color' => $left_column['header_color'],
					'image'        => $left_column['image'],
					'slider_image' => $left_column['slider'],
					'content_type' => $left_column['content_type'],
					'animation_type' => $left_column['animation_type']
				),
				'right_content'    => array(
					'block_style' 	   => $block_style,
					'index'        => $right_column['section_index'],
					'col_width'	   => $right_column['column_width'],
					'eyebrow'      => $right_column['eyebrow'],
					'header'       => $right_column['column_title'],
					'content'      => $right_column['column_content'],
					'cta'		   => $right_column['column_cta'],
					'header_color' => $right_column['header_color'],
					'image'        => $right_column['image'],
					'slider_image' => $right_column['slider'],
					'content_type' => $right_column['content_type'],
					'animation_type' => $right_column['animation_type']
				)
			);
			include get_parent_theme_file_path($template_to_include);
    // endwhile;
	}
}

/* Function to get nav menu items by location, allowing custom markup for nav menus */
function get_nav_menu_items_by_location( $location, $args = [] ) {

    // Get all locations
    $locations = get_nav_menu_locations();

    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );

    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );

    // Return menu post objects
    // return $menu_items;
}

// add in megamenu descriptions
function prefix_nav_description( $item_output, $item, $depth, $args ) {
	if ( !empty( $item->description ) ) {
			$item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


add_filter( 'gform_submit_button_2', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
	$new_button->setAttribute('class', 'gform_button button arrow-button');
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}


// Split first letter from copy, if first letter of a paragraph
function splitFirstLetter($copy){

	$firstTag = substr($copy, strpos($copy, '<'), strpos($copy, '>')+ 1);

	// Check if first tag is a p tag to set variables, otherwise we'll just use the normal $content below
	if($firstTag == '<p>'):

		// Get first letter
		$firstLetterPos = 3;
		$firstLetter = substr($copy, $firstLetterPos, 1);


		// Check if first letter is an actual character, or the opening bracket to another element. If it's a letter, we'll continue, otherwise we'll just display $content.
		if($firstLetter !== '<'):

			// Get Remaining content of first tag
			$firstRemaining = substr($copy, $firstLetterPos + 1, strpos($copy, '</p>') - 4);
			$myVar = htmlentities($firstRemaining, ENT_QUOTES);

			// Get Remaining content after first tag
			$remainingContentPos = $firstLetterPos + strlen($firstRemaining) + strlen('</p>');
			if(strlen($copy) > $remainingContentPos + 1):
				$remainingContent = substr($copy, strpos($copy, '<', $remainingContentPos));
				//$myVar = htmlentities($remainingContent, ENT_QUOTES);
				if($remainingContent == $copy) :
					$remainingContent = false;
				endif;
			endif;

			// Put copy back together
			$copy = '<div class="split__content__wrap">';
				$copy .= '<span class="first-letter" aria-hidden="true">'.$firstLetter.'</span>';
				$copy .= '<div class="split__content__inner">';
					$copy .= '<p>';
						$copy .= '<span class="first-letter-hidden">'.$firstLetter.'</span>';
						$copy .= '<span class="split-remaining">'.$firstRemaining.'</span>';
					$copy .= '</p>';
					$copy .= $remainingContent;
				$copy .= '</div>';
			$copy .= '</div>';
		endif;
	endif;

	return $copy;
}


// Mega Menu Image Filter
add_filter('wp_nav_menu_objects', 'nav_menu_objects_image', 10, 2);

function nav_menu_objects_image( $items, $args ) {

	// loop
	foreach( $items as &$item ) {

		// vars
		$image = get_field('menu_middle_image', $item);
		$alt = $image['alt'];
		$size = 'kinective-menu-image';
    $url = $image['sizes'][ $size ];

		// append icon
		if( $image ) {

			$item->title .= ' <span class="menu-item-image-loader" data-image="'. $url .'" data-alt="'. $alt .'"></span>';

		}

	}


	// return
	return $items;

}
