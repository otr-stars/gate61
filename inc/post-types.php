<?php
//-- Define cutom post
add_action('init', 'cwt_create_post_type');
//- -Disabled and remove coments
add_filter('comments_open', 'cwt_disable_comments_status', 20, 2);
add_filter('pings_open', 'cwt_disable_comments_status', 20, 2);
add_action('wp_before_admin_bar_render', 'cwt_admin_bar_render');
add_action('admin_init', 'cwt_disable_comments_post_types_support');
add_action('admin_init', 'cwt_disable_comments_dashboard');
//Customize admin menu
add_action('admin_menu', 'cwt_customize_menu_admin_menu');

//-- Adding Excerpts to Pages in WordPress
add_post_type_support('page', 'excerpt');
//-- Add Thumbnail Theme Support
add_theme_support('post-thumbnails');

//-- Comments removes from post and pages
function cwt_disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
//-- Comments disable on the front-end
function cwt_disable_comments_status()
{
    return false;
}
//-- Remove comments metabox from dashboard
function cwt_disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');
}
//-- Comments removes from admin bar
function cwt_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    // $wp_admin_bar->remove_menu('new-post');
}

//-- Manage the appearance of the administrator menu
function cwt_customize_menu_admin_menu()
{
    global $menu;
    //Remove coments and post 
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
    //reoarder pages <-> media
    $menu[5] = $menu[20];
    unset($menu[20]);
}

function cwt_create_post_type()
{
    // register_post_type(
    //     'modals',
    //     array(
    //         'labels' => array(
    //             'name' => __('Modale'),
    //             'singular_name' => __('Modal')
    //         ),
    //         'exclude_from_search' => true,
    //         'public' => true,
    //         'publicly_queryable' => true,
    //         'has_archive' => false,
    //         'show_in_rest' => true,
    //         'supports' => ['editor', 'title'],
    //         'menu_icon' => 'dashicons-testimonial',
    //     )
    // );
}
