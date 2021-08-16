<?php

class M_profil extends CI_Model
{
    public function upgradeUser($post)
    {
        $this->db->insert('user_upgrade', $post);
        return $this->db->insert_id();
    }

    public function getUserrole()
    {
        $query = "SELECT `user_role`.*, `user_upgrade`.*
                FROM `user_role` JOIN `user_upgrade`
                ON `user_role`.`id` = `user_upgrade`.`role_id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function getLoguser($l)
    {
        // $this->db->select('*');
        // $this->db->from('user_log');
        // $this->db->where($l);
        // $this->db->order_by('log_timestamp', 'DSC');
        // $query = $this->db->get();
        // return $query->result();

        $user = $l['user_id'];

        $query = "SELECT * 
                    FROM `user_log` 
                    WHERE user_id=$user
                    ORDER BY log_timestamp DESC 
                    ";

        return $this->db->query($query)->result_array();
    }


    public function getProfil($aktif)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('fakultas', 'fakultas.id_fakultas=user.fakultas_id');
        $this->db->join('prodi', 'prodi.id_prodi=user.prodi_id');
        $this->db->join('user_role', 'user_role.id=user.role_id');
        $this->db->where($aktif);
        $query = $this->db->get();
        return $query->result();
    }

    public function getJoin($email)
    {
        $this->db->select('*');
        $this->db->from('user_upgrade');
        $this->db->join('user_menu', 'user_menu.id=user_upgrade.role_id');
        $this->db->where('user_email', $email);
        $query = $this->db->get();
        return $query->result();
    }
}
