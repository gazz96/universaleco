<?php
class Ue_limbah_category extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_limbah_category($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_limbah_category_name";
		} else if ($sortby == "status") {
			$sortby = "ue_limbah_category_status";
		} else {
			$sortby = "ue_limbah_category_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_limbah_category_name";
		} else {
			$searchby = "ue_limbah_category_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_limbah_category order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_limbah_category where LOWER($searchby) like '%" . $term . "%'";

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

	function select_limbah_category_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_limbah_category_name";
		} else {
			$searchby = "ue_limbah_category_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_limbah_category");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_limbah_category where LOWER($searchby) like '%" . $term . "%'";

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

	public function select_limbah_category_list()
	{
		$this->db->where('ue_limbah_category_status', 1);
		$query = $this->db->get('ue_limbah_category');

		return $query->result();
	}

	public function select_limbah_category_list_all()
	{
		$this->db->order_by('ue_limbah_category_sequence');
		$query = $this->db->get('ue_limbah_category');

		return $query->result();
	}

	public function select_limbah_category_with_limit($limit)
	{
		$this->db->where('ue_limbah_category_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_limbah_category');

		return $query->result();
	}

	public function select_limbah_category_by_id($id)
	{
		$this->db->where('ue_limbah_category_id', $id);
		$query = $this->db->get('ue_limbah_category');
		return $query->result();
	}

	public function select_limbah_category_by_name_and_not_id($name, $id)
	{
		$this->db->where('ue_limbah_category_name', $name);
		$this->db->where('ue_limbah_category_id <> ', $id);
		$query = $this->db->get('ue_limbah_category');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_limbah_category', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_limbah_category', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_limbah_category_id', $id);
		$this->db->update('ue_limbah_category', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_limbah_category_id', $id);
		$this->db->delete('ue_limbah_category');
		return true;
	}
}
