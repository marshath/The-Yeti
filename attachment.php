<?php 

get_header(); ?>

<?php get_template_part( 'single-submenu' );?>

<section id="main-content" class="span6">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>






<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</section><!-- #main-content -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>