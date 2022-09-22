<?php
class Ue_user extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_user($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "code") {
			$sortby = "ue_user_code";
		} else if ($sortby == "name") {
			$sortby = "ue_user_name";
		} else if ($sortby == "email") {
			$sortby = "ue_user_email";
		} else if ($sortby == "status") {
			$sortby = "ue_user_status";
		} else {
			$sortby = "ue_user_id";
		}

		if ($searchby == "code") {
			$searchby = "ue_user_code";
		} else if ($searchby == "name") {
			$searchby = "ue_user_name";
		} else if ($searchby == "email") {
			$searchby = "ue_user_email";
		} else {
			$searchby = "ue_user_id";
		}

		$q = "select * from ue_user where ue_user_status <> 2";

		if (!empty($term)) {
			$terms = explode(" ", $term);
			$q .= " and (LOWER($searchby) like '%" . $term . "%'";

			if (count($terms) == 1) {
				$q .= " or LOWER($searchby) like '%" . $terms[0] . "%')";
			} else {
				for ($x = 0; $x < count($terms); $x++) {
					if ($x == count($terms) - 1) {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%'))";
					} else if ($x == 0) {
						$q .= " or (LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					} else {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					}
				}
			}
		}

		$q .= " order by " . $sortby . " " . $sorttype . " limit " . $offset . ", " . $limit;

		return $this->db->query($q)->result();
	}

	function select_user_rows($searchby, $term)
	{
		if ($searchby == "code") {
			$searchby = "ue_user_code";
		} else if ($searchby == "name") {
			$searchby = "ue_user_name";
		} else if ($searchby == "email") {
			$searchby = "ue_user_email";
		} else {
			$searchby = "ue_user_id";
		}

		$q = "select * from ue_user where ue_user_status <> 2";

		if (!empty($term)) {
			$terms = explode(" ", $term);
			$q .= " and (LOWER($searchby) like '%" . $term . "%'";

			if (count($terms) == 1) {
				$q .= " or LOWER($searchby) like '%" . $terms[0] . "%')";
			} else {
				for ($x = 0; $x < count($terms); $x++) {
					if ($x == count($terms) - 1) {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%'))";
					} else if ($x == 0) {
						$q .= " or (LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					} else {
						$q .= "LOWER($searchby) like '%" . $terms[$x] . "%' and ";
					}
				}
			}
		}

		return $this->db->query($q)->num_rows();
	}

	public function select_user_list()
	{
		$this->db->where('ue_user_status', 1);
		$query = $this->db->get('ue_user');
		return $query->result();
	}

	public function select_user_by_id($id)
	{
		$this->db->where('ue_user_id', $id);
		$query = $this->db->get('ue_user');
		return $query->result();
	}

	public function select_user_by_terms($terms)
	{
		$this->db->like("ue_user_name", $terms);
		$this->db->where("ue_user_status", 1);
		$query = $this->db->get("ue_user");

		return $query->result();
	}

	public function select_user_by_email_and_password($email, $password)
	{
		$this->db->where('ue_user_email', $email);
		$this->db->where('ue_user_password', $password);
		$query = $this->db->get('ue_user');
		return $query->result();
	}

	public function select_user_by_email_and_not_id($email, $id)
	{
		$this->db->where('ue_user_email', $email);
		$this->db->where('ue_user_id <> ', $id);
		$query = $this->db->get('ue_user');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_user', $data);
		return true;
	}

	function update($id, $data)
	{
		$this->db->where('ue_user_id', $id);
		$this->db->update('ue_user', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_user_id', $id);
		$this->db->delete('ue_user');
		return true;
	}
}
