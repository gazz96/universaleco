<?php
class Ue_homepage extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_homepage($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_homepage_name";
		} else if ($sortby == "status") {
			$sortby = "ue_homepage_status";
		} else if ($sortby == "sequence") {
			$sortby = "ue_homepage_sequence";
		} else {
			$sortby = "ue_homepage_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_homepage_name";
		} else if ($searchby == "status") {
			$searchby = "ue_homepage_status";
		} else {
			$searchby = "ue_homepage_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_homepage order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_homepage where LOWER($searchby) like '%" . $term . "%'";

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

	function select_homepage_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_homepage_name";
		} else if ($searchby == "status") {
			$searchby = "ue_homepage_status";
		} else {
			$searchby = "ue_homepage_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_homepage");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_homepage where LOWER($searchby) like '%" . $term . "%'";

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

	public function select_max_sequence()
	{
		$this->db->select("MAX(ue_homepage_sequence) as 'maxsequence'");
		$query = $this->db->get('ue_homepage');

		return $query->result();
	}

	public function select_homepage_list()
	{
		$this->db->where('ue_homepage_status', 1);
		$this->db->order_by('ue_homepage_sequence');
		$query = $this->db->get('ue_homepage');

		return $query->result();
	}

	public function select_homepage_list_all()
	{
		$this->db->order_by('ue_homepage_sequence');
		$query = $this->db->get('ue_homepage');

		return $query->result();
	}

	public function select_homepage_with_limit($limit)
	{
		$this->db->where('ue_homepage_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_homepage');

		return $query->result();
	}

	public function select_homepage_by_id($id)
	{
		$this->db->where('ue_homepage_id', $id);
		$query = $this->db->get('ue_homepage');
		return $query->result();
	}

	public function select_homepage_by_sequence($sequence)
	{
		$this->db->where('ue_homepage_sequence', $sequence);
		$query = $this->db->get('ue_homepage');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_homepage', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_homepage', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_homepage_id', $id);
		$this->db->update('ue_homepage', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_homepage_id', $id);
		$this->db->delete('ue_homepage');
		return true;
	}
}
