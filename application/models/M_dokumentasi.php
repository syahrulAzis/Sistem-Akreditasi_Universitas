<?php

class M_dokumentasi extends CI_Model {

    public function getDokumentasi()
    {
        $filter = $this->input->get('find');
        $this->db->like('title', $filter);

        return $this->db->get('dokumentasi');
    }

    public function getSingleDokumentasi($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('dokumentasi');
    }

    public function insertDokumentasi($data)
    {
        $this->db->insert('dokumentasi', $data);
        return $this->db->insert_id();
    }
}