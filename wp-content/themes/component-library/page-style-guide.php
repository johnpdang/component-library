<?php
/* Template Name: Style Guide Page */
add_filter( 'body_attributes', 'template_custom_body_attributes' );
function template_custom_body_attributes( $attributes = [] ) {
	$attributes[] = 'data-spy="scroll" data-target="#doc-sidebar" data-offset="0"';
	return $attributes;
}

$baseurl = get_site_url();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- THEME FONT TEMP INCLUSION FROM GOOGLE FONTS -->
<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet"> -->
<!-- THEME FONT TEMP INCLUSION FROM TYPEKIT ADOBE --><link rel="stylesheet" href="https://use.typekit.net/xgw5cxd.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site fade-in load-hidden">
		<a class="skip-link screen-reader-text" title="Skip to main content" href="#content" tabindex="0"><?php _e( 'Skip to content', 'traina_wp' ); ?></a>
		<div id="curtain"></div>
		<header id="masthead" class="site-header " role="banner">
			<nav class="navbar animate-in-1" role="navigation" aria-label="main navigation">
				<div class="navbar-inner-wrap">
					<div class="navbar-brand">
					</div>
				</div>
			</nav>
		</header><!-- #masthead -->
<div class="row flex">
	<div class="col-md-3 sidebar__wrapper flex-2">
		<section>
			<div id="doc-sidebar" class="sp-sidebar sticky" data-sp-sidebar="">
				<div class="sp-sidebar-inner">
					<div class="sp-sidebar-container">
						<nav id="doc-navigation" class="sp-sidebar-navigation">
						<div class="title">
							<span id="website_logo_link" class="image_link" aria-hidden="true">
								<img src="<?php //echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="Website Logo">
							</span>
						</div>
							<div class="doc-section-header">
								<h3 class="doc-section-title">Style Guide</h3>
							</div>
							<ul class="nav-entry doc-panel">
								<li><a class="nav-link" href="#typography"><h4>Typography</h4></a></li>
									<ul>
										<li><a class="nav-link" href="#headings">Heading</a></li>
										<li><a class="nav-link" href="#paragraphs">Paragraph</a></li>
										<li><a class="nav-link" href="#block-quote">Block Quote</a></li>
										<li><a class="nav-link" href="#lists">Lists</a></li>
										<li><a class="nav-link" href="#weights">Weights & Colors</a></li>
										<li><a class="nav-link" href="#typography-examples">Examples</a></li>
									</ul>
								<li><a class="nav-link" href="#colors"><h4>Brand Colors</h4></a></li>
								<li><a class="nav-link" href="#ui"><h4>UI Components</h4></a></li>
									<ul>
										<li><a class="nav-link" href="#buttons">Buttons</a></li>
										<li><a class="nav-link" href="#button-states">States</a></li>
										<li><a class="nav-link" href="#button-colors">Color</a></li>
									</ul>
								<li><a class="nav-link" href="#form"><h4>Form</h4></a></li>
									<ul>
										<li><a class="nav-link" href="#form-input">Input</a></li>
										<li><a class="nav-link" href="#form-checkbox-radio">Checkbox & Radios</a></li>
										<li><a class="nav-link" href="#form-select">Select</a></li>
										<li><a class="nav-link" href="#form-textarea">Textarea</a></li>
									</ul>
								<li><a class="nav-link" href="#grid"><h4>Grid System</h4></a></li>
								<li><a class="nav-link" href="#cards"><h4>Cards</h4></a></li>
								<li><a class="nav-link" href="#accordions"><h4>Accordion</h4></a></li>
								<li><a class="nav-link" href="#tabs"><h4>Tabs</h4></a></li>
								<li><a class="nav-link" href="#modals"><h4>Modal</h4></a></li>
								<li><a class="nav-link" href="#sliders"><h4>Slider</h4></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-9 main-content__wrapper flex-1">
		<section id="typography" class="doc-section" nav-item="Typography">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Typography</h3>
			</div>
			<div id="headings" class="doc-panel" nav-sub-item="Headings">
				<div class="doc-panel-inner">
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<div class="doc-panel-header">
								<h4 class="doc-panel-title">Heading</h4>
							</div>
							<p id="heading" class="text-info">Rift + Century Gothic</p>
							<h1 class="text_display">Display Text <span class="css">.text_display</span></h1>
							<p class="eyebrow eyebrow__h1">Eyebrow h1 <span class="css">p.eyebrow .eyebrow__h1</span></p>
							<h1>H1 Title <span class="css">.h1</span></h1>
							<p class="eyebrow eyebrow__h2">Eyebrow h2 <span class="css">p.eyebrow .eyebrow__h2</span></p>
							<h2>H2 Title <span class="css">.h2</span></h2>
							<p class="eyebrow eyebrow__h3">Eyebrow h3 <span class="css">p.eyebrow .eyebrow__h3</span></p>
							<h3>H3 Title <span class="css">.h3</span></h3>
							<h4>H4 Title <span class="css">.h4</span></h4>
							<h5>H5 Title <span class="css">.h5</span></h5>
							<h6>H6 Title <span class="css">.h6</span></h6>
						</div>
					</div>
				</div>
			</div>
			<div id="paragraphs" class="doc-panel">
				<div class="doc-panel-header">
					<h4 class="doc-panel-title">Paragraph</h4>
				</div>
				<p>Paragragh text we are a lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores dolores eum ullam voluptatum vitae adipisci fugiat aliquid dicta a, odio quasi tempora debitis perspiciatis, accusamus voluptates iure sint. Nisi, quam!. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <span class="css">p</span></p>
				<p class="text-small">Text Small (Caption, legal text, etc) <span class="css">p.text-small</span></p>
				</div>
				<div id="block-quote" class="doc-panel">
				<div class="doc-section-header">
				<h4 class="doc-section-title">Blockquote</h4>
			</div>
				<p class="blockquote">Blockquote lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
					<span>Ut wisi enim ad minim veniam</span> <span class="css">p.blockquote</span></p>
				<div class="block_section_reverse">
					<blockquote>Blockquote lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						<span>Ut wisi enim ad minim veniam</span> <span class="css">.block_section_reverse blockquote</span></blockquote>
				</div>
