<?php
/* MENU FUNCTIONALITY */
add_action( 'init', 'my_custom_menus' );
function my_custom_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Main Menu' ),
            'secondary-menu' => __( 'Mobile Menu' )
        )
    );
}
/* ADVANCED CUSTOM FIELDS */
if( function_exists('acf_add_options_page') ) {
 	acf_add_options_page();
 	acf_add_options_sub_page('General');
 	acf_add_options_sub_page('Header');
 	acf_add_options_sub_page('Footer');
 	acf_add_options_sub_page('Social Media');
 	/* CHANGE TITLE OF OPTIONS AREA */
 	if( function_exists('acf_set_options_page_title') )
 	{
 	    acf_set_options_page_title( __('Theme Options') );
 	}
}
/* STYLE SHEET ACTIVATION */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'core', 'style.css', false ); 
}
/* JAVASCRIPT ACTIVATION */
function themeslug_enqueue_script() {
	wp_enqueue_script( 'my-js', 'filename.js', false );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

/* SIDEBAR ACTIVATION */
if ( function_exists('register_sidebar') )
register_sidebar(array( 'name' => 'Main Sidebar', 'id' => 'main', 'before_widget' => '<li id="%1$s" class="widget %2$s">', 'after_widget' => '</li>', 'before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>', ));

if ( function_exists('register_sidebar') )
register_sidebar(array( 'name' => 'Eateries Sidebar', 'id' => 'eateries', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>', ));

if ( function_exists('register_sidebar') )
register_sidebar(array( 'name' => 'Shops Sidebar', 'id' => 'shops', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>', ));

if ( function_exists('register_sidebar') )
register_sidebar(array( 'name' => 'Services Sidebar', 'id' => 'services', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h2 class="widgettitle">', 'after_title' => '</h2>', ));

/* FEATURED IMAGE ACTIVATION */
add_theme_support( 'post-thumbnails' );
/* LOGO IMAGE CROP */
add_image_size( 'logo-crop', 500, 455 );

/* CUSTOM MENU LINK CLASS */
function add_menuclass($ulclass) {
    return preg_replace('/<a/', '<a class="smoothScroll"', $ulclass);
    return $output;
}
add_filter('wp_nav_menu', 'add_menuclass');

/* SHORTCODE IN TEXT WIDGET ACTIVATION */
add_filter('widget_text', 'do_shortcode');

/* IMAGE SIZES */

function sgr_display_image_size_names_muploader( $sizes ) {
$new_sizes = array();
$added_sizes = get_intermediate_image_sizes();
// $added_sizes is an indexed array, therefore need to convert it
// to associative array, using $value for $key and $value
foreach( $added_sizes as $key => $value) {
$new_sizes[$value] = $value;
}
// This preserves the labels in $sizes, and merges the two arrays
$new_sizes = array_merge( $new_sizes, $sizes );
return $new_sizes;
}
add_filter('image_size_names_choose', 'sgr_display_image_size_names_muploader', 11, 1);

register_sidebar( $args );

function lightbox_popup() {
    ob_start();
    get_template_part('lightbox');
    return ob_get_clean();
} 
add_shortcode( 'lightbox-popup', 'lightbox_popup' );
?>