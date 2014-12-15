<?php
/**
 * bestgliwice functions file
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */


/******************************************************************************\
	Theme support, standard settings, menus and widgets
\******************************************************************************/

add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'link' ) );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

// Create Slider Post Type
// require( get_template_directory() . '/inc/slider/slider_post_type.php' );
// Create Slider
// require( get_template_directory() . '/inc/slider/slider.php' );

// $custom_header_args = array(
// 	'width'         => 980,
// 	'height'        => 300,
// 	'default-image' => get_template_directory_uri() . '/images/header.png',
// );
// add_theme_support( 'custom-header', $custom_header_args );

/**
 * Print custom header styles
 * @return void
 */
// function bestgliwice_custom_header() {
// 	$styles = '';
// 	if ( $color = get_header_textcolor() ) {
// 		echo '<style type="text/css"> ' .
// 				'.site-header .logo .blog-name, .site-header .logo .blog-description {' .
// 					'color: #' . $color . ';' .
// 				'}' .
// 			 '</style>';
// 	}
// }
// add_action( 'wp_head', 'bestgliwice_custom_header', 11 );

// $custom_bg_args = array(
// 	'default-color' => 'fba919',
// 	'default-image' => '',
// );
// add_theme_support( 'custom-background', $custom_bg_args );

register_nav_menu( 'main-menu', __( 'Your sites main menu', 'bestgliwice' ) );

// if ( function_exists( 'register_sidebars' ) ) {
// 	register_sidebar(
// 		array(
// 			'id' => 'home-sidebar',
// 			'name' => __( 'Home widgets', 'bestgliwice' ),
// 			'description' => __( 'Shows on home page', 'bestgliwice' )
// 		)
// 	);

// 	register_sidebar(
// 		array(
// 			'id' => 'footer-sidebar',
// 			'name' => __( 'Footer widgets', 'bestgliwice' ),
// 			'description' => __( 'Shows in the sites footer', 'bestgliwice' )
// 		)
// 	);
// }

// if ( ! isset( $content_width ) ) $content_width = 650;

/**
 * Include editor stylesheets
 * @return void
 */
function bestgliwice_editor_style() {
    add_editor_style( 'css/wp-editor-style.css' );
}
add_action( 'init', 'bestgliwice_editor_style' );


/******************************************************************************\
	Scripts and Styles
\******************************************************************************/

/**
 * Enqueue bestgliwice scripts
 * @return void
 */
function bestgliwice_enqueue_scripts() {
	wp_enqueue_style( 'bestgliwice-styles', get_stylesheet_uri(), array(), '1.0' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0', true );
	wp_enqueue_script( 'autosize', get_template_directory_uri() . '/js/jquery.autosize.min.js', array(), '1.18.12', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '3.1.8', false );
	wp_enqueue_script( 'default-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true );
	// if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'bestgliwice_enqueue_scripts' );


/******************************************************************************\
	Content functions
\******************************************************************************/

/**
 * Displays meta information for a post
 * @return void
 */
function bestgliwice_post_meta() {
	if ( get_post_type() == 'post' ) {
		echo sprintf(
			__( 'Posted %s in %s%s by %s. ', 'bestgliwice' ),
			get_the_time( get_option( 'date_format' ) ),
			get_the_category_list( ', ' ),
			get_the_tag_list( __( ', <b>Tags</b>: ', 'bestgliwice' ), ', ' ),
			get_the_author_link()
		);
	}
	edit_post_link( __( ' (edit)', 'bestgliwice' ), '<span class="edit-link">', '</span>' );
}


function the_tekstsmall($tekst = '', $before = '', $after = '', $echo = true, $length = false) {
	$title = $tekst;

	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title) > $length ) {
		$title = apply_filters('the_tekstsmall', $before . $title . $after, $before, $after);
	}
	
	if ( $echo )
		echo $title;
	else
		return $title;

}

add_filter('show_admin_bar', '__return_false');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

add_theme_support('post-thumbnails');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;

/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :

if(file_exists(TEMPLATEPATH . '/single/single-cat-' . $cat->slug . '.php'))
return TEMPLATEPATH . '/single/single-cat-' . $cat->slug . '.php';

elseif(file_exists(TEMPLATEPATH . '/single/single-cat-' . $cat->term_id . '.php'))
return TEMPLATEPATH . '/single/single-cat-' . $cat->term_id . '.php';

endforeach;
}