<?php
// Load main styles
function cwt_scripts()
{
  wp_dequeue_style('wp-block-library');
  wp_register_style('cwt', CWT_THEME_DIR_URI . '/dist/main.css', [], THEME_VERSION);
  wp_enqueue_style('cwt'); // Enqueue it!

  /* Jacvvascripts */
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_register_script('cwt', CWT_THEME_DIR_URI . '/dist/main.js', [], THEME_VERSION, true); // Custom scripts
    wp_enqueue_script('cwt'); // Enqueue it!
  }
  wp_deregister_script('jquery');
  wp_dequeue_style('global-styles');
}

//Style i skrypty do bloków
// function cwt_admin_blocks_scripts()
// {
//   wp_enqueue_style('admin-blocks-style', get_template_directory_uri() . '/dist/admin-blocks.css', [], THEME_VERSION);
//   wp_enqueue_script('admin-blocks-script', get_template_directory_uri() . '/dist/admin-blocks.js',   ['wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'], THEME_VERSION, true);
// }
// add_action('enqueue_block_editor_assets', 'cwt_admin_blocks_scripts');

//Style i skrypty do panelu admina
// function cwt_admin_scripts(){
//   wp_enqueue_style('admin-style', get_template_directory_uri() . '/dist/admin.css', [], THEME_VERSION);
//   wp_enqueue_script('admin-script', get_template_directory_uri() . '/dist/admin.js',   [], THEME_VERSION, true);
// }
// add_action( 'admin_enqueue_scripts', 'cwt_admin_scripts' );

function cwt_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

/*------------------------------------*\
Actions + Filters + ShortCodes
\*------------------------------------*/
// Enqueue block editor JS and CSS
// add_action('enqueue_block_assets', 'cwt_jsforwpblocks_editor_scripts');

// Add Actions
// add_action('init', 'cwt_header_scripts'); // Add Custom Scripts to wp_head
add_action('init', 'cwt_disable_emojis');
add_action('wp_enqueue_scripts', 'cwt_scripts'); // Add Theme Stylesheet

// Remove Actions
// remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
// remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/* REMOVE REST API INFO FROM HEADER */
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head');          //Remove json api links in header https://developer.wordpress.org/reference/functions/rest_output_link_wp_head/
// remove_action('wp_head', 'wp_oembed_add_discovery_links');         //Remove json api links in header https://developer.wordpress.org/reference/functions/wp_oembed_add_discovery_links/
remove_action('template_redirect', 'rest_output_link_header', 11, 0); //Remove json api links in header https://developer.wordpress.org/reference/functions/rest_output_link_header/

/**
 * Clean up output of <script> tags
 */
add_filter('script_loader_tag', 'cwt_remove_type_attr', 10, 2);

function cwt_remove_type_attr($tag, $handle)
{
    return preg_replace("/ type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

/* Formatowanie tagów styli */
add_filter('style_loader_tag',  'cwt_style_loader_tag', 10, 4);
function cwt_style_loader_tag($html, $handle, $href, $media)
{
    return preg_replace("/ type=['\"]text\/css['\"]/", '', $html);
}
