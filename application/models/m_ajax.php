<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ajax extends CI_Model {
    // get data barang array
    public function get_petugas()
    {
    $data = $this->db->get('petugas');
    return $data->result();
    }

    // insert data petugas
    public function create_petugas()
    {
        $data = [
            'id_petugas' => null,
            'nama_petugas' => $this->input->post('nmptgs',true),
            'username' => $this->input->post('usrnm',true),
            'password' => md5($this->input->post('pwptgs',true)),
            'telp' => $this->input->post('nhpptgs',true),
            'level' => $this->input->post('rlptgs',true)
        ];
        return $this->db->insert('petugas',$data);
    }

    // get id petugas untuk data edit
    public function getIDpetugas($id_petugas)
    {
        $this->db->where("id_petugas", $id_petugas);
		$query = $this->db->get('petugas');
		return $query->result();
    }
}
?>