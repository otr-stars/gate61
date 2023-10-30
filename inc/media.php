<?php
/**
 * CUSTOMIZATION IMAGE SIZE 
 * Tutaj dodajemy customowe wielkości zdjęc by zoptymalizowac stronę
 **/
// add_image_size('post-small', 760, 428, ['center', 'center']);

//-- ALLOW: SVG
add_filter('upload_mimes', 'w_mimeTypes', 10, 1);
add_filter('wp_check_filetype_and_ext', 'fix_mime_type_svg', 75, 4);
add_filter('image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2);
add_filter('wp_get_attachment_image_attributes', 'developing_filter_img_attr', 10, 3);

function w_mimeTypes($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

function fix_mime_type_svg($data = null, $file = null, $filename = null, $mimes = null)
{
    $ext = isset($data['ext']) ? $data['ext'] : '';
    if (strlen($ext) < 1) {
        $exploded = explode('.', $filename);
        $ext      = strtolower(end($exploded));
    }
    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    } elseif ($ext === 'svgz') {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svgz';
    }

    return $data;
}

function wpse240579_fix_svg_size_attributes($out, $id)
{
    $image_url  = wp_get_attachment_url($id);
    $file_ext   = pathinfo($image_url, PATHINFO_EXTENSION);

    if (is_admin() || 'svg' !== $file_ext) {
        return false;
    }

    return array($image_url, null, null, false);
}

function developing_filter_img_attr($attr, $attachment, $size)
{
    if ($attachment->post_mime_type == 'image/svg+xml') {
        $attr['class'] = isset($attr['class']) ? $attr['class'] . ' img-svg' : 'img-svg';
    }
    return $attr;
}
