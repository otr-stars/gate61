<?php
//-- Synchronization ACF JSON
add_filter('acf/settings/save_json', 'cwt_acf_json_save_point');
add_filter('acf/settings/load_json', 'cwt_acf_json_load_point');
//Save
function cwt_acf_json_save_point($path)
{
  $path = get_stylesheet_directory() . '/acf-json';
  return $path;
}
//Load
function cwt_acf_json_load_point($paths)
{
  unset($paths[0]);
  array_push($paths, get_stylesheet_directory() . '/acf-json');
  return $paths;
}

//-- ACF Theme options
class cwt_acf_custom_blocks
{
  private $category = "";
  public function __construct()
  {
    $this->category = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', CWT_THEME_DOMAIN)));
    add_filter('block_categories_all', array($this, 'register_block_categories'), 10, 2);
    // $mainpage = acf_add_options_page(array(
    //     'page_title'    => 'Globalne ustawienia szablonu',
    //     'menu_title'    => 'Ustawienia<br/>Szablonu',
    //     'menu_slug'     => 'theme-general-settings',
    //     'capability'    => 'edit_posts',
    //     'redirect'      => false
    // ));
    // acf_add_options_sub_page(array(
    //     'page_title'  => __('Ustawienia banera'),
    //     'menu_title'  => __('Baner'),
    //     'parent_slug' => $mainpage['menu_slug'],
    // ));
    add_action('acf/init', array($this, 'register_block_types'));
  }
  public function register_block_categories($categories, $post)
  {
    array_unshift($categories, array(
      'slug' => $this->category,
      'title' => CWT_THEME_DOMAIN,
      'icon'  => 'star-filled',
    ));
    return $categories;
  }

  public function register_block_types()
  {
    // acf_register_block_type(array(
    //     'name'              => 'circle_text',
    //     'title'             => '★ ' . __('Tekst w kółku', 'zabka'),
    //     'description'       => __('Tekst w kółku z opcjonalnym obrazkiem nad', 'zabka'),
    //     'render_template'   => 'blocks/circle_text.php',
    //     'category'          =>  $this->category,
    //     'icon'              => 'align-center',
    //     // 'post_types' => array('page'),
    //     'mode' => 'edit',
    //     'supports' => array(
    //         'align' => false,
    //         'anchor' => true,
    //     ),
    // ));
  }
}
// $cwt_acf_custom_blocks = new cwt_acf_custom_blocks();
if (function_exists('acf_register_block_type')) {
  $cwt_acf_custom_blocks = new cwt_acf_custom_blocks();
}
