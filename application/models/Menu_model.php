<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }
    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }
    public function ubahDataMenu($menu, $id)
    {
        $menu = $this->input->post('menu', true);

        $data = [
            'menu' => $menu
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }
    public function ubahDataSubMenu($submenu, $id)
    {
        $title = $this->input->post('title', true);
        $url = $this->input->post('url', true);
        $icon = $this->input->post('icon', true);

        $data = [
            'title' => $title,
            'url' => $url,
            'icon' => $icon
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }

    public function hapusDataMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }
    public function hapusDataSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
