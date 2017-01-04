<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-1',
	  'name' => __( 'Main Sidebar', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="small-12 large-4 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="small-centered large-8 widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
