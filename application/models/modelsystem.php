<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class modelsystem extends CI_Model {
        // simpan data user
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

        // simpan data admin
        public function inputAdmin()
        {
            $data = array (
                'id_petugas' => $this->input->post('id'),
                'nama_petugas' => $this->input->post('nampet'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('pw')),
                'telp' => $this->input->post('nohp'),
                'level' => 'admin'
            );
            $this->db->insert('petugas',$data);
            header("Location:" .site_url().'/test/index3');
        }

        // simpan pengaduan
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

        // get data pengaduan berdasarkan nik
        public function ambilData()
        {
            $nik = $this->session->userdata('nik');
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `nik` = '$nik'");
            return $query->result();
        }

        // hapus pengaduan
        public function deleteData($id)
        {
            $where = array('id_pengaduan' => $id);
            $this->db->where($where);
            $this->db->delete('pengaduan');
            header("Location:".base_url()."test/users_form");
        }

        // edit pengaduan
        public function updateData()
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
            $id = $this->input->post('id_pengaduan');
            $nik = $this->session->userdata('nik');
            $data = array (
                'id_pengaduan' => $id,
                'nik' => $nik,
				'isi_laporan' => $this->input->post('isiLaporan'),
				'foto' => $foto,
                'status' => $this->input->post('status')
            );
            echo $data;
            $this->db->set('tgl_pengaduan','NOW()',FALSE);
            $this->db->set($data);
            $this->db->where('id_pengaduan', $id);
            $this->db->update('pengaduan');
            header("Location:".base_url()."test/users_form");
        }

        // get data pengaduan untuk diupdate
        public function editPengaduan($table,$where)
        {
            return $this->db->get_where($table, $where);
        }

        // get data user
        public function get_user()
        {
            $data = $this->db->get('masyarakat');
            return $data->result();
        }

        // menghitung data user
        public function count_user()
        {
            $data = $this->db->get('masyarakat');
            return $data->num_rows();
        }

        // cek login
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