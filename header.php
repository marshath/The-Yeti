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
	<link rel="icon" type="image/x-icon" href="/favicon-yeti.ico" />
	<title><?php the_title(); ?> | <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
		    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-ie.css" type="text/css" media="screen" />
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>




	<div class="container">
		<div class="page-wrapper">

			<nav id="mobile-nav">
				<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>	</nav>

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
							<!-- <a href="http://atlassnowshoe.com" target="_blank"><img src="/wp-content/uploads/sites/2/2013/11/ATLAS-SUSPENSION-BANNER-728x90.gif" alt=""></a> -->
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
