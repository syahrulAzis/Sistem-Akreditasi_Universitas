<?php

class M_status extends CI_Model
{
    public function getStatus()
    {
        return $this->db->get('pendidikan_status');
    }

    public function insertStatus($data)
    {
        $this->db->insert('pendidikan_status', $data);
        return $this->db->insert_id();
    }

    public function getSinglestatus($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pendidikan_status');
    }

    public function updateStatus($id_status_pendidikan, $post)
    {
        $this->db->where('id_status_pendidikan', $id_status_pendidikan);
        $this->db->update('pendidikan_status', $post);
        return $this->db->affected_rows();
    }

    public function deleteStatus($id_status_pendidikan)
    {
        $this->db->where('id_status_pendidikan', $id_status_pendidikan);
        $this->db->delete('pendidikan_status');
        return $this->db->affected_rows();
    }
}
