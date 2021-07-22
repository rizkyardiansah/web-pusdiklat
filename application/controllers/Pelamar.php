<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar extends CI_Controller
{
    private $dataPelamar;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 3) {
            echo 'blocked';
            die;
        }
        $this->load->model('Pelamar_model', 'model');
        global $dataPelamar;
        $dataPelamar = $this->model->getDataPelamar();
    }

    public function index()
    {
        global $dataPelamar;
        $data['title'] = 'Beranda';
        $data['user'] = $dataPelamar;
        $data['unit_kerja'] = $this->model->getAllUnitKerja();
        $this->load->view('templates/pelamar_header', $data);
        $this->load->view('pelamar/index', $data);
        $this->load->view('templates/pelamar_footer');
    }

    public function daftar($id)
    {
        global $dataPelamar;

        $data['title'] = 'Daftar';
        $data['user'] = $dataPelamar;
        $data['unit_kerja'] = $this->model->getUnitKerjaById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('universitas', 'Universitas', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|trim|numeric|max_length[15]');
        $this->form_validation->set_rules('no_surat', 'Nomor Surat Permohonan Magang', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('pernyataan', 'Pernyataan', 'required');

        //apakah user mengupload khs
        if (empty($_FILES['khs']['name'])) {
            //user akan diberikan pesan eror dan dikembalikan ke page daftar
            $this->form_validation->set_rules('khs', 'KHS', 'required', [
                'required' => 'Upload berkas KHS disini.'
            ]);
        } else if ($_FILES['khs']['type'] != 'application/pdf') {
            $this->form_validation->set_rules('khs', 'KHS', 'required', [
                'required' => 'Berkas KHS harus bertipe PDF.'
            ]);
        } else if ($_FILES['khs']['size'] > 2048000) {
            $this->form_validation->set_rules('khs', 'KHS', 'required', [
                'required' => 'Ukuran berkas KHS harus kurang dari 2 MB.'
            ]);
        }

        //apakah user mengupload cv
        if (empty($_FILES['cv']['name'])) {
            //user akan diberikan pesan eror dan dikembalikan ke page daftar
            $this->form_validation->set_rules('cv', 'CV', 'required', [
                'required' => 'Upload berkas CV disini.'
            ]);
        } else if ($_FILES['cv']['type'] != 'application/pdf') {
            $this->form_validation->set_rules('cv', 'CV', 'required', [
                'required' => 'Berkas CV harus bertipe PDF.'
            ]);
        } else if ($_FILES['cv']['size'] > 2048000) {
            $this->form_validation->set_rules('cv', 'CV', 'required', [
                'required' => 'Ukuran berkas CV harus kurang dari 2 MB.'
            ]);
        }

        //apakah user mengupload surat permohonan magang
        if (empty($_FILES['surat_permohonan']['name'])) {
            //user akan diberikan pesan eror dan dikembalikan ke page daftar
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Upload Surat Permohonan Magang disini.'
            ]);
        } else if ($_FILES['surat_permohonan']['type'] != 'application/pdf') {
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Berkas Surat Permohonan Magang harus bertipe PDF.'
            ]);
        } else if ($_FILES['surat_permohonan']['size'] > 2048000) {
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Ukuran berkas Surat Permohonan Magang harus kurang dari 2 MB.'
            ]);
        }

        if ($this->form_validation->run() == TRUE) {

            //me-load library upload
            $this->load->library('upload');

            //konfigurasi library upload
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            //menyiapkan data user yang akan dimasukan kedalam database
            $inputanUser = [
                "nama" => htmlspecialchars($this->input->post('nama', true)),
                "universitas" => htmlspecialchars($this->input->post('universitas', true)),
                "nim" => htmlspecialchars($this->input->post('nim', true)),
                "semester" => $this->input->post('semester'),
                "fakultas" => htmlspecialchars($this->input->post('fakultas', true)),
                "prodi" => htmlspecialchars($this->input->post('prodi', true)),
                "no_telpon" => htmlspecialchars($this->input->post('no_telp', true)),
                "no_surat_permohonan" => htmlspecialchars($this->input->post('no_surat', true))
            ];

            //upload file khs 
            $config['upload_path'] = './folder_KHS/';
            $this->upload->initialize($config);
            $this->upload->do_upload('khs');
            //mengambil nama file untuk disimpan ke database
            $inputanUser['nama_file_khs'] = $this->upload->data('file_name');
            //menghapus file khs lama jika ada
            if ($dataPelamar['nama_file_khs'] != null) {
                unlink(FCPATH . 'folder_KHS/' . $dataPelamar['nama_file_khs']);
            }

            //upload file cv 
            $config['upload_path'] = './folder_CV/';
            $this->upload->initialize($config);
            $this->upload->do_upload('cv');
            //mengambil nama file untuk disimpan ke database
            $inputanUser['nama_file_cv'] = $this->upload->data('file_name');
            //menghapus file khs lama jika ada
            if ($dataPelamar['nama_file_cv'] != null) {
                unlink(FCPATH . 'folder_CV/' . $dataPelamar['nama_file_cv']);
            }

            //upload surat magang
            $config['upload_path'] = './folder_Surat_Magang/';
            $this->upload->initialize($config);
            $this->upload->do_upload('surat_permohonan');
            //mengambil nama file untuk disimpan ke database
            $inputanUser['nama_file_surat_permohonan'] = $this->upload->data('file_name');
            //menghapus file khs lama
            if ($dataPelamar['nama_file_surat_permohonan'] != null) {
                unlink(FCPATH . 'folder_Surat_Magang/' . $dataPelamar['nama_file_surat_permohonan']);
            }

            //input data pelamar ke table pelamar
            $this->model->updateDataPelamar($dataPelamar['email'], $inputanUser);
            //input data pelamar ke tabel permintaan magang BELOM DIBUAT
            $this->model->addPermintaanMagang($dataPelamar['email'], $id, $inputanUser);

            $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Pendaftaran Magang', 'text' => 'Permintaan magang anda akan kami proses.']);

            //load ulang tampilan page pendaftaran
            redirect('pelamar/index');
        } else {

            if ($this->input->post('submitDaftar') == 'submit') {
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Pendaftaran Magang', 'text' => 'Pastikan anda memasukan data yang sesuai pada form pendaftaran.']);
            }

            $this->load->view('templates/pelamar_header', $data);
            $this->load->view('pelamar/daftar', $data);
            $this->load->view('templates/pelamar_footer');
        }
    }

    public function profile()
    {
        global $dataPelamar;
        $data['title'] = "Profil Pengguna";
        $data['user'] = $dataPelamar;
        $this->load->view('templates/pelamar_header', $data);
        $this->load->view('pelamar/profile');
        $this->load->view('templates/pelamar_footer');
    }
}
