<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if (!isset($this->session->userdata["userid"]) || empty($this->session->userdata["userid"])) :
			$this->session->set_userdata(array('err' => 'Silahkan lakukan login terlebih dahulu.'));
			redirect(base_url() . "admin/login");
		endif;

		$this->sessid = $this->session->userdata["userid"];

		$this->load->model('ue_product');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/product/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/product/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_product->select_product_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/product/index';
		$config['first_url'] = base_url() . 'admin/product/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$product = $this->ue_product->select_product($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Produk</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/product/index', ['product' => $product, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/product/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/product/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
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
		$config['max_size']	= '1024';
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

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Produk Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/product/_form');
			$this->load->view('admin/core/footer');
		else :
			$image = $_FILES['image']['name'];
			$background = $_FILES['background']['name'];

			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			if (empty($image)) :
				$this->form_validation->set_rules('image', 'foto', 'trim|required');
			endif;

			if (empty($background)) :
				$this->form_validation->set_rules('background', 'gambar latar', 'trim|required');
			endif;
			$this->form_validation->set_rules('excerpt', 'ringkasan', 'trim|required');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/product/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = $this->uploads('product', 'image');
				$filebg = $this->uploads('product', 'background');

				if ($file == false || $filebg == false) :
					redirect(base_url() . 'admin/product/add');
				else :
					$data = [
						'ue_product_name'			=> $this->input->post('name'),
						'ue_product_excerpt'		=> $this->input->post('excerpt'),
						'ue_product_description'	=> $this->input->post('description'),
						'ue_product_image'			=> $file,
						'ue_product_bg'				=> $filebg,
						'ue_product_status'			=> $this->input->post('status'),
						'ue_product_created_date'	=> date("Y-m-d H:i:s"),
						'ue_product_created_id'		=> $this->sessid,
					];

					if ($this->ue_product->insert($data)) :
						$this->session->set_userdata(array('success' => 'Produk berhasil ditambahkan.'));
						redirect(base_url() . 'admin/product');
					else :
						$this->session->set_userdata(array('err' => 'Produk gagal ditambahkan karena ada kerusakan sistem.'));
						redirect(base_url() . 'admin/product/add');
					endif;
				endif;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/product";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Detail Produk</h1>";

		$product = $this->ue_product->select_product_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/product/_form', array('product' => $product));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('main_img', 'ikon', 'trim');
			$this->form_validation->set_rules('main_bg', 'gambar latar', 'trim');
			$this->form_validation->set_rules('name', 'nama', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('excerpt', 'ringkasan', 'trim|required');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/product/_form');
				$this->load->view('admin/core/footer');
			else :
				$image = $_FILES["image"]["name"];
				$background = $_FILES["background"]["name"];
				$oldimage = $product[0]->ue_product_image;
				$oldbg = $product[0]->ue_product_bg;

				$data = [
					'ue_product_name'			=> $this->input->post('name'),
					'ue_product_excerpt'		=> $this->input->post('excerpt'),
					'ue_product_description'	=> $this->input->post('description'),
					'ue_product_status'			=> $this->input->post('status'),
					'ue_product_updated_id'		=> $this->sessid,
				];

				if (!empty($image)) :
					$file = $this->uploads('product', 'image');

					if ($file == false) :
						redirect(base_url() . 'admin/product/detail/' . $id);
						exit();
					else :
						$data['ue_product_image'] = $file;
					endif;
				endif;

				if (!empty($background)) :
					$filebg = $this->uploads('product', 'background');

					if ($filebg == false) :
						redirect(base_url() . 'admin/product/detail/' . $id);
						exit();
					else :
						$data['ue_product_bg'] = $filebg;
					endif;
				endif;

				if ($this->ue_product->update($id, $data)) :
					if ($file != null && !empty($oldimage) && $oldimage != null && file_exists("./uploads/product/" . $oldimage)) :
						@unlink("./uploads/product/" . $oldimage);
					endif;

					if ($filebg != null && !empty($oldbg) && $oldbg != null && file_exists("./uploads/product/" . $oldbg)) :
						@unlink("./uploads/product/" . $oldbg);
					endif;

					$this->session->set_userdata(array('success' => 'Produk berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Produk gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/product/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/product";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$product = $this->ue_product->select_product_by_id($id);

		if (count($product) > 0) {
			$oldimage = $product[0]->ue_product_image;
			$oldbg = $product[0]->ue_product_bg;

			if ($this->ue_product->delete($id)) {
				if (!empty($oldimage) && $oldimage != null && file_exists("./uploads/product/" . $oldimage)) :
					@unlink("./uploads/product/" . $oldimage);
				endif;

				if (!empty($oldbg) && $oldbg != null && file_exists("./uploads/product/" . $oldbg)) :
					@unlink("./uploads/product/" . $oldbg);
				endif;

				$this->session->set_userdata(array("success" => "Produk berhasil dihapus."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Produk gagal dihapus."));
				redirect($redirect);
			}
		} else {
			$this->session->set_userdata(array("err" => "Produk tidak dapat ditemukan."));
			redirect($redirect);
		}
	}
}
