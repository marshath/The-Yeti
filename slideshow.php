

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
	        
		        <div class="caption-box-bg">
			        <h2><?php the_title(); ?></h2>
			        <p><?php the_content(); ?></p>
		        </div>
		        
		        <a href="<?php the_field('slideshow_link'); ?>" class="button"><span class="en"><?php the_field('slideshow_button_en'); ?> </span><span class="fr"><?php the_field('slideshow_button_fr'); ?></span></a>
		        
		    </div>
	      </li>

	     
	      <?php endwhile; ?>
<?php wp_reset_postdata(); ?>

	    </ul>
	  </div>
	</div>
