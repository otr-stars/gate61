<?php

add_action('init', 'cwt_menu_register');
// add_action('widgets_init', 'cwt_register_sidebars');

//Rejestracja loga w stopce
function custom_theme_settings()
{
    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_theme_support('custom-footer-logo', array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}

add_action('after_setup_theme', 'custom_theme_settings');

function footer_logo_customizer($wp_customize)
{
    // Dodaj pole wyboru drugiego loga do sekcji "Tożsamość witryny"
    $wp_customize->add_setting('footer_logo_setting', array(
        'type' => 'theme_mod',
        'sanitize_callback' => function ($value) {
            return attachment_url_to_postid($value);
        }
        // Dodaj inne opcje według potrzeb
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
            'label'    => __('Logo w stopce', 'text-domain'),
            'section'  => 'title_tagline',
            'settings' => 'footer_logo_setting',
            'mime_type' => 'image', // Określ typ pliku
        ))
    );
}
add_action('customize_register', 'footer_logo_customizer');

// add_theme_support('post-thumbnails') ;

//-- SIDEBARS REGISTERS
// function cwt_register_sidebars()
// {
//     // register_sidebar(
//     //     array(
//     //         'name'          => __('First column in footer', 'zabka'),
//     //         'description'   => __('First column in footer with contact info', 'zabka'),
//     //         'id'            => 'first_footer_col',
//     //         'before_widget' => '',
//     //         'after_widget'  => '',
//     //         'before_title'  => '<h2 class="widgettitle">',
//     //         'after_title'   => '</h2>'
//     //     )
//     // );
// }

//-- MENU REGISTER 
function cwt_menu_register()
{
    register_nav_menus(array(
        'menu' => __('Menu', 'cwt_admin'),
    ));
}
