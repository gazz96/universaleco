<?php
class Ue_misc extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function select_misc()
	{
		$query = $this->db->get('ue_misc');
		return $query->result();
	}

	public function select_misc_by_name($name)
	{
		$this->db->where('ue_misc_name', $name);
		$query = $this->db->get('ue_misc');
		return $query->result();
	}

	function update($id, $data)
	{
		$this->db->where('ue_misc_id', $id);
		$this->db->update('ue_misc', $data);
		return true;
	}
}
