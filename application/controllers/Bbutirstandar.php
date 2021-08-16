<?php

class Bbutirstandar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_bbutirstandar');
    }

    public function index()
    {
        $data['butir'] = $this->M_bbutirstandar->getButirstandar();

        //data dari session
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open butir standar ',
        ];

        $this->db->insert('user_log', $log);

        $this->load->view('butir/index', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data standar
        $standar['butir'] = $this->db->get('b_standar')->result_array();

        if ($this->input->post()) {
            $data['b_standarid'] = $this->input->post('b_standarid');
            $data['nama_butir'] = $this->input->post('nama_butir');
            $data['keterangan_butir'] = $this->input->post('keterangan_butir');

            $cek = $this->M_bbutirstandar->insertButir($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add butir standar ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('bbutirstandar');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('bbutirstandar');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('butir/add', $standar);
    }

    public function delete($id_butirstandar)
    {
        $result = $this->M_bbutirstandar->deleteButir($id_butirstandar);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete butir standar ' . $id_butirstandar,
        ];
        $this->db->insert('user_log', $log);

        if ($result)
            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data berhasil dihapus !
            </div>');
        else
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data gagal dihapus !
            </div>');

        redirect('bbutirstandar');
    }
}