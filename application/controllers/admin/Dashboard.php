<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $sessid = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if (!isset($this->session->userdata["userid"]) || empty($this->session->userdata["userid"])) :
			$this->session->set_userdata(array('err' => 'Please sign in first.'));
			redirect(base_url() . "admin/login");
			exit();
		endif;

		$this->sessid = $this->session->userdata["userid"];
	}

	public function index()
	{
		$maintitle = "<h1>Dashboard</h1>";
		$breadcrumbs = '<li class="active">Dashboard</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', array("maintitle" => $maintitle, "breadcrumbs" => $breadcrumbs));
		$this->load->view('admin/index');
		$this->load->view('admin/core/footer');
	}
}
