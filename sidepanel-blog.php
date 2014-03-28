


	
<aside id="sidebar" class="span4">

	<?php get_template_part('sidepanel-signup'); // Newsletter sign up ?> 
	
	<div class="side-icons"> <? // social media icons ?>
		<h3><span class="en">Follow us on</span><span class="fr">Suivez-nous</span></h3>
		<?php get_template_part('sidepanel-social'); ?>
	</div>


	<?php

$catData = get_the_category();
$catID = $catData[0]->term_id;
$query = new WP_Query('cat='.$catID);

?>

	   <h3><span class="en">Latest from the blog</span><span class="fr">Dernieres nouvelles du blog</span></h3>
<ul>
	<?php

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

?>

			<li><a href="<?php the_permalink(); ?>" class="ellipsis"><?php the_title(); ?></a></li>


			<?php
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>
</ul>
</aside>
