<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_jad');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_jad->getJad();
        $data['jad'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Jad ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('jad/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //rule
        $this->form_validation->set_rules('kode_jad', 'kode', 'required');
        $this->form_validation->set_rules('ket_jad', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('jad/add');
            $this->load->view('template/footer');
        } else {
            $data['kode_jad'] = $this->input->post('kode_jad');
            $data['ket_jad'] = $this->input->post('ket_jad');
            $data['user_id'] = $this->session->userdata('id');

            $cek = $this->M_jad->insertJad($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add jad ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('jad');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('jad');
            }
        }
    }

    public function edit($id_jad)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data aspek
        $query = $this->M_jad->getSinglejad('id_jad', $id_jad);
        $data['jad'] = $query->row_array();

        if ($this->input->post()) {
            $post['kode_jad'] = $this->input->post('kode_jad');
            $post['ket_jad'] = $this->input->post('ket_jad');
            $data['user_id'] = $this->session->userdata('id');

            $cek = $this->M_jad->updatejad($id_jad, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update jad ' . $id_jad,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('jad');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('jad');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('jad/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_jad)
    {
        $result = $this->M_jad->deletejad($id_jad);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete jad ' . $id_jad,
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

        redirect('jad');
    }

    public function transaksijad()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_jad->getTransaksiJad();
        $data['tj'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open transaksijad ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('jad/transaksijad', $data);
        $this->load->view('template/footer');
    }

    public function addtransaksi()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil semua data dokumen 
        // $query = $this->M_jad->getDokumen();
        // $data['dokumen'] = $query->result_array();
        $data['dokumen'] = $this->db->get('pendidikan_dokumen')->result_array();

        //ambil semua data dokumen 
        $query = $this->M_jad->getJad();
        $data['jad'] = $query->result_array();

        //rule
        $this->form_validation->set_rules('id_dokumen_pendidikan', 'dokumen', 'required');
        $this->form_validation->set_rules('id_jad', 'jad', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('jad/addtransaksi', $data);
            $this->load->view('template/footer');
        } else {
            $post['id_dokumen_pendidikan'] = $this->input->post('id_dokumen_pendidikan');
            $post['id_jad'] = $this->input->post('id_jad');

            $cek = $this->M_jad->insertTransaksiJad($post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add transaksijad ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('jad/transaksijad');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('jad/transaksijad');
            }
        }
    }

    public function deletetransaksi($id_pjt)
    {
        $result = $this->M_jad->deletetransaksi($id_pjt);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete transaksijad ' . $id_pjt,
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

        redirect('jad/transaksijad');
    }
}
