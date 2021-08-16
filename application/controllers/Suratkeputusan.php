<?php

class Suratkeputusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_suratkeputusan');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_suratkeputusan->getsk();
        $data['sk'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Nota Dinas ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('sk/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_sk)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_suratkeputusan->getsinglesk('id_sk', $id_sk);
        $data['sk'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail sk ' . $id_sk,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('sk/detail', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['jenis_sk'] = $this->input->post('jenis_sk');
            $data['no_sk'] = $this->input->post('no_sk');
            $data['tentang_sk'] = $this->input->post('tentang_sk');
            $data['tgl_berlaku_sk'] = $this->input->post('tgl_berlaku_sk');
            $data['tgl_pengesahan_sk'] = $this->input->post('tgl_pengesahan_sk');
            $data['tembusan'] = $this->input->post('tembusan');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/sk/';
            $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            } else {
                $data['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_suratkeputusan->insertsk($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add sk ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Suratkeputusan');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Suratkeputusan');
            }
        }
        $this->load->view('template/header', $sess);
        $this->load->view('sk/add');
        $this->load->view('template/footer');
    }

    public function delete($id_sk)
    {
        $result = $this->M_suratkeputusan->deletesk($id_sk);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete sk ' . $id_sk,
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

        redirect('Suratkeputusan');
    }
}