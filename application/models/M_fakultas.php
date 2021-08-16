<?php

class M_fakultas extends CI_Model
{

    public function getFakultas()
    {
        return $this->db->get('fakultas');
    }

    public function insertFakultas($data)
    {
        $this->db->insert('fakultas', $data);
        return $this->db->insert_id();
    }

    public function getSingleFakultas($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('fakultas');
    }

    public function updateFakultas($id_fakultas, $post)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->update('fakultas', $post);
        return $this->db->affected_rows();
    }

    public function deleteFakultas($id_fakultas)
    {
        $this->db->where('id_fakultas', $id_fakultas);
        $this->db->delete('fakultas');
        return $this->db->affected_rows();
    }
}
