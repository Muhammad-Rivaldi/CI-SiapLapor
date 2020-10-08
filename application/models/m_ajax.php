<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ajax extends CI_Model {
    // get data barang array
    public function get_petugas()
    {
    $data = $this->db->get('petugas');
    return $data->result_array();
    }

    // get id petugas untuk data edit
    public function getIDpetugas($id_petugas)
    {
        $this->db->where("id_petugas", $id_petugas);
		$query = $this->db->get('petugas');
		return $query->result();
    }
    
    // data edit petugas
    public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
    }
    
    // data delete petugas
    function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>