<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aspek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_aspek');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_aspek->getAspek();
        $data['aspek'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open aspek ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('aspek/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //rule
        $this->form_validation->set_rules('aspek', 'aspek', 'required');

        //kirim data standar
        $kirim['standar'] = $this->db->get('standar')->result_array();
        //kirim data prodi
        $kirim['prodi'] = $this->db->get('prodi')->result_array();
        //kirim data matrik
        $kirim['matrik'] = $this->db->get('matrik_penilaian')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('aspek/add', $kirim);
            $this->load->view('template/footer');
        } else {
            $data['aspek'] = $this->input->post('aspek');
            $data['standar_id'] = $this->input->post('standar_id');
            $data['prodi_id'] = $this->input->post('prodi_id');
            $data['turunan'] = $this->input->post('turunan');
            $data['semester'] = $this->input->post('semester');
            $data['tahun'] = $this->input->post('tahun');
            $data['penilaian_id'] = $this->input->post('penilaian_id');
            $data['indikator'] = $this->input->post('indikator');
            $data['bobot'] = $this->input->post('bobot');
            $data['target_aspek'] = $this->input->post('target_aspek');

            $cek = $this->M_aspek->insertAspek($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add aspek ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('aspek');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('aspek');
            }
        }
    }

    public function edit($id_aspek_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data aspek
        $query = $this->M_aspek->getSingleaspek('id_aspek_pendidikan', $id_aspek_pendidikan);
        $data['aspek'] = $query->row_array();

        //kirim data standar
        $data['standar'] = $this->db->get('standar')->result_array();
        //kirim data prodi
        $data['prodi'] = $this->db->get('prodi')->result_array();
        //kirim data matrik
        $data['matrik'] = $this->db->get('matrik_penilaian')->result_array();

        if ($this->input->post()) {
            $post['aspek'] = $this->input->post('aspek');
            $post['standar_id'] = $this->input->post('standar_id');
            $post['prodi_id'] = $this->input->post('prodi_id');
            $post['turunan'] = $this->input->post('turunan');
            $post['semester'] = $this->input->post('semester');
            $post['penilaian_id'] = $this->input->post('penilaian_id');
            $post['indikator'] = $this->input->post('indikator');
            $post['bobot'] = $this->input->post('bobot');
            $post['target_aspek'] = $this->input->post('target_aspek');

            $cek = $this->M_aspek->updateAspek($id_aspek_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update aspek ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('aspek');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('aspek');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('aspek/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_aspek_pendidikan)
    {
        $result = $this->M_aspek->deleteAspek($id_aspek_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete aspek ' . $id_aspek_pendidikan,
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

        redirect('aspek');
    }
}
