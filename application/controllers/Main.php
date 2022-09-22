<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_homepage");
		$this->load->model("ue_service");
		$this->load->model("ue_product");
		$this->load->model("ue_achievement");
		$this->load->model("ue_client");
		$this->load->model("ue_support");
		$this->load->model("ue_certificate");
		$this->load->model("ue_misc");

		$misc = $this->ue_misc->select_misc();

		if ($misc != null && count($misc) > 0) :
			foreach ($misc as $miscs) :
				$this->misc_data[$miscs->ue_misc_name] = $miscs->ue_misc_value;
			endforeach;
		endif;
	}

	public function index()
	{
		$homepage_list = $this->ue_homepage->select_homepage_list();
		$service_list = $this->ue_service->select_service_list();
		$product_list = $this->ue_product->select_product_list();
		$achievement_list = $this->ue_achievement->select_achievement_list();
		$client_list = $this->ue_client->select_client_list();
		$support_list = $this->ue_support->select_support_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('index', ["homepage_list" => $homepage_list, "service_list" => $service_list, "achievement_list" => $achievement_list, "client_list" => $client_list, "support_list" => $support_list, "certificate_list" => $certificate_list]);
		$this->load->view('core/footer');
	}

}
