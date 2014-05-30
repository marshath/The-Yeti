		
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
      	<div class="social-menu"><?php get_template_part('sidepanel-social'); ?></div>
		
		<?php wp_nav_menu( array('theme_location' => 'secondary', 'menu_class' => 'footer-menu') ); ?>

        <p class="copyright">
          &#169; 5 Peaks Adventures Ltd. All rights reserved. | <a href="/privacy-policy/">Privacy Policy</a>
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