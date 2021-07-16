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
        $this->load->view('pelamar/index');
    }
}
