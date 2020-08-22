<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengaduan extends CI_Controller {
    
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
        public function index()
        {
            $data['data_pengaduan'] = $this->m_pengaduan->GetData()->result();
            $this->load->view('data_tampil',$data);
        }

        public function tambahData()
        {
            $nik = $this->session->userdata('nik');
            $isi = $this->input->post('isi');
            // $foto = $_FILES['foto'];
            // if ($foto = '') {
            //     // kosong
            // } else {
            //     $config['upload_path'] = './assets/berkas';
            //     $config['allowed_types'] = 'jpg|png|gif';

            //     $this->load->library('upload',$config);
            //     if (!$this->upload->do_upload('foto')) {
            //         echo "gagal upload"; die();
            //     } else {
            //         $foto = $this->upload->data('file_name');
            //     }
            // }
            
            $data = array (
                'id_pengaduan' => null,
                'nik' => $nik,
                'isi_laporan' => $isi,
                'status' => '0'
            );
            $this->db->set('tgl_pengaduan','NOW()',FALSE);
			$this->db->insert('pengaduan',$data);
			redirect('test/index4');
        }
    }
?>