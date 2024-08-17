<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Register extends CI_Model
{
    public function Register($Email,$Nama,$Kategori,$Alamat,$NoTlp,$Password, $token, $otoritas){
        $this->db->query("CALL Regist('".$Email."','".$Nama."','".$Kategori."','".$Alamat."','".$NoTlp."','".$Password."','".$token."','".$otoritas."')");
    }
    
    public function updateAdmin($where, $data){
        $this->db->where($where);
        $this->db->update('admin', $data);
    }
}