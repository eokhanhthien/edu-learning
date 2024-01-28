<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CourseExpertService extends Service
{
    protected static function model()
    {
        return self::$controller->expert_course_model;
    }

    public static function list()
    {
        $experts = self::$controller->expert_model->allActive();
        $experts = array_map(function ($expert) {
            return [
                'id' => $expert['id'],
                'full_name' => $expert['full_name'],
            ];
        }, $experts);

        $courses = self::$controller->course_model->all();
        $courses = array_map(function ($course) {
            return [
                'id' => $course['id'],
                'title' => $course['title'],
            ];
        }, $courses);

        self::view('backend/index', [
            'page_name' => 'course_expert',
            'page_title' => 'Danh sách khóa học theo chuyên gia',
            'course_expert' => self::model()->all(),
            'experts' => $experts ?? [],
            'courses' => $courses ?? [],
            'add_script' => true
        ]);
    }

    public static function add()
    {
        $expert = $_POST['expert'] ?? '';
        $title = $_POST['title'] ?? '';
        $price = $_POST['price'] ?? '';
        $description = $_POST['description'] ?? '';
        $partners = $_POST['partners'] ?? [];
        $courses = $_POST['courses'] ?? [];

        self::validData($expert, 'Bạn phải chọn một chuyên gia');
        self::validData($title, 'Tiêu đề là bắt buộc');
        self::validData($price, 'Giá khóa học theo chuyên gia là bắt buộc');
        self::validData($description, 'Cần có mô tả cho khóa học theo chuyên gia');
        self::validData($courses, 'Cần chọn ít nhất 1 khóa học');

        $description = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $description);

        $partners = array_filter($partners, function ($partner) use ($expert) {
            return $partner != $expert;
        });

        self::model()->insert([
            'title' => $title,
            'description' => $description,
            'partners' => json_encode(array_values($partners)),
            'expert_id' => $expert,
            'price' => $price,
        ]);

        $lfeId = self::$controller->db->insert_id();
        foreach ($courses as $courseId) {
            self::$controller->expert_course_detail_model->insert([
                'course_id' => $courseId,
                'lfe_id' => $lfeId,
                'new_money' => 0
            ]);
        }

        return self::json([
            'success' => true,
            'message' => 'Thêm khóa học dành cho chuyên gia thành công!'
        ]);
    }

    public static function delete($id)
    {
        $expert = self::model()->one(['id' => $id]);
        if (!!$expert) {
            self::model()->delete(['id' => $id]);
        }
        return self::json([
            'success' => true,
            'message' => 'Xoá khoá học thành công'
        ]);
    }

    public static function edit()
    {
        $id = $_POST['id'];
        $expert = self::model()->one(['id' => $id]);
        if (!$expert) {
            return self::json([
                'success' => false,
                'message' => 'Khóa học dành cho chuyên gia không tồn tại!'
            ]);
        }

        $expert = $_POST['expert'] ?? '';
        $title = $_POST['title'] ?? '';
        $price = $_POST['price'] ?? '';
        $description = $_POST['description'] ?? '';
        $partners = $_POST['partners'] ?? [];
        $courses = $_POST['courses'] ?? [];

        self::validData($expert, 'Bạn phải chọn một chuyên gia');
        self::validData($title, 'Tiêu đề là bắt buộc');
        self::validData($price, 'Giá khóa học theo chuyên gia là bắt buộc');
        self::validData($description, 'Cần có mô tả cho khóa học theo chuyên gia');
        self::validData($courses, 'Cần chọn ít nhất 1 khóa học');

        $description = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $description);

        $partners = array_filter($partners, function ($partner) use ($expert) {
            return $partner != $expert;
        });

        self::model()->update([
            'id' => $id
        ], [
            'title' => $title,
            'description' => $description,
            'partners' => json_encode(array_values($partners)),
            'expert_id' => $expert,
            'price' => $price,
        ]);

        $allCourseOfExpert = self::$controller->db
            ->where(['lfe_id' => $id])
            ->get('learn_from_expert_course')
            ->result_array();
        $aryCourseId = array_column($allCourseOfExpert, 'course_id');
        $aryCourseIdRemove = array_diff($aryCourseId, $courses);
        foreach ($aryCourseIdRemove as $courseId) {
            self::$controller->db
                ->where(['course_id' => $courseId])
                ->delete('learn_from_expert_course');
        }

        foreach ($courses as $courseId) {
            if (in_array($courseId, $aryCourseId)) continue;
            self::$controller->expert_course_detail_model->insert([
                'course_id' => $courseId,
                'lfe_id' => $id,
                'new_money' => 0
            ]);
        }

        return self::json([
            'success' => true,
            'message' => 'Thay đổi thông tin khóa học dành cho chuyên gia thành công!'
        ]);
    }
}
