<?php

class M_pendidikan extends CI_Model
{

    public function getPendidikan()
    {
        // return $this->db->get('pendidikan');

        $this->db->select('*');
        $this->db->from('pendidikan');
        $this->db->join('fakultas', 'fakultas.id_fakultas=pendidikan.fakultas_id');
        $this->db->join('prodi', 'prodi.id_prodi=pendidikan.prodi_id');
        $this->db->join('user', 'user.id=pendidikan.user_id');
        // $this->db->order_by('pendidikan_timestamp', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDokumenaspek()
    {
        $query = "SELECT `pendidikan_aspek`.*, `pendidikan_dokumen`.*
                    FROM `pendidikan_aspek` JOIN `pendidikan_dokumen`
                    ON `pendidikan_aspek`.`id_aspek_pendidikan` = `pendidikan_dokumen`.`aspek_id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAspek()
    {
        return $this->db->get('pendidikan_aspek');
    }

    public function getPendidikanedit($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pendidikan');
    }

    public function updatePendidikan($id_pendidikan, $post)
    {
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->update('pendidikan', $post);
        return $this->db->affected_rows();
    }

    public function deletedokumen($id_transaksi_pendidikan)
    {
        $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $this->db->delete('pendidikan_transaksi');
        return $this->db->affected_rows();
    }

    // public function deletedokall($id_pendidikan)
    // {
    //     $this->db->where('id_transaksi_pendidikan', $id_pendidikan);
    //     $this->db->delete('pendidikan_transaksi');
    // }

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

    public function getSingleDokumen($field, $value)
    {
        // $this->db->select('*');
        // $this->db->from('pendidikan_transaksi');
        // $this->db->where($field, $value);
        // $query = $this->db->get();
        // return $query->result();

        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        // $this->db->join('pendidikan_nilai', 'pendidikan_nilai.id_pendidikan_nilai=pendidikan_transaksi.pendidikan_id');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        // $this->db->join('user', 'user.id=pendidikan_transaksi.user_id');
        $this->db->where($field, $value);
        return $this->db->get();
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

    public function hitungJumlahDokumen()
    {
        $query = $this->db->get('pendidikan_dokumen');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function insertDokumen($post)
    {
        $this->db->insert('pendidikan_transaksi', $post);
        return $this->db->insert_id();
    }

    public function deletePendidikan($id_pendidikan)
    {
        $this->db->where('id_pendidikan', $id_pendidikan);
        $this->db->delete('pendidikan');
        return $this->db->affected_rows();
    }

    public function getDokumen()
    {
        return $this->db->get('pendidikan_dokumen');
    }
}
