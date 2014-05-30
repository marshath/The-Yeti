<?php

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php
	/** Print the <title> tag based on what is being viewed. */
	global $page, $paged;
	wp_title( '|', true, 'right' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &ndash; $site_description";
	?></title>
	<link rel="icon" type="image/icon" href="http://theyeti.ca/favicon-yeti.ico">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/font-awesome/css/font-awesome-ie7.min.css">
  <![endif]-->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
-->

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
	    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style-ie.css" type="text/css" media="screen" />
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W75JNN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W75JNN');</script>
<!-- End Google Tag Manager -->



	<div class="container">
		<div class="page-wrapper">

			<nav id="mobile-nav">
				<?php wp_nav_menu( array('theme_location' => 'primary') ); ?></nav>
<?php //echo do_shortcode('[dcwp-jquery-accordion menu="Primary"]'); ?>

				<header class="top-header">
					<div class="row">

						<div class="span8" style="float:right;">

							<div class="header-top clearfix">
								 <div class="language">
								 	<span class="en">Language:</span> <span class="fr">Langue:</span> <?php echo qtrans_generateLanguageSelectCode('text'); ?>
								 </div>
								<?php get_template_part('sidepanel-social'); ?>
							</div>

						</div>

					</div> <!-- header row -->
					<div class="row hdr-row">

						<div class="span4">

							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo clearfix">
								<img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
							</a>
						</div>

						<div class="sponsor-ad">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Banner Ad')) :
							endif; ?>
						</div>

					</div> <!-- header row -->

				</header>

				<nav class="site-navigation" role="navigation">
					<div class="container">

						<?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'sf-menu') ); ?>

					</div>
				</nav>

				<?php
				if ( is_front_page() ) {
					get_template_part( 'slideshow' );
					?>
						<div class="twitter-header">
							<span class="icon-twitter" aria-hidden="true" data-icon="&#xe601;" title="Twitter"></span>
							<?php echo do_shortcode("[rotatingtweets screen_name='yetisnowshoe' tweet_count='7' rotation_type='fade']"); ?>
						</div>

<?php
				} else {
				}
?>
					<div class="row lower-content">
