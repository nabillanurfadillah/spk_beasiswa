<?php

class Dashboard_model extends CI_Model
{

    public function getAllNilai()
    {
        return $this->db->get('nilai')->result_array();
    }
    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
    public function getAllAlternatif()
    {
        return $this->db->get('alternatif')->result_array();
    }
}
