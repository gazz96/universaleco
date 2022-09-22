<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_faq");
		$this->load->model("ue_certificate");
		$this->load->model("ue_product");
	}

	public function index()
	{
		$faq = $this->ue_faq->select_faq_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product_list = $this->ue_product->select_product_list();

		$this->load->view('core/header', ["product_list" => $product_list]);
		$this->load->view('faq', ["faq" => $faq]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}
}
