<?php
// Register Custom Post Type
function raw_html_post_type() {

	$labels = array(
		'name'                => _x( 'Raw HTML Snippets', 'Post Type General Name', 'raw_html' ),
		'singular_name'       => _x( 'Raw HTML Snippet', 'Post Type Singular Name', 'raw_html' ),
		'menu_name'           => __( 'HTML Snippets', 'raw_html' ),
		'parent_item_colon'   => __( 'Parent Item:', 'raw_html' ),
		'all_items'           => __( 'All Items', 'raw_html' ),
		'view_item'           => __( 'View Item', 'raw_html' ),
		'add_new_item'        => __( 'Add New HTML Snippet', 'raw_html' ),
		'add_new'             => __( 'Add New', 'raw_html' ),
		'edit_item'           => __( 'Edit HTML Snippet', 'raw_html' ),
		'update_item'         => __( 'Update HTML Snippet', 'raw_html' ),
		'search_items'        => __( 'Search HTML Snippet', 'raw_html' ),
		'not_found'           => __( 'Not found', 'raw_html' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'raw_html' ),
	);
	$args = array(
		'label'               => __( 'raw_html', 'raw_html' ),
		'description'         => __( 'Raw HTML Snippets', 'raw_html' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		//'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-media-code',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'raw_html', $args );
    
    add_action( 'add_meta_boxes', 'addRawHTMLBoxes' );
    
}


function addRawHTMLBoxes() {
    // adds a meta box see FrontPageMeta() for content
    add_meta_box("raw_html", "Content", "rawHTMLMeta", "raw_html", "normal", "high");

}

function rawHTMLMeta($post) {
    // Content for FrontPage Meta data
    include "meta-box.php";
}

if(!function_exists("save_meta_data")){
    /*
    * save meta data from post
    */

    add_action( 'save_post', 'save_meta_data');

    function save_meta_data($postID) {
        if($_REQUEST['meta']) {
            foreach($_REQUEST['meta'] as $metaKey => $metaValue) {
                add_post_meta($postID, $metaKey, $metaValue, true) or update_post_meta($postID, $metaKey, $metaValue);
            }
        }
    }
}

// Add Shortcode
function raw_html_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
		), $atts )
	);
	
	return get_post_meta( $id, "raw_html", true );
}
add_shortcode( 'raw_html', 'raw_html_shortcode' );

add_action( 'admin_print_scripts-post-new.php', 'raw_html_script', 11 );
add_action( 'admin_print_scripts-post.php', 'raw_html_script', 11 );

add_action( 'admin_init', 'raw_html_styles' );

function raw_html_styles() {
    wp_register_style( 'raw_html_styles', RAW_HTML_URL . 'css/raw-html-shortcode.min.css' );
    wp_enqueue_style( 'raw_html_styles' );
}

function raw_html_script() {
    global $post_type;
    if( 'raw_html' == $post_type ) {
        wp_enqueue_script( 'raw_html_script', RAW_HTML_URL . 'js/raw-html-shortcode.min.js' );
    }
}

// Hook into the 'init' action
add_action( 'init', 'raw_html_post_type', 0 );