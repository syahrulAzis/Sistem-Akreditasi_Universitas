<?php

class M_home extends CI_Model
{

    public function countStandar()
    {
        $query = $this->db->get('standar');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getProdi()
    {
        return $this->db->get('prodi');
    }
}
