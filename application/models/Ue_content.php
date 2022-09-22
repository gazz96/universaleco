<?php
class Ue_content extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_content($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "title") {
			$sortby = "ue_content_title";
		} else if ($sortby == "status") {
			$sortby = "ue_content_status";
		} else {
			$sortby = "ue_content_id";
		}

		if ($searchby == "title") {
			$searchby = "ue_content_title";
		} else {
			$searchby = "ue_content_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_content order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_content where LOWER($searchby) like '%" . $term . "%'";

			if (count($terms) == 1) {
				$q .= " or LOWER($searchby) like '%" . $terms[0] . "%'";
			} else {
				for ($x = 0; $x < count($terms); $x++) {
					if ($x == count($terms) - 1) {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%')";
					} else if ($x == 0) {
						$q .= " or (LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					} else {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					}
				}
			}

			$q .=  " order by $sortby $sorttype limit " . $offset . ", " . $limit;

			$query = $this->db->query($q);
		}

		return $query->result();
	}

	function select_content_rows($searchby, $term)
	{
		if ($searchby == "title") {
			$searchby = "ue_content_title";
		} else {
			$searchby = "ue_content_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_content");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_content where LOWER($searchby) like '%" . $term . "%'";

			if (count($terms) == 1) {
				$q .= " or LOWER($searchby) like '%" . $terms[0] . "%'";
			} else {
				for ($x = 0; $x < count($terms); $x++) {
					if ($x == count($terms) - 1) {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%')";
					} else if ($x == 0) {
						$q .= " or (LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					} else {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					}
				}
			}

			$query = $this->db->query($q);
		}

		return $query->num_rows();
	}

	public function select_content_list()
	{
		$this->db->where('ue_content_status', 1);
		$query = $this->db->get('ue_content');
		return $query->result();
	}

	public function select_content_by_id($id)
	{
		$this->db->where('ue_content_id', $id);
		$query = $this->db->get('ue_content');
		return $query->result();
	}

	public function select_content_by_type($type)
	{
		$this->db->where('ue_content_type', $type);
		$query = $this->db->get('ue_content');
		return $query->result();
	}

	public function select_content_by_type_and_not_id($type, $id)
	{
		$this->db->where('ue_content_type', $type);
		$this->db->where('ue_content_id <> ', $id);
		$query = $this->db->get('ue_content');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_content', $data);
		return true;
	}

	function update($id, $data)
	{
		$this->db->where('ue_content_id', $id);
		$this->db->update('ue_content', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_content_id', $id);
		$this->db->delete('ue_content');
		return true;
	}
}
