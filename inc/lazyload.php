<?php
//-- Lazy loading img
add_filter('wp_get_attachment_image_attributes', 'cwt_attachment_image_lazylaod');
add_filter('the_content', 'cwt_content_image_lazylaod', 50, 3);

function cwt_attachment_image_lazylaod($attributes)
{
  //Disable preload lazy img
  if (isset($attributes['loading']) && $attributes['loading'] === 'none') {
    unset($attributes['loading']);
    $attributes['loading'] = 'lazy';
    return $attributes;
  }
  if (isset($attributes['srcset'])) {
    $attributes['data-srcset'] = $attributes['srcset'];
    unset($attributes['srcset']);
  }
  if (isset($attributes['src'])) {
    $attributes['data-src'] = $attributes['src'];
    //1x1px transparent
    $attributes['src'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAANQTFRFAAAAp3o92gAAAAF0Uk5TAEDm2GYAAAAKSURBVHicY2AAAAACAAFIr6RxAAAAAElFTkSuQmCC';
  }
  return $attributes;
}

function cwt_content_image_lazylaod($content)
{
  if (!preg_match_all('/<(img)\s[^>]+>/', $content, $matches, PREG_SET_ORDER)) {
    return $content;
  }
  // List of the unique `img` tags found in $content.
  $images = array();
  foreach ($matches as $match) {
    list($tag, $tag_name) = $match;
    if (preg_match('/wp-image-([0-9]+)/i', $tag, $class_id)) {
      $attachment_id = absint($class_id[1]);
      if ($attachment_id) {
        // If exactly the same image tag is used more than once, overwrite it.
        // All identical tags will be replaced later with 'str_replace()'.
        $images[$tag] = $attachment_id;
        continue;
      }
    }
    $images[$tag] = 0;
  }
  foreach ($images as $image => $attachment_id) {
    //If there is no set to lazy loading then skip;
    $filtered_image = $image;
    if (strpos($image, 'data-src') === false) {
      $filtered_image = str_replace('src', 'data-src', $filtered_image);
    }
    if (strpos($image, 'data-sizes') === false) {
      $filtered_image = str_replace('sizes', 'data-sizes', $filtered_image);
    }
    if (strpos($image, 'loading="lazy"') === false) {
      $filtered_image = str_replace('loading="lazy"', '', $filtered_image);
    }
    if ($filtered_image !== $image) {
      $content = str_replace($image, $filtered_image, $content);
    }
  }
  return $content;
}
