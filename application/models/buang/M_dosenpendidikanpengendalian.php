<?php

class M_dosenpendidikanpengendalian extends CI_Model
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
        $this->db->from('pendidikan_pengendalian');
        $this->db->join('fakultas', 'fakultas.id_fakultas=pendidikan_pengendalian.fakultas_id');
        $this->db->join('prodi', 'prodi.id_prodi=pendidikan_pengendalian.prodi_id');
        $this->db->join('user', 'user.id=pendidikan_pengendalian.user_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAlldokumen($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        // $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        // $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        // $this->db->join('pendidikan_status', 'pendidikan_status.id_status_pendidikan=pendidikan_transaksi.status_id');
        // $this->db->join('pendidikan_perbaikan', 'pendidikan_perbaikan.id_pp=pendidikan_transaksi.id_transaksi_pendidikan');
        $this->db->where($field, $value);
        $this->db->where('status_id !=', 0);
        $this->db->where('status_id !=', 1);
        $query = $this->db->get();
        return $query->result();

        // $query = $this->db->get_where(‘mytable’, array(‘id’ => $id), $limit, $offset);
    }

    public function getAlldokumendetail($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        // $this->db->join('pendidikan_status', 'pendidikan_status.id_status_pendidikan=pendidikan_transaksi.status_id');
        $this->db->where($field, $value);
        // $this->db->where('status_id !=', 0);
        // $this->db->where('status_id !=', 1);
        $query = $this->db->get();
        return $query->result();
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

    public function uploadDokumen($id_transaksi_pendidikan, $post)
    {
        $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $this->db->update('pendidikan_transaksi', $post);
        return $this->db->affected_rows();
    }
}
