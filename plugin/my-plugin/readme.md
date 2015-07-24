#### 1. Create Directory 
wp-root-directory/wp-content/plugins/my-plugin/

<br>
#### 2.  Creating Plugin File 
wp-root-directory/wp-content/plugins/my-plugin/my-plugin.php

<br>
#### 3. Add the below code in my-plugin.php file

```php

<?php
/* Plugin Name: My WordPress Plugin
Plugin URI: http://www.miaisoft.com/
Description: Slider Component for WordPress
Version: 1.0
Author: Touhid Mia
Author URI: http://www.hmtmcse.com/
License: GPLv2 or later
*/
?>

```

<br>
#### 4. Activation & Deactivation Hook in my-plugin.php file

```php

function when_trigger_my_plugin_activation(){
//    some code here
}
register_activation_hook(__FILE__, 'when_trigger_my_plugin_activation');


function when_trigger_my_plugin_deactivation() {
//    some code here
}
register_deactivation_hook(__FILE__, 'when_trigger_my_plugin_deactivation');

```


<br>
#### 5. Add Action Hook
add_action( $hook, $function_to_add, $priority, $accepted_args ) : Hooks a function on to a specific action.


<br>
#### 7. wp_register_script( $handle, $src, $deps, $ver, $in_footer );
Registers a script file in WordPress to be linked to a page later using the wp_enqueue_script() function, which safely handles the script dependencies. 

<br>
#### 8.  wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
Links a script file to the generated page at the right time according to the script dependencies


<br>
#### 9. wp_localize_script( $handle, $name, $data );
Localizes a registered script with data for a JavaScript variable.


<br>
#### 10. Include the JavaScript in my-plugin.php File

```php

add_action('wp_enqueue_scripts', 'include_my_plugin_scripts');
function include_my_plugin_scripts() {

 wp_enqueue_script('jquery');
 wp_register_script('slides_js_core', plugins_url('js/jquery.slides.min.js', __FILE__), array("jquery"));
 wp_enqueue_script('slides_js_core');

 wp_register_script('slides_js_init', plugins_url('js/slidesjs.initialize.js', __FILE__));
 wp_enqueue_script('slides_js_init');


 $effect = (get_option('var_my_plugin_slide__effect') == '') ? "slide" : get_option('var_my_plugin_slide_effect');
 $interval = (get_option('var_my_plugin_slide_interval') == '') ? 2000 : get_option('var_my_plugin_slide_interval');
 $auto_play = (get_option('var_my_plugin_slide_auto_play') == 'enabled') ? true : false;
 $play_btn = (get_option('var_my_plugin_slide_play_btn') == 'enabled') ? true : false;
 $config_array = array(
     'effect' => $effect,
     'interval' => $interval,
     'autoplay' => $auto_play,
     'playBtn' => $play_btn
 );
 wp_localize_script('slides_js_init', 'setting', $config_array);

}

```

<br>
#### 11. wp_register_style( $handle, $src, $deps, $ver, $media );
A safe way to register a CSS style file for later use with wp_enqueue_style().


<br>
#### 12. wp_enqueue_style( $handle, $src, $deps, $ver, $media );
A safe way to add/enqueue a stylesheet file to the WordPress generated page.


<br>
#### 13. plugins_url( $path, $plugin );
Retrieves the absolute URL to the plugins or mu-plugins directory (without the trailing slash)


<br>
#### 14. Include the CSS in my-plugin.php File
```php
add_action('wp_enqueue_scripts', 'include_my_plugin_styles');
function include_my_plugin_styles() {
    wp_register_style('my_plugin_base', plugins_url('css/base.css', __FILE__));
    wp_enqueue_style('my_plugin_base');
    wp_register_style('my_plugin_font-awesome', plugins_url('css/font-awesome.min.css', __FILE__));
    wp_enqueue_style('my_plugin_font');
}
```



<br>
#### 15. add_shortcode( $tag , $func );
Adds a hook for a shortcode tag.

<br>
#### 16. get_post_meta ( int $post_id, string $key = '', bool $single = false );
Retrieve post meta field for a post.

<br>
#### 17. Add short-code in my-plugin.php File

```php

add_shortcode("my_plugin_slider", "include_short_code_my_plugin_slider");
function include_short_code_my_plugin_slider($attr, $content) {
    extract(shortcode_atts(array(
        'id' => ''
    ),$attr));

    $gallery_images = get_post_meta($id, "_my_plugin_gallery_images", true);
    $gallery_images = ($gallery_images != '') ? json_decode($gallery_images) : array();

    $html = '<div class="container"><div id="slides">';
    foreach ($gallery_images as $gal_img) {
        if ($gal_img != "") {
            $html .= "<img src='" . $gal_img . "' />";
        }
    }
    $html .= '<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
              <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a></div></div>';
    return $html;
}

```

<br>
#### 18. register_post_type( $post_type, $args );
Create or modify a post type. register_post_type should only be invoked through the 'init' action. It will not work if 
called before 'init', and aspects of the newly created or modified post type will work incorrectly if called later.


<br>
#### 19. Init the Slider in my-plugin.php File

