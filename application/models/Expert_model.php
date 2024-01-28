<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Expert_model extends CI_Model
{
	protected $tableName = 'experts';

	public function allActive()
	{
		return $this->get(['is_active' => 1]);
	}
}
