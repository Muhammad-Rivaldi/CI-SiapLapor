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
            if (!$data == '') {
                $this->db->insert('masyarakat',$data);
                header("Location:" .site_url().'/test/index3');
            } else {
                echo "gagal regis";
            }
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
            $this->session->set_flashdata('modal','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect("test/users_form");
        }

        // get data pengaduan berdasarkan nik
        public function ambilData()
        {
            $nik = $this->session->userdata('nik');
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `nik` = '$nik'");
            return $query->result();
        }

        //tampil data seluruh pengaduan 
        public function tampil_pengaduan()
        {
            $query = $this->db->query("SELECT * FROM `pengaduan` ORDER BY `tgl_pengaduan` DESC");
            return $query->result();
        }

        // tampil data pengaduan berdasarkan status 0
        public function tampil_pengaduanbaru()
        {
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `status` = '0'");
            return $query->result();
        }

        // tampil data pengaduan berdasarkan status proses
        public function tampil_pengaduan_proses()
        {
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `status` = 'proses'");
            return $query->result();
        }

        // tampil data pengaduan berdasarkan status selesai
        public function tampil_pengaduan_selesai()
        {
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `status` = 'selesai'");
            return $query->result();
        }

        // hitung data berdasarkan status 0
        public function HitungData1()
        {
            $this->db->where('status', '0');
            return $this->db->count_all_results('pengaduan');
        }

        // hitung data berdasarkan status proses
        public function HitungData2()
        {
            $this->db->where('status', 'proses');
            return $this->db->count_all_results('pengaduan');
        }

        // hitung data berdasarkan status selesai
        public function HitungData3()
        {
            $this->db->where('status', 'selesai');
            return $this->db->count_all_results('pengaduan');
        }

        // hapus pengaduan
        public function deleteData($id)
        {
            $where = array('id_pengaduan' => $id);
            $this->db->where($where);
            $this->db->delete('pengaduan');
            $this->session->set_flashdata('modal','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
            $this->session->set_flashdata('modal','<div class="alert alert-success" role="alert"> Data id {$id} Berhasil diedit <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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