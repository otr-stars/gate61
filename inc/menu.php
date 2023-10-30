<?php

//Simple menu items cache
final class CWT_Menu
{
    private static $locations;
    public static function init()
    {
        self::$locations = get_nav_menu_locations();
    }
    private static function get_sub_itmes(&$items, $parent_id)
    {
        $sorted_menu = array();
        foreach ($items as $item) {
            if ($item->menu_item_parent == $parent_id) {
                if (isset($sorted_menu[$item->ID]) === false) {
                    $sorted_menu[$item->ID] = (array) $item;
                    $sorted_menu[$item->ID]['submenu'] = self::get_sub_itmes($items, $item->ID);
                }
            }
        }
        return $sorted_menu;
    }

    private static function find_sub_itmes(&$items, $object_id)
    {
        foreach ($items as $item) {
            if ($item['object_id'] == $object_id) {
                return true;
            }
            if (self::find_sub_itmes($item['submenu'], $object_id) === true) {
                return true;
            }
        }
    }

    public static function get_menu($menu_slug)
    {
        if (isset(self::$locations[$menu_slug]) === false) {
            return array();
        }
        if (is_array(self::$locations[$menu_slug]) === false) {
            $items = (array) wp_get_nav_menu_items(self::$locations[$menu_slug]);
            $sorted_menu = array();
            foreach ($items as $item) {
                // echo "$item->ID , $item->menu_item_parent => $item->title<br/>";
                if ($item->menu_item_parent == 0 && isset($sorted_menu[$item->ID]) === false) {
                    $sorted_menu[$item->ID] = (array) $item;
                    $sorted_menu[$item->ID]['submenu'] = self::get_sub_itmes($items, $item->ID);
                }
            }
            self::$locations[$menu_slug] = $sorted_menu;
        }
        return self::$locations[$menu_slug];
    }

    public static function find_root_children($menu_slug, $item_id)
    {
        $menu_items = self::get_menu($menu_slug);
        $menu = false;
        foreach ($menu_items as $item) {
            if ($item['object_id'] == $item_id) {
                $menu = $item;
                break;
            }
            if (self::find_sub_itmes($item['submenu'], $item_id) === true) {
                $menu = $item;
                break;
            }
        }
        return $menu;
    }
}
CWT_Menu::init();

function cwt_the_simple_menus($menu_slug, $cssClass = null, $prefix = '')
{
    $menu_items = CWT_Menu::get_menu($menu_slug);
    if (empty($menu_items)) {
        $menu_list = '<ul><li>Menu "' . $menu_slug . '" not defined.</li></ul>';
    } else {
        $menu_list = '';
        $menu_list .= '<ul' . (empty($cssClass) ? '' : ' class="' . $cssClass . '"') . '>';
        foreach ((array) $menu_items as $menu_item) {
            $menu_list .= '<li><a href="' . $prefix . $menu_item['url'] . '"' . ((empty($menu_item['target'])) ? '' : ' target="' . $menu_item['target'] . '"') . '' . ((count($menu_item['classes']) <= 0) ? '' : ' class="' . join(' ', $menu_item['classes']) . '"') . '>' . $menu_item['title'] . '</a></li>';
        }
        $menu_list .= '</ul>';
    }
    echo $menu_list;
}
