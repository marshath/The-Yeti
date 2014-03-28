<?php
// Right Sidebar
?>

<aside id="sidebar" class="span4">

	<?php get_template_part('sidepanel-signup'); ?>
	
	<div class="side-icons">
		<h3><span class="en">Follow us on</span><span class="fr">Suivez-nous</span></h3>
		<?php get_template_part('sidepanel-social'); ?>
	</div>

	<?php if ( (is_page('3') ) or (is_tax('event-categories') ) or (is_page('11') ) or (is_page('13') ) or (13 == $post->post_parent) or (is_page('17') ) ) { // Facebook feed - Events, Event Regions, Registration, Results, Children of Results, About Us ?>
    
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128443640692192";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
        <div class="fb-like-box" data-href="https://www.facebook.com/yetiseries" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
        
	<?php } ?>
</aside>