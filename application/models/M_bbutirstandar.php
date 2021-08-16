<?php

class M_bbutirstandar extends CI_Model
{
    public function getButirstandar()
    {
        $filter = $this->input->get('find');
        $this->db->like('nama_butir', $filter);

        $this->db->select('*');
        $this->db->from('b_butirstandar');
        $this->db->join('b_standar', 'b_standar.id_bstandar=b_butirstandar.b_standarid');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertButir($data)
    {
        $this->db->insert('b_butirstandar', $data);
        return $this->db->insert_id();
    }

    public function deleteButir($id_butirstandar)
    {
        $this->db->where('id_butirstandar', $id_butirstandar);
        $this->db->delete('b_butirstandar');
        return $this->db->affected_rows();
    }
}