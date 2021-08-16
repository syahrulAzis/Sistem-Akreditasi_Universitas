<?php
class M_kaprodimp extends CI_Model
{

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
}
