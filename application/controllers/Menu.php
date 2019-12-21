<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('menu');
        }
    }

    public function editmenu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->Menu_model->getMenuById($id);
        $menu = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataMenu($menu, $id);

            $this->session->set_flashdata('message', 'Diubah!');
            redirect('menu/index');
        }
    }

    public function hapusmenu($id)
    {
        $menu = $this->Menu_model->getMenuById($id);

        $this->Menu_model->hapusDataMenu($id, $menu);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('menu/index');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Ditambahkan!');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu($id)
    {
        $data['title'] = 'Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Menu_model->getSubMenuById($id);
        $submenu = $this->Menu_model->getSubMenuById($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataSubMenu($submenu, $id);

            $this->session->set_flashdata('message', 'Diubah!');
            redirect('menu/submenu');
        }
    }
    public function hapussubmenu($id)
    {
        $submenu = $this->Menu_model->getSubMenuById($id);

        $this->Menu_model->hapusDataSubMenu($id, $submenu);
        $this->session->set_flashdata('message', 'Dihapus!');
        redirect('menu/submenu');
    }
}
