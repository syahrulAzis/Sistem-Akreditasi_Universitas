<?php

class M_formulir extends CI_Model {

    public function getFormulir()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_formulir', $filter);

        return $this->db->get('formulir');
    }

    public function getSingleFormulir($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('formulir');
    }

    public function insertFormulir($data)
    {
        $this->db->insert('formulir', $data);
        return $this->db->insert_id();
    }

    public function updateFormulir($id_formulir, $post)
    {
        $this->db->where('id_formulir', $id_formulir);
        $this->db->update('formulir', $post);
        return $this->db->affected_rows();
    }

    public function deleteFormulir($id_formulir)
    {
        $this->db->where('id_formulir', $id_formulir);
        $this->db->delete('formulir');
        return $this->db->affected_rows();
    }

    public function download($id_formulir){
        $query = $this->db->get_where('formulir', array('id_formulir'=>$id_formulir));
        return $query->row_array();
    }
}