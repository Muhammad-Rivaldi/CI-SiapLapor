<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
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

	public function __construct() {
		parent::__construct();
		$this->load->model('modelsystem');
		$this->load->helper(array('url', 'form')); 	
	}


	// membuka halaman home
	public function index() {
		if ($this->session->userdata('status') == 'login') {
            redirect('test/users_form');
        } else if ($this->session->userdata('status') != 'login') {
            $this->load->view('home');
		}
		$this->load->view('home');
	}
	// 

	// membuka halaman login
	public function login()
	{
		$this->load->view('login');
	}
	// 

	// membuka halaman register
	public function index2() {
		$judul['title']="SiapLapor!";
		$this->load->view('register',$judul);
	}
	//

	// masuk ke model untuk simpan data register user
	public function simpan_data() {
		$this->modelsystem->simpanData();
	}
	//

	// membuka halaman sukses regis
	public function index3() {
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
	public function aksi_login() {
		$usernames = $this->input->post('username');
		$passwords = $this->input->post('pw');
		$where = array(
			'username' => $usernames,
			'password' => md5($passwords)
		);
		$cek = $this->modelsystem->cek_login($where)->num_rows();
		
		if ($cek>0) {
			$role = $this->modelsystem->cek_login($where)->row(0)->level;
			if ($role == 'admin' || $role == 'petugas') {
				$rule = $this->modelsystem->cek_login($where)->row(0)->level;
				$nama_petugas = $this->modelsystem->cek_login($where)->row(0)->nama_petugas;
				$data_session = array(
                    'nama_petugas' => $nama_petugas,
                    'username' => $usernames,
                    'level' => $rule,
                    'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status')=='login') {
					header("Location:".site_url()."/test/admin");
				} else {
					header("Location:".site_url()."/test/index");
				}
			} else {
				$nama = $this->modelsystem->cek_login($where)->row(0)->nama;
				$nik = $this->modelsystem->cek_login($where)->row(0)->nik;
				$data_session = array(
					'usernama' => $usernames,
					'status' => 'login',
					'nama' => $nama,
					'nik' => $nik
				);
				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status')=='login') {
					header("Location:".site_url()."/test/users_form");
				} else {
					echo 'gagal login';
				}
			}
		} else {
			header("Location:".base_url()."");
		}
	}
	// 

	// untuk proses logout
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
	// 

	// buka halaman dashboard admin
	public function admin()
	{
		if($num = $this->modelsystem->HitungData1())
		{
			$data['hasil'] = $num;
		}
		$this->load->view('admin-home',$data);
	}
	//

	// membuka halaman pengaduan baru di admin
	public function pengaduanBaru()
	{
		$data['pengaduan_baru'] = $this->modelsystem->tampil_pengaduanbaru();
		$this->load->view('pengaduanBaru-admin',$data);
	}

	// membuka halaman pengaduan user
	public function users_form()
	{
		$data['data_pengaduan'] = $this->modelsystem->ambilData();
		$this->load->view('users',$data);
	}

	// fungsi untuk menampilkan halaman jika berhasil kirim pengaduan
	public function index4()
	{
		$this->load->view('berhasil-upload');
	}
	//

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
		$data['updateData'] = $this->modelsystem->editPengaduan('pengaduan',$where)->result();
		$this->load->view('edit_pengaduan',$data);
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
		$this->pdf->setPaper('A4','potrait');
		$this->pdf->filename = "data-pengaduan-baru". date('d-m-y') .".pdf";
		$this->pdf->load_view('printPdf',$data);
	}

	// membuka halaman data
	public function base() {
		$data['user'] = $this->modelsystem->get_user();
		$data['c_user'] = $this->modelsystem->count_user();
		$this->load->view('data_tampil', $data);
	}
	// 
}
