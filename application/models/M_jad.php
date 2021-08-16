<?php

class M_jad extends CI_Model
{
    public function getJad()
    {
        return $this->db->get('jad');
    }

    // public function getDokumen()
    // {
    //     return $this->db->get('pendidikan_dokumen');
    // }

    public function insertJad($data)
    {
        $this->db->insert('jad', $data);
        return $this->db->insert_id();
    }

    public function insertTransaksiJad($post)
    {
        $this->db->insert('pendidikan_jad_t', $post);
        return $this->db->insert_id();
    }

    public function getSinglejad($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('jad');
    }

    public function updatejad($id_jad, $post)
    {
        $this->db->where('id_jad', $id_jad);
        $this->db->update('jad', $post);
        return $this->db->affected_rows();
    }

    public function deletejad($id_jad)
    {
        $this->db->where('id_jad', $id_jad);
        $this->db->delete('jad');
        return $this->db->affected_rows();
    }

    public function getTransaksiJad()
    {
        return $this->db->get('pendidikan_jad_t');
    }

    public function deletetransaksi($id_pjt)
    {
        $this->db->where('id_pjt', $id_pjt);
        $this->db->delete('pendidikan_jad_t');
        return $this->db->affected_rows();
    }
}
