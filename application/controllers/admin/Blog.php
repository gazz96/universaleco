<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
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

		$this->load->model('ue_blog');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/blog/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/blog/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_blog->select_blog_rows("Blog", $searchby, $term);

		$config['base_url'] = base_url() . 'admin/blog/index';
		$config['first_url'] = base_url() . 'admin/blog/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$blog = $this->ue_blog->select_blog("Blog", $sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Blog</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/blog/index', ['blog' => $blog, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/blog/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/blog/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	/*function crop($namafile, $width, $height)
	{
		$config['image_library'] = 'gd2';
		$config['source_image']	= './uploads/blog/thumb_'.$namafile;
		$config['new_image'] = './uploads/blog/thumb_'.$namafile;
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
		$config['source_image']	= './uploads/blog/'.$namafile;
		$config['new_image']	= './uploads/blog/thumb_'.$namafile;
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
		$maintitle = "<h1>Tambah Blog Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/blog/_form');
			$this->load->view('admin/core/footer');
		else :
			$image = $_FILES['image']['name'];
			//$background = $_FILES['background']['name'];

			$this->form_validation->set_rules('title', 'judul', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('date', 'tanggal', 'trim|required|max_length[10]');
			$this->form_validation->set_rules('url', 'URL', 'trim|required');
			//$this->form_validation->set_rules('author', 'penulis', 'trim|required|max_length[255]');
			if (empty($image)) :
				$this->form_validation->set_rules('image', 'foto', 'trim|required');
			endif;

			/*if (empty($background)) :
				$this->form_validation->set_rules('background', 'gambar latar', 'trim|required');
			endif;
			$this->form_validation->set_rules('excerpt', 'ringkasan', 'trim|required');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');*/
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/blog/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = $this->uploads('blog', 'image');
				//$filebg = $this->uploads('blog', 'background');

				if ($file == false /*|| $filebg == false*/) :
					redirect(base_url() . 'admin/blog/add');
				else :
					$data = [
						'ue_blog_type'			=> "Blog",
						'ue_blog_title'			=> $this->input->post('title'),
						'ue_blog_date'			=> date("Y-m-d", strtotime($this->input->post('date'))),
						'ue_blog_slug'			=> url_title($this->input->post('title'), '-', true),
						// 'ue_blog_author'		=> $this->input->post('author'),
						'ue_blog_excerpt'		=> $this->input->post('excerpt'),
						'ue_blog_description'	=> $this->input->post('description'),
						'ue_blog_image'			=> $file,
						//'ue_blog_bg'			=> $filebg,
						'ue_blog_status'		=> $this->input->post('status'),
						'ue_blog_created_date'	=> date("Y-m-d H:i:s"),
						'ue_blog_created_id'	=> $this->sessid,
					];

					if ($this->ue_blog->insert($data)) :
						$this->session->set_userdata(array('success' => 'Blog berhasil ditambahkan.'));
						redirect(base_url() . 'admin/blog');
					else :
						$this->session->set_userdata(array('err' => 'Blog gagal ditambahkan karena ada kerusakan sistem.'));
						redirect(base_url() . 'admin/blog/add');
					endif;
				endif;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/blog";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Detail Blog</h1>";

		$blog = $this->ue_blog->select_blog_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/core/tinymce');
			$this->load->view('admin/blog/_form', array('blog' => $blog));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('main_img', 'ikon', 'trim');
			//$this->form_validation->set_rules('main_bg', 'gambar latar', 'trim');
			$this->form_validation->set_rules('title', 'judul', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('date', 'tanggal', 'trim|required|max_length[10]');
			$this->form_validation->set_rules('url', 'URL', 'trim|required');
			// $this->form_validation->set_rules('author', 'penulis', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('excerpt', 'ringkasan', 'trim|required');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/core/tinymce');
				$this->load->view('admin/blog/_form');
				$this->load->view('admin/core/footer');
			else :
				$image = $_FILES["image"]["name"];
				//$background = $_FILES["background"]["name"];
				$oldimage = $blog[0]->ue_blog_image;
				//$oldbg = $blog[0]->ue_blog_bg;

				$data = [
					'ue_blog_title'			=> $this->input->post('title'),
					'ue_blog_date'			=> date("Y-m-d", strtotime($this->input->post('date'))),
					'ue_blog_slug'			=> url_title($this->input->post('title'), '-', true),
					'ue_blog_author'		=> $this->input->post('author'),
					'ue_blog_excerpt'		=> $this->input->post('excerpt'),
					'ue_blog_description'	=> $this->input->post('description'),
					'ue_blog_status'			=> $this->input->post('status'),
					'ue_blog_updated_id'		=> $this->sessid,
				];

				if (!empty($image)) :
					$file = $this->uploads('blog', 'image');

					if ($file == false) :
						redirect(base_url() . 'admin/blog/detail/' . $id);
						exit();
					else :
						$data['ue_blog_image'] = $file;
					endif;
				endif;

				/*if (!empty($background)) :
					$filebg = $this->uploads('blog', 'background');

					if ($filebg == false) :
						redirect(base_url() . 'admin/blog/detail/' . $id);
						exit();
					else :
						$data['ue_blog_bg'] = $filebg;
					endif;
				endif;*/

				if ($this->ue_blog->update($id, $data)) :
					if ($file != null && !empty($oldimage) && $oldimage != null && file_exists("./uploads/blog/" . $oldimage)) :
						@unlink("./uploads/blog/" . $oldimage);
					endif;

					/*if ($filebg != null && !empty($oldbg) && $oldbg != null && file_exists("./uploads/blog/" . $oldbg)) :
						@unlink("./uploads/blog/" . $oldbg);
					endif;*/

					$this->session->set_userdata(array('success' => 'Blog berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Blog gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/blog/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/blog";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$blog = $this->ue_blog->select_blog_by_id($id);

		if (count($blog) > 0) {
			$oldimage = $blog[0]->ue_blog_image;
			//$oldbg = $blog[0]->ue_blog_bg;

			if ($this->ue_blog->delete($id)) {
				if (!empty($oldimage) && $oldimage != null && file_exists("./uploads/blog/" . $oldimage)) :
					@unlink("./uploads/blog/" . $oldimage);
				endif;

				/*if (!empty($oldbg) && $oldbg != null && file_exists("./uploads/blog/" . $oldbg)) :
					@unlink("./uploads/blog/" . $oldbg);
				endif;*/

				$this->session->set_userdata(array("success" => "Blog berhasil dihapus."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Blog gagal dihapus."));
				redirect($redirect);
			}
		} else {
			$this->session->set_userdata(array("err" => "Blog tidak dapat ditemukan."));
			redirect($redirect);
		}
	}
}
