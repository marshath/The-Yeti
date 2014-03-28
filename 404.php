<?php 

get_header(); ?>

<?php get_template_part( 'submenu' );?>

<section id="main-content" class="span8">



	<h1>Oops! You look lost.</h1>
	
	<p><strong>You must have strayed off the trail.</strong> Try using the main navigation at the top of the page to find your way up the mountain.</p>
	
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php endwhile; else: ?>
	

	<h1>OOPS! We couldn't find what you were looking for...</h1>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</section><!-- #main-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>