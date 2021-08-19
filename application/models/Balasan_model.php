<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Balasan_model extends CI_Model
{

	public function getPermohonanWithStatus($status)
	{
		$this->db->select("*");
		$this->db->from("surat_permohonan");
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->where('status !=', $status['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}

	public function getDataById($id)
	{
		$this->db->select("*");
		$this->db->from("surat_permohonan");
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('id_permohonan', $id);
		return $this->db->get()->result_array();
	}

	public function getDataByIdForSurat($id)
	{
		$this->db->select("*");
		$this->db->from("surat_permohonan");
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('id_permohonan', $id);
		return $this->db->get()->row_array();
	}

	public function getDataWithStatus($data)
	{
		// Joining table surat_permohonan, pelamar, unit_kerja
		$this->db->select('*');
		$this->db->from('surat_permohonan');
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('status', $data['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}

	public function getDataWithStatusSearch($data, $keyword)
	{
		// Joining table surat_permohonan, pelamar, unit_kerja
		$this->db->select('*');
		$this->db->from('surat_permohonan');
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->where('status', $data['status']);
		$this->db->like('nama_pelamar', $keyword);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}

	public function searchAll($data)
	{
		$this->db->select('*');
		$this->db->from('pelamar');
		$this->db->join('surat_permohonan', 'pelamar.id = surat_permohonan.id_pelamar', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->like('nama_pelamar', $data['nama_pelamar']);
		$this->db->where('status', $data['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}
	public function searchExceptPending($data)
	{
		$this->db->select('*');
		$this->db->from('pelamar');
		$this->db->join('surat_permohonan', 'pelamar.id = surat_permohonan.id_pelamar', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->like('nama_pelamar', $data['nama_pelamar']);
		$this->db->where('status !=', $data['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}

	public function countBalasanSurat()
	{
		$this->db->select("*");
		$this->db->from("surat_permohonan");
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->where('status !=', 'Menunggu Verifikasi');
		$this->db->where('no_surat_balasan =', null);
		return $this->db->count_all_results();
	}

	public function insertSuratBalasan($data)
	{
		$this->db->insert('surat_balasan', $data);
	}

	public function updateFileIsUpload($id, $data, $table)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}

	// public function updateBerkas($jenis, $id, $namaBerkas)
	// { 
	//     $jenis == 'surat_jawaban' {
	//         $this->db->where('id', $id);
	//         $this->db->update('surat_balasan', ['nama_file_surat_jawaban' => $namaBerkas]);
	//     } 


	public function downloadSurat($id)
	{
		$this->db->select("*");
		$this->db->from("surat_balasan");
		$this->db->join('surat_permohonan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('id_surat_balasan ', $id);
		return $this->db->get()->result_array();
	}

	public function getKelengkapanBerkasById($id)
	{
		// return $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
	}

	public function searchByMoth($data)
	{
		$bulan = date('m', strtotime($data['tanggal_permohonan']));
		$this->db->select('*');
		$this->db->from('pelamar');
		$this->db->join('surat_permohonan', 'pelamar.id = surat_permohonan.id_pelamar', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->where('month(tanggal_permohonan)', $bulan);
		$this->db->where('status', $data['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}

	public function searchByMothExceptPending($data)
	{
		$bulan = date('m', strtotime($data['tanggal_permohonan']));
		$this->db->select('*');
		$this->db->from('pelamar');
		$this->db->join('surat_permohonan', 'pelamar.id = surat_permohonan.id_pelamar', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->join('surat_balasan', 'surat_permohonan.id_permohonan = surat_balasan.id_surat_permohonan', 'LEFT');
		$this->db->where('month(tanggal_permohonan)', $bulan);
		$this->db->where('status !=', $data['status']);
		$this->db->order_by('tanggal_permohonan', 'DESC');
		return $this->db->get()->result_array();
	}
}
