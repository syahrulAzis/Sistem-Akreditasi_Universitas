<?php

class DosenPedoman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_dosenpedoman');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_dosenpedoman->getPedoman();
        $data['pedoman'] = $query->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('dosen/pedoman/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_dosenpedoman->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('dosen/pedoman/detail', $data);
        $this->load->view('template/footer');
    }
}
