<?php


get_header(); ?>

	

<section id="main-content" class="span9">


			<header class="archive-header">
				<h1 class="archive-title"><?php single_cat_title(); ?></h1>
			</header><!-- .archive-header -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<div class="entry-image">
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
	<?php 
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	  the_post_thumbnail('sidebar-thumb');
	} 
	?>
	</a>
</div>






	<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->


<div class="postmeta">
	<time><?php the_date('F jS, Y') ?></time> 
	by <?php the_author(); ?>
<span class="meta-right">
	<i class="icon-tag"></i><?php the_tags(' '); ?>
</span>

</div>




	</article>



<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

	<?php wp_pagenavi(); ?>
	

	</section><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>