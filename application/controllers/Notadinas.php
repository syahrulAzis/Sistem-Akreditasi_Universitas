<?php

class Notadinas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_notadinas');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_notadinas->getNodin();
        $data['nodin'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Nota Dinas ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('nodin/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_nota_dinas)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_notadinas->getSingleNodin('id_nota_dinas', $id_nota_dinas);
        $data['nodin'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail nodin ' . $id_nota_dinas,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('nodin/detail', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['no_nota_dinas'] = $this->input->post('no_nota_dinas');
            $data['kepada'] = $this->input->post('kepada');
            $data['tembusan'] = $this->input->post('tembusan');
            $data['dari'] = $this->input->post('dari');
            $data['perihal'] = $this->input->post('perihal');
            $data['lampiran'] = $this->input->post('lampiran');
            $data['tgl_pengesahan'] = $this->input->post('tgl_pengesahan');
            $data['user_id'] = $this->session->userdata('id');


            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/nodin/';
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

            $cek = $this->M_notadinas->insertNodin($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add nodin ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Notadinas');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Notadinas');
            }
        }
        $this->load->view('template/header', $sess);
        $this->load->view('nodin/add');
        $this->load->view('template/footer');
    }

    public function delete($id_nota_dinas)
    {
        $result = $this->M_notadinas->deleteNodin($id_nota_dinas);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete nodin ' . $id_nota_dinas,
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

        redirect('Notadinas');
    }
}