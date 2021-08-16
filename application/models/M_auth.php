<?php

class M_auth extends CI_Model
{

    public function getKegiatan()
    {
        return $this->db->get('kegiatan');
    }

    public function getPengajar()
    {
        $this->db->where('role_id', 6);
        return $this->db->get('user');
    }

    public function getSingleBlog($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('kegiatan');
    }

    public function insertLaporan($data)
    {
        $this->db->insert('layanan_pelanggan', $data);
        return $this->db->insert_id();
    }
}
