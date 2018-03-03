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




   

            
