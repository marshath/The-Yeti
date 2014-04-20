<?php


get_header(); ?>


<?php $the_query = new WP_Query( 'pagename=general-information' ); ?>

<?php while ( $the_query->have_posts() ) :
$the_query->the_post(); ?>

<?php
//get_template_part( 'sidepanel-submenu' );
?>




<div class="span4">
	<?php get_sidebar('home'); ?>
</div>

<section id="main-content" class="span4">

	<h1 class="delay-quarter"><?php the_title(); ?></h1>

	<!-- 	<img src="<?php the_field('featured_image'); ?>" alt="" /> -->
	<div class="homepage-featured">
		<?php
		if( get_field('featured_image') ):
			?><img src="<?php the_field('featured_image'); ?>" alt="" /><?php
		endif;
		?>

		<?php
		if( get_field('featured_text') ):
			?><div class="featured-caption"><?php the_field('featured_text'); ?></div>
		<?php
		endif;
		?>
	</div>
	<?php the_content(); ?>

<?php endwhile; ?>

</section><!-- #main-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
