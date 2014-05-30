<?php

/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<section id="main-content" class="span8">

	<?php
	global $post;

	$EM_Event = em_get_event($post->ID, 'post_id');
	?>

	<h1><?php echo $EM_Event->output('#_EVENTNAME'); ?></h1>

	<div class="event-info">
<?php echo $EM_Event->output('#_EVENTIMAGE'); ?>


<p>



	<?php
	// register link (ACF)
	$rl = get_field('registration_link');

	echo $EM_Event->output(
	"{is_future}<a class='register-btn' href='{$rl}' target='_blank'><i class='icon-user'></i> <span class='en'>Register Now</span> <span class='fr'>Inscrivez-vous maintenant</span></a>{/is_future}");

?>

	<?php
	// volunteer link (ACF)
	$vl = get_field('volunteer_link');

	echo $EM_Event->output(
	"{is_future}<a class='volunteer-btn' href='{$vl}' target='_blank'><i class='icon-heart'></i> <span class='en'>Volunteer Now</span> <span class='fr'>Engagez-vous maintenant</span></a>{/is_future}");

?>

<p>
	<?php echo $EM_Event->output('{is_past}<h4><span class="en">This event is over. The results will be posted as soon as they become available on the <a href="http://theyeti.ca/results/">Results page</a>.</span><span class="fr">Cette manifestation est terminee. Les resultats seront affiches des qu\'ils seront disponibles sur <a href="http://theyeti.ca/fr/results/">la page des resultats</a>.</span></h4>{/is_past}');?>
</p>






</p>



				<h4><span class="en">Description:</span> <span class="fr">Description:</span></h4>
				<?php the_field('notes'); ?>
				
				
	
				<h4><span class="en">When</span> <span class="fr">Quand:</span></h4>
				<?php echo $EM_Event->output('#_EVENTDATES'); ?>
				
				

				<h4><span class="en">Directions:</span> <span class="fr">Description:</span></h4>
				<?php the_field('directions'); ?> <br><?php the_field('directions_map_link'); ?>



				<h4><span class="en">Where:</span> <span class="fr">Instructions:</span></h4>
				<?php echo $EM_Event->output('#_LOCATIONMAP'); ?><br>
					<?php the_field('location_details'); ?>


				<h4><span class="en">Event Schedule:</span> <span class="fr">Dalendrier des evenements:</span></h4>
				<?php the_field('event_schedule'); ?>



				<h4><span class="en">Washrooms:</span> <span class="fr">Toilettes:</span></h4>
				<?php the_field('washrooms'); ?>



				<h4><span class="en">Parking:</span> <span class="fr">Parking:</span></h4>
				<?php the_field('parking'); ?>



				<h4><span class="en">Important Notes</span> <span class="fr">Remarques importantes:</span></h4>
				<?php the_field('important_notes'); ?>



				<h4><span class="en">Spectators:</span> <span class="fr">Spectateurs:</span></h4>
				<?php the_field('spectators'); ?>



				<h4><span class="en">Awards &amp; Prizes:</span> <span class="fr">Recompenses et prix:</span></h4>
				<?php the_field('awards_and_prizes'); ?>



				<h4><span class="en">Results:</span> <span class="fr">Resultats:</span></h4>

					<?php if( get_field('race_map_1') ):
					?><a href="<?php the_field('results_pdf'); ?>" >Race Results</a> (PDF)
				<?php endif; ?> <br/>
				<?php if( get_field('race_map_2') ):
				?><a href="<?php the_field('results_html'); ?>" >Race Results</a> (HTML)
			<?php endif; ?>




	<h4><span class="en">Registration Deadline and Fee:</span> <span class="fr">Date limite d'inscription et frais:</span></h4>
	<?php the_field('registration_deadline'); ?> &mdash; <?php the_field('regular_fee'); ?>



	<h4><span class="en">Early Bird Deadline and Fees</span> <span class="fr">Les frais de preinscription et frais:</span></h4>
	<?php the_field('early_bird_deadline'); ?> &mdash; <?php the_field('early_bird_cost'); ?>



	<h4><span class="en">Registration: </span><span class="fr">Inscription:</span></h4>
	<a href="<?php the_field('registration_link'); ?>" class="register-btn" target='_blank'><i class='icon-user'></i> <span class="en">Register Now </span><span class="fr">Inscrivez-vous maintenant</span></a>




</table>



<!-- <div class="entry-content">
	<p>-->
		<?php // echo $EM_Event->output('#_EVENTNOTES'); //This is the main content field for the event, currently hidden.?>
	<!-- </p>
</div> -->


</section><!-- #main-content -->


<?php get_template_part('sidepanel-events');
get_footer(); ?>
