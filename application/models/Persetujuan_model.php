<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_model extends CI_Model
{
	// fungsi untuk mengubah status data lamaran
	public function updateVerifikasi($id, $data)
	{
	}
	// fungsi untuk melihat data lamaran yang masih pending
	public function getDataPendingLamaran()
	{
	}

	// fungsi untuk melihat data lamaran yang telah disetujui
	public function getDataAcceptLamaran()
	{
	}

	// fungsi untuk melihat data yang telah ditolak
	public function getDataRejectLamaran()
	{
	}

	// fungsi untuk melihat jumlah data yang masih menunggu verifikasi
	public function getSumDataPending()
	{
	}
}
