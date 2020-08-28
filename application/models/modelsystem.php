<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class modelsystem extends CI_Model {

        public function simpanData(){
            $data = array (
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('namel'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('pw')),
                'telp' => $this->input->post('nohp'),
            );
            $this->db->insert('masyarakat',$data);
            header("Location:" .site_url().'/test/index3');
        }

        public function simpanPengaduan()
        {
            $foto = $_FILES['foto']['tmp_name'];
                if ($foto = '') {
                    // kosong
                } else {
                    $config['upload_path'] = './assets/berkas';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto')) {
                        echo "gagal upload"; die();
                    } else {
                        $foto = $this->upload->data('file_name');
                    }
                }
            
            $data = array (
                'id_pengaduan' => null,
                'nik' => $this->session->userdata('nik'),
				'isi_laporan' => $this->input->post('isiLaporan'),
				'foto' => $foto,
                'status' => '0'
            );
            echo $data;
            $this->db->set('tgl_pengaduan','NOW()',FALSE);
			$this->db->insert('pengaduan',$data);
			header("Location:".base_url()."test/index4");
        }

        public function ambilData()
        {
            $nik = $this->session->userdata('nik');
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `nik` = '$nik'");
            return $query->result();
        }

        public function deleteData($id)
        {
            $where = array('id_pengaduan' => $id);
            $this->db->where($where);
            $this->db->delete('pengaduan');
            header("Location:".base_url()."test/users_form");
        }

        public function updateData($id)
        {
            $where = array('id_pengaduan' => $id);
            $this->db->where($where);
            $this->db->update('pengaduan');
        }

        public function editPengaduan($table,$where)
        {
            return $this->db->get_where($table, $where);
        }

        public function get_user()
        {
            $data = $this->db->get('masyarakat');
            return $data->result();
        }

        public function count_user()
        {
            $data = $this->db->get('masyarakat');
            return $data->num_rows();
        }

        public function cek_login($akun) {
            $petugas = $this->db->get_where('petugas',$akun);
            $masyarakat = $this->db->get_where('masyarakat',$akun);
            if ($petugas->result() == null) {
                return $masyarakat;
            }else{
                return $petugas;
            }
        }
    }
?>