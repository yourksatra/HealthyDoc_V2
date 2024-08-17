<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Edit extends CI_Model
{
    public function accessLog($where, $data){
        $this->db->where($where);
        $this->db->update('accesstoken', $data);
    }
    public function EditDataPetugas($where, $data){
        $this->db->where($where);
        $this->db->update('petugas', $data);
    }
    public function EditDataPasien($where, $data){
        $this->db->where($where);
        $this->db->update('pasien', $data);
    }
    public function InsertProfile($data, $where){
        $this->db->where($where);
        $this->db->update('petugas', $data);
    }
}