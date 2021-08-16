<?php

class M_tupevaluasi extends CI_Model
{
    public function hitungJumlahDokumen()
    {
        $query = $this->db->get('pendidikan_dokumen');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getSinglePendidikan($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan');
        $this->db->join('fakultas', 'fakultas.id_fakultas=pendidikan.fakultas_id');
        $this->db->join('prodi', 'prodi.id_prodi=pendidikan.prodi_id');
        $this->db->join('user', 'user.id=pendidikan.user_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAlldokumen($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAspek()
    {
        return $this->db->get('pendidikan_aspek');
    }

    public function getDokumen()
    {
        return $this->db->get('pendidikan_dokumen');
    }

    public function insertDokumen($post)
    {
        $this->db->insert('pendidikan_transaksi', $post);
        return $this->db->insert_id();
    }
}
