<?php
class Ue_faq extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_faq($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "title") {
			$sortby = "ue_faq_title";
		} else if ($sortby == "status") {
			$sortby = "ue_faq_status";
		} else if ($sortby == "sequence") {
			$sortby = "ue_faq_sequence";
		} else {
			$sortby = "ue_faq_id";
		}

		if ($searchby == "title") {
			$searchby = "ue_faq_title";
		} else if ($searchby == "status") {
			$searchby = "ue_faq_status";
		} else {
			$searchby = "ue_faq_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_faq order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_faq where LOWER($searchby) like '%" . $term . "%'";

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

	function select_faq_rows($searchby, $term)
	{
		if ($searchby == "title") {
			$searchby = "ue_faq_title";
		} else if ($searchby == "status") {
			$searchby = "ue_faq_status";
		} else {
			$searchby = "ue_faq_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_faq");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_faq where LOWER($searchby) like '%" . $term . "%'";

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

	public function select_faq_list()
	{
		$this->db->where('ue_faq_status', 1);
		$query = $this->db->get('ue_faq');

		return $query->result();
	}

	public function select_faq_list_all()
	{
		$query = $this->db->get('ue_faq');

		return $query->result();
	}

	public function select_faq_with_limit($limit)
	{
		$this->db->where('ue_faq_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_faq');

		return $query->result();
	}

	public function select_faq_by_id($id)
	{
		$this->db->where('ue_faq_id', $id);
		$query = $this->db->get('ue_faq');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_faq', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_faq', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_faq_id', $id);
		$this->db->update('ue_faq', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_faq_id', $id);
		$this->db->delete('ue_faq');
		return true;
	}
}
