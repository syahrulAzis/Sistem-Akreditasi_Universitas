<?php

class M_prodi extends CI_Model
{

    public function getProdi()
    {
        // $query = "SELECT `user_menu`.*, `user_sub_menu`.*
        //             FROM `user_menu` JOIN `user_sub_menu`
        //             ON `user_menu`.`id` = `user_sub_menu`.`menu_id`
        // ";

        $query = "SELECT `fakultas`.*, `prodi`.*
                FROM `fakultas` JOIN `prodi`
                ON `fakultas`.`id_fakultas` = `prodi`.`fakultas_id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function getSingleProdi($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('prodi');
    }

    public function updateProdi($id_prodi, $post)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->update('prodi', $post);
        return $this->db->affected_rows();
    }

    public function deleteProdi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->delete('prodi');
        return $this->db->affected_rows();
    }
}
