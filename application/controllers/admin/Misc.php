<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Misc extends CI_Controller
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

		$this->load->model('ue_misc');
	}

	public function index()
	{
		$id = $this->sessid;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Pengaturan</h1>";

		$misc = $this->ue_misc->select_misc();

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/misc/_form', array('misc' => $misc));
			$this->load->view('admin/core/footer');
		else :
			$value = $this->input->post("value");
			$x = 0;
			foreach ($misc as $miscs) :
				$data = [
					'ue_misc_value'			=> nl2br($value[$x]),
					'ue_misc_updated_id'	=> $this->sessid,
				];

				$this->ue_misc->update($miscs->ue_misc_id, $data);

				$x++;
			endforeach;

			$this->session->set_userdata(array('success' => 'Lain-lain berhasil diperbaharui.'));
			redirect(base_url() . 'admin/misc');
		endif;
	}
}
