<?php


add_filter('show_admin_bar', '__return_false');     //Remove Admin bar
add_filter('login_headerurl', 'w_admin_logo_url');  //Change logo url

// add_action( 'admin_enqueue_scripts', 'w_admin_style_script', '999');
// add_action( 'login_enqueue_scripts', 'w_admin_style_script');

//Remove wordpress ico from
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}, 0);


function w_admin_logo_url()
{
    return get_bloginfo('url');
}


// styles
function w_admin_style_script() {
	// $child_theme_directory = get_stylesheet_directory_uri();
	// wp_enqueue_style('style-admin', $child_theme_directory . '/assets/style-admin.css');
	// wp_enqueue_style('style-admin-blocks', $child_theme_directory . '/assets/admin-blocks.css');
	// wp_enqueue_script('script-admin', $child_theme_directory . '/assets/script-admin.js');
}