</div>

			<div id="lists" class="flex">
				<div id="unordered-list" class="doc-panel flex-2" nav-sub-item="Unordered List">
					<div class="doc-panel-inner">
						<div class="doc-panel-header">
							<h4 class="doc-panel-title">List - Unordered</h4>
						</div>
						<div id="lists" class="doc-panel-body">
							<div class="doc-panel-preview">
								<ul>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div id="ordered-list" class="doc-panel flex-2" nav-sub-item="Ordered List">
					<div class="doc-panel-inner">
						<div class="doc-panel-header">
							<h4 class="doc-panel-title">List - Ordered</h4>
						</div>
						<div class="doc-panel-body">
							<div class="doc-panel-preview">
								<ol>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
									<li>Lorem ipsum</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="flex">
				<div id="weights" class="doc-panel flex-2" nav-sub-item="Font Weights">
					<div class="doc-panel-inner">
						<div class="doc-panel-header">
							<h4 class="doc-panel-title">Font Weights</h4>
						</div>
						<div class="doc-panel-body">
							<div class="doc-panel-preview">
								<p class="fw_light fw_300">Font weight 300 <span class="css">.font-weight-300</span></p>
								<p class="fw_regular fw_400">Font weight 400 <span class="css">.fw_regular .fw_400</span></p>
								<p class="fw_medium fw_500">Font weight 500 <span class="css">.fw_medium .fw_500</span></p>
								<p class="fw_semibold fw_600">Font weight 600 <span class="css">.fw_semibold .fw_600</span></p>
								<p class="fw_bold fw_700">Font weight 700 <span class="css">.fw_bold .fw_700</span></p>
							</div>
						</div>
					</div>
				</div>
				<div id="font-colors" class="doc-panel flex-2" nav-sub-item="Font Colors">
					<div class="doc-panel-inner">
						<div class="doc-panel-header">
							<h4 class="doc-panel-title">Font Colors</h4>
						</div>
						<div class="doc-panel-body">
							<div class="doc-panel-preview">
								<p><strong>Theme colors:</strong>
									<span class="c_primary">Primary <span class="css">.c_primary</span></span>
									<span class="c_secondary">Secondary <span class="css">.c_secondary</span></span>
									<span class="c_primary_reverse">Primary Reverse <span class="css">.c_primary_reverse</span></span>
									<span class="c_secondary_reverse">Secondary Reverse<span class="css">.c_secondary_reverse</span></span>
									<span class="c_accent">Accent <span class="css">.c_accent</span></span>
									<span class="c_element">Element <span class="css">.c_element</span></span>
									<span class="c_alt">Alternate <span class="css">.c_alt</span></span>
								</p>
								<p><strong>Notification colors:</strong>
									<span class="text-success">Success  <span class="css">.text-success</span></span>
									<span class="text-warning">Warning  <span class="css">.text-warning</span></span>
									<span class="text-danger">Danger  <span class="css">.text-danger</span></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="typography-examples" class="doc-panel">
				<div class="grid-item right-content flex-2-3 text-content fade-in load-hidden">
					<div  class="doc-panel-header">
						<h4 class="doc-panel-title">H2 + copy Example</h4>
					</div>
					<div class="example">
						<h2>Lorem Ipsum H2 title</h2>
						<p>Lorem ipsum dolor sit amet paragraph (P) tag. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<button>Standard BUTTON tag</button>
					</div>
				</div>
			</div>
		</section>
		<section id="colors">
			<div nav-sub-item="Brand Colors">
				<div class="doc-section-header">
					<h3 class="doc-section-title">Brand Colors</h3>
				</div>
				<div class="doc-panel-inner doc-panel">
					<div class="doc-panel-body">
						<div class="doc-panel-preview flex">
							<p class="block_img_preview flex-4 bg_primary c_white text-small"><b>Dark Gray</b> <br>#242424<br> <span class="css c_white"> .c_primary</span><span class="css c_white"> .bg_primary</span></p>
							<p class="block_img_preview flex-4 c_white bg_secondary text-small"><b>Orange</b> <br>#F26522<br> <span class="css c_white"> .c_secondary</span><span class="css c_white"> .bg_secondary</span></p>
							<p class="block_img_preview flex-4 bg_primary_reverse text-small"><b>Beige</b> <br>#B5B7B9<br> <span class="css c_white"> .c_primary_reverse</span><span class="css c_white"> .bg_primary_reverse</span></p>
							<p class="block_img_preview flex-4 bg_secondary_reverse text-small"><b>Light Gray</b> <br>#D1D1D1<br> <span class="css c_white"> .c_secondary_reverse</span><span class="css c_white"> .bg_secondary_reverse</span></p>

						</div>
						<div class="doc-panel-preview flex">
						<p class="block_img_preview flex-3 c_white bg_accent text-small"><b>Yellow</b> <br>#FFB016<br> <span class="css c_white"> .c_accent</span><span class="css c_white"> .bg_accent</span></p>
							<p class="block_img_preview flex-3 c_white bg_element text-small"><b>Dark Orange</b> <br>#C63829<br> <span class="css c_white"> .c_element</span><span class="css c_white"> .bg_element</span></p>
							<p class="block_img_preview flex-3 c_white bg_alt text-small"><b>Red</b> <br>#A01D29<br> <span class="css c_white"> .c_alt</span><span class="css c_white"> .bg_alt</span></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="ui" class="doc-section" nav-item="UI Components">
			<div class="doc-section-header">
				<h3 class="doc-section-title">UI Components</h3>
			</div>
			<div id="buttons" class="doc-panel" nav-sub-item="Button States">
				<div class="doc-panel-inner">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">Buttons</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<div class="row flex">
								<div class="flex-4">
									<p>Default</p>
									<button type="button" class="btn btn-primary">Learn More</button> <span class="css">.btn .btn-primary</span>
								</div>
								<div class="flex-4">
									<p>Small</p>
									<button type="button" class="btn btn-primary btn-sm">Learn More</button> <span class="css">.btn .btn-primary .btn-sm</span>
								</div>
								<div class="flex-4">
									<p>Medium</p>
									<button type="button" class="btn btn-primary btn-md">Learn More</button> <span class="css">.btn .btn-primary .btn-md</span>
								</div>
								<div class="flex-4">
									<p>Large</p>
									<button type="button" class="btn btn-primary btn-lg">Learn More</button> <span class="css">.btn .btn-primary .btn-lg</span>
								</div>
							</div>
						</div>
					</div>
					<div id="button-states" class="doc-panel-header">
						<h4 class="doc-panel-title">States</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<div class="row flex">
								<div class="flex-4">
									<p>Default</p>
									<button type="button" class="btn btn-primary">Learn More</button> <span class="css">.btn .btn-primary</span>
								</div>
								<div class="flex-4">
									<p>Hover</p>
									<button type="button" class="btn btn-primary btn-hover">Learn More</button> <span class="css">.btn .btn-primary .btn-hover</span>
								</div>
								<div class="flex-4">
									<p>Pressed</p>
									<button type="button" class="btn btn-primary btn-focus">Learn More</button> <span class="css">.btn .btn-primary .btn-focus</span>
								</div>
								<div class="flex-4">
									<p>Disabled</p>
									<button type="button" class="btn btn-primary btn-disabled">Learn More</button> <span class="css">.btn .btn-primary .btn-disabled</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="buttons" class="doc-panel " nav-sub-item="Button Colors">
				<div id="button-colors" class="doc-panel-inner">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">Colors</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<div class="row flex block_section_reverse">
							<div class="flex-1">
									<p>Default</p>
									<button type="button" class="btn btn-primary btn-reverse">Learn More</button> <span class="css">.btn .btn-primary .btn-reverse</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="forms" class="doc-section" nav-item="Forms">
				<div class="doc-section-header">
					<h3 class="doc-section-title">Forms</h3>
				</div>
				<div class="doc-panel">
					<div class="doc-panel-inner">
						<div class="doc-panel-header">
							<h4 class="doc-panel-title">Default</h4>
						</div>
						<div class="doc-panel-body">
							<?php
								$form_arr = array(
									'Full Name',
									'Email',
									'Phone Number'
								);
								include('template-parts/components/form.php');
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="grid" class="doc-section" nav-item="grid">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Grid</h3>
			</div>
			<div class="doc-panel-body">
				<div class="doc-panel-preview">
					<div class="doc-panel-inner">
						<div class="doc-panel">
							<div class="row">
								<div class="col-xs-12">
									<p>Size 1 of 1 <span class="css">.col-xs-12</span></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<p>Size 1 of 2 <span class="css">.col-xs-6</span></p>
								</div>
								<div class="col-xs-6">
									<p>Size 1 of 2 <span class="css">.col-xs-6</span></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<p>Size 1 of 3 <span class="css">.col-xs-4</span></p>
								</div>
								<div class="col-xs-4">
									<p>Size 1 of 3 <span class="css">.col-xs-4</span></p>
								</div>
								<div class="col-xs-4">
									<p>Size 1 of 3 <span class="css">.col-xs-4</span></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<p>Size 1 of 4 <span class="css">.col-xs-3</span></p>
								</div>
								<div class="col-xs-3">
									<p>Size 1 of 4 <span class="css">.col-xs-3</span></p>
								</div>
								<div class="col-xs-3">
									<p>Size 1 of 4 <span class="css">.col-xs-3</span></p>
								</div>
								<div class="col-xs-3">
									<p>Size 1 of 4 <span class="css">.col-xs-3</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="sections" class="doc-section" nav-item="Sections">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Sections</h3>
			</div>
			<div id="container-style" class="doc-panel">
				<div id="text-image" class="doc-panel-inner" nav-sub-item="Two Column Text & Image">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">2 Column Text & Image Sections</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<?php /**include('template-parts/components/section_text_image.php');  */?>
						</div>
					</div>
				</div>
				<div id="text-text" class="doc-panel-inner" nav-sub-item="Two Column Text & Text">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">2 Column Text & Text Sections</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<?php
						/*
						* TODO: Replace these variables to replace with actual data.
						*/
						$two_column_text_info = array(
							'title' => 'Our Mission',
							'subheader' => 'To transform early cancer detection and disease management through advancements in technology and precision medicine.',
							'desc' => 'As we understand more about cancer on the genomic level, cancer may be treated with more effective, targeted therapies that specifically attack the genomic alterations in a patient\'s tumor. Our differentiated approach to understanding a patient\'s unique caner genome on RNA and DNA level from liquid biopsy enables us to uncovers unprecedented genomic alterations that are typically missed with DNA sequencing alone. With our breakthrough non-invasive cancer diagnostics technology, vast data sets, and advanced analytics, we partner with biopharmas and oncologists to help them optimize biomarker-driven clinical trials and accelerate the development of cancer therapies.'
						) ?>
							<?php include('template-parts/components/section_two_column_text.php'); ?>
						</div>
					</div>
				</div>
				<div id="multi-column" class="doc-panel-inner" nav-sub-item="Multi-Column">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">Multi Column Section</h4>
					</div>
					<div class="doc-panel-body">
						<div class="doc-panel-preview">
							<?php
						/*
						* TODO: Replace these variables to replace with actual data.
						*/

						$columns = array(
								'column-1' => array(
									'title' => 'Confirm genomic alterationsdetected at the DNA level',
									'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
									'image_url' => ''
								),
								'column-2' => array(
									'title' => 'Confirm genomic alterationsdetected at the DNA level',
									'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
									'image_url' => ''
								),
								'column-3' => array(
									'title' => 'Confirm genomic alterationsdetected at the DNA level',
									'desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.',
									'image_url' => ''
								)
							) ?>
							<?php $multi_column_info = array(
							'title' => 'Our Mission',
							'subheader' => 'To transform early cancer detection and disease management through advancements in technology and precision medicine.',
							'columns' => $columns
						) ?>
							<?php include('template-parts/components/section_multi-columns.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="cards" class="doc-section" nav-item="Cards">
			<div id="container-style" class="doc-panel">
				<div class="doc-panel-inner">
					<div class="doc-panel-header">
						<h3 class="doc-panel-title">Cards</h3>
					</div>
					<div id="info-cards" class="doc-panel-body" nav-sub-item="Info Cards">
						<div class="doc-panel-preview">
							<h5>Info Cards</h5>
							<?php
								$card_arr = array(
									'card-1' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-alt-1',
										'card_title' => 'Early aDetection 1',
										'card_desc' => 'Monitoring those at risk or for recurrence through non-invasive diagnostics',
										'btn_text' => 'Learn More',
										'btn_link' => 'google.com'
									),
									'card-2' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-alt-2',
										'card_title' => 'Early aDetection 2',
										'card_desc' => 'Monitoring those at risk or for recurrence through non-invasive diagnostics',
										'btn_text' => 'Learn More',
										'btn_link' => 'google.com'
									),
									'card-3' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-alt-3',
										'card_title' => 'Early aDetection 3',
										'card_desc' => 'Monitoring those at risk or for recurrence through non-invasive diagnostics',
										'btn_text' => 'Learn More',
										'btn_link' => 'google.com'
									),
								);
							?>

							<?php
									$card_type = 'card_info';
									$slider_name = '';
									include('template-parts/components/card_grid_container.php');
								?>

						</div>
					</div>
					<div id="staggered-cards" class="dstaggered-cards oc-panel-body" nav-sub-item="Staggered Cards">
						<div class="doc-panel-preview">
							<h5>Staggered Cards</h5>
							<?php
							$btn = array(
								'url' => 'http://google.com',
								'target' => '',
								'title' => '',
								'class' => ''
							);
								$card_arr = array(
									'card-1' => array(
										'image_url' => 'http://placehold.it/300x280',
										'image_alt' => 'image-1',
										'card_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'card_desc' => 'Lorem Ipsum:',
										'btn' => $btn,
									),
									'card-2' => array(
										'image_url' => 'http://placehold.it/300x280',
										'image_alt' => 'image-2',
										'card_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'card_desc' => 'Lorem Ipsum:',
										'btn' => $btn,
									),
									'card-3' => array(
										'image_url' => 'http://placehold.it/300x280',
										'image_alt' => 'image-3',
										'card_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'card_desc' => 'Location: ',
										'btn' => $btn,
									)
								);
							?>

							<?php
									$card_type = 'card_staggered';
									$slider_name = 'staggered-card-slider';
									include('template-parts/components/card_grid_container.php');
								?>
						</div>
					</div>
					<div id="blog-cards" class="doc-panel-body" nav-sub-item="Blog Cards">
						<div class="doc-panel-preview">
							<h5>Blog Cards</h5>
							<?php
								$card_arr = array(
									'card-1' => array(
										'blog_tag' => 'News',
										'blog_date' => 'August 16, 2018',
										'blog_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'blog_subheader_1' => 'Lorem Ipsum:',
										'blog_desc_1' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore',
										'blog_subheader_2' => '',
										'blog_desc_2' => '',
										'blog_btn_link' => 'google.com',
										'blog_btn_text' => 'Read More'
									),
									'card-2' => array(
										'blog_tag' => 'News',
										'blog_date' => 'August 16, 2018',
										'blog_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'blog_subheader_1' => 'Lorem Ipsum:',
										'blog_desc_1' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore',
										'blog_subheader_2' => '',
										'blog_desc_2' => '',
										'blog_btn_link' => 'google.com',
										'blog_btn_text' => 'Read More'
									),
									'card-3' => array(
										'blog_tag' => 'News',
										'blog_date' => 'August 16, 2018',
										'blog_title' => 'traina_wp Receives CLIA Certification for its Genomic Sequencing Laboratory',
										'blog_subheader_1' => 'Location: ',
										'blog_desc_1' => '34b west street',
										'blog_subheader_2' => 'Lorem Ipsum:',
										'blog_desc_2' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore',
										'blog_btn_link' => 'google.com',
										'blog_btn_text' => 'Read More'
									)
								);
							?>

							<?php
									$card_type = 'card_blog';
									$slider_name = 'blog-card-slider';
									include('template-parts/components/card_grid_container.php');
								?>

						</div>
					</div>
					<div id="profile-cards" class="doc-panel-body" nav-sub-item="Profile Cards">
						<div class="doc-panel-preview">
							<h5>Profile Cards</h5>
							<?php
								$card_arr = array(
									'card-1' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-2',
										'card_title' => 'John Casey',
										'card_desc' => 'CEO of a lot of companies',
										'modal_content' => array(
											'header' => 'Shidong Jia 1',
											'subheader' => 'CEO and Co-founder 1',
											'left_column_content' => '<img src="" alt="Image Alt"> 1',
											'right_column_content' => 'He used to do a lot of work, he\'s got a lot of background in stuff. 1'
										)
									),
									'card-2' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-2',
										'card_title' => 'John Casey',
										'card_desc' => 'CEO of a lot of companies',
									),
									'card-3' => array(
										'image_url' => $baseurl . '/wp-content/uploads/2018/10/disease-cone.png',
										'image_alt' => 'image-2',
										'card_title' => 'John Casey',
										'card_desc' => 'CEO of a lot of companies',
										'modal_content' => array(
											'header' => 'Shidong Jia 2',
											'subheader' => 'CEO and Co-founder 2',
											'left_column_content' => '<img src="" alt="Image Alt"> 2',
											'right_column_content' => 'He used to do a lot of work, he\'s got a lot of background in stuff. 2'
										)
									)

								);

								$modal_arr = array();
								foreach($card_arr as $key => $val){
									if($val['modal_content']){
										$modal_arr['modal_content-' . $key] = array();
										array_push($modal_arr['modal_content-' . $key], $val['modal_content']);
									}
								};
							?>

							<?php
									// $card_type = 'card_profile';
									// $slider_name = '';
									// $modal_name = 'about-modal';
									//
									// include('template-parts/components/card_grid_container.php');
									// include('template-parts/components/modal.php');
								?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="accordion" class="doc-section" nav-item="Accordion">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Accordion</h3>
			</div>

			<?php
				$accordion_arr = array(
						'accordion_panel-1' => array(
							'accordion_panel_header' => 'Research Associate',
							'accordion_panel_content' => ' This is a lot of content that could potentially appear 1',
							'accordion_panel_desc' => ' This is a description for a panel on the left side.',
							'accordion_panel_btn_txt' => 'Apply',
							'accordion_panel_btn_url' => 'google.com',
							'two_column' => 'true'
						),
						'accordion_panel-2' => array(
							'accordion_panel_header' => 'Bioinformatics Database Engineer',
							'accordion_panel_content' => ' This is a lot of content that could potentially appear 2'
						),
						'accordion_panel-3' => array(
							'accordion_panel_header' => 'Software Engineer',
							'accordion_panel_content' => ' This is a lot of content that could potentially appear 3'
						),
					);
				$accordion_name = 'section-accordion';
				include('template-parts/components/accordion.php');
			?>
		</section>

		<section id="tabs" class="doc-section" nav-item="Tabs">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Tabs</h3>
			</div>
			<div class="doc-panel">
				<div class="doc-panel-inner">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title">Default</h4>
					</div>
					<div class="doc-panel-body">
						<?php
							$tab_array = array(
								'tab-1' => array(
									'tab_title' => 'Home',
									'tab_content' => ' This is a lot of content that could potentially appear 1'
								),
								'tab-2' => array(
									'tab_title' => 'Profile',
									'tab_content' => ' This is a lot of content that could potentially appear 2'
								),
								'tab-3' => array(
									'tab_title' => 'Contact',
									'tab_content' => ' This is a lot of content that could potentially appear 3'
								),
							);

							include('template-parts/components/tabs.php');

						?>
					</div>
				</div>
			</div>
		</section>

		<section id="modals" class="doc-section" nav-item="Modals">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Modal</h3>
			</div>
			<div class="doc-panel">
				<div class="doc-panel-inner">
					<div class="doc-panel-header">
						<h4 class="doc-panel-title"></h4>
					</div>
					<div class="doc-panel-body">
					<?php
				$modal_arr = array(
					'header' => 'Shidong Jia 3',
					'subheader' => 'CEO and Co-founder 3',
					'left_column_content' => '<img src="" alt="Image Alt"> 3',
					'right_column_content' => 'He used to do a lot of work, he\'s got a lot of background in stuff. 3'
				);
				$modal_name = 'section-modal';
				$modal_button = array(
					'include_button' => true,
					'button_text' => 'Open'
				);
				include('template-parts/components/modal.php');
			?>
					</div>
				</div>
			</div>

		</section>

		<section id="sliders" class="doc-section" nav-item="Sliders">
			<div class="doc-section-header">
				<h3 class="doc-section-title">Slider</h3>
			</div>

			Coming soon...

		</section>

	</div>
</div>

<?php // get_footer(); ?>
