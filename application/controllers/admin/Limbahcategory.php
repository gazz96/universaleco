<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Limbahcategory extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if (!isset($this->session->userdata["userid"]) || empty($this->session->userdata["userid"])) {
			$this->session->set_userdata(array('err' => 'Silahkan lakukan login terlebih dahulu.'));
			redirect(base_url() . "admin/login");
		}

		$this->sessid = $this->session->userdata["userid"];

		$this->load->model('ue_limbah_category');
		$this->load->model('ue_limbah');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/limbah-category/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/limbah-category/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_limbah_category->select_limbah_category_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/limbah-category/index';
		$config['first_url'] = base_url() . 'admin/limbah-category/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = true;
		$config['uri_segment'] = 4;
		$config['suffix'] = '/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#!">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$limbahcategory = $this->ue_limbah_category->select_limbah_category($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Kategori Kode Limbah</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/limbah-category/index', ['limbahcategory' => $limbahcategory, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/limbah-category/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/limbah-category/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Kategori Kode Limbah</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'category/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/limbah-category/_form');
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('name', 'kategori kode limbah', 'trim|required|max_length[255]|is_unique[ue_limbah_category.ue_limbah_category_name]');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');
			$this->form_validation->set_message('is_unique', 'Data %s telah terdaftar.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/limbah-category/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_limbah_category_name'			=> $this->input->post('name'),
					'ue_limbah_category_status'			=> $this->input->post('status'),
					'ue_limbah_category_created_date'	=> date("Y-m-d H:i:s"),
					'ue_limbah_category_created_id'		=> $this->sessid,
				];

				if ($this->ue_limbah_category->insert($data)) :
					$this->session->set_userdata(array('success' => 'Data kategori kode limbah berhasil ditambahkan.'));
					redirect(base_url() . 'admin/limbah-category');
				else :
					$this->session->set_userdata(array('err' => 'Data kategori kode limbah gagal ditambahkan karena ada kerusakan sistem.'));
					redirect(base_url() . 'admin/limbah-category/add');
				endif;
			endif;
		endif;
	}

	public function check_name($name)
	{
		$id = $this->input->post("id");

		$limbahcategory = $this->ue_limbah_category->select_limbah_category_by_name_and_not_id($name, $id);
		if ($limbahcategory != null && count($limbahcategory) > 0) :
			$this->form_validation->set_message("check_name", "Data kategori kode limbah telah terdaftar.");
			return FALSE;
		else :
			return TRUE;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/limbah-category/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");

		$maintitle = "<h1>Detail Kategori Kode Limbah</h1>";

		$limbahcategory = $this->ue_limbah_category->select_limbah_category_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/limbah-category/_form', array('limbahcategory' => $limbahcategory));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('name', 'kategori kode limbah', 'trim|required|max_length[255]|callback_check_name');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/limbah-category/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_limbah_category_name'			=> $this->input->post('name'),
					'ue_limbah_category_status'			=> $this->input->post('status'),
					'ue_limbah_category_updated_id'		=> $this->sessid,
				];

				if ($this->ue_limbah_category->update($id, $data)) :
					$this->session->set_userdata(array('success' => 'Data kategori kode limbah berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Data kategori kode limbah gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/limbah-category/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/limbah-category/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$limbah = $this->ue_limbah->select_limbah_by_limbah_category($id);
		$limbahcategory = $this->ue_limbah_category->select_limbah_category_by_id($id);

		if ($limbah != null && count($limbah) > 0) :

		else :
			if (count($limbahcategory) > 0) :
				if ($this->ue_limbah_category->delete($id)) :
					$this->session->set_userdata(array("success" => "Data kode limbah berhasil dihapus."));
					redirect($redirect);
				else :
					$this->session->set_userdata(array("err" => "Data kode limbah gagal dihapus."));
					redirect($redirect);
				endif;
			else :
				$this->session->set_userdata(array("err" => "Data kode limbah tidak dapat ditemukan."));
				redirect($redirect);
			endif;
		endif;
	}
}
