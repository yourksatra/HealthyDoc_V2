<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Delete extends CI_Model
{
    public function DeleteDataPetugas($id){
        $this->db->where('NIP', $id);
        $this->db->delete('petugas');
     }
}