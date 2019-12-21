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

    public function hapuskriteria($id_kriteria)
    {
        $kriteria = $this->Kriteria_model->getKriteriaById($id_kriteria);

        $this->Kriteria_model->hapusDataKriteria($id_kriteria, $kriteria);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('administrasi/kriteria');
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


        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim');


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

        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim');


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
        $data['rangking'] = $this->Perangkingan_model->getAllRangking();
        $data['kriteria'] = $this->Perangkingan_model->getAllKriteria();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/rangking/perangkingan', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['title'] = 'Data Laporan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['alternatif'] = $this->Laporan_model->getAllAlternatif();
        $data['rangking'] = $this->Laporan_model->getAllRangking();
        $data['kriteria'] = $this->Laporan_model->getAllKriteria();




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrasi/laporan/laporan', $data);
        $this->load->view('templates/footer');
    }
}
