<?php

class M_kaprodipendidikanevaluasi extends CI_Model
{

    public function getSinglePendidikan($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_nilai');
        $this->db->join('fakultas', 'fakultas.id_fakultas=pendidikan_nilai.fakultas_id');
        $this->db->join('prodi', 'prodi.id_prodi=pendidikan_nilai.prodi_id');
        $this->db->join('user', 'user.id=pendidikan_nilai.user_id');
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
        $this->db->join('pendidikan_status', 'pendidikan_status.id_status_pendidikan=pendidikan_transaksi.status_id');
        $this->db->join('user', 'user.id=pendidikan_transaksi.user_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getSingleDokumen($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        $this->db->join('pendidikan_nilai', 'pendidikan_nilai.id_pendidikan_nilai=pendidikan_transaksi.pendidikan_id');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        $this->db->join('pendidikan_status', 'pendidikan_status.id_status_pendidikan=pendidikan_transaksi.status_id');
        $this->db->join('user', 'user.id=pendidikan_transaksi.user_id');
        $this->db->where($field, $value);
        return $this->db->get();
    }
}
