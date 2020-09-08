<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelsystem');
		$this->load->helper(array('url', 'form'));
	}


	// membuka halaman home
	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			if ($this->session->userdata('level') == 'admin') {
				redirect('test/admin');
			} else if($this->session->userdata('level') == 'petugas') {
				redirect('test/admin');
			} else {
				redirect('test/users_form');
			}
		} else if ($this->session->userdata('status') != 'login') {
			$this->load->view('home');
		}
	}
	// 

	// membuka halaman login
	public function login()
	{
		$this->load->view('login');
	}
	// 

	// membuka halaman register
	public function index2()
	{
		$judul['title'] = "SiapLapor!";
		$this->load->view('register', $judul);
	}
	//

	// masuk ke model untuk simpan data register user
	public function simpan_data()
	{
		$this->modelsystem->simpanData();
	}
	//

	// membuka halaman sukses regis
	public function index3()
	{
		$this->load->view('regis_berhasil');
	}
	//

	// membuka halaman regis admin
	public function regisAdmin()
	{
		$this->load->view('admin-regis');
	}
	// 

	// get data ke model untuk input data admin
	public function regAdmin()
	{
		$this->modelsystem->inputAdmin();
	}
	//

	// untuk proses login
	public function aksi_login()
	{
		$usernames = $this->input->post('username');
		$passwords = $this->input->post('pw');
		$where = array(
			'username' => $usernames,
			'password' => md5($passwords)
		);
		$cek = $this->modelsystem->cek_login($where)->num_rows();

		if ($cek > 0) {
			$role = $this->modelsystem->cek_login($where)->row(0)->level;
			if ($role == 'admin') {
				$rule = $this->modelsystem->cek_login($where)->row(0)->level;
				$nama_petugas = $this->modelsystem->cek_login($where)->row(0)->nama_petugas;
				$data_session = array(
					'nama_petugas' => $nama_petugas,
					'username' => $usernames,
					'level' => $rule,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status') == 'login') {
					header("Location:" . site_url() . "/test/admin");
				} else {
					header("Location:" . site_url() . "/test/index");
				}
			} elseif ($role == 'petugas') {
				$rule = $this->modelsystem->cek_login($where)->row(0)->level;
				$nama_petugas = $this->modelsystem->cek_login($where)->row(0)->nama_petugas;
				$data_session = array(
					'nama_petugas' => $nama_petugas,
					'username' => $usernames,
					'level' => $rule,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status') == 'login') {
					header("Location:" . site_url() . "/test/admin");
				} else {
					header("Location:" . site_url() . "/test/index");
				}
			} else {
				$nama = $this->modelsystem->cek_login($where)->row(0)->nama;
				$nik = $this->modelsystem->cek_login($where)->row(0)->nik;
				$data_session = array(
					'usernama' => $usernames,
					'status' => 'login',
					'nama_user' => $nama,
					'nik' => $nik
				);
				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status') == 'login') {
					header("Location:" . site_url() . "/test/users_form");
				} else {
					header("Location:" . site_url() . "/test/index"); 
				}
			}
		} else {
			header("Location:" . base_url() . "");
		}
	}
	// 

	// untuk proses logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	// 

	// buka halaman dashboard admin
	public function admin()
	{
		$data['pengaduan'] = $this->modelsystem->tampil_pengaduan();
		if ($num1 = $this->modelsystem->HitungData1()) {
			$data['hasil1'] = $num1;
		}
		if ($num2 = $this->modelsystem->HitungData2()) {
			$data['hasil2'] = $num2;
		}
		if ($num3 = $this->modelsystem->HitungData3()) {
			$data['hasil3'] = $num3;
		}
		$this->load->view('petugas/admin-home', $data);
	}
	//

	// membuka halaman pengaduan baru di admin
	public function pengaduanBaru()
	{
		$data['pengaduan'] = $this->modelsystem->tampil_pengaduanbaru();
		$this->load->view('admin/admin-pengaduan-baru', $data);
	}

	// membuka halaman pengaduan baru di admin
	public function pengaduanProses()
	{
		$data['pengaduan'] = $this->modelsystem->tampil_pengaduan_proses();
		$this->load->view('admin/admin-pengaduan-proses', $data);
	}

	// membuka halaman pengaduan selesai di admin
	public function pengaduanSelesai()
	{
		$data['pengaduan'] = $this->modelsystem->tampil_pengaduan_selesai();
		$this->load->view('admin/admin-pengaduan-selesai', $data);
	}

	// membuka halaman pengaduan user
	public function users_form()
	{
		$data['data_pengaduan'] = $this->modelsystem->ambilData();
		$this->load->view('masyarakat/users', $data);
	}

	// // fungsi untuk menampilkan halaman jika berhasil kirim pengaduan
	// public function index4()
	// {
	// 	$this->load->view('masyarakat/berhasil-upload');
	// }
	// //

	// untuk simpan data di tabel pengaduan
	public function simpan_to_pengaduan()
	{
		$this->modelsystem->simpanPengaduan();
	}
	//

	//untuk hapus data pengaduan
	public function hapusData($id)
	{
		$this->modelsystem->deleteData($id);
	}
	//

	// untuk get data pengaduan yang ingin di edit
	public function editData($id)
	{
		$where = array('id_pengaduan' => $id);
		$data['updateData'] = $this->modelsystem->editPengaduan('pengaduan', $where)->result();
		$this->load->view('masyarakat/edit_pengaduan', $data);
	}
	//

	// edit pengaduan
	public function updatePengaduan()
	{
		$this->modelsystem->updateData();
	}

	// untuk export file ke pdf
	public function exportToPdf()
	{
		$data['pengaduan'] = $this->modelsystem->tampil_pengaduanbaru();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "data-pengaduan-baru-" . date('d-m-y') . ".pdf";
		$this->pdf->load_view('printPdf', $data);
	}

	// untuk export file to excel
	public function exportToExcel()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
			->setLastModifiedBy('My Notes Code')
			->setTitle("Data Pengaduan")
			->setSubject("Pengaduan")
			->setDescription("Laporan Semua Data Pengaduan")
			->setKeywords("Data Pengaduan");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENGADUAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID PENGADUAN"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL PENGADUAN"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "ISI LAPORAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "FOTO BUKTI"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$pengaduan = $this->modelsystem->tampil_pengaduanbaru();
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($pengaduan as $data) { // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->id_pengaduan);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tgl_pengaduan);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nik);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->isi_laporan);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->foto);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->status);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data-Pengaduan-' . date('d-m-Y') . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	// // membuka halaman data
	// public function base()
	// {
	// 	$data['user'] = $this->modelsystem->get_user();
	// 	$data['c_user'] = $this->modelsystem->count_user();
	// 	$this->load->view('data_tampil', $data);
	// }
	// // 
}
