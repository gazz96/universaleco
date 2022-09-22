<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Limbah extends CI_Controller
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
			redirect(base_url() . 'admin/limbah/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/limbah/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_limbah->select_limbah_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/limbah/index';
		$config['first_url'] = base_url() . 'admin/limbah/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$limbah = $this->ue_limbah->select_limbah($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Kode Limbah</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/limbah/index', ['limbah' => $limbah, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/limbah/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/limbah/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	public function check_code($code)
	{
		$category = $this->input->post("category");

		$limbah = $this->ue_limbah->select_limbah_by_code_and_category($code, $category);
		if ($limbah != null && count($limbah) > 0) :
			$this->form_validation->set_message("check_code", "Data kode limbah telah terdaftar.");
			return FALSE;
		else :
			return TRUE;
		endif;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Kode Limbah</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'category/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';
		$limbahcategory_list = $this->ue_limbah_category->select_limbah_category_list();

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/limbah/_form', ["limbahcategory_list" => $limbahcategory_list]);
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('code', 'kode', 'trim|required|max_length[255]|callback_check_code');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');
			$this->form_validation->set_message('is_unique', 'Data %s telah terdaftar.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/limbah/_form', ["limbahcategory_list" => $limbahcategory_list]);
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_limbah_code'			=> $this->input->post('code'),
					'ue_limbah_description'		=> $this->input->post('description'),
					'ue_limbah_status'			=> $this->input->post('status'),
					'ue_limbah_category_id'		=> $this->input->post('category'),
					'ue_limbah_created_date'	=> date("Y-m-d H:i:s"),
					'ue_limbah_created_id'		=> $this->sessid,
				];

				if ($this->ue_limbah->insert($data)) :
					$this->session->set_userdata(array('success' => 'Data kode limbah berhasil ditambahkan.'));
					redirect(base_url() . 'admin/limbah');
				else :
					$this->session->set_userdata(array('err' => 'Data kode limbah gagal ditambahkan karena ada kerusakan sistem.'));
					redirect(base_url() . 'admin/limbah/add');
				endif;
			endif;
		endif;
	}

	public function check_code_with_id($code)
	{
		$id = $this->input->post("id");
		$category = $this->input->post("category");

		$limbah = $this->ue_limbah->select_limbah_by_code_and_category_and_not_id($code, $category, $id);
		if ($limbah != null && count($limbah) > 0) :
			$this->form_validation->set_message("check_code_with_id", "Data kode limbah telah terdaftar.");
			return FALSE;
		else :
			return TRUE;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/limbah/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");

		$maintitle = "<h1>Detail Kode Limbah</h1>";

		$limbahcategory_list = $this->ue_limbah_category->select_limbah_category_list();
		$limbah = $this->ue_limbah->select_limbah_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/limbah/_form', array('limbah' => $limbah, "limbahcategory_list" => $limbahcategory_list));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('main_img', 'image', 'trim');
			$this->form_validation->set_rules('code', 'kode', 'trim|required|max_length[255]|callback_check_code_with_id');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/limbah/_form', ["limbahcategory_list" => $limbahcategory_list]);
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_limbah_code'			=> $this->input->post('code'),
					'ue_limbah_description'		=> $this->input->post('description'),
					'ue_limbah_status'			=> $this->input->post('status'),
					'ue_limbah_category_id'		=> $this->input->post('category'),
					'ue_limbah_updated_id'		=> $this->sessid,
				];

				if ($this->ue_limbah->update($id, $data)) :
					$this->session->set_userdata(array('success' => 'Data kode limbah berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Data kode limbah gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/limbah/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/limbah/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$limbah = $this->ue_limbah->select_limbah_by_id($id);

		if (count($limbah) > 0) {
			if ($this->ue_limbah->delete($id)) {
				$this->session->set_userdata(array("success" => "Data kode limbah berhasil dihapus."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Data kode limbah gagal dihapus."));
				redirect($redirect);
			}
		} else {
			$this->session->set_userdata(array("err" => "Data kode limbah tidak dapat ditemukan."));
			redirect($redirect);
		}
	}
}
