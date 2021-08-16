<?php

class Prodi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_prodi');
    }

    public function index()
    {
        //ambil data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['prodi'] = $this->M_prodi->getProdi();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Prodi ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('prodi/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data fakultas
        $data['fakultas'] = $this->db->get('fakultas')->result_array();

        $this->form_validation->set_rules('nama_prodi', 'program study name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('prodi/add', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'fakultas_id' => $this->input->post('fakultas_id'),
                'nama_prodi' => $this->input->post('nama_prodi')
            ];

            $this->db->insert('prodi', $data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Prodi ',
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
            redirect('prodi');
        }
    }

    public function update($id_prodi)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_prodi->getSingleProdi('id_prodi', $id_prodi);
        $data['prodi'] = $query->row_array();

        $data['fakultas'] = $this->db->get('fakultas')->result_array();

        if ($this->input->post()) {
            $post['fakultas_id'] = $this->input->post('fakultas_id');
            $post['nama_prodi'] = $this->input->post('nama_prodi');

            $cek = $this->M_prodi->updateProdi($id_prodi, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Prodi ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('prodi');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('prodi');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('prodi/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_prodi)
    {
        $result = $this->M_prodi->deleteProdi($id_prodi);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Prodi ' . $id_prodi,
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

        redirect('prodi');
    }
}
