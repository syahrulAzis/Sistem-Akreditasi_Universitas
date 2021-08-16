<?php

class Standar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_standar');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_standar->getStandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Standar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('standar/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_standar->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail standar ' . $id_standar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('standar/detail', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['no_standar'] = $this->input->post('no_standar');
            $data['deskripsi_standar'] = $this->input->post('deskripsi_standar');
            $data['keterangan'] = $this->input->post('keterangan');
            $data['revisi_standar'] = $this->input->post('revisi_standar');
            $data['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $data['penyimpanan'] = $this->input->post('penyimpanan');
            $data['pembuat'] = $this->input->post('pembuat');
            $data['pengendali'] = $this->input->post('pengendali');
            $data['menyetujui'] = $this->input->post('menyetujui');
            $data['user_id'] = $this->session->userdata('id');


            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/standar/';
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

            $cek = $this->M_standar->insertStandar($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add standar ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('standar');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('standar');
            }
        }

        $this->load->view('standar/add', $sess);
    }

    public function update($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_standar->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        if ($this->input->post()) {
            $post['no_standar'] = $this->input->post('no_standar');
            $post['deskripsi_standar'] = $this->input->post('deskripsi_standar');
            $post['keterangan'] = $this->input->post('keterangan');
            $post['revisi_standar'] = $this->input->post('revisi_standar');
            $post['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $post['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $post['penyimpanan'] = $this->input->post('penyimpanan');
            $post['pembuat'] = $this->input->post('pembuat');
            $post['pengendali'] = $this->input->post('pengendali');
            $post['menyetujui'] = $this->input->post('menyetujui');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/standar/';
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

            $cek = $this->M_standar->updateStandar($id_standar, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update standar ' . $post . $id_standar,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('standar');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('standar');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('standar/update', $data, $sess);
    }

    public function delete($id_standar)
    {
        $result = $this->M_standar->deleteStandar($id_standar);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete standar ' . $id_standar,
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

        redirect('standar');
    }

    public function download($id_standar)
    {

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download standar ' / $id_standar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_standar->download($id_standar);
        $file = 'unggah/standar/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
