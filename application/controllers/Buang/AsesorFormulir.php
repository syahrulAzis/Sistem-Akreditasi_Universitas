<?php

class AsesorFormulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_asesorformulir');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorformulir->getFormulir();
        $data['formulir'] = $query->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/formulir/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorformulir->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/formulir/detail', $data);
        $this->load->view('template/footer');
    }
}
