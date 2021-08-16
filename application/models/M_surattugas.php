<?php

class M_surattugas extends CI_Model
{
    public function getst()
    {
        // $filter = $this->input->get('find');
        // $this->db->like('no_standar', $filter);

        return $this->db->get('surat_tugas');
    }

    public function getsinglest($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('surat_tugas');
    }

    public function insertst($data)
    {
        $this->db->insert('surat_tugas', $data);
        return $this->db->insert_id();
    }

    public function deletest($id_surat_tugas)
    {
        $this->db->where('id_surat_tugas', $id_surat_tugas);
        $this->db->delete('surat_tugas');
        return $this->db->affected_rows();
    }
}