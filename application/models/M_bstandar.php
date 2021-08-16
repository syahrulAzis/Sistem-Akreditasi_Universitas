<?php

class M_bstandar extends CI_Model
{
    public function getBstandar()
    {
        $filter = $this->input->get('find');
        $this->db->like('nama_bstandar', $filter);

        return $this->db->get('b_standar');
    }

    public function getSingleBstandar($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('b_standar');
    }

    public function insertBstandar($data)
    {
        $this->db->insert('b_standar', $data);
        return $this->db->insert_id();
    }

    public function updateBstandar($id_bstandar, $post)
    {
        $this->db->where('id_bstandar', $id_bstandar);
        $this->db->update('b_standar', $post);
        return $this->db->affected_rows();
    }

    public function deleteBstandar($id_bstandar)
    {
        $this->db->where('id_bstandar', $id_bstandar);
        $this->db->delete('b_standar');
        return $this->db->affected_rows();
    }
}