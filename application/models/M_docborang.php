<?php

class M_docborang extends CI_Model
{
    public function getBorangdata()
    {
        // $filter = $this->input->get('standar');
        // $this->db->like('bstandar_id', $filter);

        // $filter = $this->input->get('butir');
        // $this->db->like('butirstandar_id', $filter);

        return $this->db->get('b_dokumentransaksi');
    }

    public function getSingleBorang($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('b_dokumentransaksi');
    }

    public function insertBorang($data)
    {
        $this->db->insert('b_dokumentransaksi', $data);
        return $this->db->insert_id();
    }

    public function deleteBorang($id_dokumentransaksi)
    {
        $this->db->where('id_dokumentransaksi', $id_dokumentransaksi);
        $this->db->delete('b_dokumentransaksi');
        return $this->db->affected_rows();
    }
}