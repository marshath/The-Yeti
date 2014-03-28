		
</div><!-- row -->


</div><!-- page -->
</div><!-- container -->

<!-- Sponsors -->


<section id="sponsors">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="sponsors">
          <ul class="slides">
            <?php $sponsors = new WP_Query( 'post_type=sponsors' ); ?>
            <?php while ( $sponsors->have_posts() ) :
            $sponsors->the_post(); ?>    
            <li>
              <a href="<?php the_field('sponsor_image_url'); ?>" target="_blank">
                <img src="<?php the_field('sponsor_image'); ?>"/>
              </a>
            </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>
      </div>

    </div>
  </div>
</div>
</section>


<footer>
 <div class="container">
  <div id="footer-bottom">
    <div class="footer-bottom-spikes"></div>
    <div class="row">
      <div class="span6"><?php // wp_nav_menu( array('theme_location' => 'secondary') ); ?></div>
      <div class="span12">
    	<ul class="social-menu">
    		<li><a href="/newsletter-sign-up/">Newsletter</a></li>
    		<li><a href="http://facebook.com/yetiseries">Facebook</a></li>
    		<li><a href="http://twitter.com/yetisnowshoe">Twitter</a></li>
    		<!-- <li><a href="https://plus.google.com/106306951365108050735">Google+</a></li> -->
    		<li><a href="http://www.youtube.com/5peaksadventures">YouTube</a></li>
			<!-- <li><a href="<?php bloginfo('rss_url'); ?>">RSS</a></li>
    		<li><a href="http://www.flickr.com/photos/5peaksadventures/">Flickr</a></li> -->
    	</ul>
		
		<ul class="footer-menu">
			<?php wp_list_pages('sort_column=menu_order&depth=1&exclude=41,45&include=&title_li=');?><!-- <li class="page_item"><a href="http://5peakscollection.imagegroupinc.ca/">Store</a></li> -->
		</ul>
        <p class="copyright">
          &#169; The Yeti  <?php the_date('Y'); ?>. All rights reserved. | <a href="/privacy-policy/">Privacy Policy</a>
        </p>
      </div>
    </div> 
  </div>

</div>  <!-- Container -->
</footer>
<?php

//---------- Google Analytics ---------// ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-370334-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php wp_footer(); ?>

<script src="<?php bloginfo('template_url'); ?>/javascript/global-ck.js"></script>

</body>
</html>