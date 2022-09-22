<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if (!isset($this->session->userdata["userid"]) || empty($this->session->userdata["userid"])) :
			$this->session->set_userdata(array('err' => 'Silahkan lakukan login terlebih dahulu.'));
			redirect(base_url() . "admin/login");
		endif;

		$this->sessid = $this->session->userdata["userid"];

		$this->load->model('ue_content');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/content/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/content/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_content->select_content_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/content/index/';
		$config['first_url'] = base_url() . 'admin/content/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$content = $this->ue_content->select_content($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Konten</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/content/index', ['content' => $content, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/content/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/content/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Konten Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/content/_form');
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('type', 'tipe', 'trim|required|max_length[255]|is_unique[ue_content.ue_content_type]');
			$this->form_validation->set_rules('title', 'judul', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('subtitle', 'sub judul', 'trim|max_length[255]');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');
			$this->form_validation->set_message('is_unique', 'Konten %s ini telah terdaftar.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/content/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_content_type'			=> $this->input->post('type'),
					'ue_content_title'			=> $this->input->post('title'),
					'ue_content_sub_title'		=> $this->input->post('subtitle'),
					'ue_content_description'	=> $this->input->post('description'),
					'ue_content_status'			=> $this->input->post('status'),
					'ue_content_created_date'	=> date("Y-m-d H:i:s"),
					'ue_content_created_id'		=> $this->sessid,
				];

				if ($this->ue_content->insert($data)) :
					$this->session->set_userdata(array('success' => 'Konten berhasil ditambahkan.'));
					redirect(base_url() . 'admin/content');
				else :
					$this->session->set_userdata(array('err' => 'Konten gagal ditambahkan karena ada kerusakan sistem.'));
					redirect(base_url() . 'admin/content/add/');
				endif;
			endif;
		endif;
	}

	public function check_type($type)
	{
		$id = $this->input->post('id');
		$content = $this->ue_content->select_content_by_type_and_not_id($type, $id);

		if ($content != null && count($content) > 0) :
			$this->form_validation->set_message('check_type', 'Konten tipe ini telah terdaftar.');
			return FALSE;
		else :
			return TRUE;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/content";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Detail Konten</h1>";

		$content = $this->ue_content->select_content_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/content/_form', array('content' => $content));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('type', 'tipe', 'trim|required|max_length[255]|callback_check_type');
			$this->form_validation->set_rules('title', 'judul', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('subtitle', 'sub judul', 'trim|max_length[255]');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/content/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_content_type'			=> $this->input->post('type'),
					'ue_content_title'			=> $this->input->post('title'),
					'ue_content_sub_title'		=> $this->input->post('subtitle'),
					'ue_content_description'	=> $this->input->post('description'),
					'ue_content_status'			=> $this->input->post('status'),
					'ue_content_updated_id'		=> $this->sessid,
				];

				if ($this->ue_content->update($id, $data)) :
					$this->session->set_userdata(array('success' => 'Konten berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Konten gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/content/detail/' . $id);
				endif;
			endif;
		endif;
	}
}
