<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_status');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_status->getStatus();
        $data['status'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Status ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('status/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //rule
        $this->form_validation->set_rules('nama_status', 'nama_status', 'required');
        $this->form_validation->set_rules('ket_status', 'ket_status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('status/add');
            $this->load->view('template/footer');
        } else {
            $data['nama_status'] = $this->input->post('nama_status');
            $data['ket_status'] = $this->input->post('ket_status');

            $cek = $this->M_status->insertStatus($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Status ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('status');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('status');
            }
        }
    }

    public function edit($id_status_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data aspek
        $query = $this->M_status->getSinglestatus('id_status_pendidikan', $id_status_pendidikan);
        $data['status'] = $query->row_array();

        if ($this->input->post()) {
            $post['nama_status'] = $this->input->post('nama_status');
            $post['ket_status'] = $this->input->post('ket_status');

            $cek = $this->M_status->updateStatus($id_status_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update status ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data berhasil diperbaharui !
                </div>');
                redirect('status');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data gagal diperbaharui atau tidak ada perubahan !
            </div>');
                redirect('status');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('status/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_status_pendidikan)
    {
        $result = $this->M_status->deleteStatus($id_status_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete status ' . $id_status_pendidikan,
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

        redirect('status');
    }
}
