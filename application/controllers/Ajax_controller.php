<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_controller extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('modelsystem');
		$this->load->model('m_ajax');
		$this->load->helper(array('url', 'form'));
	}

	// membuka halaman petugas di admin
	public function petugas()
	{
		$this->load->view('admin/admin-petugas');
	}

	// ajax show data
    public function data_petugas()
    {
		$datapetugas = $this->m_ajax->get_petugas();
		echo json_encode($datapetugas);
			// foreach ($datapetugas as $value) {
			// 	$tbody = array();
			// 	$tbody[] = $value['id_petugas'];
			//     $tbody[] = $value['nama_petugas'];
			//     $tbody[] = $value['username'];
			//     $tbody[] = $value['password'];
			// 	$tbody[] = $value['telp'];
			// 	$tbody[] = $value['level'];
			// 	$btn = "<button type='button' class='btn btn-primary btn-icon-split editbtn' name='editbtn' data-toggle='modal' id=" . $value['id_petugas'] . " style='padding-right: 6%;'>
			// 				<span class='icon text-white'>
			// 					<i class='fas fa-edit'></i>
			// 				</span>
			// 				<span class='text'>Edit Data</span>
			// 				</button>
			// 				<button type='button' data-toggle='modal' name='deletebtn' id=" . $value['id_petugas'] . " class='btn btn-danger btn-icon-split mt-2 deletebtn'>
			// 					<span class='icon text-white'>
			// 						<i class='fas fa-trash'></i>
			// 					</span>
			// 					<span class='text'>Delete Data</span>
			// 				</button>";
			// 	$tbody[] = $btn;
			// 	$data[] = $tbody;
			// }
			// if ($datapetugas) {
			// 	echo json_encode(array('data' => $data));
			// } else {
			// 	echo json_encode(array('data' => 0));
			// }
	}
	
	// insert data petugas
	public function insert_petugas()
	{
		if ($_POST["action"] == "Add") {
			$data = array(
				'id_petugas' => null,
				'nama_petugas' => $this->input->post('nmptgs'),
				'username' => $this->input->post('usrnm'),
				'password' => md5($this->input->post('pwptgs')),
				'telp' => $this->input->post('nhpptgs'),
				'level' => $this->input->post('rlptgs')
			);
			$this->db->insert('petugas', $data);
			echo 'Data Inserted';
		}	

		// $datapetugas = $this->m_ajax->create_petugas();
		// echo json_encode($datapetugas);
	}

	public function get_petugas()
	{
		$output = array();
		$data = $this->m_ajax->getIDpetugas($_POST["id_petugas"]);
		foreach ($data as $row) {
			$output['nama_petugas'] = $row->nama_barang;
			$output['username'] = $row->harga_awal;
			$output['password'] = $row->deskripsi_barang;
			$output['telp'] = $row->kategori_barang;
			$output['status'] = $row->status;
		}
		echo json_encode($output);
	}
}
