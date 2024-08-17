<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Insert extends CI_Model
{
    public function InsertDataPetugas($data){
        $this->db->insert('petugas', $data);
    }

    public function InsertPelayanan($nip, $kdrm){
        $this->db->query("CALL InputPelayanan('".$kdrm."','".$nip."')");
    }
    
    public function InsertDetailRM($data){
        $this->db->insert('detailRME', $data);
    }

    public function InsertPem($data){
        $this->db->insert('pemeriksaan', $data);
    }

    public function InsertDataPasien($dataP, $nik, $nip){
        $data = $this->db->get_where('pasien', ['NIK' => $nik])->row_array();
        if ($data!=null) {
            return 1;
        }else{
            $this->db->insert('pasien', $dataP);
            //New RM
            $petugas = $this->db->get_where('petugas', ['NIP' => $nip])->row_array();
            $id = $petugas['IdAkun'];
            $this->db->query("CALL InputRM('".$nik."','".$id."')");
            return 0;
        }
    }
    public function NewRM($nik, $nip){
        $petugas = $this->db->get_where('petugas', ['NIP' => $nip])->row_array();
        $id = $petugas['IdAkun'];
        $data = $this->db->get_where('rekam_medis', ['IdAkun' => $id, 'NIK_pasien' => $nik])->row_array();
        if ($data!=NULL){
            return 0;
        }else{
            $this->db->query("CALL InputRM('".$nik."','".$id."')");
            return 1;
        }
    }
}