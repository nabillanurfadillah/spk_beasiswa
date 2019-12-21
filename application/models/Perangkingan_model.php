<?php

class Perangkingan_model extends CI_Model
{
    public function getAllAlternatif()
    {
        return $this->db->get('alternatif')->result_array();
    }
    public function getAllRangking()
    {
        return $this->db->get('rangking')->result_array();
    }

    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
}
