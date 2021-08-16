<?php

class M_aksesmenu extends CI_Model
{
    public function getAksesmenu()
    {
        return $this->db->get('user_role');
    }

    public function insertRole($data)
    {
        $this->db->insert('user_role', $data);
        return $this->db->insert_id();
    }

    public function getSingleaksesmenu($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('user_role');
    }

    public function updateAksesmenu($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('user_role', $post);
        return $this->db->affected_rows();
    }

    public function deleteAksesmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        return $this->db->affected_rows();
    }
}
