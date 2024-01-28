<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ExpertService extends Service {
    protected static function model() {
        return self::$controller->expert_model;
    }

    public static function list() {
		self::view('backend/index', [
            'page_name' => 'expert',
            'page_title' => 'Danh sách chuyên gia',
            'experts' => self::model()->all(),
            'add_script' => true
        ]);
    }

    private static function saveAvatar($avatar) {
        $ds = DIRECTORY_SEPARATOR;
        $avtNewName = sha1($avatar['name']) . '.' . pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $endpoint = 'uploads' . $ds . 'experts' . $ds . $avtNewName;

        if (!move_uploaded_file($avatar['tmp_name'], FCPATH . $ds . $endpoint))  {
            return self::json([
                'success' => false,
                'message' => 'Lưu ảnh đại diện không thành công!'
            ]);
        }

        return $endpoint;
    }

    public static function add() {
        $full_name = $_POST['full_name'] ?? '';
        $avatar = $_FILES['avatar'] ?? ['error' => 1];
        $note = $_POST['note'] ?? '';
        
        if (empty($full_name)) {
            return self::json([
                'success' => false,
                'message' => 'Họ và tên là bắt buộc!'
            ]);
        }

        if ($avatar['error'] !== 0) {
            return self::json([
                'success' => false,
                'message' => 'Ảnh đại diện là bắt buộc!'
            ]);
        }

        $endpoint = self::saveAvatar($avatar);
        $note = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $note);

        self::model()->insert([
            'full_name' => $full_name,
            'note' => $note,
            'avatar' => $endpoint
        ]);

        return self::json([
            'success' => true,
            'message' => 'Thêm chuyên gia thành công!'
        ]);
    }

    public static function delete($id) {
        $expert = self::model()->one(['id' => $id]);
        if (!!$expert) {
            self::model()->delete(['id' => $id]);
        }
        return self::json([
            'success' => true,
            'message' => 'Xoá chuyên gia thành công'
        ]);
    }

    public static function edit() {
        $id = $_POST['id'];
        $expert = self::model()->one(['id' => $id]);
        if (!$expert) {
            return self::json([
                'success' => false,
                'message' => 'Chuyên gia không tồn tại!'
            ]);
        }

        $full_name = $_POST['full_name'] ?? '';
        $avatar = $_FILES['avatar'] ?? ['error' => 1];
        $note = $_POST['note'] ?? '';
        
        if (empty($full_name)) {
            return self::json([
                'success' => false,
                'message' => 'Họ và tên là bắt buộc!'
            ]);
        }

        $note = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $note);

        $params = [
            'full_name' => $full_name,
            'note' => $note
        ];

        if ($avatar['error'] === 0) {
            @unlink(FCPATH . DIRECTORY_SEPARATOR . $expert['endpoint']);
            $endpoint = self::saveAvatar($avatar);
            $params['avatar'] = $endpoint;
        }

        self::model()->update(['id' => $id], $params);

        return self::json([
            'success' => true,
            'message' => 'Thay đổi thông tin chuyên gia thành công!'
        ]);
    }
}