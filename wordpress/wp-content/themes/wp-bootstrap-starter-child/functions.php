<?php 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


function cptui_register_my_cpts_projet() {

	/**
	 * Post Type: projets.
	 */

	$labels = array(
		"name" => __( "projets", "wp-bootstrap-starter-child" ),
		"singular_name" => __( "projet", "wp-bootstrap-starter-child" ),
	);

	$args = array(
		"label" => __( "projets", "wp-bootstrap-starter-child" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "projet", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "projet", $args );
}

add_action( 'init', 'cptui_register_my_cpts_projet' );

?>