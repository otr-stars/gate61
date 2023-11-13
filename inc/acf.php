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
    $this->category = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', 'cwt')));
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
      'title' => 'cwt',
      'icon'  => 'star-filled',
    ));
    return $categories;
  }

  public function register_block_types()
  {
    acf_register_block_type(array(
        'name'              => 'met',
        'title'             => '★ ' . __('Poznaj Gate61', 'gate'),
        'description'       => __('Baner (Poznaj Gate61) z tekstem', 'gate'),
        'render_template'   => 'src/blocks/met.php',
        'category'          =>  $this->category,
        'icon'              => 'align-center',
        'mode' => 'edit',
        'supports' => array(
            'align' => false,
            'anchor' => true,
        ),
    ));

    acf_register_block_type(array(
      'name'              => 'adventages',
      'title'             => '★ ' . __('Zalety budynku', 'gate'),
      'description'       => __('Slider zalet budynku', 'gate'),
      'render_template'   => 'src/blocks/adventages.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'location',
      'title'             => '★ ' . __('Lokalizacja i udogodnienia', 'gate'),
      'description'       => __('Blok Lokalizacja i udogodnienia wraz z mapami', 'gate'),
      'render_template'   => 'src/blocks/location.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'modernization',
      'title'             => '★ ' . __('Obaszary modernizacji', 'gate'),
      'description'       => __('Slider obszarów modernizacji z tekstem', 'gate'),
      'render_template'   => 'src/blocks/modernization.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'patio',
      'title'             => '★ ' . __('Zielone patio', 'gate'),
      'description'       => __('Slider zielonego patia wraz z tekstem', 'gate'),
      'render_template'   => 'src/blocks/patio.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'levels',
      'title'             => '★ ' . __('Rzuty pięter', 'gate'),
      'description'       => __('Sekcja rzutów pięter', 'gate'),
      'render_template'   => 'src/blocks/levels.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'standard',
      'title'             => '★ ' . __('Standard techniczny', 'gate'),
      'description'       => __('Sekcja przedstawiająca standard techniczny budynku', 'gate'),
      'render_template'   => 'src/blocks/standard.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'numbers',
      'title'             => '★ ' . __('Fakty i liczby', 'gate'),
      'description'       => __('Sekcja zawirająca kafelki z faktami i liczbami', 'gate'),
      'render_template'   => 'src/blocks/numbers.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

    acf_register_block_type(array(
      'name'              => 'gallery',
      'title'             => '★ ' . __('Galeria', 'gate'),
      'description'       => __('Galeria zdjęć', 'gate'),
      'render_template'   => 'src/blocks/gallery.php',
      'category'          =>  $this->category,
      'icon'              => 'align-center',
      'mode' => 'edit',
      'supports' => array(
          'align' => false,
          'anchor' => true,
      ),
    ));

  }
}
// $cwt_acf_custom_blocks = new cwt_acf_custom_blocks();
if (function_exists('acf_register_block_type')) {
  $cwt_acf_custom_blocks = new cwt_acf_custom_blocks();
}
