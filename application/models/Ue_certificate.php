<?php
class Ue_certificate extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_certificate($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_certificate_name";
		} else if ($sortby == "status") {
			$sortby = "ue_certificate_status";
		} else if ($sortby == "sequence") {
			$sortby = "ue_certificate_sequence";
		} else {
			$sortby = "ue_certificate_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_certificate_name";
		} else if ($searchby == "status") {
			$searchby = "ue_certificate_status";
		} else {
			$searchby = "ue_certificate_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_certificate order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_certificate where LOWER($searchby) like '%" . $term . "%'";

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

	function select_certificate_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_certificate_name";
		} else if ($searchby == "status") {
			$searchby = "ue_certificate_status";
		} else {
			$searchby = "ue_certificate_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_certificate");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_certificate where LOWER($searchby) like '%" . $term . "%'";

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
		$this->db->select("MAX(ue_certificate_sequence) as 'maxsequence'");
		$query = $this->db->get('ue_certificate');

		return $query->result();
	}

	public function select_certificate_list()
	{
		$this->db->where('ue_certificate_status', 1);
		$this->db->order_by('ue_certificate_sequence');
		$query = $this->db->get('ue_certificate');

		return $query->result();
	}

	public function select_certificate_list_all()
	{
		$this->db->order_by('ue_certificate_sequence');
		$query = $this->db->get('ue_certificate');

		return $query->result();
	}

	public function select_certificate_with_limit($limit)
	{
		$this->db->where('ue_certificate_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_certificate');

		return $query->result();
	}

	public function select_certificate_by_id($id)
	{
		$this->db->where('ue_certificate_id', $id);
		$query = $this->db->get('ue_certificate');
		return $query->result();
	}

	public function select_certificate_by_sequence($sequence)
	{
		$this->db->where('ue_certificate_sequence', $sequence);
		$query = $this->db->get('ue_certificate');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_certificate', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_certificate', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_certificate_id', $id);
		$this->db->update('ue_certificate', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_certificate_id', $id);
		$this->db->delete('ue_certificate');
		return true;
	}
}
