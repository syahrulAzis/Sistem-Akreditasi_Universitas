<?php

class M_rapat extends CI_Model
{

    public function getRapat()
    {
        //$filter = $this->input->get('find');
        //$this->db->like('no_rapat', $filter);

        return $this->db->get('rapat');
    }

    public function getHasilrapat()
    {
        //$filter = $this->input->get('find');
        //$this->db->like('no_rapat', $filter);

        return $this->db->get('hasil_rapat');
    }

    public function getsingleRapat($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('rapat');
    }

    public function insertRapat($data)
    {
        $this->db->insert('rapat', $data);
        return $this->db->insert_id();
    }

    public function updateRapat($id_rapat, $post)
    {
        $this->db->where('id_rapat', $id_rapat);
        $this->db->update('rapat', $post);
        return $this->db->affected_rows();
    }

    public function deleteRapat($id_rapat)
    {
        $this->db->where('id_rapat', $id_rapat);
        $this->db->delete('rapat');
        return $this->db->affected_rows();
    }

    public function download($id_rapat)
    {
        $query = $this->db->get_where('rapat', array('id_rapat' => $id_rapat));
        return $query->row_array();
    }
}
