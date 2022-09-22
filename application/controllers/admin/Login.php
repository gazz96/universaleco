<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('ue_user');
	}

	public function index()
	{
		if (isset($this->session->userdata["userid"]) && !empty($this->session->userdata["userid"])) :
			redirect(base_url() . "admin/dashboard");
		endif;

		$submit = $this->input->post('submit');

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/login');
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[255]');
			$this->form_validation->set_rules('password', 'password', 'trim|required|max_length[50]');
			$this->form_validation->set_message('required', 'Form %s harus dilengkapi.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/login');
				$this->load->view('admin/core/footer');
			else :
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$user = $this->ue_user->select_user_by_email_and_password($email, md5($password));

				if (count($user) == 0) :
					$this->session->set_userdata(array("err" => "Email / password anda salah."));
					redirect(base_url() . "admin/login");
				else :
					$this->session->set_userdata(array("userid" => $user[0]->ue_user_id, "username" => $user[0]->ue_user_name, "email" => $user[0]->ue_user_email));
					redirect(base_url() . "admin/dashboard");
				endif;
			endif;
		endif;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . "admin/login");
	}
}
