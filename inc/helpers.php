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
function cwt_the_logo(string $type, ?string $css = null): void
{
    $attachment_id = get_theme_mod($type);
    if (empty($attachment_id)) {
        echo '<a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a>';
    } else {
        echo '<a href="' . get_home_url() . '"' . ((empty($css)) ? '' : ' class="' . $css . '"') . ' title="' . __('strona główna', 'gate') . '">' .
            wp_get_attachment_image($attachment_id, 'full') . '</a>';
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
