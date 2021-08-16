<?php

class M_notadinas extends CI_Model
{
    public function getNodin()
    {
        // $filter = $this->input->get('find');
        // $this->db->like('no_standar', $filter);

        return $this->db->get('nota_dinas');
    }

    public function getSingleNodin($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('nota_dinas');
    }

    public function insertNodin($data)
    {
        $this->db->insert('nota_dinas', $data);
        return $this->db->insert_id();
    }

    public function deleteNodin($id_nota_dinas)
    {
        $this->db->where('id_nota_dinas', $id_nota_dinas);
        $this->db->delete('nota_dinas');
        return $this->db->affected_rows();
    }
}