<?php
class Ue_waste extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_waste($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_waste.ue_waste_name";
		} else if ($sortby == "category") {
			$sortby = "ue_waste_category.ue_waste_category_name";
		} else if ($sortby == "status") {
			$sortby = "ue_waste.ue_waste_status";
		} else {
			$sortby = "ue_waste.ue_waste_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_waste.ue_waste_name";
		} else if ($searchby == "category") {
			$searchby = "ue_waste_category.ue_waste_category_name";
		} else {
			$searchby = "ue_waste.ue_waste_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_waste join ue_waste_category on (ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id) order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_waste join ue_waste_category on (ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id) where LOWER($searchby) like '%" . $term . "%'";

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

	function select_waste_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_waste.ue_waste_name";
		} else if ($searchby == "category") {
			$searchby = "ue_waste_category.ue_waste_category_name";
		} else {
			$searchby = "ue_waste.ue_waste_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_waste join ue_waste_category on (ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id)");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_waste join ue_waste_category on (ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id) where LOWER($searchby) like '%" . $term . "%'";

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

	public function select_waste_list()
	{
		$this->db->where('ue_waste.ue_waste_status', 1);
		$this->db->join('ue_waste_category', 'ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id');
		$query = $this->db->get('ue_waste');

		return $query->result();
	}

	public function select_waste_list_all()
	{
		$query = $this->db->get('ue_waste');

		return $query->result();
	}

	public function select_waste_with_limit($limit)
	{
		$this->db->where('ue_waste_status', 1);
		$this->db->limit($limit);
		$query = $this->db->get('ue_waste');

		return $query->result();
	}

	public function select_waste_by_id($id)
	{
		$this->db->where('ue_waste.ue_waste_id', $id);
		$this->db->join('ue_waste_category', 'ue_waste.ue_waste_category_id = ue_waste_category.ue_waste_category_id');
		$query = $this->db->get('ue_waste');
		return $query->result();
	}

	public function select_waste_by_category($id)
	{
		$this->db->where('ue_waste_category_id', $id);
		$query = $this->db->get('ue_waste');
		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_waste', $data);
		return true;
	}

	function insert_last($data)
	{
		$this->db->insert('ue_waste', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update($id, $data)
	{
		$this->db->where('ue_waste_id', $id);
		$this->db->update('ue_waste', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_waste_id', $id);
		$this->db->delete('ue_waste');
		return true;
	}
}
