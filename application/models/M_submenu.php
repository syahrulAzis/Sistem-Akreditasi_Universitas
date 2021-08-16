<?php

class M_submenu extends CI_Model
{

    public function getSubmenu()
    {
        $query = "SELECT `user_menu`.*, `user_sub_menu`.*
                    FROM `user_menu` JOIN `user_sub_menu`
                    ON `user_menu`.`id` = `user_sub_menu`.`menu_id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function insertSubmenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
        return $this->db->insert_id();
    }

    public function getSingleSubmenu($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('user_sub_menu');
    }

    public function updateSubmenu($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $post);
        return $this->db->affected_rows();
    }

    public function deleteSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        return $this->db->affected_rows();
    }
}
