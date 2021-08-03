<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UnitKerja extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// load model persetujuan
		$this->load->model(array('Persetujuan_model'));
		$this->load->helper('url');
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
		$this->load->view('templates/administrator-templates/side_menu');
		$this->load->view('administrator/' . $menu['menu']);
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'index';
		$this->loadTemplate($data);
		// aksi untuk liat data yang masih menunggu verifikasi
		$dataPending = $this->Persetujuan_model->getDataPendingLamaran();
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$this->loadTemplate($data);
		// aksi untuk liat data yang telah disetujui
		$dataAccept = $this->Persetujuan_model->getDataAcceptLamaran();
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$this->loadTemplate($data);
		// aksi untuk liat data yang telah ditolak
		$dataRejection = $this->Persetujuan_model->getDataRejectLamaran();
	}

	public function verifikasiBerkas()
	{
		$data['menu'] = 'verifikasi_berkas';
		$this->loadTemplate($data);
		// aksi untuk liat data untuk diverifikasi
		// $dataPending = $this->Persetujuan_model->updateVerifikasi($id, $data);
	}
}
