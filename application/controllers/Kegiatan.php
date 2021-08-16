<?php

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_kegiatan');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_kegiatan->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Kegiatan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('kegiatan/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['judul_kegiatan'] = $this->input->post('judul_kegiatan');
            $data['des_kegiatan'] = $this->input->post('des_kegiatan');
            $data['link_blog'] = $this->input->post('link_blog');
            $data['artikel_kegiatan'] = $this->input->post('artikel_kegiatan');
            $data['peserta_kegiatan'] = $this->input->post('peserta_kegiatan');
            $data['waktu_kegiatan'] = $this->input->post('waktu_kegiatan');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/kegiatan/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 800;
            $config['max_height']           = 600;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            } else {
                $data['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_kegiatan->insertKegiatan($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Kegiatan ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Kegiatan');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Kegiatan');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('kegiatan/add');
        $this->load->view('template/footer');
    }

    public function update($id_kegiatan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_kegiatan->getSingleKegiatan('id_kegiatan', $id_kegiatan);
        $data['kegiatan'] = $query->row_array();

        if ($this->input->post()) {
            $post['judul_kegiatan'] = $this->input->post('judul_kegiatan');
            $post['des_kegiatan'] = $this->input->post('des_kegiatan');
            $post['link_blog'] = $this->input->post('link_blog');
            $post['artikel_kegiatan'] = $this->input->post('artikel_kegiatan');
            $post['peserta_kegiatan'] = $this->input->post('peserta_kegiatan');
            $post['waktu_kegiatan'] = $this->input->post('waktu_kegiatan');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/kegiatan/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 800;
            $config['max_height']           = 600;

            $this->load->library('upload', $config);
            $this->upload->do_upload('file');

            if (!empty($this->upload->data()['file_name'])) {
                $post['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_kegiatan->updateKegiatan($id_kegiatan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Kegiatan ' . $post . $id_kegiatan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Kegiatan');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Kegiatan');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('kegiatan/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_kegiatan)
    {
        $result = $this->M_kegiatan->deleteKegiatan($id_kegiatan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Kegiatan ' . $id_kegiatan,
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

        redirect('kegiatan');
    }
}
