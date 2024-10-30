<?php 
/**
 * @package Custom Menu Shortcode
 * @version 1.0
 */
/*
Plugin Name: Custom Menu Shortcode
Plugin URI: http://www.basvanderlans.nl/wordpress-plugin/custom-menu-shortcode
Description: Add Custom Menus with a shortcode: [custommenu menu=Menu]. A plugin based on a script by <a href="http://www.cozmoslabs.com/1170-wp_nav_menu-shortcode/">Cozmoslabs</a>. 
Author: Bas van der Lans
Version: 1.0
Author URI: http://www.basvanderlans.nl
*/

/**
 * Adds the possibility to callback Custom Menus by a Shortcode 
 * 
 * @author Bas van der Lans
 * @copyright based on a snippet by Cozmoslabs: http://www.cozmoslabs.com/1170-wp_nav_menu-shortcode/
 * @link http://www.basvanderlans.nl/wordpress-custom-menu-shortcode
 * @param array $atts WordPress Custom Menu Parameters
 * @return string w/ WordPress Custom Menu
 */
function vo_custom_menu_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( 
		array(  
			'menu'            => '', 
			'container'       => 'div', 
			'container_class' => '', 
			'container_id'    => '', 
			'menu_class'      => 'menu', 
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'depth'           => 0,
			'walker'          => '',
			'theme_location'  => ''
		), $atts )
	); 
 
	return wp_nav_menu( 
		array( 
			'menu'            => $menu, 
			'container'       => $container, 
			'container_class' => $container_class, 
			'container_id'    => $container_id, 
			'menu_class'      => $menu_class, 
			'menu_id'         => $menu_id,
			'echo'            => false,
			'fallback_cb'     => $fallback_cb,
			'before'          => $before,
			'after'           => $after,
			'link_before'     => $link_before,
			'link_after'      => $link_after,
			'depth'           => $depth,
			'walker'          => $walker,
			'theme_location'  => $theme_location
		) 
	);
}

/**
 * Adds the Custom Menu Shortcode function to a Shortcode.
 * 
 */
add_shortcode( "custommenu", "vo_custom_menu_shortcode" );