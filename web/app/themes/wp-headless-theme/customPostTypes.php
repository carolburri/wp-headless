<?php
add_action( 'init', 'createCustomPostTypes' );
function createCustomPostTypes() {
	register_post_type( 'projects',
        array(
            'labels' => array(
                'name' => __( 'Project'),
                'singular_name' => __( 'Projects' )
            ),
            'public' => true,
            'has_archive' => true,
						'show_in_rest' => true,
            'rewrite' => array('slug'=>'projects'),
            'capability_type' => 'page',
            'supports' => array('thumbnail', 'title', 'custom-fields', 'revisions', 'page-attributes', 'post-formats'),
            // see http://www.kevinleary.net/wordpress-dashicons-list-custom-post-type-icons/
            'menu_icon' => 'dashicons-star-filled',
            'hierarchical' => true,
        )
    );
    flush_rewrite_rules();
}
