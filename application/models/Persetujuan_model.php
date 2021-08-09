<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_model extends CI_Model
{
	// fungsi untuk mengubah status data lamaran
	public function updateVerifikasi($id, $data)
	{
	}
	// fungsi untuk melihat data lamaran yang masih pending
	public function getDataPendingLamaran($data)
	{
		return $this->db->get_where(
			'surat_permohonan',
			$data
		)->result_array();
	}

	// fungsi untuk melihat data lamaran yang telah disetujui
	public function getDataAcceptLamaran()
	{
		return $this->db->query("SELECT * FROM surat_permohonan WHERE status='Disetujui'")->result_array();
	}

	// fungsi untuk melihat data yang telah ditolak
	public function getDataRejectLamaran()
	{
		
	}

	// fungsi untuk melihat jumlah data yang masih menunggu verifikasi
	public function getCountDataPending()
	{
		$this->db->where('status', 'Menunggu Verifikasi');
		return $this->db->count_all_results('surat_permohonan');
	}
}
