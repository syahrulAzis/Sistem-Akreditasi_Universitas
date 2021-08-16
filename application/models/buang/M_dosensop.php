<?php

class M_dosensop extends CI_Model
{
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
}
