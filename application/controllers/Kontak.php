<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_content");
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
		$submit = $this->input->post('submit');
		$content = $this->ue_content->select_content_by_type("kontak");
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$product_list = $this->ue_product->select_product_list();

		if (empty($submit)) {
			$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
			$this->load->view('contact', ["content" => $content]);
			$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
		} else {
			$this->form_validation->set_rules("name", "nama", "trim|required|max_length[255]");
			$this->form_validation->set_rules("phone", "telp", "trim|required|max_length[35]");
			$this->form_validation->set_rules("office", "perusahaan/kantor", "trim|required|max_length[255]");
			$this->form_validation->set_rules("role", "divisi/jabatan", "trim|required|max_length[255]");
			$this->form_validation->set_rules("message", "pesan", "trim|required");
			$this->form_validation->set_message("required", "Input %s tidak boleh kosong.");
			$this->form_validation->set_message("max_length", "Maksimum karakter terlewati.");

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
				$this->load->view('contact', ["content" => $content]);
				$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
			} else {
			}
		}
	}
}
