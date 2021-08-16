<?php

class M_kegiatan extends CI_Model
{
    public function getKegiatan()
    {
        return $this->db->get('kegiatan');
    }

    public function insertKegiatan($data)
    {
        $this->db->insert('kegiatan', $data);
        return $this->db->insert_id();
    }

    public function getSingleKegiatan($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('kegiatan');
    }

    public function updateKegiatan($id_kegiatan, $post)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('kegiatan', $post);
        return $this->db->affected_rows();
    }

    public function deleteKegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('kegiatan');
        return $this->db->affected_rows();
    }
}
