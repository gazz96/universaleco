<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
	public $misc_data = null;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model("ue_product");
		$this->load->model("ue_certificate");
		$this->load->model("ue_blog");
		$this->load->model("ue_misc");

		$misc = $this->ue_misc->select_misc();

		if ($misc != null && count($misc) > 0) :
			foreach ($misc as $miscs) :
				$this->misc_data[$miscs->ue_misc_name] = $miscs->ue_misc_value;
			endforeach;
		endif;
	}

	public function index($page = "", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'blog/index/1');
		endif;

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 12;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_blog->select_blog_list_rows("Blog", $searchby, $term);

		$config['base_url'] = base_url() . 'blog/index';
		$config['first_url'] = base_url() . 'blog/index/1/' . $searchby . '/' . $oldterm;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = true;
		$config['uri_segment'] = 3;
		$config['suffix'] = '/' . $searchby . '/' . $oldterm;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#!">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$blog = $this->ue_blog->select_blog_list("Blog", $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$product_list = $this->ue_product->select_product_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('blog', ["blog" => $blog, "links" => $link]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}

	public function search()
	{
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		header("Location: " . base_url() . "blog/index/1/title/" . $search);
	}

	public function detail($slug, $id)
	{
		$product_list = $this->ue_product->select_product_list();
		$certificate_list = $this->ue_certificate->select_certificate_list();
		$blog = $this->ue_blog->select_blog_by_id($id);

		$this->load->view('core/header', ["product_list" => $product_list, "misc_data" => $this->misc_data]);
		$this->load->view('blog-detail', ["blog" => $blog]);
		$this->load->view('core/footer', ["certificate_list" => $certificate_list]);
	}
}
