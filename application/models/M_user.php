<?php

class M_user extends CI_Model
{

    public function getUser()
    {
        return $this->db->get('user');
    }

    public function getLog()
    {
        // return $this->db->get('user_log');

        $query = "SELECT `user_log`.*, `user`.*
                FROM `user_log` JOIN `user`
                ON `user_log`.`user_id` = `user`.`id`
                ORDER BY log_timestamp DESC
                ";

        return $this->db->query($query)->result_array();
    }

    public function getLayananPelanggan()
    {
        $this->db->order_by('lp_timestamp', 'DESC');
        return $this->db->get('layanan_pelanggan');
    }

    public function getSinglePesan($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('layanan_pelanggan');
    }

    public function updatePesan($id_lp, $post)
    {
        $this->db->where('id_lp', $id_lp);
        $this->db->update('layanan_pelanggan', $post);
        return $this->db->affected_rows();
    }

    public function getSingleuser($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('user');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }

    public function getUserupgrade()
    {
        return $this->db->get('user_upgrade');
    }

    public function getSinglupgrade($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('user_upgrade');
    }

    public function updateuserupgrade($id, $post1)
    {
        $this->db->where('id', $id);
        $this->db->update('user_upgrade', $post1);
        return $this->db->affected_rows();
    }

    public function updateuserrole($email, $post2)
    {
        $this->db->where('email', $email);
        $this->db->update('user', $post2);
        return $this->db->affected_rows();
    }

    public function deleteUpgradeuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_upgrade');
        return $this->db->affected_rows();
    }
}
