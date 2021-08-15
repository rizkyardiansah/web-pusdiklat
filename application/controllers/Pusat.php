<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pusat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Balasan_model');
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Unauthenticated, harap login terlebih dahulu']);
			redirect('auth/index');
			die;
		}
	}

	// fungsi load template secara dinamis
	public function loadTemplate($menu)
	{
		$menu['title'] = 'Admin Pusat';
		$this->load->view('templates/administrator-templates/header', $menu);
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator-pusat/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer_content');
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'daftar_pelamar';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);
		$data['permohonan'] = $this->Balasan_model->getPermohonanWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();

		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'status' => 'Disetujui'
		);
		// aksi untuk liat data yang telah disetujui
		$data['approval'] = $this->Balasan_model->getDataWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'status' => 'Ditolak'
		);
		// aksi untuk liat data yang telah ditolak
		$data['reject'] = $this->Balasan_model->getDataWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function formsurat($id)
	{
		$data['menu'] = 'form_surat';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);
		$data['detail'] = $this->Balasan_model->getDataById($id);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function updateStatus()
	{
		$setUpdate =  array(
			'status' => $this->input->post('status'),
			'tanggal_persetujuan' => date('Y-m-d'),
			'ket' => $this->input->post('ket')
		);
		$whereId = array(
			'id_permohonan' => $this->input->post('id_permohonan')
		);
		$this->Persetujuan_model->updateVerifikasi($whereId, $setUpdate, 'surat_permohonan');
		redirect('pusat/daftar_pelamar');
	}
}
