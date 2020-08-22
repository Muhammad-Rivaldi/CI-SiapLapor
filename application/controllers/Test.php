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

	// konek ke modelsystem.php 
	public function __construct() {
		parent::__construct();
		$this->load->model('modelsystem');
		$this->load->model('m_pengaduan');
		$this->load->helper(array('url', 'form')); 	
	}
	// 

	// membuka halaman home
	public function index() {
		$judul['title']="SiapLapor!";
		$this->load->view('home',$judul);
	}
	// 

	// membuka halaman login
	public function login()
	{
		$judul['title']="SiapLapor!";
		$this->load->view('login',$judul);
	}
	// 

	// membuka halaman users
	public function users_form()
	{
		$this->load->view('users');
	}

	// membuka halaman register
	public function index2() {
		$judul['title']="SiapLapor!";
		$this->load->view('register',$judul);
	}
	// 

	// membuka halaman sukses regis
	public function index3() {
		$this->load->view('regis_berhasil');
	}
	// 
	public function index4()
	{
		$this->load->view('berhasil-upload');
	}

	// masuk ke model untuk simpan data
	public function simpan_data() {
		$this->modelsystem->simpanData();
	}
	//

	// untuk simpan data di tabel pengaduan
	public function simpan_to_pengaduan()
	{
		$this->modelsystem->simpanPengaduan();
	}
	// 

	// membuka halaman data
	public function base() {
		$data['user'] = $this->modelsystem->get_user();
		$data['c_user'] = $this->modelsystem->count_user();
		$this->load->view('data_tampil', $data);
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
		$cek = $this->modelsystem->cek_login("masyarakat",$where)->num_rows();
		

		if ($cek>0) {
			$nama = $this->modelsystem->cek_login("masyarakat",$where)->row(0)->nama;
			$nik = $this->modelsystem->cek_login("masyarakat",$where)->row(0)->nik;
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
}
