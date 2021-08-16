<?php

class KaprodiMP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_kaprodimp');
    }

    public function index()
    {
        $data['mp'] = $this->M_kaprodimp->getMp();

        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('kaprodi/mp/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_kaprodimp->getSingleMP('id_mp', $id_mp);
        $data['mp'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('kaprodi/mp/detail', $data);
        $this->load->view('template/footer');
    }
}
