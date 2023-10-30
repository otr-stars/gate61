<?php
/*
 * Theme Name: Gate61Theme
 * Description: Custom Gate 61 Offices theme
 */
define('CWT_THEME_DIR_URI', get_template_directory_uri());
define('THEME_VERSION', ((WP_DEBUG === false) ? wp_get_theme()->get('Version') : time()));

add_filter('xmlrpc_enabled', '__return_false');     //Disabled xmlrp https://en.wikipedia.org/wiki/XML-RPC
add_filter('rest_jsonp_enabled', '__return_false'); //Disabled, https://developer.wordpress.org/reference/hooks/rest_jsonp_enabled/

// -- Css/Js manager with transient support
require_once('inc/enqueue-scripts.php');

// -- Menu
require_once('inc/menu.php');

// -- Helpers
require_once('inc/helpers.php');

// -- Post Types
require_once('inc/post-types.php');

// -- Media config
require_once('inc/media.php');

// -- Admin
require_once('inc/admin.php');

// -- Theme Setup 
require_once('inc/theme-setup.php');

// -- ACF 
require_once('inc/acf.php');

// -- Loader
require_once('inc/svg_loader.php');

// -- Image Lazy Load 
require_once('inc/lazyload.php');

/*--debug info*/
if (is_user_logged_in()) {
    function wpse_footer_db_queries()
    {
        echo '<pre style="color:red;position:fixed;bottom:10%;right:0%;z-index:999;background: #fff;">
        ' . get_num_queries() . ' queries in ' . timer_stop(0);
        echo '</pre>' . PHP_EOL;
    }

    // add_action('admin_footer', 'wpse_footer_db_queries');
    // add_action('wp_footer', 'wpse_footer_db_queries');
}


function acf_get_section_class(array $custom = [], array $block = [], $is_preview = false)
{
    if ($is_preview) {
        array_push($custom, 'is-admin');
    }
    if (isset($block['className']) === true && empty($block['className']) === false) {
        array_push($custom, $block['className']);
    }
    return $custom;
}