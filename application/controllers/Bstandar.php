<?php

class Bstandar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_bstandar');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_bstandar->getBstandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Borang Standar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('bstandar/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_bstandar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_bstandar->getSingleBstandar('id_bstandar', $id_bstandar);
        $data['standar'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail borang standar ' . $id_bstandar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('bstandar/detail', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['nama_bstandar'] = $this->input->post('nama_bstandar');
            $data['versi_bstandar'] = $this->input->post('versi_bstandar');
            $data['tahun_bstandar'] = $this->input->post('tahun_bstandar');
            $data['jenis_bstandar'] = $this->input->post('jenis_bstandar');

            $cek = $this->M_bstandar->insertBstandar($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add borang standar ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('bstandar');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('bstandar');
            }
        }

        $this->load->view('bstandar/add', $sess);
    }

    public function update($id_bstandar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_bstandar->getSingleBstandar('id_bstandar', $id_bstandar);
        $data['standar'] = $query->row_array();

        if ($this->input->post()) {
            $post['nama_bstandar'] = $this->input->post('nama_bstandar');
            $post['versi_bstandar'] = $this->input->post('versi_bstandar');
            $post['tahun_bstandar'] = $this->input->post('tahun_bstandar');
            $post['jenis_bstandar'] = $this->input->post('jenis_bstandar');

            $cek = $this->M_bstandar->updateBstandar($id_bstandar, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update borang standar ' . $post . $id_standar,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('bstandar');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('bstandar');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('bstandar/update', $data, $sess);
    }

    public function delete($id_bstandar)
    {
        $result = $this->M_bstandar->deleteBstandar($id_bstandar);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete borang standar ' . $id_bstandar,
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

        redirect('bstandar');
    }
}