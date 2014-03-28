

<div id="slide-main">
	   <div class="flexslider">
	    <ul class="slides">

<?php 
	
 $slideShow = new WP_Query( 'post_type=slideshow' ); ?>

<?php while ( $slideShow->have_posts() ) :
	$slideShow->the_post(); ?>    
	       <li>
	        <img src="<?php the_field('slideshow_image'); ?>" alt="" />
	       
	        <div class="caption-box">
	        <!-- <h2><?php the_field('slideshow_title_text'); ?></h2>
	        <p><?php the_field('slideshow_caption_text'); ?></p>
	        <a href="<?php the_field('page_link'); ?>" class="slide-read-more">Find Out More</a> -->
	        <div class="caption-box-bg">
		        <h2><?php the_title(); ?></h2>
		        <p><?php the_content(); ?></p>
	        </div>
	        <a href="<?php the_field('page_link'); ?>" class="button"><span class="en">Find Out More </span><span class="fr">Pour en savoir plus</span></a>
	        </div>
	      </li>

	     
	      <?php endwhile; ?>
<?php wp_reset_postdata(); ?>

	    </ul>
	  </div>
	</div>
