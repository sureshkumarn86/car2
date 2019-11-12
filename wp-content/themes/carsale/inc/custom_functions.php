<?php 
 
/* Post types */
function custom_custom_post_type() {
    $labels = array('name' => esc_html__('Cars', 'Post Type General Name', 'carsale'), 
	'singular_name' => esc_html__('Car', 'Post Type Singular Name', 'carsale'), 
	'menu_name' => __('Cars', 'carsale'), 
	'parent_item_colon' => __('Parent Cars', 'carsale'), 
	'all_items' => __('All Cars', 'carsale'), 
	'view_item' => __('View Cars', 'carsale'), 
	'add_new_item' => __('Add New Car', 'carsale'), 
	'add_new' => __('Add New', 'carsale'), 
	'edit_item' => __('Edit Cars', 'carsale'), 
	'update_item' => __('Update Car', 'carsale'),
	'search_items' => __('Search Car', 'carsale'), 
	'not_found' => __('Not Found', 'carsale'), 
	'not_found_in_trash' => __('Not found in Trash', 'carsale'), );
    $args = array('label' => __('Cars', 'carsale'), 
	'description' => __('Sell cars', 'carsale'), 
	'labels' => $labels, 'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'), 
	'taxonomies' => array('car'), 'hierarchical' => false, 'public' => true, 'show_ui' => true, 'show_in_menu' => true, 'show_in_nav_menus' => true, 'show_in_admin_bar' => true, 'menu_position' => 25, 'can_export' => true, 'has_archive' => true, 'exclude_from_search' => false, 'publicly_queryable' => true, 'capability_type' => 'page', );
    register_post_type('cars', $args);
}
add_action('init', 'custom_custom_post_type');

function create_custom_taxonomies() {
    $labels = array('name' => _x('Brands', 'taxonomy general name', 'carsale'),
	'singular_name' => _x('Brand', 'taxonomy singular name', 'carsale'),
	'search_items' => __('Search Brand', 'carsale'), 
	'all_items' => __('All Brands', 'carsale'), 
	'parent_item' => __('Parent Brand', 'carsale'), 
	'parent_item_colon' => __('Parent Brand:', 'carsale'), 
	'edit_item' => __('Edit Brand', 'carsale'), 
	'update_item' => __('Update Brand', 'carsale'), 
	'add_new_item' => __('Add New Brand', 'carsale'), 
	'new_item_name' => __('New Brand', 'carsale'), 
	'menu_name' => __('Brand', 'carsale'), );
    $args = array('hierarchical' => true, 'labels' => $labels, 'show_ui' => true, 'show_admin_column' => true, 'query_var' => true, 'rewrite' => array('slug' => 'Brand'), );
    register_taxonomy('brand', array('cars'), $args);
}
add_action('init', 'create_custom_taxonomies', 0);



add_filter('body_class', function (array $classes) {
    if (in_array('m-index', $classes)) {
      unset( $classes[array_search('m-index', $classes)] );
    }
  return $classes;
});

add_action( 'body_class', 'my_custom_class');
function my_custom_class( $classes ) {
	if(is_archive()){
		$classes[] = 'm-listings';
	}  
  return $classes;
}