<?php
/*
Plugin Name: Live Cricket Scores
Plugin URI: http://www.cricscores1.com/
Description: Show live Cricket scores on your website for Free. Visit http://www.cricscores.net for demo.
Version: 1.3
Author: M Tanveer Nandla
Author URI: http://fb.me/nandla
*/


require_once( plugin_dir_path( __FILE__ ) . 'widget_class.php' );

/**
 * Load the plugin when plugins are loaded.
 */

add_action( 'plugins_loaded', array( 'Scoreboard_Widget_Loader', 'load' ) );

/**
 * The main plugin class for loading the widget and attaching necessary hooks.
 */

class Scoreboard_Widget_Loader {

	/**
	 * Setup functionality needed by the widget.
	 */

	public static function load() {

		add_action( 'widgets_init', array( __CLASS__, 'register_widget' ) );

	}

	/**
	 * Register the image widget.
	 */

	public static function register_widget() {

		register_widget( 'scoreboard_widget' );

	}

}

?>