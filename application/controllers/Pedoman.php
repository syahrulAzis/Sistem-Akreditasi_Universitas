<?php

class Pedoman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_pedoman');
    }

    public function index()
    {
        $query = $this->M_pedoman->getPedoman();
        $data['pedoman'] = $query->result_array();

        //data dari session
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Pedoman ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('pedoman/index', $data);
    }

    public function detail($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pedoman->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Detail Pedoman ' . $id_pedoman,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('pedoman/detail', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['no_pedoman'] = $this->input->post('no_pedoman');
            $data['deskripsi_pedoman'] = $this->input->post('deskripsi_pedoman');
            $data['revisi_pedoman'] = $this->input->post('revisi_pedoman');
            $data['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $data['penyimpanan'] = $this->input->post('penyimpanan');
            $data['pembuat'] = $this->input->post('pembuat');
            $data['pemeriksa'] = $this->input->post('pemeriksa');
            $data['menyetujui'] = $this->input->post('menyetujui');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pedoman/';
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

            $cek = $this->M_pedoman->insertPedoman($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Pedoman ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('pedoman');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('pedoman');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pedoman/add');
    }

    public function update($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pedoman->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        if ($this->input->post()) {
            $post['no_pedoman'] = $this->input->post('no_pedoman');
            $post['deskripsi_pedoman'] = $this->input->post('deskripsi_pedoman');
            $post['revisi_pedoman'] = $this->input->post('revisi_pedoman');
            $post['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $post['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $post['penyimpanan'] = $this->input->post('penyimpanan');
            $post['pembuat'] = $this->input->post('pembuat');
            $post['pemeriksa'] = $this->input->post('pemeriksa');
            $post['menyetujui'] = $this->input->post('menyetujui');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pedoman/';
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

            $cek = $this->M_pedoman->updatePedoman($id_pedoman, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Pedoman ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('pedoman');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('pedoman');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pedoman/update', $data);
    }

    public function delete($id_pedoman)
    {
        $result = $this->M_pedoman->deletePedoman($id_pedoman);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Pedoman ' . $id_pedoman,
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

        redirect('pedoman');
    }

    public function download($id_pedoman)
    {

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download Pedoman ' . $id_pedoman,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_pedoman->download($id_pedoman);
        $file = 'unggah/pedoman/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
