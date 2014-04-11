<?php

function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'press_to_projects',
		'from' => 'projects',
		'to' => 'press-clipping'
	) );
}

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150, true );
}

add_action( 'p2p_init', 'my_connection_types' );