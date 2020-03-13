<?php

class Alternatif_model extends CI_Model
{
    public function getAllAlternatif()
    {

        return $this->db->get('alternatif')->result_array();
    }
    public function getAllSubkriteria()
    {
        return $this->db->get('subkriteria')->result_array();
    }

    public function getAlternatifById($id_alternatif)
    {
        return $this->db->get_where('alternatif', ['id_alternatif' => $id_alternatif])->row_array();
    }
    public function getHitungById($id_alternatif)
    {
        return $this->db->get_where('hitung', ['id_alternatif' => $id_alternatif])->result_array();
    }

    public function tambahDataAlternatif()
    {
        $ids = $this->input->post('id_subkriteria', true);

        $dataa = [
            'nama_alternatif' => $this->input->post('nama_alternatif', true),
            'jk' => $this->input->post('jk', true),
            'alamat' => $this->input->post('alamat', true)
        ];
        $this->db->insert('alternatif', $dataa);

        $id_alternatif = $this->db->insert_id();

        foreach ($ids as $i) {
            $data = [
                'id_alternatif' => $id_alternatif,
                'id_subkriteria' => $i,
                'hasil' => ''
            ];
            $this->db->insert('hitung', $data);
        }
    }

    public function ubahDataAlternatif($alternatif, $id_alternatif)
    {
        $nama_alternatif = $this->input->post('nama_alternatif', true);
        $jk = $this->input->post('jk', true);
        $alamat = $this->input->post('alamat', true);

        $data = [
            'nama_alternatif' => $nama_alternatif,
            'jk' => $jk,
            'alamat' => $alamat,

        ];
        $this->db->set($data);
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->update('alternatif');

        $query = "SELECT id_hitung FROM hitung WHERE hitung.id_alternatif=$id_alternatif";
        $id_hitung = $this->db->query($query)->result_array();
        $id_subkriteria = $this->input->post('id_subkriteria', true);

        $idsub = [];
        foreach ($id_subkriteria as $sub) {
            $a = ['id_subkriteria'];

            $idsub[] = array_fill_keys($a, $sub);
        }

        $out = [];

        foreach ($id_hitung as $key => $value) {
            $out[] = array_merge((array) $idsub[$key], (array) $value);
        }

        foreach ($out as $ids) {
            $data1 = [
                'id_subkriteria' => $ids['id_subkriteria'],
                'hasil' => ''
            ];
            $this->db->set($data1);
            $this->db->where('id_hitung', $ids['id_hitung']);
            $this->db->update('hitung');
        }
    }

    public function hapusDataAlternatif($id_alternatif)
    {
        $this->db->delete('alternatif', ['id_alternatif' => $id_alternatif]);
        $this->db->delete('hitung', ['id_alternatif' => $id_alternatif]);
    }
}
