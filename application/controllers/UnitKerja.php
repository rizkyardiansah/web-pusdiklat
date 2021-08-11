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
		$menu['title'] = 'Admin Unit Kerja';
		$this->load->view('templates/administrator-templates/header', $menu);
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer_content');
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'index';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Menunggu Verifikasi'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		// aksi untuk liat data yang masih menunggu verifikasi
		$data['verifikasi'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Disetujui'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		$data['countApprovement'] = $this->Persetujuan_model->getCountData($arrayData);
		// aksi untuk liat data yang telah disetujui
		$data['approval'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Ditolak'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		$data['countRejection'] = $this->Persetujuan_model->getCountData($arrayData);
		// aksi untuk liat data yang telah ditolak
		$data['reject'] = $this->Persetujuan_model->getDataWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function verifikasiBerkas($id)
	{
		$data['menu'] = 'verifikasi_berkas';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Menunggu Verifikasi'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		// aksi untuk liat data untuk diverifikasi
		$data['detail'] = $this->Persetujuan_model->getDataById($id);
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
		redirect('unitkerja/index');
	}
}
