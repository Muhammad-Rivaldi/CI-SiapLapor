<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ajax extends CI_Model {
    // get data barang array
    public function get_petugas()
    {
    $data = $this->db->get('petugas');
    return $data->result();
    }
}
?>