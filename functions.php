<?php

function enqueue_scripts_function() {
	if ( ! is_admin() ) {
		$script_path = get_template_directory_uri() . '/javascript/';
		wp_enqueue_script('jquery');
		// wp_enqueue_script( 'bootstrap_javascript', $script_path . 'jquery.bootstrap.min.js', array( 'jquery', '7868789' ) );
		wp_enqueue_script( 'flexslider', $script_path . 'jquery.flexslider.min.js', array( 'jquery' ), '8675309');
		wp_enqueue_script( 'superfish', $script_path . 'jquery.superfish.min.js', array( 'jquery' ), '7897859765');
		wp_enqueue_script( 'hoverIntent', $script_path . 'jquery.hoverIntent.min.js', array( 'jquery' ), '5551111');
		wp_register_script('meanmenu', $script_path . 'jquery.meanmenu.js', array('jquery'), false );
		wp_enqueue_script('meanmenu');
		wp_enqueue_script( '5peaks-jquery', $script_path . 'custom-jquery.min.js', array( 'jquery' ), '7869869869');
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_function' );

// readd this



// // Callback function to insert 'styleselect' into the $buttons array
// function my_mce_buttons_2( $buttons ) {
// 	array_unshift( $buttons, 'styleselect' );
// 	return $buttons;
// }
// // Register our callback to the appropriate filter
// add_filter('mce_buttons_2', 'my_mce_buttons_2');



// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
						array(
								'title' => '.translation',
								'block' => 'blockquote',
								'classes' => 'translation',
								'wrapper' => true,

								),
						array(
								'title' => '.Register Button',
								'block' => 'a',
								'classes' => 'btn btn-large register',
								'wrapper' => true,

								),
						array(
								'title' => '⇠.rtl',
								'block' => 'blockquote',
								'classes' => 'rtl',
								'wrapper' => true,
								),
						array(
								'title' => '.ltr⇢',
								'block' => 'blockquote',
								'classes' => 'ltr',
								'wrapper' => true,
								),
						);
	// Insert the array, JSON ENCODED, into 'style_formats'
$init_array['style_formats'] = json_encode( $style_formats );

return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



function sButton($atts, $content = null) {
 extract(shortcode_atts(array('link' => '#'), $atts));
 return '<a class="register-btn" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('register', 'sButton');



// This theme supports a variety of post formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Primary Menu' ) );
register_nav_menu( 'secondary', __( 'Secondary Menu' ) );


add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	add_image_size( 'sidebar-news-thumb', 132, 84, 'true' );
	add_image_size( 'category-thumb', 250, 250, 'true' );


// Multiple Excerpts
	function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
	}

	function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
	}


// Categories for media files
	function wptp_add_categories_to_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
	}
	add_action( 'init' , 'wptp_add_categories_to_attachments' );

// Lets fix the events titles with translations, qtranslate plugin
	function _fix_event_title($replace, $_this, $tag) {
	// Do this only if the tag is for Event link AND there are actually qTranslate tags in the title
	if ( in_array(strtoupper($tag), array('#_LINKEDNAME', '#_EVENTLINK')) && preg_match('~&lt;\!--:([A-Za-z]*?)--&gt;~', $replace) ) {
	$event_link = esc_url($_this->get_permalink());
	$event_name = apply_filters('the_title', $_this->event_name);
	$replace = '<a href="'.$event_link.'" title="'.esc_attr($event_name).'">'.esc_attr($event_name).'</a>';
	}

	return $replace;
}

add_filter('em_event_output_placeholder', '_fix_event_title', 10, 3);

//Fix for event sorting
add_filter('em_location_output_placeholder','my_em_placeholder_mod',1,3);
function my_em_placeholder_mod($replace, $EM_Location, $result){
	switch( $result ){
	case '#_LOCATIONNEXTEVENTS':
	$events = EM_Events::get( array('location'=>$EM_Location->location_id, 'scope'=>'future', 'limit'=>3) );
	if ( count($events) > 0 ){
		$replace = get_option('dbem_location_event_list_item_header_format');
		foreach($events as $event){
		$replace .= $event->output(get_option('dbem_location_event_list_item_format'));
		}
		$replace .= get_option('dbem_location_event_list_item_footer_format');
	} else {
		$replace = get_option('dbem_location_no_events_message');
	}
	break;
	}
	return $replace;
}

