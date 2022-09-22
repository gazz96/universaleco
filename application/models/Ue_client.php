<?php
class Ue_client extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_client($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_client_name";
		} else if ($sortby == "status") {
			$sortby = "ue_client_status";
		} else if ($sortby == "sequence") {
			$sortby = "ue_client_sequence";
		} else {
			$sortby = "ue_client_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_client_name";
		} else if ($searchby == "status") {
			$searchby = "ue_client_status";
		} else {
			$searchby = "ue_client_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_client order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_client where LOWER($searchby) like '%" . $term . "%'";

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

	function select_client_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_client_name";
		} else if ($searchby == "status") {
			$searchby = "ue_client_status";
		} else {
			$searchby = "ue_client_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_client");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_client where LOWER($searchby) like '%" . $term . "%'";

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
		$this->db->select("MAX(ue_client_sequence) as 'maxsequence'");
		$query = $this->db->get('ue_client');

		return $query->result();
	}

	public function select_client_list()
	{
		$this->db->where('ue_client_status', 1);
		$this->db->order_by('ue_client_sequence');
		$query = $this->db->get('ue_client');

		return $query->result();
	}

	public function select_client_list_all()
	{
		$this->db->order_by('ue_client_sequence');
		$query = $this->db->get('ue_client');

		return $query->result();
	}

	public function select_client_with_limit($limit)
	{
		$this->db->where('ue_client_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_client');

		return $query->result();
	}

	public function select_client_by_id($id)
	{
		$this->db->where('ue_client_id', $id);
		$query = $this->db->get('ue_client');
		return $query->result();
	}

	public function select_client_by_sequence($sequence)
	{
		$this->db->where('ue_client_sequence', $sequence);
		$query = $this->db->get('ue_client');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_client', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_client', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_client_id', $id);
		$this->db->update('ue_client', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_client_id', $id);
		$this->db->delete('ue_client');
		return true;
	}
}
