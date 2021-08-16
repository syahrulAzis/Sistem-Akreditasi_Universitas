<?php

class M_borang extends CI_Model
{
    public function getBorang()
    {
        return $this->db->get('kborang');
    }

    public function insertBorang($data)
    {
        $this->db->insert('kborang', $data);
        return $this->db->insert_id();
    }

    public function getSingleborang($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('kborang');
    }

    public function updateborang($id_kborang, $post)
    {
        $this->db->where('id_kborang', $id_kborang);
        $this->db->update('kborang', $post);
        return $this->db->affected_rows();
    }

    public function deleteBorang($id_kborang)
    {
        $this->db->where('id_kborang', $id_kborang);
        $this->db->delete('kborang');
        return $this->db->affected_rows();
    }

    public function getTransaksiBorang()
    {
        return $this->db->get('pendidikan_borang_t');
    }

    public function insertTransaksiBorang($post)
    {
        $this->db->insert('pendidikan_borang_t', $post);
        return $this->db->insert_id();
    }

    public function deletetransaksi($id_btp)
    {
        $this->db->where('id_btp', $id_btp);
        $this->db->delete('pendidikan_borang_t');
        return $this->db->affected_rows();
    }
}
