<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_model extends CI_Model
{
	// fungsi untuk mengubah status data lamaran
	public function updateVerifikasi($id, $data)
	{
	}
	// fungsi untuk melihat data lamaran dengan status (Menunggu Verifikasi, Disetujui, Ditolak)
	public function getDataWithStatus($data)
	{
		$this->db->select('*');
		$this->db->from('surat_permohonan');
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('status', $data['status']);
		return $this->db->get()->result_array();
	}

	// fungsi untuk melihat jumlah data yang masih menunggu verifikasi
	public function getCountDataPending()
	{
		$this->db->where('status', 'Menunggu Verifikasi');
		return $this->db->count_all_results('surat_permohonan');
	}
}
