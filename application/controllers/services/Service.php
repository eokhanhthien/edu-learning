<?php

class Service
{
    protected static $controller = null;

    public static function init($controller)
    {
        self::$controller = $controller;
    }

    public static function view($view, $datas = [])
    {
        return self::$controller->load->view($view, $datas);
    }

    public static function json($data)
    {
        echo json_encode($data);
        exit(0);
    }

    protected static function validData($data, $mgs = 'error')
    {
        if (gettype($data) == 'array') {
            if (count($data) == 0) {
                goto error_respon;
            }
            return true;
        }
        if (trim($data) == '') {
            goto error_respon;
        }
        return true;

        error_respon:
        return self::json([
            'success' => false,
            'message' => $mgs
        ]);
    }
}
