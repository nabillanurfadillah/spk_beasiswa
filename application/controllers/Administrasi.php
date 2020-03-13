<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Nilai_model');
        $this->load->model('Kriteria_model');
        $this->load->model('SubKriteria_model');
        $this->load->model('Alternatif_model');
        $this->load->model('Rangking_model');
        $this->load->model('Laporan_model');
        $this->load->model('Perangkingan_model');
    }
    public function nilai()
    {
        $data['title'] = 'Data Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nilai'] = $this->Nilai_model->getAllNilai();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/nilai/nilai', $data);
        $this->load->view('templates/footer');
    }
    public function tambahnilai()
    {
        $data['title'] = 'Tambah Nilai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('keterangan_nilai', 'Keterangan Nilai', 'required|trim');
        $this->form_validation->set_rules('jumlah_nilai', 'Jumlah Nilai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/nilai/tambahnilai', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Nilai_model->tambahDataNilai();
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('administrasi/nilai');
        }
    }
    public function editnilai($id_nilai)
    {
        $data['title'] = 'Ubah Nilai Preferensi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['nilai'] = $this->Nilai_model->getNilaiById($id_nilai);
        $nilai = $this->Nilai_model->getNilaiById($id_nilai);

        $this->form_validation->set_rules('keterangan_nilai', 'Keterangan Nilai', 'required|trim');
        $this->form_validation->set_rules('jumlah_nilai', 'Jumlah Nilai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/nilai/editnilai', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Nilai_model->ubahDataNilai($nilai, $id_nilai);

            $this->session->set_flashdata('message', 'Diubah!');
            redirect('administrasi/nilai');
        }
    }

    public function hapusnilai($id_nilai)
    {
        $nilai = $this->Nilai_model->getNilaiById($id_nilai);

        $this->Nilai_model->hapusDataNilai($id_nilai, $nilai);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/nilai');
    }

    public function kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteria_model->getAllKriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/kriteria/kriteria', $data);
        $this->load->view('templates/footer');
    }
    public function subkriteria()
    {
        $data['title'] = 'Data Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subkriteria'] = $this->SubKriteria_model->getAllSubKriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/subkriteria/subkriteria', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkriteria()
    {
        $data['title'] = 'Tambah Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');
        $data['nilai'] = $this->db->get('nilai')->result_array();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/kriteria/tambahkriteria', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Kriteria_model->tambahDataKriteria();
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('administrasi/kriteria');
        }
    }
    public function tambahsubkriteria()
    {
        $data['title'] = 'Tambah Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Subkriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_subkriteria', 'Nilai Subkriteria', 'required|trim');
        $data['subkriteria'] = $this->db->get('subkriteria')->result_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/subkriteria/tambahsubkriteria', $data);
            $this->load->view('templates/footer');
        } else {

            $this->SubKriteria_model->tambahDataSubKriteria();
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('administrasi/subkriteria');
        }
    }

    public function editkriteria($id_kriteria)
    {
        $data['title'] = 'Ubah Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->Kriteria_model->getKriteriaById($id_kriteria);
        $kriteria = $this->Kriteria_model->getKriteriaById($id_kriteria);
        $data['tipe_kriteria'] = ['Cost', 'Benefit'];

        $data['nilai'] = $this->db->get('nilai')->result_array();
        $data['kriteriaall'] = $this->db->get('kriteria')->result_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/kriteria/editkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kriteria_model->ubahDataKriteria($kriteria, $id_kriteria);

            $this->session->set_flashdata('message', 'Diubah!');
            redirect('administrasi/kriteria');
        }
    }
    public function editsubkriteria($id_subkriteria)
    {
        $data['title'] = 'Ubah Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['subkriteria'] = $this->SubKriteria_model->getSubKriteriaById($id_subkriteria);
        $subkriteria = $this->SubKriteria_model->getSubKriteriaById($id_subkriteria);

        $data['kriteria'] = $this->db->get('kriteria')->result_array();
        $data['subkriteriaall'] = $this->db->get('subkriteria')->result_array();

        $this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'required|trim');
        $this->form_validation->set_rules('nilai_subkriteria', 'Nilai Sub Kriteria', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/subkriteria/editsubkriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->SubKriteria_model->ubahDataSubKriteria($subkriteria, $id_subkriteria);

            $this->session->set_flashdata('message', 'Diubah!');
            redirect('administrasi/subkriteria');
        }
    }

    public function hapuskriteria($id_kriteria)
    {
        $kriteria = $this->Kriteria_model->getKriteriaById($id_kriteria);

        $this->Kriteria_model->hapusDataKriteria($id_kriteria, $kriteria);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/kriteria');
    }
    public function hapussubkriteria($id_subkriteria)
    {
        $subkriteria = $this->SubKriteria_model->getSubKriteriaById($id_subkriteria);

        $this->SubKriteria_model->hapusDataSubKriteria($id_subkriteria, $subkriteria);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/subkriteria');
    }
    public function alternatif()
    {
        $data['title'] = 'Data Alternatif';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['alternatif'] = $this->Alternatif_model->getAllAlternatif();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/alternatif/alternatif', $data);
        $this->load->view('templates/footer');
    }
    public function tambahalternatif()
    {
        $data['title'] = 'Tambah Alternatif';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['subkriteria'] = $this->Alternatif_model->getAllSubkriteria();

        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/alternatif/tambahalternatif', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Alternatif_model->tambahDataAlternatif();
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('administrasi/alternatif');
        }
    }
    public function editalternatif($id_alternatif)
    {
        $data['title'] = 'Ubah Alternatif';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['alternatif'] = $this->Alternatif_model->getAlternatifById($id_alternatif);
        $alternatif = $this->Alternatif_model->getAlternatifById($id_alternatif);
        $data['jk'] = ['Laki-laki', 'Perempuan'];

        $data['hitung'] = $this->Alternatif_model->getHitungById($id_alternatif);


        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/alternatif/editalternatif', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Alternatif_model->ubahDataAlternatif($alternatif, $id_alternatif);
            $this->session->set_flashdata('message', 'Diubah!');
            redirect('administrasi/alternatif');
        }
    }

    public function hapusalternatif($id_alternatif)
    {
        $alternatif = $this->Alternatif_model->getAlternatifById($id_alternatif);

        $this->Alternatif_model->hapusDataAlternatif($id_alternatif, $alternatif);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/alternatif');
    }

    public function rangking()
    {
        $data['title'] = 'Data Rangking';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['rangking'] = $this->Rangking_model->getAllRangking();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/rangking/rangking', $data);
        $this->load->view('templates/footer');
    }
    public function tambahrangking()
    {
        $data['title'] = 'Tambah Data Rangking';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['alternatif'] = $this->db->get('alternatif')->result_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();
        $data['nilai'] = $this->db->get('nilai')->result_array();

        $this->form_validation->set_rules('alternatif', 'Alternatif', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/rangking/tambahrangking', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Rangking_model->tambahDatarangking();
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('administrasi/rangking');
        }
    }

    public function hapusrangking($id_rangking)
    {
        $rangking = $this->Rangking_model->getRangkingById($id_rangking);

        $this->Rangking_model->hapusDataRangking($id_rangking, $rangking);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/rangking');
    }
    public function editrangking($id_rangking)
    {
        $data['title'] = 'Rangking';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();



        $data['alternatif'] = $this->db->get('alternatif')->result_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();
        $data['nilai'] = $this->db->get('nilai')->result_array();

        $this->form_validation->set_rules('alternatif', 'Alternatif', 'required|trim');
        $data['rangking'] = $this->Rangking_model->getRangkingById($id_rangking);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrasi/rangking/editrangking', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Rangking_model->editDataRangking($id_rangking);
            $this->session->set_flashdata('message', 'Diedit!');
            redirect('administrasi/rangking');
        }
    }
    public function perangkingan()
    {
        $data['title'] = 'Normalisasi R Perangkingan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['alternatif'] = $this->Perangkingan_model->getAllAlternatif();
        // $alternatif = $this->Perangkingan_model->getAllAlternatif();
        $data['rangking'] = $this->Perangkingan_model->getAllRangking();
        $data['kriteria'] = $this->Perangkingan_model->getAllKriteria();
        // $kriteria = $this->Perangkingan_model->getAllKriteria();
        // foreach ($alternatif as $al) {

        //     foreach ($kriteria as $kr) {

        //         $ida = $al['id_alternatif'];
        //     }

        //     $query1 = "SELECT SUM(bobot_normalisasi) as hasil from rangking where id_alternatif = $ida ";
        //     $query2 = $this->db->query($query1)->result_array();

        //     foreach ($query2 as $hasil) {
        //         $h = $hasil['hasil'];
        //     }
        //     $data2 = ['hasil_alternatif' => $h];
        //     $this->db->set($data2);
        //     $this->db->where('id_alternatif', $ida);
        //     $this->db->update('alternatif');
        // }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/rangking/perangkingan', $data);
        $this->load->view('templates/footer');
    }



    public function hasil_seleksi()
    {
        $data['title'] = 'Data Hasil Seleksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['alternatif'] = $this->Laporan_model->getAllAlternatif();
        $data['hitung'] = $this->Laporan_model->getAllHitung();
        $data['subkriteria'] = $this->Laporan_model->getAllSubKriteria();
        $data['kriteria'] = $this->Laporan_model->getAllKriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/laporan/hasil_seleksi', $data);
        $this->load->view('templates/footer');
    }
}
