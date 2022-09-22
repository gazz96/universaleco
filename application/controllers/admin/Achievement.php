<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Achievement extends CI_Controller
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

		$this->load->model('ue_achievement');
	}

	public function index($page = "", $sortby = "id", $sorttype = "desc", $searchby = "", $term = "")
	{
		if ($page == "") :
			redirect(base_url() . 'admin/achievement/index/1');
		endif;

		$searchlink = '';

		if (!empty($searchby)) :
			$searchlink = $searchby . "/" . $term;
		endif;

		$this->session->set_userdata(array("currentpage" => base_url() . "admin/achievement/index/" . $page . "/" . $sortby . "/" . $sorttype . "/" . $searchlink));

		$oldterm = null;

		if (!empty($term)) :
			$oldterm = $term;
			$term = str_replace('-', ' ', $term);
		endif;

		$limit = 15;
		$offset = ($page - 1) * $limit;

		$num = $this->ue_achievement->select_achievement_rows($searchby, $term);

		$config['base_url'] = base_url() . 'admin/achievement/index';
		$config['first_url'] = base_url() . 'admin/achievement/index/1/' . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $oldterm;
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

		$achievement = $this->ue_achievement->select_achievement($sortby, $sorttype, $searchby, $term, $limit, $offset);

		$this->pagination->initialize($config);

		if ($num < 1) :
			$link = "";
		else :
			$link = $this->pagination->create_links("");
		endif;

		$maintitle = "<h1>Pencapaian</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/user"><i class="fa fa-file-text"></i> User</a></li><li class="active">Account</li>';

		$this->load->view('admin/core/header');
		$this->load->view('admin/core/menu', ['maintitle' => $maintitle]);
		$this->load->view('admin/achievement/index', ['achievement' => $achievement, 'links' => $link]);
		$this->load->view('admin/core/footer');
	}

	public function search($sortby = "id", $sorttype = "asc")
	{
		$searchby = $this->input->post('searchby');
		$search = $this->input->post('search');
		$search = preg_replace("/[^A-Za-z0-9. \-]/", '', $search);
		$search = htmlentities(urlencode(str_replace(' ', '-', $search)));

		if (empty($searchby)) :
			header("Location: " . base_url() . "admin/achievement/index/1/" . $sortby . '/' . $sorttype);
		else :
			header("Location: " . base_url() . "admin/achievement/index/1/" . $sortby . '/' . $sorttype . '/' . $searchby . '/' . $search);
		endif;
	}

	public function getSequence()
	{
		$achievement = $this->ue_achievement->select_max_sequence();

		if (count($achievement) > 0 && $achievement[0]->maxsequence != null) {
			$sequence = $achievement[0]->maxsequence + 1;
		} else {
			$sequence = 1;
		}

		return $sequence;
	}

	public function add()
	{
		$submit = $this->input->post("submit");
		$maintitle = "<h1>Tambah Pencapaian Baru</h1>";
		//$breadcrumbs = '<li><a href="' . base_url() . 'admin/member"><i class="fa fa-file-text"></i> Master Agent</a></li><li class="active">Add New</li>';

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/achievement/_form');
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('name', 'nama', 'trim|max_length[255]');
			$this->form_validation->set_rules('value', 'nilai', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/achievement/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_achievement_name'			=> $this->input->post('name'),
					'ue_achievement_value'			=> $this->input->post('value'),
					'ue_achievement_description'	=> $this->input->post('description'),
					'ue_achievement_sequence'		=> $this->getSequence(),
					'ue_achievement_status'			=> $this->input->post('status'),
					'ue_achievement_created_date'	=> date("Y-m-d H:i:s"),
					'ue_achievement_created_id'		=> $this->sessid,
				];

				if ($this->ue_achievement->insert($data)) :
					$this->resetsequence();
					$this->session->set_userdata(array('success' => 'Pencapaian berhasil ditambahkan.'));
					redirect(base_url() . 'admin/achievement');
				else :
					$this->session->set_userdata(array('err' => 'Pencapaian gagal ditambahkan karena ada kerusakan sistem.'));
					redirect(base_url() . 'admin/achievement/add');
				endif;
			endif;
		endif;
	}

	public function detail($id)
	{
		$redirect = base_url() . "admin/achievement";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$submit = $this->input->post("submit");
		$maintitle = "<h1>Detail Pencapaian</h1>";

		$achievement = $this->ue_achievement->select_achievement_by_id($id);

		if (empty($submit)) :
			$this->load->view('admin/core/header');
			$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
			$this->load->view('admin/achievement/_form', array('achievement' => $achievement));
			$this->load->view('admin/core/footer');
		else :
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_rules('name', 'nama', 'trim|max_length[255]');
			$this->form_validation->set_rules('value', 'nilai', 'trim|required|max_length[255]');
			$this->form_validation->set_rules('description', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('status', 'status', 'trim');
			$this->form_validation->set_message('required', 'Silahkan lengkapi %s.');
			$this->form_validation->set_message('max_length', 'Maksimum karakter terlampaui.');

			if ($this->form_validation->run() == FALSE) :
				$this->load->view('admin/core/header');
				$this->load->view('admin/core/menu', array("maintitle" => $maintitle));
				$this->load->view('admin/achievement/_form');
				$this->load->view('admin/core/footer');
			else :
				$data = [
					'ue_achievement_name'			=> $this->input->post('name'),
					'ue_achievement_value'			=> $this->input->post('value'),
					'ue_achievement_description'	=> $this->input->post('description'),
					'ue_achievement_status'			=> $this->input->post('status'),
					'ue_achievement_updated_id'		=> $this->sessid,
				];

				if ($this->ue_achievement->update($id, $data)) :
					$this->resetsequence();
					$this->session->set_userdata(array('success' => 'Pencapaian berhasil diperbaharui.'));
					redirect($redirect);
				else :
					$this->session->set_userdata(array('err' => 'Pencapaian gagal diperbaharui karena kerusakan sistem.'));
					redirect(base_url() . 'admin/achievement/detail/' . $id);
				endif;
			endif;
		endif;
	}

	public function delete($id)
	{
		$redirect = base_url() . "admin/achievement";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) :
			$redirect = $this->session->userdata['currentpage'];
		endif;

		$achievement = $this->ue_achievement->select_achievement_by_id($id);

		if (count($achievement) > 0) {
			if ($this->ue_achievement->delete($id)) {
				$this->resetsequence();
				$this->session->set_userdata(array("success" => "Pencapaian berhasil dihapus."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Pencapaian gagal dihapus."));
				redirect($redirect);
			}
		} else {
			$this->session->set_userdata(array("err" => "Pencapaian tidak dapat ditemukan."));
			redirect($redirect);
		}
	}

	public function moveup($id)
	{
		$redirect = base_url() . "admin/achievement";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) {
			$redirect = $this->session->userdata['currentpage'];
		}

		$achievement = $this->ue_achievement->select_achievement_by_id($id);

		if ($achievement == null || count($achievement) == 0) {
			$this->session->set_userdata(array("err" => "Pencapaian tidak ditemukan."));
			redirect($redirect);
		} else {
			$seq = $achievement[0]->ue_achievement_sequence;
			$seqbef = $seq - 1;

			if ($seqbef <= 0) {
				$achievementlast = $this->ue_achievement->select_max_sequence();
				$seqbef = $achievementlast[0]->maxsequence == null ? 1 : $achievementlast[0]->maxsequence;
			}

			$homep = $this->ue_achievement->select_achievement_by_sequence($seqbef);
			if ($homep != null && count($homep) > 0) {
				$this->ue_achievement->update($homep[0]->ue_achievement_id, ["ue_achievement_sequence" => $seq]);
				$this->ue_achievement->update($id, ["ue_achievement_sequence" => $seqbef]);

				//$this->resetsequence();

				$this->session->set_userdata(array("success" => "Urutan pencapaian berhasil diubah."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Pencapaian tidak ditemukan."));
				redirect($redirect);
			}
		}
	}

	public function movedown($id)
	{
		$redirect = base_url() . "admin/achievement";
		if (isset($this->session->userdata["currentpage"]) && !empty($this->session->userdata["currentpage"])) {
			$redirect = $this->session->userdata['currentpage'];
		}

		$achievement = $this->ue_achievement->select_achievement_by_id($id);
		$achievementlast = $this->ue_achievement->select_max_sequence();
		$maxseq = $achievementlast[0]->maxsequence == null ? 1 : $achievementlast[0]->maxsequence;

		if ($achievement == null || count($achievement) == 0) {
			$this->session->set_userdata(array("err" => "Pencapaian tidak ditemukan."));
			redirect($redirect);
		} else {
			$seq = $achievement[0]->ue_achievement_sequence;
			$seqaft = $seq + 1;

			if ($seqaft > $maxseq) {
				$seqaft = 1;
			}

			$homep = $this->ue_achievement->select_achievement_by_sequence($seqaft);
			if ($homep != null && count($homep) > 0) {
				$this->ue_achievement->update($homep[0]->ue_achievement_id, ["ue_achievement_sequence" => $seq]);
				$this->ue_achievement->update($id, ["ue_achievement_sequence" => $seqaft]);

				//$this->resetsequence();

				$this->session->set_userdata(array("success" => "Urutan pencapaian berhasil diubah."));
				redirect($redirect);
			} else {
				$this->session->set_userdata(array("err" => "Pencapaian tidak ditemukan."));
				redirect($redirect);
			}
		}
	}

	private function resetsequence()
	{
		$achievementlist = $this->ue_achievement->select_achievement_list_all();

		if ($achievementlist != null && count($achievementlist) > 0) {
			$x = 1;
			foreach ($achievementlist as $achievementlists) {
				$this->ue_achievement->update($achievementlists->ue_achievement_id, ["ue_achievement_sequence" => $x]);

				$x++;
			}

			return true;
		} else {
			return false;
		}
	}
}
