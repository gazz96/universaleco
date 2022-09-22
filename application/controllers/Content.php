<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_product");
		$this->load->model("ue_certificate");
		$this->load->model("ue_misc");

		$misc = $this->ue_misc->select_misc();

		if ($misc != null && count($misc) > 0) :
			foreach ($misc as $miscs) :
				$this->misc_data[$miscs->ue_misc_name] = $miscs->ue_misc_value;
			endforeach;
		endif;
	}

	public function index($slug, $id)
	{
		$product_list = $this->ue_product->select_product_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product = $this->ue_product->select_product_by_id($id);

		$this->load->view('core/header', ["product_list" => $product_list, "product" => $product, "misc_data" => $this->misc_data]);
		$this->load->view('content');
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}
}
