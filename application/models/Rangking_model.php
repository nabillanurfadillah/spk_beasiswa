<?php

class Rangking_model extends CI_Model
{
    public function getRangkingById($id_rangking)
    {
        return $this->db->get_where('rangking', ['id_rangking' => $id_rangking])->row_array();
    }
    public function getAllRangking()
    {
        return $this->db->get('rangking')->result_array();
    }

    public function tambahDataRangking()
    {
        $alternatif = $this->input->post('alternatif', true);
        $nilai = $this->input->post('nilai', true);
        $kriteria = $this->input->post('kriteria', true);

        $kriteriaById =  $this->db->get_where('kriteria', ['id_kriteria' => $kriteria])->row_array();




        if ($kriteriaById['tipe_kriteria'] == 'Cost') {

            $this->db->select_min('jumlah_nilai');
            $resultmin = $this->db->get('nilai')->row();
            foreach ($resultmin as $min) {
                $nr = (int) $nilai;
                $val = (int) $min;

                $hitung = $val / $nr;
            }
        } else {
            $this->db->select_max('jumlah_nilai');
            $resultmax = $this->db->get('nilai')->row();
            foreach ($resultmax as $max) {
                $val = (int) $max;
                $hitung = (int) $nilai / $val;
            }
        }



        $data = [
            'id_alternatif' => $alternatif,
            'id_kriteria' => $this->input->post('kriteria', true),
            'nilai_rangking' => $this->input->post('nilai', true),
            'nilai_normalisasi' => $hitung,
            'bobot_normalisasi' => 0
        ];

        $this->db->insert('rangking', $data);

        $idr =  $this->db->insert_id();
        $query = "SELECT jumlah_nilai
        FROM rangking
        JOIN kriteria ON rangking.id_kriteria = kriteria.id_kriteria
        JOIN nilai ON kriteria.id_nilai = nilai.id_nilai
        WHERE rangking.id_kriteria = $kriteria 
       ";
        $jn = $this->db->query($query)->row();
        foreach ($jn as $jjn) {

            $a = (int) $jjn;
        }


        $r =  $this->db->get_where('rangking', ['id_rangking' => $idr])->row_array();
        $bn = $a * $hitung;

        $data2 = ['bobot_normalisasi' => $bn];
        $this->db->set($data2);
        $this->db->where('id_rangking', $r['id_rangking']);
        $this->db->update('rangking');


        $query3 = "SELECT bobot_normalisasi
        FROM rangking
        WHERE id_alternatif = $alternatif
        AND id_kriteria = $kriteria";
        $hasil = $this->db->query($query3)->row_array();
        
    }
    public function editDataRangking($id_rangking)
    {

        $id_alternatif = $this->input->post('alternatif', true);

        $kriteria = $this->input->post('kriteria', true);
        $nilai = $this->input->post('nilai', true);
        $kriteriaById =  $this->db->get_where('kriteria', ['id_kriteria' => $kriteria])->row_array();

        if ($kriteriaById['tipe_kriteria'] == 'Cost') {

            $this->db->select_min('jumlah_nilai');
            $resultmin = $this->db->get('nilai')->row();
            foreach ($resultmin as $min) {
                $nr = (int) $nilai;
                $val = (int) $min;

                $hitung = $val / $nr;
            }
        } else {
            $this->db->select_max('jumlah_nilai');
            $resultmax = $this->db->get('nilai')->row();
            foreach ($resultmax as $max) {
                $val = (int) $max;
                $hitung = (int) $nilai / $val;
            }
        }
        $data = [
            'id_alternatif' => $id_alternatif,
            'id_kriteria' => $kriteria,
            'nilai_rangking' => $nilai,
            'nilai_normalisasi' => $hitung
        ];


        $this->db->set($data);
        $this->db->where('id_rangking', $id_rangking);
        $this->db->update('rangking');
    }

    public function hapusDataRangking($id_rangking)
    {
        $this->db->delete('rangking', ['id_rangking' => $id_rangking]);
    }
}
