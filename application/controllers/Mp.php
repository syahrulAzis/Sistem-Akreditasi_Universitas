<?php

class Mp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_mp');
    }

    public function index()
    {
        $data['mp'] = $this->M_mp->getMp();

        //data dari session
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open MP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('mp/index', $data);
    }

    public function detail($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // $query = $this->M_mp->getSingleMp('id_mp', $id_mp);
        $data['mp'] = $this->M_mp->getSingleMp('id_mp', $id_mp);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailMP ' . $id_mp,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('mp/detail', $data);
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data standar
        $standar['standar'] = $this->db->get('standar')->result_array();

        if ($this->input->post()) {
            $data['standar_id'] = $this->input->post('standar_id');
            $data['no_mp'] = $this->input->post('no_mp');
            $data['deskripsi_mp'] = $this->input->post('deskripsi_mp');
            $data['revisi_mp'] = $this->input->post('revisi_mp');
            $data['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $data['penyimpanan'] = $this->input->post('penyimpanan');
            $data['pembuat'] = $this->input->post('pembuat');
            $data['pengendali'] = $this->input->post('pengendali');
            $data['menyetujui'] = $this->input->post('menyetujui');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/mp/';
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

            $cek = $this->M_mp->insertMp($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add MP ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('mp');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('mp');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('mp/add', $standar);
    }

    public function update($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_mp->updateSingleMp('id_mp', $id_mp);
        $data['mp'] = $query->row_array();

        //ambil data standar
        $data['standar'] = $this->db->get('standar')->result_array();

        if ($this->input->post()) {
            $post['standar_id'] = $this->input->post('standar_id');
            $post['no_mp'] = $this->input->post('no_mp');
            $post['deskripsi_mp'] = $this->input->post('deskripsi_mp');
            $post['revisi_mp'] = $this->input->post('revisi_mp');
            $post['tgl_pembuatan'] = $this->input->post('tgl_pembuatan');
            $post['tgl_berlaku'] = $this->input->post('tgl_berlaku');
            $post['penyimpanan'] = $this->input->post('penyimpanan');
            $post['pembuat'] = $this->input->post('pembuat');
            $post['pengendali'] = $this->input->post('pengendali');
            $post['menyetujui'] = $this->input->post('menyetujui');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/mp/';
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

            $cek = $this->M_mp->updateMp($id_mp, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update MP ' . $post . $id_mp,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('mp');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('mp');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('mp/update', $data);
    }

    public function delete($id_mp)
    {
        $result = $this->M_mp->deleteMp($id_mp);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete MP ' . $id_mp,
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

        redirect('mp');
    }

    public function download($id_mp)
    {
        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download MP ' . $id_mp,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_mp->download($id_mp);
        $file = 'unggah/mp/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
