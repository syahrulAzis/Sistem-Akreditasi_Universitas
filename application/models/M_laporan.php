<?php
class M_laporan extends CI_Model
{
    public function getLaporan()
    {
        // $filter = $this->input->get('find');
        // $this->db->like('no_mp', $filter);

        $this->db->select('*');
        $this->db->from('laporan');
        // $this->db->join('standar', 'standar.id_standar=laporan.standar_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSingleLaporan($field, $value)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        // $this->db->join('standar', 'standar.id_standar=mp.standar_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insertLaporan($data)
    {
        $this->db->insert('laporan', $data);
        return $this->db->insert_id();
    }

    public function deleteLaporan($id_laporan)
    {
        $this->db->where('id_laporan', $id_laporan);
        $this->db->delete('laporan');
        return $this->db->affected_rows();
    }
}