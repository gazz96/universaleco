<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_waste");
		$this->load->model("ue_waste_category");
		$this->load->model("ue_certificate");
		$this->load->model("ue_product");
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
		$waste_category = $this->ue_waste_category->select_waste_category_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product_list = $this->ue_product->select_product_list();

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('panduan', ["waste_category" => $waste_category]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}

	public function detail($id)
	{
		$waste = $this->ue_waste->select_waste_by_id($id);
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product_list = $this->ue_product->select_product_list();

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('panduan-detail', ["waste" => $waste]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}

	public function download()
	{
		$email = $this->input->post("email");

		echo json_encode(true);
	}
}
