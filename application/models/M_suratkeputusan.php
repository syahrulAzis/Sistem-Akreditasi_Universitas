<?php

class M_suratkeputusan extends CI_Model
{
    public function getsk()
    {
        // $filter = $this->input->get('find');
        // $this->db->like('no_standar', $filter);

        return $this->db->get('surat_keputusan');
    }

    public function getsinglesk($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('surat_keputusan');
    }

    public function insertsk($data)
    {
        $this->db->insert('surat_keputusan', $data);
        return $this->db->insert_id();
    }

    public function deletesk($id_sk)
    {
        $this->db->where('id_sk', $id_sk);
        $this->db->delete('surat_keputusan');
        return $this->db->affected_rows();
    }
}