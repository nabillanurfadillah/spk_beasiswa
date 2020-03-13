<?php

class Laporan_model extends CI_Model
{
    public function getAllAlternatif()
    {
        return $this->db->get('alternatif')->result_array();
    }
    public function getAllHitung()
    {
        return $this->db->get('hitung')->result_array();
    }
    public function getAllSubKriteria()
    {
        return $this->db->get('subkriteria')->result_array();
    }
    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
}
