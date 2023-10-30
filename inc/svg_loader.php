<?php

class SVGLOADER
{
  private static $templateDirectory = null;
  private static $_SVG_CACHE = [];
  private static $finfo;

  public static function init()
  {
    self::$templateDirectory = get_template_directory().'/';
    self::$finfo = new finfo(FILEINFO_MIME);
  }

  /**
   * loads svg files from current theme directory
   * $path - absolute path to file
   * $fields - List, key => value to merge when loading svg
   * 
   * Example: SVGLOADER::theme('img/logo.svg')
   **/
  public static function theme(?string $path, array $fields = [])
  {
    if (empty($path)) return;;
    return self::get(self::$templateDirectory . $path, $fields);
  }

  /**
   * loads svg files and return their content
   * $path - absolute path or url to file
   * $fields - List, key => value to merge when loading svg
   * 
   * Example: 
   * 1. SVGLOADER::get('https://pjatk.ontherocks.pl/wp-content/themes/pjatk/img/logo.svg')
   * 2. SVGLOADER::get('wp-content/uploads/2022/07/circle-21.svg')
   * 
   **/
  public static function get(?string $path, array &$fields = [])
  {
    if (empty($path)) return;
    if (!isset(self::$_SVG_CACHE[$path])) {
      self::load($path);
    }
    if (empty($fields) === false) {
      return self::_mergeFields(self::$_SVG_CACHE[$path], $fields);
    }
    return self::$_SVG_CACHE[$path];
  }

  /** 
   * method to handle loading an SVG file from a url or local path
   */
  private static function load($path)
  {
    self::$_SVG_CACHE[$path] = '';
    if (pathinfo($path, PATHINFO_EXTENSION) !== 'svg') return;
    if (filter_var($path, FILTER_VALIDATE_URL) === false) {
      //Load from local path
      $safepath = realpath($path);
      if ($safepath === false) {
        return;
      }
      $content = file_get_contents($safepath);
    } else {
      //load from url
      $request = wp_remote_get($path);
      if (is_wp_error($request)) {
        return;
      }
      $content = wp_remote_retrieve_body($request);
    }
    if (empty($content) === true || strstr(self::$finfo->buffer($content), 'image/svg+xml') === false) return;
    self::$_SVG_CACHE[$path] = $content;
    return;
  }

  private static function _mergeFields($svg, &$fields)
  {
    if (empty($svg) === true) return '';
    foreach ($fields as $key => $value) {
      $svg = str_replace('{{' . $key . '}}', $value, $svg);
    }
    return $svg;
  }
}
SVGLOADER::init();
