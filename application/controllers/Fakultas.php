<?php

class Fakultas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_fakultas');
    }

    public function index()
    {
        //ambil session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_fakultas->getFakultas();
        $data['fakultas'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Fakultas ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('fakultas/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('nama_fakultas', 'faculty name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('fakultas/add');
            $this->load->view('template/footer');
        } else {
            $data['nama_fakultas'] = $this->input->post('nama_fakultas');

            $cek = $this->M_fakultas->insertFakultas($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Fakultas ',
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('fakultas');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('fakultas');
            }
        }
    }

    public function update($id_fakultas)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_fakultas->getSingleFakultas('id_fakultas', $id_fakultas);
        $data['fakultas'] = $query->row_array();

        if ($this->input->post()) {
            $post['nama_fakultas'] = $this->input->post('nama_fakultas');

            $cek = $this->M_fakultas->updateFakultas($id_fakultas, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Fakultas ',
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('fakultas');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('fakultas');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('fakultas/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_fakultas)
    {
        $result = $this->M_fakultas->deleteFakultas($id_fakultas);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'deleted Fakultas ',
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

        redirect('fakultas');
    }
}
