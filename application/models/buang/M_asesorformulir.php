<?php

class M_asesorformulir extends CI_Model
{
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
}
