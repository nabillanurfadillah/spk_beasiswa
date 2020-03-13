<?php

class SubKriteria_model extends CI_Model
{
    public function getSubKriteriaById($id_subkriteria)
    {
        return $this->db->get_where('subkriteria', ['id_subkriteria' => $id_subkriteria])->row_array();
    }
    public function getAllSubKriteria()
    {
        return $this->db->get('subkriteria')->result_array();
    }

    public function tambahDataSubKriteria()
    {

        $data = [
            'id_kriteria' => $this->input->post('id_kriteria', true),
            'nama_subkriteria' => $this->input->post('nama_subkriteria', true),
            'nilai_subkriteria' => $this->input->post('nilai_subkriteria', true)
        ];

        $this->db->insert('subkriteria', $data);
    }

    public function ubahDataSubKriteria($subkriteria, $id_subkriteria)
    {
        $id_kriteria = $this->input->post('id_kriteria', true);
        $nama_subkriteria = $this->input->post('nama_subkriteria', true);
        $nilai_subkriteria = $this->input->post('nilai_subkriteria', true);

        $data = [
            'nama_subkriteria' => $nama_subkriteria,
            'nilai_subkriteria' => $nilai_subkriteria,
            'id_kriteria' => $id_kriteria
        ];
        $this->db->set($data);
        $this->db->where('id_subkriteria', $id_subkriteria);
        $this->db->update('subkriteria');
    }

    public function hapusDataSubKriteria($id_subkriteria)
    {
        $this->db->delete('subkriteria', ['id_subkriteria' => $id_subkriteria]);
    }
}
