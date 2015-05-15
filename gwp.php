<?php
/**
 * @package G_WP
 * @version 1.0
 */
/*
Plugin Name: Global WP
Plugin URI: http://wordpress.org/plugins/global-wp/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Alex Nita
Version: 1.0
Author #
License: GPLv2 or later
Text Domain: gwp
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define('GWP_PATH',plugin_dir_path(__FILE__));
define('GWP_URL',plugin_dir_url(__FILE__));


include_once GWP_PATH.'pages/class-class.php';



$gwp = new GWP();
