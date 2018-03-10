<?php

/**
 * Plugin Name:       ___PLUGIN_NAME___
 * Plugin URI:        https://wordpress.org/plugins/___PLUGIN_NAME___/
 * Description:       Description of ___PLUGIN_NAME___
 * Version:           1.0.0
 * Text Domain:       ___PLUGIN_NAME___
 * Domain Path:       /languages
 */


if ( ! defined( 'WPINC' ) ) {
	die;
}


register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );