<?php

add_action('init', 'cwt_menu_register');
add_action('widgets_init', 'cwt_register_sidebars');

add_theme_support('custom-logo', array(
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('site-title', 'site-description'),
));

// add_theme_support('post-thumbnails') ;

//-- SIDEBARS REGISTERS
function cwt_register_sidebars()
{
    // register_sidebar(
    //     array(
    //         'name'          => __('First column in footer', 'zabka'),
    //         'description'   => __('First column in footer with contact info', 'zabka'),
    //         'id'            => 'first_footer_col',
    //         'before_widget' => '',
    //         'after_widget'  => '',
    //         'before_title'  => '<h2 class="widgettitle">',
    //         'after_title'   => '</h2>'
    //     )
    // );
}

//-- MENU REGISTER 
function cwt_menu_register()
{
    register_nav_menus(array(
        'menu' => __('Menu', 'cwt_admin'),
    ));
    
}