<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UnitKerja_Model extends CI_Model
{

	public function getDataAdminUnit($id_unit)
	{
		return $this->db->get_where('login', ['id_unit_kerja' => $id_unit])->result_array();
	}
}
