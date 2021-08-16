<?php

class M_menu extends CI_Model
{

    public function getMenu()
    {
        return $this->db->get('user_menu');
    }

    public function insertMenu($data)
    {
        $this->db->insert('user_menu', $data);
        return $this->db->insert_id();
    }

    public function getSingleMenu($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('user_menu');
    }

    public function updateMenu($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $post);
        return $this->db->affected_rows();
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        return $this->db->affected_rows();
    }
}
