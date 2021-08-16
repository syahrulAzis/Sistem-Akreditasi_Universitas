<?php

class AsesorStandar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_asesorstandar');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorstandar->getStandar();
        $data['standar'] = $query->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/standar/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorstandar->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/standar/detail', $data);
        $this->load->view('template/footer');
    }
}
