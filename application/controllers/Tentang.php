<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_content");
		$this->load->model("ue_certificate");
		$this->load->model("ue_product");
		$this->load->model("ue_limbah_category");
		$this->load->model("ue_limbah");
		//$this->load->model("ue_content");
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
		$content = $this->ue_content->select_content_by_type("tentang");
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product_list = $this->ue_product->select_product_list();
		$limbahcategory_list = $this->ue_limbah_category->select_limbah_category_list();
		foreach ($limbahcategory_list as $limbahcategory_lists) :
			$limbah_list[$limbahcategory_lists->ue_limbah_category_id] = $this->ue_limbah->select_limbah_list($limbahcategory_lists->ue_limbah_category_id);
		endforeach;

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('tentang', ["content" => $content, "certificate_list" => $certificate_list, "limbahcategory_list" => $limbahcategory_list, "limbah_list" => $limbah_list]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}
}
