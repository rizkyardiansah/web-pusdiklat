<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
    public function getDataPelamar() {
        $email = $this->session->userdata('email');
        return $this->db->get_where('pelamar', ['email' => $email])->row_array();
    }

}