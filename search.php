<?php 

/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<section id="main-content" class="span9">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endwhile; else: ?>

	<h1>OOPS! We couldn't find what you were looking for...</h1>

<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.'); ?></p>
					<?php get_search_form(); ?>
<?php endif; ?>

</section><!-- #main-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>