<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
    public function getDataPelamar()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('pelamar', ['email' => $email])->row_array();
    }

    public function getDataPelamarById($id)
    {
        return $this->db->get_where('pelamar', ['id' => $id])->row_array();
    }

    public function getAllUnitKerja()
    {
        return $this->db->get('unit_kerja')->result_array();
    }

    public function getUnitKerjaById($id)
    {
        return $this->db->get_where('unit_kerja', ['id' => $id])->row_array();
    }

    public function updateDataPelamar($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('pelamar', $data);
    }

    public function addPermintaanMagang($email, $idUnitKerja, $data)
    {
    }

    public function deleteFileNameById($jenis, $id)
    {
        if ($jenis == 'suratPermohonan') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_surat_permohonan' => null]);
        } else if ($jenis == 'khs') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_khs' => null]);
        } else if ($jenis == 'cv') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_cv' => null]);
        }
    }

    public function updateBerkas($jenis, $id, $namaBerkas)
    {
        if ($jenis == 'suratPermohonan') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_surat_permohonan' => $namaBerkas]);
        } else if ($jenis == 'khs') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_khs' => $namaBerkas]);
        } else if ($jenis == 'cv') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_cv' => $namaBerkas]);
        }
    }
}
