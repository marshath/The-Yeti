<?php
// Events menu
?>

<aside id="submenu" role="complementary" class="span4" style="margin-top:4em;">

	<nav>
		<h3><span class="en">Events in these Regions</span> <span class="fr">Evenements dans ces regions</span></h3>

<!-- <ul class="submenu-children">
<?php
wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1&post_type=events'); ?>
</ul> -->



	<?php $args = array(
		'show_option_all'    => '',
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 0,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => '',
		'feed_type'          => '',
		'feed_image'         => '',
		'exclude'            => '',
		'exclude_tree'       => '',
		'include'            => '',
		'hierarchical'       => 1,
		'title_li'           => __( '' ),
		'show_option_none'   => __('No '),
		'number'             => null,
		'echo'               => 1,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => 'event-categories',
		'walker'             => null
		); ?>

		<ul class="submenu-children">
			<?php wp_list_categories( $args ); ?>
		</ul>

	</nav>
</aside>

	<?php get_template_part('sidebar'); ?>

<aside id="sidebar" class="span4">

	<span class="sponsor-ad">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Events Sidebar") ) : ?>
		<?php endif; ?>
       </span>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=128443640692192";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-like-box" data-href="https://www.facebook.com/yetiseries" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
       
</aside>
