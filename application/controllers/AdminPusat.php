<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPusat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 1) {
			echo 'blocked';
			die;
		}
	}

	public function index()
	{
		echo 'admin pusat';
	}
}
