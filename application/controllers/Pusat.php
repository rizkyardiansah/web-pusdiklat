<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pusat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pdf');
		$this->load->model('Balasan_model');
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Unauthenticated, harap login terlebih dahulu']);
			redirect('auth/index');
			die;
		}
	}

	// fungsi load template secara dinamis
	public function loadTemplate($menu)
	{
		$menu['title'] = 'Admin Pusat';
		$this->load->view('templates/administrator-templates/header', $menu);
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator-pusat/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer_content');
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'daftar_pelamar';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);
		$data['permohonan'] = $this->Balasan_model->getPermohonanWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();

		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'status' => 'Disetujui'
		);
		// aksi untuk liat data yang telah disetujui
		$data['approval'] = $this->Balasan_model->getDataWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'status' => 'Ditolak'
		);
		// aksi untuk liat data yang telah ditolak
		$data['reject'] = $this->Balasan_model->getDataWithStatus($arrayData);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function formsurat($id)
	{
		$data['menu'] = 'form_surat';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);
		$data['detail'] = $this->Balasan_model->getDataById($id);
		$data['count'] = $this->Balasan_model->countBalasanSurat();
		$this->loadTemplate($data);
	}

	public function simpanData()
	{
		$setData =  array(
			'id_surat_permohonan' => $this->input->post('id_surat_permohonan'),
			'tgl_surat' => date('Y-m-d'),
			'perihal' => $this->input->post('perihal'),
			'no_surat_balasan' => $this->input->post('no_surat_balasan'),
			'lampiran' => $this->input->post('lampiran'),
			'kepada' => $this->input->post('kepada'),
			'alasan' => $this->input->post('alasan'),
			'jangka_waktu' => $this->input->post('jangka_waktu'),
			'tembusan1' => $this->input->post('tembusan1'),
			'tembusan2' => $this->input->post('tembusan2'),
			'tembusan3' => $this->input->post('tembusan3'),
			'tembusan4' => $this->input->post('tembusan4'),
			'tembusan5' => $this->input->post('tembusan5')
		);
		$this->Balasan_model->insertSuratBalasan($setData);
		redirect('pusat/index');
	}

	public function downloadSuratDisetujui($id)
	{
		$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);
		$data = $this->Balasan_model->downloadSurat($id);
		$pdf->AddPage();
		foreach ($data as $data_surat) {
			$image_file = K_PATH_IMAGES . 'logo_perpusnas.png';
			$pdf->Image($image_file, 87, 2, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$pdf->Ln(37);
			$pdf->SetFont('times', '', 11);
			//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
			$pdf->Cell(155, 1, "Nomor     : " . $data_surat['no_surat_balasan'], 0, 0,);
			$pdf->Cell(34, 1, indo_date(date('Y-m-d')), 0, 1,);
			$pdf->Cell(189, 1, "Lampiran : " . $data_surat['lampiran'], 0, 1,);
			$pdf->Cell(189, 1, "Hal           : " . $data_surat['perihal'], 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(189, 1, "Kepada", 0, 1,);
			$pdf->Cell(189, 1, "Yth.          : " . $data_surat['kepada'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "" . $data_surat['universitas'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Di Tempat", 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Dengan Hormat,", 0, 1,);

			$pdf->Ln(5);
			// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
			$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(160, 1, "Menindaklanjuti Surat Saudara Nomor " . $data_surat['no_surat_permohonan'] . " tanggal " . indo_date($data_surat['tanggal_permohonan']) . " dengan ini disampaikan bahwa kami bersedia menerima mahasiswa Saudara yaitu:", 0, 'L', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

			$pdf->Ln(7);
			$pdf->SetFont('times', 'B', 10);
			$pdf->Cell(22, 10, "", 0, 0, 'C');
			$pdf->Cell(25, 10, "Nama", 1, 0, 'C');
			$pdf->Cell(25, 10, "NIM", 1, 0, 'C');
			$pdf->Cell(50, 10, "Program Studi", 1, 0, 'C');
			$pdf->Cell(25, 10, "Email", 1, 0, 'C');
			$pdf->Cell(25, 10, "No. HP", 1, 0, 'C');
			$pdf->Cell(17, 10, "", 0, 1, 'C');

			$pdf->SetFont('times', ' ', 9);
			$pdf->MultiCell(22, 10, "", 0, 'C', 0, 0, '', '', true, 0, false, true, 10);
			$pdf->MultiCell(25, 10, $data_surat['nama_pelamar'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['nim'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(50, 10, $data_surat['prodi'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['email'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['no_telpon'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(17, 10, "", 0, 'C', 0, 1, '', '', true, 0, false, true, 10);
			}

			$pdf->SetFont('times', ' ', 12);
			$pdf->Ln(3);
			$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(160, 1, "Untuk melakukan program magang di " . $data_surat['nama_unit'] . ", Perpustakaan Nasional RI, yang dilaksanakan dengan memperhatikan protokol kesehatan yang berlaku. Pelaksanaan program magang berlangsung selama " . $data_surat['jangka_waktu'] .  ".", 0, 'L', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

			$pdf->Ln(13);
			$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(170, 1, "Demikian kami sampaikan, atas kerjasamanya kami ucapkan terimakasih", 0, 'L', 0, 1, '', '', true);

			$pdf->Ln(7);
			$pdf->Cell(94, 1, '', 0, 0);
			$pdf->Cell(95, 1, 'Plt. Kepala Pusat Pendidikan dan Pelatiahan', 0, 1);
			$pdf->Cell(94, 1, '', 0, 0);
			$pdf->Cell(95, 1, 'Perpustakaan Nasional RI,', 0, 1);
			$pdf->Ln(20);
			$pdf->Cell(94, 1, '', 0, 0);
			$pdf->Cell(95, 1, 'Drs. Y. Yahyono, S.IP., M.Si', 0, 1);
			$pdf->Cell(94, 1, '', 0, 0);
			$pdf->Cell(95, 1, 'NIP. 19631110 199103 1 001', 0, 1);

			$pdf->Ln(7);
			$pdf->Cell(189, 1, 'Tembusan :', 0, 1);
			if (!empty($data_surat['tembusan1'])) {
				$pdf->Cell(189, 1, '1. ' . $data_surat['tembusan1'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan5']) && empty($data_surat['tembusan1'])) {
				$pdf->Cell(189, 1, '1. ' . $data_surat->tembusan5, 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan2'])) {
				$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan2'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan1']) && empty($data_surat['tembusan2'])) {
				$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan5'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan3'])) {
				$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan3'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan2']) && empty($data_surat['tembusan3'])) {
				$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan5'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan4'])) {
				$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan4'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan3']) && empty($data_surat['tembusan4'])) {
				$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan5'], 0, 1);
			} else {
			}

			if (!empty($data_surat['tembusan4']) && !empty($data_surat['tembusan5'])) {
				$pdf->Cell(189, 1, '5. ' . $data_surat['tembusan5'], 0, 1);
			} else {
			}


			$pdf->Output('Surat_Jawaban_Magang_' . $data_surat['nama_pelamar'] . '.pdf', 'I');
			
		}

		public function downloadSuratDitolak($id)
		{
			$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);
			$data = $this->Balasan_model->downloadSurat($id);
			$pdf->AddPage();
			foreach ($data as $data_surat) {
				$image_file = K_PATH_IMAGES . 'logo_perpusnas.png';
				$pdf->Image($image_file, 87, 2, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
				$pdf->Ln(37);
				$pdf->SetFont('times', '', 12);
				//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
				$pdf->Cell(155, 1, "Nomor     : " . $data_surat['no_surat_balasan'], 0, 0,);
				$pdf->Cell(34, 1, indo_date(date('Y-m-d')), 0, 1,);
				$pdf->Cell(189, 1, "Lampiran : " . $data_surat['lampiran'], 0, 1,);
				$pdf->Cell(189, 1, "Hal           : " . $data_surat['perihal'], 0, 1,);
	
				$pdf->Ln(7);
				$pdf->Cell(189, 1, "Kepada", 0, 1,);
				$pdf->Cell(189, 1, "Yth.          : " . $data_surat['kepada'], 0, 1,);
				$pdf->Cell(19, 1, "", 0, 0,);
				$pdf->Cell(170, 1, "" . $data_surat['universitas'], 0, 1,);
				$pdf->Cell(19, 1, "", 0, 0,);
				$pdf->Cell(170, 1, "Di Tempat", 0, 1,);
	
				$pdf->Ln(7);
				$pdf->Cell(19, 1, "", 0, 0,);
				$pdf->Cell(170, 1, "Dengan Hormat,", 0, 1,);
	
				$pdf->Ln(5);
				// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
				$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
				$pdf->MultiCell(160, 1, "Menindaklanjuti Surat Saudara Nomor " . $data_surat['no_surat_permohonan'] . " tanggal " . indo_date($data_surat['tanggal_permohonan']) . " dengan ini disampaikan bahwa kami bersedia menerima mahasiswa Saudara yaitu:", 0, 'L', 0, 0, '', '', true, 0, false, true, 40);
				$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);
	
				$pdf->Ln(7);
				$pdf->SetFont('times', 'B', 10);
				$pdf->Cell(22, 10, "", 0, 0, 'C');
				$pdf->Cell(25, 10, "Nama", 1, 0, 'C');
				$pdf->Cell(25, 10, "NIM", 1, 0, 'C');
				$pdf->Cell(50, 10, "Program Studi", 1, 0, 'C');
				$pdf->Cell(25, 10, "Email", 1, 0, 'C');
				$pdf->Cell(25, 10, "No. HP", 1, 0, 'C');
				$pdf->Cell(17, 10, "", 0, 1, 'C');
	
				$pdf->SetFont('times', ' ', 9);
				$pdf->MultiCell(22, 10, "", 0, 'C', 0, 0, '', '', true, 0, false, true, 10);
				$pdf->MultiCell(25, 10, $data_surat['nama_pelamar'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
				$pdf->MultiCell(25, 10, $data_surat['nim'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
				$pdf->MultiCell(50, 10, $data_surat['prodi'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
				$pdf->MultiCell(25, 10, $data_surat['email'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
				$pdf->MultiCell(25, 10, $data_surat['no_telpon'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
				$pdf->MultiCell(17, 10, "", 0, 'C', 0, 1, '', '', true, 0, false, true, 10);
				}
	
				$pdf->SetFont('times', ' ', 12);
				$pdf->Ln(3);
				$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
				$pdf->MultiCell(160, 1, "Untuk melakukan Praktik Kerja Lapangan (PKL) di Perpustakaan Nasional RI " . $data_surat['alasan'] .  ".", 0, 'L', 0, 0, '', '', true, 0, false, true, 40);
				$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);
	
				$pdf->Ln(13);
				$pdf->MultiCell(170, 1, "Demikian kami sampaikan, atas kerjasamanya kami ucapkan terimakasih", 0, 'L', 0, 1, '', '', true);
				$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
	
				$pdf->Ln(7);
				$pdf->Cell(94, 1, '', 0, 0);
				$pdf->Cell(95, 1, 'Plt. Kepala Pusat Pendidikan dan Pelatiahan', 0, 1);
				$pdf->Cell(94, 1, '', 0, 0);
				$pdf->Cell(95, 1, 'Perpustakaan Nasional RI,', 0, 1);
				$pdf->Ln(20);
				$pdf->Cell(94, 1, '', 0, 0);
				$pdf->Cell(95, 1, 'Drs. Y. Yahyono, S.IP., M.Si', 0, 1);
				$pdf->Cell(94, 1, '', 0, 0);
				$pdf->Cell(95, 1, 'NIP. 19631110 199103 1 001', 0, 1);
	
				$pdf->Ln(7);
				$pdf->Cell(189, 1, 'Tembusan :', 0, 1);
				if (!empty($data_surat['tembusan1'])) {
					$pdf->Cell(189, 1, '1. ' . $data_surat['tembusan1'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan5']) && empty($data_surat['tembusan1'])) {
					$pdf->Cell(189, 1, '1. ' . $data_surat->tembusan5, 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan2'])) {
					$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan2'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan1']) && empty($data_surat['tembusan2'])) {
					$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan5'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan3'])) {
					$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan3'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan2']) && empty($data_surat['tembusan3'])) {
					$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan5'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan4'])) {
					$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan4'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan3']) && empty($data_surat['tembusan4'])) {
					$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan5'], 0, 1);
				} else {
				}
	
				if (!empty($data_surat['tembusan4']) && !empty($data_surat['tembusan5'])) {
					$pdf->Cell(189, 1, '5. ' . $data_surat['tembusan5'], 0, 1);
				} else {
				}
	
	
				$pdf->Output('Surat_Jawaban_Magang_' . $data_surat['nama_pelamar'] . '.pdf', 'I');
				
			}
		public function uploadSurat()
		{
			$config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048;
            $config['upload_path'] = './folder_Surat_jawaban/';
            $config['file_name'] = 'Pelamar_SuratJawaban_' . time();
            $this->upload->initialize($config);
            $this->upload->do_upload('surat_Jawaban');
		}
		}
