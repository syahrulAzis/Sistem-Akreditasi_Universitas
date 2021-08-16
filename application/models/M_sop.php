<?php

class M_sop extends CI_Model {

    public function getSop()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_sop', $filter);

        return $this->db->get('sop');
    }

    public function getSingleSop($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('sop');
    }

    public function insertSop($data)
    {
        $this->db->insert('sop', $data);
        return $this->db->insert_id();
    }

    public function updateSop($id_sop, $post)
    {
        $this->db->where('id_sop', $id_sop);
        $this->db->update('sop', $post);
        return $this->db->affected_rows();
    }

    public function deleteSop($id_sop)
    {
        $this->db->where('id_sop', $id_sop);
        $this->db->delete('sop');
        return $this->db->affected_rows();
    }

    public function download($id_sop){
        $query = $this->db->get_where('sop', array('id_sop'=>$id_sop));
        return $query->row_array();
    }
}