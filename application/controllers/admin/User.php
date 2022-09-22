<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if (!isset($this->session->userdata["userid"]) || empty($this->session->userdata["userid"])) :
			$this->session->set_userdata(array('err' => 'Silahkan lakukan login terlebih dahulu.'));
			redirect(base_url() . "user/login");
		endif;

		$this->sessid = $this->session->userdata["userid"];

		$this->load->model('ue_user');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/user/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/user/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_user->select_user_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/user/index';
		$config['first_url'] = base_url() . 'admin/user/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$user = $this->ue_user->select_user($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Pengguna</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/user/index', ['user' => $user, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/user/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/user/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Pengguna Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'user/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/user/_form');
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('address', 'alamat', 'trim');
			$this->form_validation->set_rules('phone', 'no. telepon', 'trim|max_length[35]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|max_length[255]|valid_email|is_unique[ue_user.ue_user_email]');
			$this->form_validation->set_rules('password', 'password', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('is_unique', 'Input %s telah digunakan.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/user/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_user_name' => $this->input->post('name'),
					'ue_user_address' => $this->input->post('address'),
					'ue_user_phone' => $this->input->post('phone'),
					'ue_user_email' => $this->input->post('email'),
					'ue_user_password' => md5($this->input->post('password')),
					'ue_user_status' => $this->input->post('status'),
					'ue_user_created_date' => date("Y-m-d H:i:s"),
					'ue_user_created_id' => $this->sessid,
				];

				if ($this->ue_user->insert($data)) :
					$this->session->set_userdata(array('success' => 'Data pengguna berhasil ditambahkan.'));
					redirect(base_url() . 'admin/user/index');
				else :
					$this->session->set_userdata(array('err' => 'Data pengguna gagal ditambahkan karena ada kerusakan sistem.'));
					redirect(base_url() . 'admin/user/add');
				endif;
			endif;
		endif;
	}

	public function check_email($email)
	{
		$id = $this->input->post('id');

		if (empty($email)) :
			return TRUE;
		else :
			$user = $this->ue_user->select_user_by_email_and_not_id($email, $id);

			if (count($user) == 0) :
				return TRUE;
			else :
				$this->form_validation->set_message('check_email', 'Email telah digunakan.');
				return FALSE;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/user/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");

		$maintitle = "<h1>Detail Pengguna</h1>";

		$user = $this->ue_user->select_user_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/user/_form', array('user' => $user));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('address', 'alamat', 'trim');
			$this->form_validation->set_rules('phone', 'no. telepon', 'trim|max_length[35]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|max_length[255]|valid_email|callback_check_email');
			$this->form_validation->set_rules('password', 'password', 'trim|max_length[50]');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/user/_form');
				$this->load->view('admin/core/footer');
			else :
				$status = $this->input->post('status');
				$password = $this->input->post('password');

				if ($status == 0 && $id == 1) :
					$this->session->set_userdata(array("err" => "Data super admin tidak dapat dinon-aktifkan."));
					redirect($redirect);
				else :
					$data = [
						'ue_user_name' => $this->input->post('name'),
						'ue_user_address' => $this->input->post('address'),
						'ue_user_phone' => $this->input->post('phone'),
						'ue_user_email' => $this->input->post('email'),
						'ue_user_status' => $this->input->post('status'),
						'ue_user_updated_id' => $this->sessid,
					];

					if (!empty($password)) :
						$data['ue_user_password'] = md5($password);
					endif;

					if ($this->ue_user->update($id, $data)) :
						$this->session->set_userdata(array('success' => 'Data pengguna berhasil diperbaharui.'));
						redirect($redirect);
					else :
						$this->session->set_userdata(array('err' => 'Data pengguna gagal diperbaharui karena kerusakan sistem.'));
						redirect(base_url() . 'admin/user/detail/' . $id);
					endif;
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/user/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		if ($id == 1) :
			$this->session->set_userdata(array("err" => "Data super admin tidak dapat dihapus."));
			redirect($redirect);
		else :
			$user = $this->ue_user->select_user_by_id($id);

			if (count($user) > 0) {
				if ($this->ue_user->update($id, array("ue_user_status" => 2))) {
					$this->session->set_userdata(array("success" => "Data pengguna berhasil dihapus."));
					redirect($redirect);
				} else {
					$this->session->set_userdata(array("err" => "Data pengguna gagal dihapus."));
					redirect($redirect);
				}
			} else {
				$this->session->set_userdata(array("err" => "Data pengguna tidak dapat ditemukan."));
				redirect($redirect);
			}
		endif;
	}
}
