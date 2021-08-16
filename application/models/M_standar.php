<?php

class M_standar extends CI_Model
{

    public function getStandar()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_standar', $filter);

        return $this->db->get('standar');
    }

    public function getSingleStandar($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('standar');
    }

    public function insertStandar($data)
    {
        $this->db->insert('standar', $data);
        return $this->db->insert_id();
    }

    public function updateStandar($id_standar, $post)
    {
        $this->db->where('id_standar', $id_standar);
        $this->db->update('standar', $post);
        return $this->db->affected_rows();
    }

    public function deleteStandar($id_standar)
    {
        $this->db->where('id_standar', $id_standar);
        $this->db->delete('standar');
        return $this->db->affected_rows();
    }

    public function download($id_standar)
    {
        $query = $this->db->get_where('standar', array('id_standar' => $id_standar));
        return $query->row_array();
    }
}
