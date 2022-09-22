<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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

		$this->load->model('ue_waste_category');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/category/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/category/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_waste_category->select_waste_category_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/category/index';
		$config['first_url'] = base_url() . 'admin/category/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['num_links'] = 5;
		$config['use_page_numbers'] = true;
		$config['uri_segment'] = 4;
		$config['suffix'] = '/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$category = $this->ue_waste_category->select_waste_category($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Kategori Panduan Limbah B3</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/category/index', ['category' => $category, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/category/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/category/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	/*function crop($namafile, $width, $height)
	{
		$config['image_library'] = 'gd2';
		$config['source_image']	= './uploads/product/thumb_'.$namafile;
		$config['new_image'] = './uploads/product/thumb_'.$namafile;
		$config['quality'] = "100%";
		$config['maintain_ratio'] = FALSE;
		$config['width'] = 640;
		$config['height'] = 640;
		$config['x_axis'] = 0;
		$config['y_axis'] = ($height - 640)/2;
		
		$this->load->library('image_lib'); 
		$this->image_lib->clear();
		$this->image_lib->initialize($config); 

		if (!$this->image_lib->crop()){
			$error = array('error' => $this->image_lib->display_errors());
			return false;
		}
		else{
			$this->image_lib->clear();
			unset($config);
			
			return true;
		}
		
		$this->image_lib->clear();
		unset($config);
	}
	
	function resize($namafile, $width, $height){
		$config['image_library'] = 'gd2';
		$config['source_image']	= './uploads/product/'.$namafile;
		$config['new_image']	= './uploads/product/thumb_'.$namafile;
		$config['maintain_ratio'] = TRUE;
		$config['quality'] = "100%";
		$config['width'] = '640';
		$config['height'] = '640';
		$dim = (intval($width) / intval($height)) - ($config['width'] / $config['height']);
		$config['master_dim'] = ($dim > 0)? "height" : "width";

		$this->load->library('image_lib'); 
		$this->image_lib->initialize($config);

		if (!$this->image_lib->resize())
		{
			$error = array('error' => $this->image_lib->display_errors());
			return false;
		}
		else{
			$this->image_lib->clear();
			unset($config);
			/*if($this->crop($namafile, $width, $height) == false){
				return false;
			}*/

	/*return true;
		}
		
		$this->image_lib->clear();
		unset($config);
	}*/

	function uploads($pref, $input)
	{
		$ext = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);

		$config['upload_path'] = './uploads/' . $pref . '/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '512';
		$config['file_name'] = date('YmdHis') . $pref . '.' . $ext;
		$namaFile =  date('YmdHis') . $pref . '.' . $ext;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($input)) {
			$error = array('err' => $this->upload->display_errors());
			$this->session->set_userdata($error);
			return false;
		} else {
			//list($width, $height, $type, $attr) = getimagesize($_FILES[$input]['tmp_name']);
			//if($width > 640 || $height > 640){
			//if($this->resize($namaFile, $width, $height) == false){
			//return false;
			//}
			//}

			return $namaFile;
		}
	}

	public function getSequence()
	{
		$category = $this->ue_waste_category->select_max_sequence();

		if (count($category) > 0 && $category[0]->maxsequence != null) {
			$sequence = $category[0]->maxsequence + 1;
		} else {
			$sequence = 1;
		}

		return $sequence;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Kategori Panduan Limbah B3 Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'category/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/category/_form');
			$this->load->view('admin/core/footer');
		else :
			$image = $_FILES["image"]["name"];

			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			if (empty($image)) :
				$this->form_validation->set_rules('image', 'ikon', 'trim|required');
			endif;
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/category/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = $this->uploads("category", "image");

				if ($file == false) :
					redirect(base_url() . "admin/category/add");
				else :
					$data = [
						'ue_waste_category_name'			=> $this->input->post('name'),
						'ue_waste_category_icon'			=> $file,
						'ue_waste_category_status'			=> $this->input->post('status'),
						'ue_waste_category_created_date'	=> date("Y-m-d H:i:s"),
						'ue_waste_category_created_id'		=> $this->sessid,
					];

					if ($this->ue_waste_category->insert($data)) :
						$this->session->set_userdata(array('success' => 'Data kategori panduan limbah B3 berhasil ditambahkan.'));
						redirect(base_url() . 'admin/category');
					else :
						$this->session->set_userdata(array('err' => 'Data kategori panduan limbah B3 gagal ditambahkan karena ada kerusakan sistem.'));
						redirect(base_url() . 'admin/category/add');
					endif;
				endif;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/category/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");

		$maintitle = "<h1>Detail Kategori Panduan Limbah B3</h1>";

		$category = $this->ue_waste_category->select_waste_category_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/category/_form', array('category' => $category));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('main_img', 'image', 'trim');
			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/category/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = null;
				$image = $_FILES["image"]["name"];
				$oldimage = $category[0]->ue_waste_category_icon;

				if (!empty($image)) :
					$file = $this->uploads("category", "image");
				endif;

				$data = [
					'ue_waste_category_name'			=> $this->input->post('name'),
					'ue_waste_category_status'			=> $this->input->post('status'),
					'ue_waste_category_updated_id'		=> $this->sessid,
				];

				if ($file != null) :
					$data["ue_waste_category_icon"] = $file;
				endif;

				if ($this->ue_waste_category->update($id, $data)) :
					if ($file != null && $oldimage != null && file_exists("./uploads/category/" . $oldimage)) {
						@unlink("./uploads/category/" . $oldimage);
					}

					$this->session->set_userdata(array('success' => 'Data kategori panduan limbah B3 berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Data kategori panduan limbah B3 gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/category/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/category/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$category = $this->ue_waste_category->select_waste_category_by_id($id);
		$category_file = $this->ue_waste->select_waste_by_category($id);

		if ($category_file != null && count($category_file) > 0) :
			$this->session->set_userdata(array("err" => "Data kategori panduan limbah B3 masih digunakan."));
			redirect($redirect);
		else :
			if (count($category) > 0) {
				$oldimage = $category[0]->ue_waste_category_icon;

				if ($this->ue_waste_category->delete($id)) {
					if ($oldimage != null && file_exists("./uploads/category/" . $oldimage)) {
						@unlink("./uploads/category/" . $oldimage);
					}

					$this->session->set_userdata(array("success" => "Data kategori panduan limbah B3 berhasil dihapus."));
					redirect($redirect);
				} else {
					$this->session->set_userdata(array("err" => "Data kategori panduan limbah B3 gagal dihapus."));
					redirect($redirect);
				}
			} else {
				$this->session->set_userdata(array("err" => "Data kategori panduan limbah B3 tidak dapat ditemukan."));
				redirect($redirect);
			}
		endif;
	}
}
