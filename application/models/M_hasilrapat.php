<?php

class M_hasilrapat extends CI_Model
{

    public function getHasilrapat()
    {
        //$filter = $this->input->get('find');
        //$this->db->like('no_rapat', $filter);

        return $this->db->get('hasil_rapat');
    }

    public function getsingleHasilrapat($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('hasil_rapat');
    }

    public function insertHasilrapat($data)
    {
        
        $this->db->insert('hasil_rapat', $data);
        
        return $this->db->insert_id();


    }


    public function updateHasilrapat($id_hasil, $post)
    {
        $this->db->where('id_hasil', $id_hasil);
        $this->db->update('hasil_rapat', $post);
        return $this->db->affected_rows();
    }

    public function deleteHasilrapat($id_hasil)
    {
        $this->db->where('id_hasil', $id_hasil);
        $this->db->delete('hasil_rapat');
        return $this->db->affected_rows();
    }

    public function download($id_hasil)
    {
        $query = $this->db->get_where('hasil_rapat', array('id_hasil' => $id_hasil));
        return $query->row_array();
    }
}
