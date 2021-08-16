<?php

class M_aspek extends CI_Model
{
    public function getAspek()
    {
        return $this->db->get('pendidikan_aspek');
    }

    public function insertAspek($data)
    {
        $this->db->insert('pendidikan_aspek', $data);
        return $this->db->insert_id();
    }

    public function deleteAspek($id_aspek_pendidikan)
    {
        $this->db->where('id_aspek_pendidikan', $id_aspek_pendidikan);
        $this->db->delete('pendidikan_aspek');
        return $this->db->affected_rows();
    }

    public function getSingleaspek($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pendidikan_aspek');
    }

    public function updateAspek($id_aspek_pendidikan, $post)
    {
        $this->db->where('id_aspek_pendidikan', $id_aspek_pendidikan);
        $this->db->update('pendidikan_aspek', $post);
        return $this->db->affected_rows();
    }
}
