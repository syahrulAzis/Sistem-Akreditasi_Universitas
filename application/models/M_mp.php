<?php
class M_mp extends CI_Model
{

    public function getMp()
    {
        $filter = $this->input->get('find');
        $this->db->like('no_mp', $filter);

        $this->db->select('*');
        $this->db->from('mp');
        $this->db->join('standar', 'standar.id_standar=mp.standar_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateSingleMp($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('mp');
    }

    public function getSingleMp($field, $value)
    {
        // $this->db->where($field, $value);
        // return $this->db->get('mp');

        $this->db->select('*');
        $this->db->from('mp');
        // $this->db->join('standar', 'standar.id_standar=mp.standar_id');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insertMp($data)
    {
        $this->db->insert('mp', $data);
        return $this->db->insert_id();
    }

    public function updateMp($id_mp, $post)
    {
        $this->db->where('id_mp', $id_mp);
        $this->db->update('mp', $post);
        return $this->db->affected_rows();
    }

    public function deleteMp($id_mp)
    {
        $this->db->where('id_mp', $id_mp);
        $this->db->delete('mp');
        return $this->db->affected_rows();
    }

    public function download($id_mp)
    {
        $query = $this->db->get_where('mp', array('id_mp' => $id_mp));
        return $query->row_array();
    }
}
