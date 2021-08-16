<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_home');
    }

    public function index()
    {
        $data['total_asset'] = $this->M_home->countStandar();

        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Home ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('home/index', $data);
    }

    public function mprodi()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_home->getProdi();
        $data['prodi'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open mprodi ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('home/mprodi', $data);
        $this->load->view('template/footer');
    }
}
