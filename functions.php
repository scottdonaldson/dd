<?php
 
// Featured images

add_theme_support('post-thumbnails');

// Admin style
function my_admin_head() {
	echo '<link rel="stylesheet" type="text/css" href="' .content_url('/themes/dugoff/css/admin-style.css', __FILE__). '">';
}
add_action('admin_head', 'my_admin_head');

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

/* ------ Remove a few admin pages ----- */

function remove_admin() {
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');
	//remove_menu_page('tools.php');	
}
add_action('admin_menu', 'remove_admin');

// Remove post formats

remove_theme_support('post-formats');


// Custom login screen

function my_login_head() {
	echo "<link rel='stylesheet' href='".get_bloginfo('template_url')."/css/login-style.css'>";
	echo "<script src='".get_bloginfo('template_url')."/js/login.js'></script>";
}
add_action('login_head', 'my_login_head');

function loginpage_custom_link() {
	return 'http://www.dugoff.com';
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

?>