<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'model');

		//mencegah user masuk ke controller auth ketika sudah login, namun tetap bisa mengakses page logout
		if ($this->uri->segment(2) != 'logout' && $this->session->userdata('logged_in') == true) {
			$roleId = $this->session->userdata('role_id');
			if ($roleId == 1) {
				redirect('AdminPusat/index');
			} else if ($roleId == 2) {
				redirect('AdminUnitKerja/index');
			} else if ($roleId == 3) {
				redirect('pelamar/index');
			}
		}
	}

	public function index()
	{
		//judul page
		$data['title'] = "Login";

		//memastikan bahwa input email dan password sesuai ketentuan
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//jika email dan password sesuai ketentuan
		if ($this->form_validation->run() == TRUE) {
			$email = htmlspecialchars($this->input->post('email', true));
			$password = $this->input->post('password');
			$kodeStatus = $this->model->validateLogin($email, $password);

			//jika email dan password terdaftar dalam database
			if ($kodeStatus == 'berhasil') {
				$data = $this->model->getDataLoginByEmail($email);
				$roleId = $data['role_id'];

				//membuat session
				$sesdata = array(
					'email' => $email,
					'role_id' => $roleId,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sesdata);

				//memindahkan user ke page yang sudah ditentukan
				if ($roleId == 1) { //Admin Pusat diarahkan ke Page Khusus admin pusat
					redirect(base_url("adminPusat/index"));
				} else if ($roleId == 2) { // Admin Unit Kerja diarahkan ke Page Khusus admin unit kerja
					redirect(base_url("adminUnitKerja/index"));
				} else if ($roleId == 3) { //Pelamar diarahkan menuju ke Page khusus pelamar
					redirect(base_url('pelamar/index'));
				}
			} else if ($kodeStatus == 'wrongPass') {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Login gagal! Password anda salah!']);
				redirect('auth/index');
			} else if ($kodeStatus == 'emailInv') {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Login gagal! Email anda tidak terdaftar!']);
				redirect('auth/index');
			}
		} else {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}
	}

	public function register()
	{
		//judul page
		$data['title'] = 'Registrasi';

		//memastikan bahwa semua inputan sesuai ketentuan
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[70]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[login.email]|valid_email|max_length[70]');
		$this->form_validation->set_rules('password1', ' Password', 'required|min_length[8]|max_length[12]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Password', 'required');
		$this->form_validation->set_rules('universitas', 'Universitas', 'required|trim|max_length[70]');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim|max_length[70]');


		if ($this->form_validation->run() == true) {
			$token = base64_encode(random_bytes(32));
			$email = htmlspecialchars($this->input->post('email', true));

			$data = [
				"nama" => htmlspecialchars($this->input->post('nama', true)),
				"email" => $email,
				"password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				"universitas" => htmlspecialchars($this->input->post('universitas', true)),
				"fakultas" => htmlspecialchars($this->input->post('fakultas', true)),
				"token" => $token
			];

			$emailTerkirim = $this->model->kirimEmail('aktivasi', $token, $email);
			if ($emailTerkirim == true) {
				$this->model->insertActivationData($data);
				$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Registrasi berhasil! Silahkan aktivasi akun anda']);
				redirect('auth/index');
			} else {
				$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Registrasi gagal! Email aktivasi akun tidak bisa terkirim']);
				redirect('auth/index');
			}
		} else {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		}
	}

	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$kodeStatus = $this->model->verifikasiAkun(urldecode($email), urldecode($token));

		if ($kodeStatus == 'berhasil') {
			$this->session->set_flashdata('msg', ['type' => 'success', 'text' => 'Aktivasi Berhasil! Silahkan login']);
		} else if ($kodeStatus == 'tokenInv') {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Aktivasi gagal! Token yang anda masukan tidak valid']);
		} else if ($kodeStatus == 'emailInv') {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Aktivasi gagal! Email anda tidak valid']);
		}

		redirect('auth/index');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/index');
	}


	public function registerPegawai()
	{
		$data['title'] = 'Login Pegawai';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}
}
