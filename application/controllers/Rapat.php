<?php

class Rapat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_rapat');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_rapat->getRapat();
        $data['rapat'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Rapat ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('rapat/index', $data);
        $this->load->view('template/footer');
    }


    public function detail($id_rapat)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_rapat->getsingleRapat('id_rapat', $id_rapat);
        $data['rapat'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail rapat ' . $id_rapat,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('rapat/detail', $data);
        $this->load->view('template/footer');
    }
    

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['hari'] = $this->input->post('hari');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['jenis_rapat'] = $this->input->post('jenis_rapat');
            $data['materi'] = $this->input->post('materi');
            $data['pst_undangan'] = $this->input->post('pst_undangan');
            $data['pimpinan_rapat'] = $this->input->post('pimpinan_rapat');
            $data['notulen_rapat'] = $this->input->post('notulen_rapat');
            $data['semester'] = $this->input->post('semester');
            $data['thn_akademik'] = $this->input->post('thn_akademik');
            $data['jml_rapat'] = $this->input->post('jml_rapat');
            $data['user_id'] = $this->session->userdata('id');


            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/rapat/';
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

            $cek = $this->M_rapat->insertRapat($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add rapat ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('rapat');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('rapat');
            }
        }

        $this->load->view('rapat/add', $sess);
    }

    public function update($id_rapat)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_rapat->getSingleRapat('id_rapat', $id_rapat);
        $data['rapat'] = $query->row_array();

        if ($this->input->post()) {
            $post['hari'] = $this->input->post('hari');
            $post['tanggal'] = $this->input->post('tanggal');
            $post['jenis_rapat'] = $this->input->post('jenis_rapat');
            $post['materi'] = $this->input->post('materi');
            $post['semester'] = $this->input->post('semester');
            $post['thn_akademik'] = $this->input->post('thn_akademik');
            $post['jml_rapat'] = $this->input->post('jml_rapat');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/rapat/';
            $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('file');

            if (!empty($this->upload->data()['file_name'])) {
                $post['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_rapat->updateRapat($id_rapat, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update rapat ' . $post . $id_rapat,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('rapat');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('rapat');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('rapat/update', $data, $sess);
    }

    public function delete($id_rapat)
    {
        $result = $this->M_rapat->deleteRapat($id_rapat);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete rapat ' . $id_rapat,
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

        redirect('rapat');
    }

    public function download($id_rapat)
    {

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download rapat ' / $id_rapat,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_rapat->download($id_rapat);
        $file = 'unggah/rapat/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
