<?php

class M_dokumen extends CI_Model
{
    public function getDokumenaspek()
    {
        $query = "SELECT `pendidikan_aspek`.*, `pendidikan_dokumen`.*
                    FROM `pendidikan_aspek` JOIN `pendidikan_dokumen`
                    ON `pendidikan_aspek`.`id_aspek_pendidikan` = `pendidikan_dokumen`.`aspek_id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getSingleaspekdok($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('pendidikan_dokumen');
    }

    public function updateAspekdok($id_dokumen_pendidikan, $post)
    {
        $this->db->where('id_dokumen_pendidikan', $id_dokumen_pendidikan);
        $this->db->update('pendidikan_dokumen', $post);
        return $this->db->affected_rows();
    }

    public function deleteAspekdok($id_dokumen_pendidikan)
    {
        $this->db->where('id_dokumen_pendidikan', $id_dokumen_pendidikan);
        $this->db->delete('pendidikan_dokumen');
        return $this->db->affected_rows();
    }
}
