<?php
/*
Plugin Name: Bismillah Plugin
Plugin URI: http://www.hmtmcse.com/wp/plugins/bismillah
Description: First Plugin of Wordpress by Touhid
Author: Touhid Mia
Version: 0.1
Author URI: http://www.hmtmcse.com
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/BismillahBootstrap.php';
register_activation_hook(__FILE__, array('BismillahBootstrap', 'activationTask'));
register_deactivation_hook( __FILE__, array('BismillahBootstrap', 'deactivationTask'));



