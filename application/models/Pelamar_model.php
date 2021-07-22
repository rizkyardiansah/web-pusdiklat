<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
    public function getDataPelamar()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('pelamar', ['email' => $email])->row_array();
    }

    public function getAllUnitKerja()
    {
        return $this->db->get('unit_kerja')->result_array();
    }

    public function getUnitKerjaById($id)
    {
        return $this->db->get_where('unit_kerja', ['id' => $id])->row_array();
    }

    public function updateDataPelamar($email, $data) {
        $this->db->where('email', $email);
        $this->db->update('pelamar', $data);
    }

    public function addPermintaanMagang($email, $idUnitKerja, $data) {
        
    }
}
