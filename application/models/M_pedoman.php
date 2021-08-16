<?php

class M_pedoman extends CI_Model {

    public function getPedoman()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_pedoman', $filter);

        return $this->db->get('pedoman');
    }

    public function getSinglePedoman($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pedoman');
    }

    public function insertPedoman($data)
    {
        $this->db->insert('pedoman', $data);
        return $this->db->insert_id();
    }

    public function updatePedoman($id_pedoman, $post)
    {
        $this->db->where('id_pedoman', $id_pedoman);
        $this->db->update('pedoman', $post);
        return $this->db->affected_rows();
    }

    public function deletePedoman($id_pedoman)
    {
        $this->db->where('id_pedoman', $id_pedoman);
        $this->db->delete('pedoman');
        return $this->db->affected_rows();
    }

    public function download($id_pedoman){
        $query = $this->db->get_where('pedoman', array('id_pedoman'=>$id_pedoman));
        return $query->row_array();
    }
}