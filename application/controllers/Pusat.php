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
		$this->load->view('templates/administrator-templates/side_menu');
		$this->load->view('administrator-pusat/' . $menu['menu']);
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'daftar_pelamar';
		$arrayData = array(
			'status' => 'Ditolak',
			'status2' =>  'Disetujui'
		);
		$data['permohonan'] = $this->Balasan_model->getPermohonanWithStatus($arrayData);
		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$this->loadTemplate($data);
	}
}
