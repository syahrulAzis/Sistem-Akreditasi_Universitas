<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_dokumen');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['aspekdok'] = $this->M_dokumen->getDokumenaspek();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Dokumen ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('dokumen/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['aspek'] = $this->db->get('pendidikan_aspek')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['standar'] = $this->db->get('standar')->result_array();
        $data['mp'] = $this->db->get('mp')->result_array();
        $data['sop'] = $this->db->get('sop')->result_array();
        $data['formulir'] = $this->db->get('formulir')->result_array();

        $this->form_validation->set_rules('nama_dokumen', 'docoment name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('dokumen/add', $data);
            $this->load->view('template/footer');
        } else {
            $post = [
                'aspek_id' => $this->input->post('aspek_id'),
                'standar_id' => $this->input->post('standar_id'),
                'mp_id' => $this->input->post('mp_id'),
                'sop_id' => $this->input->post('sop_id'),
                'formulir_id' => $this->input->post('formulir_id'),
                'role_id' => $this->input->post('role_id'),
                'nama_dokumen' => $this->input->post('nama_dokumen'),
                'target_dokumen' => $this->input->post('target_dokumen')
            ];

            $this->db->insert('pendidikan_dokumen', $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Dokumen ' . $post,
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
            redirect('dokumen');
        }
    }

    public function edit($id_dokumen_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil satu baris data dari tabel pendidikan_dokumen
        $query = $this->M_dokumen->getSingleaspekdok('id_dokumen_pendidikan', $id_dokumen_pendidikan);
        $data['aspekdok'] = $query->row_array();

        //ambil semua data dari tabel pendidikan_aspek
        $data['aspek'] = $this->db->get('pendidikan_aspek')->result_array();
        //ambil semua data tabel role_user
        $data['role'] = $this->db->get('user_role')->result_array();
        //ambil semua data tabel standar
        $data['standar'] = $this->db->get('standar')->result_array();
        //ambil semua data tabel standar
        $data['mp'] = $this->db->get('mp')->result_array();
        //ambil semua data tabel standar
        $data['sop'] = $this->db->get('sop')->result_array();
        //ambil semua data tabel standar
        $data['formulir'] = $this->db->get('formulir')->result_array();

        if ($this->input->post()) {
            $post['aspek_id'] = $this->input->post('aspek_id');
            $post['standar_id'] = $this->input->post('standar_id');
            $post['mp_id'] = $this->input->post('mp_id');
            $post['sop_id'] = $this->input->post('sop_id');
            $post['formulir_id'] = $this->input->post('formulir_id');
            $post['role_id'] = $this->input->post('role_id');
            $post['nama_dokumen'] = $this->input->post('nama_dokumen');
            $post['target_dokumen'] = $this->input->post('target_dokumen');

            $cek = $this->M_dokumen->updateAspekdok($id_dokumen_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Dokumen ' . $id_dokumen_pendidikan . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('dokumen');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('dokumen');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('dokumen/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_dokumen_pendidikan)
    {
        $result = $this->M_dokumen->deleteAspekdok($id_dokumen_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'deleted Dokumen ' . $id_dokumen_pendidikan,
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

        redirect('dokumen');
    }
}
