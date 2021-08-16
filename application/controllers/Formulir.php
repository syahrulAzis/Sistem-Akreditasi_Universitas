<?php

class Formulir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_formulir');
    }

    public function index()
    {
        $query = $this->M_formulir->getFormulir();
        $data['formulir'] = $query->result_array();

        //data dari session
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Formulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('formulir/index', $data);
    }

    public function detail($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_formulir->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail Formulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('formulir/detail', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data standar
        $sent['standar'] = $this->db->get('standar')->result_array();

        //ambil data mp
        $sent['mp'] = $this->db->get('mp')->result_array();

        //ambil data sop
        $sent['sop'] = $this->db->get('sop')->result_array();

        if ($this->input->post()) {
            $data['standar_id'] = $this->input->post('standar_id');
            $data['mp_id'] = $this->input->post('mp_id');
            $data['sop_id'] = $this->input->post('sop_id');
            $data['no_formulir'] = $this->input->post('no_formulir');
            $data['deskripsi_formulir'] = $this->input->post('deskripsi_formulir');
            $data['revisi_formulir'] = $this->input->post('revisi_formulir');
            $data['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $data['penyimpanan'] = $this->input->post('penyimpanan');
            $data['pembuat'] = $this->input->post('pembuat');
            $data['pengendali'] = $this->input->post('pengendali');
            $data['menyetujui'] = $this->input->post('menyetujui');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/formulir/';
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

            $cek = $this->M_formulir->insertFormulir($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Formulir ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('formulir');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('formulir');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('formulir/add', $sent);
    }

    public function update($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_formulir->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        //ambil data standar
        $data['standar'] = $this->db->get('standar')->result_array();

        //ambil data mp
        $data['mp'] = $this->db->get('mp')->result_array();

        //ambil data sop
        $data['sop'] = $this->db->get('sop')->result_array();

        if ($this->input->post()) {
            $post['standar_id'] = $this->input->post('standar_id');
            $post['mp_id'] = $this->input->post('mp_id');
            $post['sop_id'] = $this->input->post('sop_id');
            $post['no_formulir'] = $this->input->post('no_formulir');
            $post['deskripsi_formulir'] = $this->input->post('deskripsi_formulir');
            $post['revisi_formulir'] = $this->input->post('revisi_formulir');
            $post['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $post['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $post['penyimpanan'] = $this->input->post('penyimpanan');
            $post['pembuat'] = $this->input->post('pembuat');
            $post['pengendali'] = $this->input->post('pengendali');
            $post['menyetujui'] = $this->input->post('menyetujui');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/formulir/';
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

            $cek = $this->M_formulir->updateFormulir($id_formulir, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Formulir ' . $post . $id_formulir,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('formulir');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('formulir');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('formulir/update', $data);
    }

    public function delete($id_formulir)
    {
        $result = $this->M_formulir->deleteFormulir($id_formulir);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Formulir ' . $id_formulir,
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

        redirect('formulir');
    }

    public function download($id_formulir)
    {
        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download Formulir ' . $id_formulir,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_formulir->download($id_formulir);
        $file = 'unggah/formulir/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
