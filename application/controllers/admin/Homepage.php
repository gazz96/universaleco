<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
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

		$this->load->model('ue_homepage');
	}

	public function index($page = "", $sortby = "sequence", $sorttype = "asc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/homepage/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/homepage/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_homepage->select_homepage_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/homepage/index';
		$config['first_url'] = base_url() . 'admin/homepage/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$homepage = $this->ue_homepage->select_homepage($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Beranda</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/homepage/index', ['homepage' => $homepage, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/homepage/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/homepage/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
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
		$homepage = $this->ue_homepage->select_max_sequence();

		if (count($homepage) > 0 && $homepage[0]->maxsequence != null) {
			$sequence = $homepage[0]->maxsequence + 1;
		} else {
			$sequence = 1;
		}

		return $sequence;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Beranda Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'homepage/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/homepage/_form');
			$this->load->view('admin/core/footer');
		else :
			$image = $_FILES["image"]["name"];

			$this->form_validation->set_rules('title', 'judul', 'trim|max_length[255]');
			$this->form_validation->set_rules('link', 'link', 'trim');
			if (empty($image)) :
				$this->form_validation->set_rules('image', 'gambar', 'trim|required');
			endif;
			$this->form_validation->set_rules('description', 'deskripsi', 'trim');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/homepage/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = $this->uploads("homepage", "image");

				if ($file == false) :
					redirect(base_url() . "admin/homepage/add");
				else :
					$data = [
						'ue_homepage_title'			=> $this->input->post('title'),
						'ue_homepage_link'			=> $this->input->post('link'),
						'ue_homepage_url'			=> $file,
						'ue_homepage_description'	=> $this->input->post('description'),
						'ue_homepage_sequence'		=> $this->getSequence(),
						'ue_homepage_status'		=> $this->input->post('status'),
						'ue_homepage_created_date'	=> date("Y-m-d H:i:s"),
						'ue_homepage_created_id'	=> $this->sessid,
					];

					if ($this->ue_homepage->insert($data)) :
						$this->resetsequence();

						$this->session->set_userdata(array('success' => 'Data beranda berhasil ditambahkan.'));
						redirect(base_url() . 'admin/homepage');
					else :
						$this->session->set_userdata(array('err' => 'Data beranda gagal ditambahkan karena ada kerusakan sistem.'));
						redirect(base_url() . 'admin/homepage/add');
					endif;
				endif;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/homepage/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");

		$maintitle = "<h1>Detail Beranda</h1>";

		$homepage = $this->ue_homepage->select_homepage_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/homepage/_form', array('homepage' => $homepage));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('main_img', 'image', 'trim');
			$this->form_validation->set_rules('title', 'judul', 'trim|max_length[255]');
			$this->form_validation->set_rules('link', 'link', 'trim');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('valid_email', 'Format %s salah.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/homepage/_form');
				$this->load->view('admin/core/footer');
			else :
				$file = null;
				$image = $_FILES["image"]["name"];
				$oldimage = $homepage[0]->ue_homepage_url;

				if (!empty($image)) :
					$file = $this->uploads("homepage", "image");
				endif;

				$data = [
					'ue_homepage_title'			=> $this->input->post('title'),
					'ue_homepage_link'			=> $this->input->post('link'),
					'ue_homepage_description'	=> $this->input->post('description'),
					'ue_homepage_status'		=> $this->input->post('status'),
					'ue_homepage_updated_id'	=> $this->sessid,
				];

				if ($file != null) :
					$data["ue_homepage_url"] = $file;
				endif;

				if ($this->ue_homepage->update($id, $data)) :
					if ($file != null && $oldimage != null && file_exists("./uploads/homepage/" . $oldimage)) {
						@unlink("./uploads/homepage/" . $oldimage);
					}

					$this->resetsequence();

					$this->session->set_userdata(array('success' => 'Data beranda berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Data beranda gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/homepage/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/homepage/index";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$homepage = $this->ue_homepage->select_homepage_by_id($id);

		if (count($homepage) > 0) {
			$oldimage = $homepage[0]->ue_homepage_url;

			if ($this->ue_homepage->delete($id)) {
				if ($oldimage != null && file_exists("./uploads/homepage/" . $oldimage)) {
					@unlink("./uploads/homepage/" . $oldimage);
				}

				$this->resetsequence();

				$this->session->set_userdata(array("success" => "Data beranda berhasil dihapus."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Data beranda gagal dihapus."));
				redirect($redirect);
			}
		} else {
			$this->session->set_userdata(array("err" => "Data beranda tidak dapat ditemukan."));
			redirect($redirect);
		}
	}

	public function moveup($id)
	{
		$redirect = base_url() . "admin/homepage";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) {
			$redirect = $this->session->userdata['currentpage'];
		}

		$homepage = $this->ue_homepage->select_homepage_by_id($id);

		if ($homepage == null || count($homepage) == 0) {
			$this->session->set_userdata(array("err" => "Homepage tidak ditemukan."));
			redirect($redirect);
		} else {
			$seq = $homepage[0]->ue_homepage_sequence;
			$seqbef = $seq - 1;

			if ($seqbef <= 0) {
				$homepagelast = $this->ue_homepage->select_max_sequence();
				$seqbef = $homepagelast[0]->maxsequence == null ? 1 : $homepagelast[0]->maxsequence;
			}

			$homep = $this->ue_homepage->select_homepage_by_sequence($seqbef);
			if ($homep != null && count($homep) > 0) {
				$this->ue_homepage->update($homep[0]->ue_homepage_id, ["ue_homepage_sequence" => $seq]);
				$this->ue_homepage->update($id, ["ue_homepage_sequence" => $seqbef]);

				//$this->resetsequence();

				$this->session->set_userdata(array("success" => "Urutan homepage berhasil diubah."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Homepage tidak ditemukan."));
				redirect($redirect);
			}
		}
	}

	public function movedown($id)
	{
		$redirect = base_url() . "admin/homepage";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) {
			$redirect = $this->session->userdata['currentpage'];
		}

		$homepage = $this->ue_homepage->select_homepage_by_id($id);
		$homepagelast = $this->ue_homepage->select_max_sequence();
		$maxseq = $homepagelast[0]->maxsequence == null ? 1 : $homepagelast[0]->maxsequence;

		if ($homepage == null || count($homepage) == 0) {
			$this->session->set_userdata(array("err" => "Homepage tidak ditemukan."));
			redirect($redirect);
		} else {
			$seq = $homepage[0]->ue_homepage_sequence;
			$seqaft = $seq + 1;

			if ($seqaft > $maxseq) {
				$seqaft = 1;
			}

			$homep = $this->ue_homepage->select_homepage_by_sequence($seqaft);
			if ($homep != null && count($homep) > 0) {
				$this->ue_homepage->update($homep[0]->ue_homepage_id, ["ue_homepage_sequence" => $seq]);
				$this->ue_homepage->update($id, ["ue_homepage_sequence" => $seqaft]);

				//$this->resetsequence();

				$this->session->set_userdata(array("success" => "Urutan homepage berhasil diubah."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Homepage tidak ditemukan."));
				redirect($redirect);
			}
		}
	}

	private function resetsequence()
	{
		$homepagelist = $this->ue_homepage->select_homepage_list_all();

		if ($homepagelist != null && count($homepagelist) > 0) {
			$x = 1;
			foreach ($homepagelist as $homepagelists) {
				$this->ue_homepage->update($homepagelists->ue_homepage_id, ["ue_homepage_sequence" => $x]);

				$x++;
			}

			return true;
		} else {
			return false;
		}
	}
}
