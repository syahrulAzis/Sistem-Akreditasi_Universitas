<?php

class M_asesorpendidikanevaluasi extends CI_Model
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
        // $this->db->join('pendidikan_status', 'pendidikan_status.id_status_pendidikan=pendidikan_transaksi.status_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function nilaiDokumen($id_transaksi_pendidikan, $post)
    {
        $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $this->db->update('pendidikan_transaksi', $post);
        return $this->db->affected_rows();
    }

    public function getSingleDokumen($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        // $this->db->join('pendidikan_nilai', 'pendidikan_nilai.id_pendidikan_nilai=pendidikan_transaksi.pendidikan_id');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        // $this->db->join('user', 'user.id=pendidikan_transaksi.user_id');
        $this->db->where($field, $value);
        return $this->db->get();
    }

    public function getStatus()
    {
        return $this->db->get('pendidikan_status');
    }

    public function getOnePendidikan($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_nilai');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }
}
