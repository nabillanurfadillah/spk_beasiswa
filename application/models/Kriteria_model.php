<?php

class Kriteria_model extends CI_Model
{
    public function getKriteriaById($id_kriteria)
    {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }
    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }

    public function tambahDataKriteria()
    {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria', true),
            'tipe_kriteria' => $this->input->post('tipe_kriteria', true),
            'id_nilai' => $this->input->post('id_nilai', true)
        ];

        $this->db->insert('kriteria', $data);
    }

    public function ubahDataKriteria($kriteria, $id_kriteria)
    {
        $nama_kriteria = $this->input->post('nama_kriteria', true);
        $tipe_kriteria = $this->input->post('tipe_kriteria', true);
        $id_nilai = $this->input->post('bobot_kriteria', true);
        $data = [
            'nama_kriteria' => $nama_kriteria,
            'tipe_kriteria' => $tipe_kriteria,
            'id_nilai' => $id_nilai

        ];
        $this->db->set($data);
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria');
    }

    public function hapusDataKriteria($id_kriteria)
    {
        $this->db->delete('kriteria', ['id_kriteria' => $id_kriteria]);
    }
}
