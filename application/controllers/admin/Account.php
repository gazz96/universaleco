<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
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

		$this->load->model('ue_user');
	}

	public function check_email($email)
	{
		$id = $this->sessid;

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

	public function index()
	{
		$id = $this->sessid;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Akun</h1>";

		$user = $this->ue_user->select_user_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/user/_accountform', array('user' => $user));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('address', 'alamat', 'trim');
			$this->form_validation->set_rules('phone', 'no. telepon', 'trim|max_length[50]');
			$this->form_validation->set_rules('email', 'email', 'trim|required|max_length[255]|valid_email|callback_check_email');
			$this->form_validation->set_rules('password', 'password', 'trim|max_length[50]');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/user/_accountform');
				$this->load->view('admin/core/footer');
			else :
				$password = $this->input->post('password');

				$data = [
					'ue_user_name' => $this->input->post('name'),
					'ue_user_address' => $this->input->post('address'),
					'ue_user_phone' => $this->input->post('phone'),
					'ue_user_email' => $this->input->post('email'),
					'ue_user_updated_id' => $this->sessid,
				];

				if (!empty($password)) :
					$data['ue_user_password'] = md5($password);
				endif;

				if ($this->ue_user->update($id, $data)) :
					$this->session->set_userdata(array('success' => 'Akun anda berhasil diperbaharui.'));
					redirect(base_url() . 'admin/account');
				else :
					$this->session->set_userdata(array('err' => 'Akun anda gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/account');
				endif;
			endif;
		endif;
	}
}
