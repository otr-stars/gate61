<?php
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return substr($haystack, 0, $length) === $needle;
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if (!$length) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}
//Display logo
function cwt_the_logo($css = "", array $logo = [], string $url = null)
{
    if (empty($logo) === true) {
        $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
    }

    if (has_custom_logo()) {
        echo '<a href="' . ((empty($url)) ? get_home_url() : $url) . '"' . ((empty($css)) ? '' : ' class="' . $css . '"') . ' title="strona główna"><img src="' . esc_url($logo[0]) . '" loading="lazy" alt=""></a>';
    } else {
        echo '<a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>';
    }
}

function cwt_generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function cwt_validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}