/*--------------------------------------------------------------------------
Sidebar Widget areas
*/

// Register Sidebar
function home_sidebar()  {

	$args = array(
				'id'            => 'home-sb',
				'name'          => __( 'Homepage Sidebar', 'text_domain' ),
				'description'   => __( 'Sidebar widgetized area for the home page ONLY.', 'text_domain' ),
				'class'         => 'home-sb',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action

add_action( 'widgets_init', 'home_sidebar' );



// Register Sidebar
function event_sidebar()  {

	$args = array(
				'id'            => 'events-sb',
				'name'          => __( 'Events Sidebar', 'text_domain' ),
				'description'   => __( 'Sidebar widgetized area for the events page ONLY.', 'text_domain' ),
				'class'         => 'events-sb',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'event_sidebar' );


// Register Sidebar
function default_sidebar()  {

	$args = array(
				'id'            => 'default-sb',
				'name'          => __( 'Default Sidebar', 'text_domain' ),
				'description'   => __( 'Sidebar widgetized area for all pages EXCEPT Home and Events.', 'text_domain' ),
				'class'         => 'default-sb',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'default_sidebar' );

// Register Sidebar
function banner_ad()  {

	$args = array(
				'id'            => 'banner_advertisement',
				'name'          => __( 'Banner Ad', 'text_domain' ),
				'description'   => __( 'Sitewide banner ad widget area.', 'text_domain' ),
				'class'         => 'banner-ad',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'banner_ad' );

/**
 * CUSTOM POST TYPES BEGIN HERE
 */
add_action('init', 'cptui_register_my_cpt_slideshow');
function cptui_register_my_cpt_slideshow() {
	register_post_type('slideshow', array(
					'label' => 'SlideShow',
					'description' => '',
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'capability_type' => 'post',
					'map_meta_cap' => true,
					'hierarchical' => false,
					'rewrite' => array('slug' => 'slideshow', 'with_front' => true),
					'query_var' => true,
					'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes'),
					'labels' => array (
										'name' => 'SlideShow',
										'singular_name' => 'SlideShow',
										'menu_name' => 'SlideShow',
										'add_new' => 'Add SlideShow',
										'add_new_item' => 'Add New SlideShow',
										'edit' => 'Edit',
										'edit_item' => 'Edit SlideShow',
										'new_item' => 'New SlideShow',
										'view' => 'View SlideShow',
										'view_item' => 'View SlideShow',
										'search_items' => 'Search SlideShow',
										'not_found' => 'No SlideShow Found',
										'not_found_in_trash' => 'No SlideShow Found in Trash',
										'parent' => 'Parent SlideShow',
										)
) ); }

add_action('init', 'cptui_register_my_cpt_sponsors');
function cptui_register_my_cpt_sponsors() {
	register_post_type('sponsors', array(
					'label' => 'Sponsors',
					'description' => '',
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'capability_type' => 'post',
					'map_meta_cap' => true,
					'hierarchical' => false,
					'rewrite' => array('slug' => 'sponsors', 'with_front' => true),
					'query_var' => true,
					'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
					'labels' => array (
										'name' => 'Sponsors',
										'singular_name' => 'Sponsor',
										'menu_name' => 'Sponsors',
										'add_new' => 'Add Sponsor',
										'add_new_item' => 'Add New Sponsor',
										'edit' => 'Edit',
										'edit_item' => 'Edit Sponsor',
										'new_item' => 'New Sponsor',
										'view' => 'View Sponsor',
										'view_item' => 'View Sponsor',
										'search_items' => 'Search Sponsors',
										'not_found' => 'No Sponsors Found',
										'not_found_in_trash' => 'No Sponsors Found in Trash',
										'parent' => 'Parent Sponsor',
										)
) ); }


/**
 * CUSTOM POST TYPES END HERE
 */

?>
