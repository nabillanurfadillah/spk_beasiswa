<?php

class Alternatif_model extends CI_Model
{
    public function getAllAlternatif()
    {
        return $this->db->get('alternatif')->result_array();
    }

    public function getAlternatifById($id_alternatif)
    {
        return $this->db->get_where('alternatif', ['id_alternatif' => $id_alternatif])->row_array();
    }

    public function tambahDataAlternatif()
    {
        $data = [
            'nama_alternatif' => $this->input->post('nama_alternatif', true),

        ];

        $this->db->insert('alternatif', $data);
    }

    public function ubahDataAlternatif($alternatif, $id_alternatif)
    {
        $nama_alternatif = $this->input->post('nama_alternatif', true);

        $data = [
            'nama_alternatif' => $nama_alternatif,

        ];
        $this->db->set($data);
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->update('alternatif');
    }

    public function hapusDataAlternatif($id_alternatif)
    {
        $this->db->delete('alternatif', ['id_alternatif' => $id_alternatif]);
    }
}
