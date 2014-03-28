<?php 

/*
Template Name: Gallery
*/

 ?>


<?php 

get_header(); ?>

<section id="main-content" class="span8">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</section><!-- #main-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>