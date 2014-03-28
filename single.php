<?php

get_header(); ?>

<section id="main-content" class="span8">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1><?php the_title(); ?></h1>
			
			<div class="postmeta">
				<time>Date posted: <?php the_date('F jS, Y') ?></time>
				by <?php the_author(); ?>
				<span class="meta-right">
					<i class="icon-tag"></i><?php the_tags(' '); ?>
				</span>
			</div>
		
			<?php the_content(); ?>
		
		
		</article>

<?php // comments_template(); ?>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</section><!-- #main-content -->



<?php get_template_part( 'sidepanel-blog' );?>
<?php get_footer(); ?>
