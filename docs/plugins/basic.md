#### Hooks: 
WordPress hooks allow you to tap into WordPress at specific points to change how WordPress behaves without editing any core files.
There are two types of hooks 

1. *Actions*: Actions allow you to add or change WordPress functionality,
2. *Filters*: Filters allow you to alter content as it is loaded and displayed to the website user.

#### Basic Hooks 
1. register_activation_hook() : The activation hook is run when you activate your plugin. 
2. register_deactivation_hook() : The deactivation hook is run when you deactivate your plugin. 
3. register_uninstall_hook(): These uninstall methods are used to clean up after your plugin is deleted using the WordPress Admin. 



#### Header Requirements / Plugin Identification

**Plugin Name**: (required) The name of your plugin, which will be displayed in the Plugins list in the WordPress Admin.
**Plugin URI**: Plugin Website url
**Description**: A short description of the plugin, as displayed in the Plugins section in the WordPress Admin. 
**Version**: The current version number of the plugin. etc

```php
<?php
/*
Plugin Name:  WordPress.org Plugin
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin Header Comment
Version:      20160911
Author:       WordPress.org
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/
```


#### Activation 
To set up an activation hook, use the register_activation_hook() function:

```php
register_activation_hook( __FILE__, 'pluginprefix_function_to_run' );
```

**Example**
```php
function pluginprefix_setup_post_type() {
    // register the "book" custom post type
    register_post_type( 'book', ['public' => 'true'] );
}
add_action( 'init', 'pluginprefix_setup_post_type' );
 
function pluginprefix_install() {
    // trigger our function that registers the custom post type
    pluginprefix_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'pluginprefix_install' );
```


   
#### Deactivation  
To set up a deactivation hook, use the register_deactivation_hook() function:

```php
register_deactivation_hook( __FILE__, 'pluginprefix_function_to_run' );
```
            
**Example**
```php
function pluginprefix_deactivation() {
    // unregister the post type, so the rules are no longer in memory
    unregister_post_type( 'book' );
    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivation' );
```








