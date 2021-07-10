<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = $this->input->post('password');
            $validate = $this->model->validateLogin($email, $password);

            if ($validate->num_rows() > 0) {
                $data  = $validate->row_array();
                $email  = $data['email'];
                $roleId = $data['role_id'];
                $sesdata = array(
                    'email' => $email,
                    'role_id'     => $roleId,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sesdata);

                if ($roleId == 1) { //Admin Pusat diarahkan ke Page Khusus admin pusat
                    redirect(base_url("adminPusat/index"));
                } else if ($roleId == 2) { // Admin Unit Kerja diarahkan ke Page Khusus admin unit kerja
                    redirect(base_url("adminUnitKerja/index"));
                } else if ($roleId == 3) { //Pelamar diarahkan menuju ke Page khusus pelamar
                    redirect(base_url('pelamar/index'));
                }
            } else {
                echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
                $this->load->view('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function registration()
    {
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/index');
    }
}