```php

add_action('init', 'register_my_plugin_slider');
function register_my_plugin_slider() {
    $labels = array(
        'menu_name' => _x('Sliders', 'my_plugin_slider'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Slide Shows',
        'supports' => array('title', 'editor'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('my_plugin_slider', $args);
}

```


<br>
#### 20. add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
The add_meta_box() function was introduced in Version 2.5. It allows plugin developers to add meta boxes to the administrative interface.


<br>
#### 21. add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
Add a top level menu page.


<br>
#### 22. For add custom field in custom post menu
```php
add_action('add_meta_boxes', 'my_plugin_slider_meta_box');
function my_plugin_slider_meta_box() {
    add_meta_box("my_plugin_slider_images", "Slider Images", 'my_plugin_slider_images_callback', "my_plugin_slider", "normal");
}

function my_plugin_slider_images_callback() {
    global $post;
    $gallery_images = get_post_meta($post->ID, "my_plugin_gallery_images", true);
    $gallery_images = ($gallery_images != '') ? json_decode($gallery_images) : array();
    $html = '<input type="hidden" name="my_plugin_slider_bok_key" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    $html .= '<table class="form-table">';
    $html .= "
          <tr>
            <th style=''><label for='Upload Images'>Image 1</label></th>
            <td><input name='my_plugin_slider_img[]' id='fwds_slider_upload' type='text' value='" . $gallery_images[0] . "'  /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Image 2</label></th>
            <td><input name='my_plugin_slider_img[]' id='fwds_slider_upload' type='text' value='" . $gallery_images[1] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Image 3</label></th>
            <td><input name='my_plugin_slider_img[]' id='fwds_slider_upload' type='text'  value='" . $gallery_images[2] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Image 4</label></th>
            <td><input name='my_plugin_slider_img[]' id='fwds_slider_upload' type='text' value='" . $gallery_images[3] . "' /></td>
          </tr>
          <tr>
            <th style=''><label for='Upload Images'>Image 5</label></th>
            <td><input name='my_plugin_slider_img[]' id='fwds_slider_upload' type='text' value='" . $gallery_images[4] . "' /></td>
          </tr>

        </table>";
    echo $html;
}
```


<br>
#### 23. For Save custom field value
```php
add_action('save_post', 'my_plugin_slider_images_save');
function my_plugin_slider_images_save($post_id) {
    if (!wp_verify_nonce($_POST['my_plugin_slider_bok_key'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('my_plugin_slider' == $_POST['post_type'] && current_user_can('edit_post', $post_id)) {
        $gallery_images = (isset($_POST['my_plugin_slider_img']) ? $_POST['my_plugin_slider_img'] : '');
        $gallery_images = strip_tags(json_encode($gallery_images));
        update_post_meta($post_id, "my_plugin_gallery_images", $gallery_images);
    } else {
        return $post_id;
    }
}
```


<br>
#### 24. For add configuration menu in menu bar
```php
add_action('admin_menu', 'my_plugin_slider_settings');
function my_plugin_slider_settings() {
    add_menu_page('My Plugin Slider', 'My Plugin Slider', 'administrator', 'my_plugin_settings', 'my_plugin_slider_settings_callback');
}

function my_plugin_slider_settings_callback() {

    $slide_effect = (get_option('var_my_plugin_slide__effect') == 'slide') ? 'selected' : '';
    $fade_effect = (get_option('var_my_plugin_slide__effect') == 'fade') ? 'selected' : '';
    $interval = (get_option('var_my_plugin_slide_interval') != '') ? get_option('fwds_interval') : '2000';
    $autoplay  = (get_option('var_my_plugin_slide_auto_play') == 'enabled') ? 'checked' : '' ;
    $playBtn  = (get_option('var_my_plugin_slide_play_btn') == 'enabled') ? 'checked' : '' ;

    $html = '<div class="wrap">
            <form method="post" name="options" action="options.php">
            <h2>Select Your Settings</h2>' . wp_nonce_field('update-options') . '
            <table width="100%" cellpadding="10" class="form-table">
                <tr>
                    <td align="left" scope="row">
                    <label>Slider Effect</label>
                    <select name="var_my_plugin_slide__effect" >
                      <option value="slide" ' . $slide_effect . '>Slide</option>
                      <option value="fade" '.$fade_effect.'>Fade</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Enable Auto Play</label><input type="checkbox" '.$autoplay.' name="var_my_plugin_slide_auto_play"
                    value="enabled" />

                    </td>
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Enable Play Button</label><input type="checkbox" '.$playBtn.' name="var_my_plugin_slide_play_btn"
                    value="enabled" />

                    </td>
                </tr>
                <tr>
                    <td align="left" scope="row">
                    <label>Transition Interval</label><input type="text" name="var_my_plugin_slide_interval"
                    value="' . $interval . '" />

                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="page_options" value="var_my_plugin_slide_auto_play,var_my_plugin_slide__effect,var_my_plugin_slide_interval,var_my_plugin_slide_play_btn" />
                <input type="submit" name="Submit" value="Update" />
            </p>
            </form>

        </div>';
    echo $html;
}
```


<br>
#### 25. How to add the slider?
Create new custom slide post. Then copy the post id. After that where we want to add the slider this place we have to need
add the shortcode
Example
```php
[my_plugin_slider id="7"]
```


<br>
#### 26. Download the plugin here



