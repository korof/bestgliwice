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
// add_filter('single_template', 'my_single_template');


/**
* Single template function which will choose our template
*/
// function my_single_template($single) {
// global $wp_query, $post;

// /**
// * Checks for single template by category
// * Check by category slug and ID
// */
// foreach((array)get_the_category() as $cat) :
// var_dump($cat->slug);
// exit();

// if(file_exists(TEMPLATEPATH . '/single/single-cat-' . $cat->slug . '.php'))
// return TEMPLATEPATH . '/single/single-cat-' . $cat->slug . '.php';


// elseif(file_exists(TEMPLATEPATH . '/single/single-cat-' . $cat->term_id . '.php'))
// return TEMPLATEPATH . '/single/single-cat-' . $cat->term_id . '.php';

// endforeach;
// }
//

add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('stylesheet_directory') . '/images/preloader_10.gif';
}

add_action('init', 'cptui_register_my_cpt_partner');
function cptui_register_my_cpt_partner() {
	register_post_type('partner', array(
	'label' => 'Partnerzy',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'capability_type' => 'post',
	'map_meta_cap' => true,
	'hierarchical' => false,
	'rewrite' => array('slug' => 'partner', 'with_front' => true),
	'query_var' => true,
	'supports' => array('title','editor','thumbnail'),
	'labels' => array (
	  'name' => 'Partnerzy',
	  'singular_name' => 'Partner',
	  'menu_name' => 'Partnerzy',
	  'add_new' => 'Dodaj',
	  'add_new_item' => 'Dodaj nowego partnera',
	  'edit' => 'Edytuj',
	  'edit_item' => 'Edytuj',
	  'new_item' => 'Nowy',
	  'view' => 'Zobacz',
	  'view_item' => 'Zobacz',
	  'search_items' => 'Szukaj partnera',
	  'not_found' => 'Nie znaleziono',
	  'not_found_in_trash' => 'Nie znaleziono w koszu',
	  'parent' => 'Parent Partner',
	)
	) ); 
}

add_action('init', 'cptui_register_my_taxes_partner_kat');
function cptui_register_my_taxes_partner_kat() {
register_taxonomy( 'partner_kat',array (
  0 => 'partner',
),
array( 'hierarchical' => true,
	'label' => 'Partnerzy',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
  'search_items' => 'Partner',
  'popular_items' => 'Popularne',
  'all_items' => 'Wszystkie',
  'parent_item' => 'Rodzic',
  'parent_item_colon' => '',
  'edit_item' => 'Edytuj',
  'update_item' => 'Zaktualizuj',
  'add_new_item' => 'Dodaj',
  'new_item_name' => 'Nowy',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => 'add or remove items',
  'choose_from_most_used' => 'Najczęściej używane',
)
) ); 
}

function scotch_transient_menu( $args = array() ) {
    $defaults = array(
        'menu' => '',
        'theme_location' => '',
        'echo' => true,
    );

    $args = wp_parse_args( $args, $defaults );

    $transient_name = 'scotch_menu-' . $args['menu'] . '-' . $args['theme_location'];
    $menu = get_transient( $transient_name );

    if ( false === $menu ) {
        $menu_args = $args;
        $menu_args['echo'] = false;
        $menu = wp_nav_menu( $menu_args );
        set_transient( $transient_name, $menu, 0 );
    }

    if( false === $args['echo'] ) {
        return $menu;
    }

    echo $menu;

}

add_action( 'wp_update_nav_menu', 'scotch_update_menus' );
function scotch_update_menus() {
    global $wpdb;
    $menus = $wpdb->get_col( 'SELECT option_name FROM $wpdb->options WHERE option_name LIKE "scotch_menu-%" ' );
    foreach( $menus as $menu ) {
        delete_transient( $menu );
    }
}

add_action( 'publish_post', 'purge_project_transient' );
function purge_project_transient( $ID, $post ) {
    if ( 'partner' == $post->post_type ) {
        delete_transient( 'best_cached_media' );
        delete_transient( 'best_cached_partners' );
    }
}


function getTransientPartners() {
	$partner = get_transient('best_cached_partners');


	if ( false === $partner ) {
		$args = array(
	      'post_type' => 'partner',
	      'tax_query' => array(
	        array(
	          'taxonomy' => 'partner_kat',
	          'field' => 'slug',
	          'terms' => 'firmy'
	        )
	      )
	    );
		$partner = new WP_Query( $args );

		set_transient( 'best_cached_partners', $partner, YEAR_IN_SECONDS);
	}
	return $partner;
}

function getTransientMedia() {
	$media = get_transient( 'best_cached_media' );
	if ( false === $media ) {
		 $args = array(
		       'post_type' => 'partner',
		       'tax_query' => array(
		         array(
		           'taxonomy' => 'partner_kat',
		           'field' => 'slug',
		           'terms' => 'media'
		         )
		       )
		     );
		 $media = new WP_Query( $args );

		 set_transient( 'best_cached_media', $media, YEAR_IN_SECONDS );
	}

	return $media;
}