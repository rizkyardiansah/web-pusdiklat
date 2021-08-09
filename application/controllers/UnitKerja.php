<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UnitKerja extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// load model persetujuan
		$this->load->model('Persetujuan_model');
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 2) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Unauthenticated, harap login terlebih dahulu']);
			redirect('auth/index');
			die;
		}
	}

	// fungsi load template secara dinamis
	public function loadTemplate($menu)
	{
		$this->load->view('templates/administrator-templates/header');
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'index';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending();
		// aksi untuk liat data yang masih menunggu verifikasi
		$data['verifikasi'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'status' => 'Disetujui'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending();
		// aksi untuk liat data yang telah disetujui
		$data['approval'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'status' => 'Ditolak'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending();
		// aksi untuk liat data yang telah ditolak
		$data['reject'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function verifikasiBerkas()
	{
		$data['menu'] = 'verifikasi_berkas';
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending();
		// aksi untuk liat data untuk diverifikasi
		// $dataPending = $this->Persetujuan_model->updateVerifikasi($id, $data);
		$this->loadTemplate($data);
	}
}
