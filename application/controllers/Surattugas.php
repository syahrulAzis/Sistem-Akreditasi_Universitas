<?php

class Surattugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_surattugas');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_surattugas->getst();
        $data['st'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Surat Tugas ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('st/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_surat_tugas)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_surattugas->getsinglest('id_surat_tugas', $id_surat_tugas);
        $data['st'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail st ' . $id_surat_tugas,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('st/detail', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['no_st'] = $this->input->post('no_st');
            $data['pemberi_tugas'] = $this->input->post('pemberi_tugas');
            $data['penerima_tugas'] = $this->input->post('penerima_tugas');
            $data['tgl_pengesahan_st'] = $this->input->post('tgl_pengesahan_st');
            $data['jenis_penugasan'] = $this->input->post('jenis_penugasan');
            $data['tgl_penugasan'] = $this->input->post('tgl_penugasan');
            $data['tempat_penugasan'] = $this->input->post('tempat_penugasan');
            $data['lama_penugasan'] = $this->input->post('lama_penugasan');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/st/';
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

            $cek = $this->M_surattugas->insertst($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add st ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Surattugas');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Surattugas');
            }
        }
        $this->load->view('template/header', $sess);
        $this->load->view('st/add');
        $this->load->view('template/footer');
    }

    public function delete($id_surat_tugas)
    {
        $result = $this->M_surattugas->deletest($id_surat_tugas);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete st ' . $id_sk,
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

        redirect('Surattugas');
    }
}