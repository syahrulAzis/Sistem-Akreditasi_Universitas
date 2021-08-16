<?php

class MatrikPenilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_matrikpenilaian');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_matrikpenilaian->getMatrikPenilaian();
        $data['matrik'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open MatrikPenilaian ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('matrikpenilaian/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_penilaian)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_matrikpenilaian->getSingleMatrikPenilaian('id_penilaian', $id_penilaian);
        $data['matrik'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Detail Matrik Penilaian ' . $id_penilaian,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('matrikpenilaian/detail', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['no_butir_matrik'] = $this->input->post('no_butir_matrik');
            $data['kode_elemen_penilaian'] = $this->input->post('kode_elemen_penilaian');
            $data['elemen_penilaian'] = $this->input->post('elemen_penilaian');
            $data['kode_indikator'] = $this->input->post('kode_indikator');
            $data['indikator_penilaian'] = $this->input->post('indikator_penilaian');
            $data['kode_magterik_penilaian_borang'] = $this->input->post('kode_magterik_penilaian_borang');
            $data['kode_ringkasan_standar'] = $this->input->post('kode_ringkasan_standar');
            $data['nomor_dokumen'] = $this->input->post('nomor_dokumen');
            $data['standar_pendidikan'] = $this->input->post('standar_pendidikan');
            $data['user_id'] = $this->session->userdata('id');

            $cek = $this->M_matrikpenilaian->insertMatrikPenilaian($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add MatrikPenilaian ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('MatrikPenilaian');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('MatrikPenilaian');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('matrikpenilaian/add');
        $this->load->view('template/footer');
    }

    public function delete($id_penilaian)
    {
        $result = $this->M_matrikpenilaian->deleteMatrikPenilaian($id_penilaian);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete MatrikPenilaian ' . $id_penilaian,
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

        redirect('MatrikPenilaian');
    }

    public function update($id_penilaian)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_matrikpenilaian->getSingleMatrikPenilaian('id_penilaian', $id_penilaian);
        $data['matrik'] = $query->row_array();

        if ($this->input->post()) {

            $post['no_butir_matrik'] = $this->input->post('no_butir_matrik');
            $post['kode_elemen_penilaian'] = $this->input->post('kode_elemen_penilaian');
            $post['elemen_penilaian'] = $this->input->post('elemen_penilaian');
            $post['kode_indikator'] = $this->input->post('kode_indikator');
            $post['indikator_penilaian'] = $this->input->post('indikator_penilaian');
            $post['kode_magterik_penilaian_borang'] = $this->input->post('kode_magterik_penilaian_borang');
            $post['kode_ringkasan_standar'] = $this->input->post('kode_ringkasan_standar');
            $post['nomor_dokumen'] = $this->input->post('nomor_dokumen');
            $post['standar_pendidikan'] = $this->input->post('standar_pendidikan');
            $post['user_id'] = $this->session->userdata('id');

            $cek = $this->M_matrikpenilaian->updateMatrikPenilaian($id_penilaian, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update MatrikPenilaian ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('MatrikPenilaian');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('MatrikPenilaian');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('matrikpenilaian/update', $data);
        $this->load->view('template/footer');
    }
}
