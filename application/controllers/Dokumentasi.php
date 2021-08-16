<?php

class Dokumentasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_dokumentasi');
    }

    public function index()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_dokumentasi->getDokumentasi();
        $data['dokumentasi'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Dokumentasi ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('dokumentasi/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_dok)
    {
        $query = $this->M_dokumentasi->getSingleDokumentasi('id_dok', $id_dok);
        $data['dokumentasi'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail Dokumentasi ' . $id_dok,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('dokumentasi/detail', $data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $data['title'] = $this->input->post('title');
            $data['url'] = $this->input->post('url');
            $data['content'] = $this->input->post('content');

            $cek = $this->M_dokumentasi->insertDokumentasi($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Dokumentasi ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                echo "Data berhasil disimpan";
                redirect('/');
            } else
                echo "Data gagal disimpan";
        }

        $this->load->view('dokumentasi/add');
    }
}
