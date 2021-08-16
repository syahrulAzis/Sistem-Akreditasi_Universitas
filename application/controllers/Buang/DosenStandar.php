<?php

class DosenStandar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_dosenstandar');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_dosenstandar->getStandar();
        $data['standar'] = $query->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('dosen/standar/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_dosenstandar->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('dosen/standar/detail', $data);
        $this->load->view('template/footer');
    }
}
