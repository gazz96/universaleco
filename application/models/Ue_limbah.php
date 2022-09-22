<?php
class Ue_limbah extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_limbah($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "category") {
			$sortby = "ue_limbah_category.ue_limbah_category_name";
		} else if ($sortby == "code") {
			$sortby = "ue_limbah.ue_limbah_code";
		} else if ($sortby == "description") {
			$sortby = "ue_limbah.ue_limbah_description";
		} else if ($sortby == "status") {
			$sortby = "ue_limbah.ue_limbah_status";
		} else {
			$sortby = "ue_limbah.ue_limbah_id";
		}

		if ($searchby == "category") {
			$searchby = "ue_limbah_category.ue_limbah_category_name";
		} else if ($searchby == "code") {
			$searchby = "ue_limbah.ue_limbah_code";
		} else if ($searchby == "description") {
			$searchby = "ue_limbah.ue_limbah_description";
		} else {
			$searchby = "ue_limbah.ue_limbah_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_limbah join ue_limbah_category on (ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id) order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_limbah join ue_limbah_category on (ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id) where LOWER($searchby) like '%" . $term . "%'";

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

	function select_limbah_rows($searchby, $term)
	{
		if ($searchby == "code") {
			$searchby = "ue_limbah_code";
		} else if ($searchby == "description") {
			$searchby = "ue_limbah_description";
		} else {
			$searchby = "ue_limbah_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_limbah join ue_limbah_category on (ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id)");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_limbah join ue_limbah_category on (ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id) where LOWER($searchby) like '%" . $term . "%'";

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

	public function select_limbah_list($id)
	{
		$this->db->where('ue_limbah.ue_limbah_status', 1);
		$this->db->where('ue_limbah.ue_limbah_category_id', $id);
		$this->db->join('ue_limbah_category', 'ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id');
		$query = $this->db->get('ue_limbah');

		return $query->result();
	}

	public function select_limbah_by_id($id)
	{
		$this->db->where('ue_limbah.ue_limbah_id', $id);
		$this->db->join('ue_limbah_category', 'ue_limbah.ue_limbah_category_id = ue_limbah_category.ue_limbah_category_id');
		$query = $this->db->get('ue_limbah');
		return $query->result();
	}

	public function select_limbah_by_code_and_category($code, $category)
	{
		$this->db->where('ue_limbah_code', $code);
		$this->db->where('ue_limbah_category_id', $category);
		$query = $this->db->get('ue_limbah');
		return $query->result();
	}

	public function select_limbah_by_code_and_category_and_not_id($code, $category, $id)
	{
		$this->db->where('ue_limbah_code', $code);
		$this->db->where('ue_limbah_category_id', $category);
		$this->db->where('ue_limbah_id <> ', $id);
		$query = $this->db->get('ue_limbah');
		return $query->result();
	}

	public function select_limbah_by_limbah_category($id)
	{
		$this->db->where('ue_limbah_category_id', $id);
		$query = $this->db->get('ue_limbah');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_limbah', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_limbah', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_limbah_id', $id);
		$this->db->update('ue_limbah', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_limbah_id', $id);
		$this->db->delete('ue_limbah');
		return true;
	}
}
