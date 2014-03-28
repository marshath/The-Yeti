<?php

/*
Template Name: Events
*/
?>

<?php get_header();?>
<section id="main-content" class="">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>


<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</section><!-- #main-content -->

<?php
get_template_part( 'sidepanel-events' );
 get_footer(); ?>