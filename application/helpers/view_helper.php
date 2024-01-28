<?php

class ViewHelper {
    protected static $self = null;

    public static function init($el) {
        self::$self = $el;
    }

    public static function getMenuData() {
        $menuList = [];
        $roots = self::$self->crud_model->get_menu_sub(0)->result_array();
        foreach ($roots as $root) {
            $newMenu = [
                'data' => $root,
                'submenu' => []
            ];

            $subs1 = self::$self->crud_model->get_menu_sub($root['id'])->result_array();
            if (!$subs1) {
                $menuList[$root['id']] = $newMenu;
                continue;
            }

            foreach ($subs1 as $sub1) {
                $newSub1 = [
                    'data' => $sub1,
                    'submenu' => []
                ];

                $subs2 = self::$self->crud_model->get_menu_sub($sub1['id'])->result_array();
                if (!$subs2) {
                    $newMenu['submenu'][$sub1['id']] = $newSub1;
                    continue;
                }

                $newSub1['submenu'][] = [
                    'data' => $subs2,
                    'submenu' => []
                ];

                $newMenu['submenu'][$sub1['id']] = $newSub1;
            }

            $menuList[$root['id']] = $newMenu;
        }
        return $menuList;
    }
}
