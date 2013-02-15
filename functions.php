<?php
 
// Featured images
add_theme_support('post-thumbnails');

// include jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    // As of Nov. 2012, latest jQuery is 1.8.2
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}

// Create Project custom post type
function create_post_type_project() {
	register_post_type( 'project',
		array(
		'labels' => array(
			'name' => __( 'Projects' ),
			'singular_name' => __( 'Project' )
			),
		'public' => true,
		'rewrite' => array(
			'slug' => '/'
			),
		'menu_position' => 4,
		'taxonomies' => array('category')				
		)
	);
	add_post_type_support( 'project', 'thumbnail' );
	add_post_type_support( 'project', 'custom-fields' );
}
add_action( 'init', 'create_post_type_project' );


// Remove some stuff from head
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');

/* ------ Remove a few admin pages ----- */
function remove_admin() {
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');	
}
add_action('admin_menu', 'remove_admin');

// Remove post formats
remove_theme_support('post-formats');


// Custom login screen
function my_login_head() {
	echo "<link rel='stylesheet' href='".get_bloginfo('template_url')."/css/login-style.css'>";
}
add_action('login_head', 'my_login_head');

function loginpage_custom_link() {
	return site_url();
}
add_filter('login_headerurl','loginpage_custom_link');

function change_title_on_logo() {
	return 'Daniel DuGoff';
}
add_filter('login_headertitle', 'change_title_on_logo');
	
// Admin footer
add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = 'Site developed by <a href="http://parsleyandsprouts.com" target="_blank">Parsley &amp; Sprouts</a>.';
    return $text;
}
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = '&copy; '.date('Y');
    return $text;
}	

/* ------ EDIT.PHP add column ---- */
add_filter('manage_posts_columns', 'id_column');
add_action('manage_posts_custom_column', 'custom_column', 10, 2);
function id_column($defaults) {
    $defaults['ID'] = __('ID');
    return $defaults;
}
function custom_column($column_name, $post_id) {
    global $wpdb;
    if( $column_name == 'ID' ) {
        $ID = get_the_ID();
        echo $ID;
    }
}

?>