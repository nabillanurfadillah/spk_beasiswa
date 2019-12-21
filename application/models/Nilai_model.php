<?php

class Nilai_model extends CI_Model
{
    public function getNilaiById($id_nilai)
    {
        return $this->db->get_where('nilai', ['id_nilai' => $id_nilai])->row_array();
    }
    public function getAllNilai()
    {
        return $this->db->get('nilai')->result_array();
    }

    public function tambahDataNilai()
    {
        $data = [
            'keterangan_nilai' => $this->input->post('keterangan_nilai', true),
            'jumlah_nilai' => $this->input->post('jumlah_nilai', true)
        ];

        $this->db->insert('nilai', $data);
    }

    public function hapusDataNilai($id_nilai)
    {
        $this->db->delete('nilai', ['id_nilai' => $id_nilai]);
    }

    public function ubahDataNilai($nilai, $id_nilai)
    {
        $keterangan_nilai = $this->input->post('keterangan_nilai', true);
        $jumlah_nilai = $this->input->post('jumlah_nilai', true);
        $data = [
            'keterangan_nilai' => $keterangan_nilai,
            'jumlah_nilai' => $jumlah_nilai
        ];
        $this->db->set($data);
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai');
    }
}
