<?php
class Ue_product extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_product($sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "name") {
			$sortby = "ue_product_name";
		} else if ($sortby == "status") {
			$sortby = "ue_product_status";
		} else {
			$sortby = "ue_product_id";
		}

		if ($searchby == "name") {
			$searchby = "ue_product_name";
		} else {
			$searchby = "ue_product_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_product order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_product LOWER($searchby) like '%" . $term . "%'";

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

	function select_product_rows($searchby, $term)
	{
		if ($searchby == "name") {
			$searchby = "ue_product_name";
		} else {
			$searchby = "ue_product_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_product");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_product LOWER($searchby) like '%" . $term . "%'";

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

	public function select_product_list()
	{
		$this->db->where('ue_product_status', 1);
		$query = $this->db->get('ue_product');
		return $query->result();
	}

	public function select_product_by_id($id)
	{
		$this->db->where('ue_product_id', $id);
		$query = $this->db->get('ue_product');
		return $query->result();
	}

	public function select_product_by_terms($terms)
	{
		$this->db->like("ue_product_name", $terms);
		$this->db->where("ue_product_status", 1);
		$query = $this->db->get("ue_product");

		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_product', $data);
		return true;
	}

	function update($id, $data)
	{
		$this->db->where('ue_product_id', $id);
		$this->db->update('ue_product', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_product_id', $id);
		$this->db->delete('ue_product');
		return true;
	}
}
