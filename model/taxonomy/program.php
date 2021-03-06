<?php

if ( ! function_exists( 'program' ) ) {

// Register Custom Taxonomy
function program() {

	$labels = array(
		'name'                       => _x( 'Program', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Program', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Programs', 'sage' ),
		'all_items'                  => __( 'All Program', 'sage' ),
		'parent_item'                => __( 'Parent Program', 'sage' ),
		'parent_item_colon'          => __( 'Parent Program:', 'sage' ),
		'new_item_name'              => __( 'New Program Name', 'sage' ),
		'add_new_item'               => __( 'Add New Program', 'sage' ),
		'edit_item'                  => __( 'Edit Program', 'sage' ),
		'update_item'                => __( 'Update Program', 'sage' ),
		'view_item'                  => __( 'View Program', 'sage' ),
		'separate_items_with_commas' => __( 'Separate Programs with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove Programs', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Programs', 'sage' ),
		'search_items'               => __( 'Search Programs', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
	);
	$rewrite = array(
		'slug'                       => 'program',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'program', array( 'post', ' film', ' event' ), $args );

}
add_action( 'init', 'program', 0 );
}
