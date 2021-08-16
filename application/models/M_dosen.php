<?php

class M_dosen extends CI_Model
{
    public function getStandar()
    {
        $filter = $this->input->get('find');
        $this->db->like('deskripsi_standar', $filter);

        return $this->db->get('standar');
    }

    public function getSingleStandar($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('standar');
    }

    public function getMp()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_mp', $filter);

        $this->db->select('*');
        $this->db->from('mp');
        $this->db->join('standar', 'standar.id_standar=mp.standar_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSingleMP($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('mp');
    }

    public function getSop()
    {
        $filter = $this->input->get('find');
        $this->db->like('deskripsi_sop', $filter);

        return $this->db->get('sop');
    }

    public function getSingleSop($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('sop');
    }

    public function getFormulir()
    {
        $filter = $this->input->get('find');
        $this->db->like('deskripsi_formulir', $filter);

        return $this->db->get('formulir');
    }

    public function getSingleFormulir($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('formulir');
    }

    public function getPedoman()
    {
        $filter = $this->input->get('find');
        $this->db->like('deskripsi_pedoman', $filter);

        return $this->db->get('pedoman');
    }

    public function getSinglePedoman($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pedoman');
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
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        $this->db->join('pendidikan', 'pendidikan.id_pendidikan=pendidikan_transaksi.pendidikan_id');
        $this->db->join('pendidikan_aspek', 'pendidikan_aspek.id_aspek_pendidikan=pendidikan_transaksi.aspek_id');
        $this->db->join('pendidikan_dokumen', 'pendidikan_dokumen.id_dokumen_pendidikan=pendidikan_transaksi.dokumen_id');
        $this->db->where($field, $value);
        return $this->db->get();
    }

    public function uploadDokumen($post)
    {
        $this->db->insert('pendidikan_file', $post);
        return $this->db->insert_id();
    }

    public function deletefile($id_file)
    {
        $this->db->where('id_file', $id_file);
        $this->db->delete('pendidikan_file');
        return $this->db->affected_rows();
    }

    public function DokumenPengendalian($field, $value)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_transaksi');
        $this->db->where($field, $value);
        $this->db->where('role_id',  $this->session->userdata('role_id'));
        $this->db->where('status_id !=', 0);
        $this->db->where('status_id !=', 1);
        $query = $this->db->get();
        return $query->result();
    }
}
