<?php
class Ue_blog extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function select_blog($type, $sortby, $sorttype, $searchby, $term, $limit, $offset)
	{
		if ($sortby == "title") {
			$sortby = "ue_blog_title";
		} else if ($sortby == "status") {
			$sortby = "ue_blog_status";
		} else {
			$sortby = "ue_blog_id";
		}

		if ($searchby == "title") {
			$searchby = "ue_blog_title";
		} else {
			$searchby = "ue_blog_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_blog where ue_blog_type = '" . $type . "' order by $sortby $sorttype limit $offset, $limit");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_blog where ue_blog_type = '" . $type . "' and (LOWER($searchby) like '%" . $term . "%'";

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

			$q .=  " order by $sortby $sorttype limit " . $offset . ", " . $limit;

			$query = $this->db->query($q);
		}

		return $query->result();
	}

	function select_blog_rows($type, $searchby, $term)
	{
		if ($searchby == "title") {
			$searchby = "ue_blog_title";
		} else {
			$searchby = "ue_blog_id";
		}

		$query = null;
		if (empty($term)) {
			$query = $this->db->query("select * from ue_blog where ue_blog_type = '" . $type . "'");
		} else {
			$terms = explode(" ", $term);
			$q = "select * from ue_blog where ue_blog_type = '" . $type . "' and (LOWER($searchby) like '%" . $term . "%'";

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

			$query = $this->db->query($q);
		}

		return $query->num_rows();
	}

	public function select_blog_list_rows($type, $searchby, $term)
	{
		if ($searchby == "title") {
			$searchby = "ue_blog_title";
		} else {
			$searchby = "ue_blog_id";
		}

		$this->db->where('ue_blog_status', 1);
		$this->db->where('ue_blog_type', $type);

		if (!empty($term)) {
			$terms = explode(" ", $term);
			$q = "(LOWER($searchby) like '%" . $term . "%'";
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

			$this->db->where($q);
		}

		$query = $this->db->get('ue_blog');
		return $query->num_rows();
	}

	public function select_blog_list($type, $searchby, $term, $limit, $offset)
	{
		if ($searchby == "title") {
			$searchby = "ue_blog_title";
		} else {
			$searchby = "ue_blog_id";
		}

		$this->db->where('ue_blog_status', 1);
		$this->db->where('ue_blog_type', $type);

		if (!empty($term)) {
			$terms = explode(" ", $term);
			$q = "(LOWER($searchby) like '%" . $term . "%'";
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

			$this->db->where($q);
		}

		$this->db->limit($limit, $offset);

		$query = $this->db->get('ue_blog');
		return $query->result();
	}

	public function select_blog_by_id($id)
	{
		$this->db->where('ue_blog_id', $id);
		$query = $this->db->get('ue_blog');
		return $query->result();
	}

	public function select_blog_by_terms($terms)
	{
		$this->db->like("ue_blog_name", $terms);
		$this->db->where("ue_blog_status", 1);
		$query = $this->db->get("ue_blog");

		return $query->result();
	}

	function insert($data)
	{
		$this->db->insert('ue_blog', $data);
		return true;
	}

	function update($id, $data)
	{
		$this->db->where('ue_blog_id', $id);
		$this->db->update('ue_blog', $data);
		return true;
	}

	function delete($id)
	{
		$this->db->where('ue_blog_id', $id);
		$this->db->delete('ue_blog');
		return true;
	}
}
