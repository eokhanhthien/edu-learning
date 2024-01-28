<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Expert_course_model extends CI_Model
{
	protected $tableName = 'learn_from_expert';

	public function all()
	{
		//get all data
		$datas = parent::all();
		if (count($datas) === 0) {
			return $datas;
		}

		//build data with table experts
		$tableJoin = 'experts';
		$tableExpertCourse = 'learn_from_expert_course';
		$aryExpertId = array_column($datas, 'expert_id');
		$joinData = $this->db->where_in('id', $aryExpertId)->get($tableJoin)->result_array();

		$joinDataReivered = [];
		foreach ($joinData as $data) {
			$joinDataReivered[$data['id']] = $data;
		}

		foreach ($datas as &$data) {
			$data[$tableJoin] = $joinDataReivered[$data['expert_id']] ?? null;
			//count course active
			$this->db->where('lfe_id', $data['id']);
			$data['expert_courses'] = $this->db->get($tableExpertCourse)->result_array();
			$data['partners'] = json_decode($data['partners']);
			$partners = $this->db
				->select('full_name')
				->where_in('id', $data['partners'])
				->get('experts')
				->result_array();
			$data['partners_data'] = array_column($partners, 'full_name');
		}

		return $datas;
	}

	public function getList()
	{
		$tableJoin = 'experts';
		$tableExpertCourse = 'learn_from_expert_course';
		$tableCourse = 'course';

		$datas = $this->db->where('is_active', 1)->get($this->tableName)->result_array();

		//build data with table experts
		$aryExpertId = array_column($datas, 'expert_id');
		$joinData = $this->db->where_in('id', $aryExpertId)->get($tableJoin)->result_array();

		$joinDataReivered = [];
		foreach ($joinData as $data) {
			$joinDataReivered[$data['id']] = $data;
		}

		$userQueried = [];
		foreach ($datas as &$data) {
			$this->db->where('lfe_id', $data['id']);
			$courseLfe = $this->db->get($tableExpertCourse)->result_array();

			$aryCourseId = array_column($courseLfe, 'course_id');
			$this->db->where_in('id', $aryCourseId);
			$courses = $this->db->get($tableCourse)->result_array();
			
			foreach ($courses as &$course) {
				if (isset($userQueried[$course['creator']])) {
					$course['creator'] = $userQueried[$course['creator']];
				} else {
					$course['creator'] = $userQueried[$course['creator']] = $this->db
						->where('id', $course['creator'])
						->get('users')
						->result_array()[0] ?? null;
				}
			}

			$data['courses'] = $courses;
			$data[$tableJoin] = $joinDataReivered[$data['expert_id']] ?? null;

			$data['partners'] = json_decode($data['partners']);
			$partners = $this->db->select('full_name')->where_in('id', $data['partners'])->get($tableJoin)->result_array();
			$data['partners_data'] = array_column($partners, 'full_name');
		}

		return $datas;
	}
}
