<?php

class M_matrikpenilaian extends CI_Model
{
    public function getMatrikPenilaian()
    {
        // $filter = $this->input->get('find');
        // $this->db->like('no_standar', $filter);

        return $this->db->get('matrik_penilaian');
    }

    public function getSingleMatrikPenilaian($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('matrik_penilaian');
    }

    public function insertMatrikPenilaian($data)
    {
        $this->db->insert('matrik_penilaian', $data);
        return $this->db->insert_id();
    }

    public function updateMatrikPenilaian($id_penilaian, $post)
    {
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update('matrik_penilaian', $post);
        return $this->db->affected_rows();
    }

    public function deleteMatrikPenilaian($id_penilaian)
    {
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->delete('matrik_penilaian');
        return $this->db->affected_rows();
    }
}
