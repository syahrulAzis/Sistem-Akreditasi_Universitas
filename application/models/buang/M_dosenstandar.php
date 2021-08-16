<?php

class M_dosenstandar extends CI_Model
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
}
