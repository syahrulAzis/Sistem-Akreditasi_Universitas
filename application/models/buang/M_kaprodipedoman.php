<?php

class M_kaprodipedoman extends CI_Model
{
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
}
