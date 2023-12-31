<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G9WVSJLHJN"></script>
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-G9WVSJLHJN');</script>
    
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php is_home() ? bloginfo('description') : wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <link rel="preload" href="/wp-content/themes/gate61/fonts/HelveticaNowProTextRegular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/gate61/fonts/NorthlaneOne.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/gate61/fonts/HelveticaNowProTextRegular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <?php cwt_the_logo('custom_logo','header-logo'); ?>
        <div class="header-menu menu">
            <?php wp_nav_menu(array(
                'menu' => 'Menu',
                'menu_id' => 'menu',
                'container' => '',
                'items_wrap' => '<ul id="%1$s">%3$s</ul>',
            )); ?>
            <?php #<a href="#language" class="menu-language">En</a> ?>
        </div>
        <div class="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </header>