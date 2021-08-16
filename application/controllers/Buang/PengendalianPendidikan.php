<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengendalianPendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_pengendalianpendidikan');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan_pengendalian', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_pengendalianpendidikan->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/index', $data);
        $this->load->view('template/footer');
    }

    public function selesai($id_pendidikan_pengendalian)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_pengendalianpendidikan->getSinglePendidikan('id_pendidikan_pengendalian', $id_pendidikan_pengendalian);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_pengendalianpendidikan->getAlldokumendetail('pendidikan_id', $id_pendidikan_pengendalian);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/detail', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/detaildokumen', $data);
        $this->load->view('template/footer');
    }

    public function perbaikan($id_pendidikan_pengendalian)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_pengendalianpendidikan->getSinglePendidikan('id_pendidikan_pengendalian', $id_pendidikan_pengendalian);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_pengendalianpendidikan->getAlldokumen('pendidikan_id', $id_pendidikan_pengendalian);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/perbaikan', $data);
        $this->load->view('template/footer');
    }

    public function jadwalPengendalian($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_pengendalianpendidikan->getUser();
        $data['datauser'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['rencana_pengendalian'] = $this->input->post('rencana_pengendalian');
            $post['jadwal_pengendalian'] = $this->input->post('jadwal_pengendalian');
            $post['penanggung_jawab_pengendalian'] = $this->input->post('penanggung_jawab_pengendalian');

            $cek = $this->M_pengendalianpendidikan->nilaiDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/jadwalPengendalian', $data);
        $this->load->view('template/footer');
    }

    public function unggahPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        if ($this->input->post()) {
            $balik = $this->input->post('pendidikan_id');
            // $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pendidikan/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('file2');

            if (!empty($this->upload->data()['file_name'])) {
                $post['file2'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_pengendalianpendidikan->uploadDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/unggah', $data);
        $this->load->view('template/footer');
    }

    public function jadwalPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_pengendalianpendidikan->getUser();
        $data['datauser'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['rencana_perbaikan'] = $this->input->post('rencana_perbaikan');
            $post['jadwal_perbaikan'] = $this->input->post('jadwal_perbaikan');
            $post['penanggung_jawab_perbaikan'] = $this->input->post('penanggung_jawab_perbaikan');

            $cek = $this->M_pengendalianpendidikan->nilaiDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/jadwalPerbaikan', $data);
        $this->load->view('template/footer');
    }

    public function nilaiPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_pengendalianpendidikan->getStatus();
        $data['ambilstatus'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['status_perbaikan'] = $this->input->post('status_perbaikan');
            $post['perbaikan_dokumen'] = $this->input->post('perbaikan_dokumen');

            $cek = $this->M_pengendalianpendidikan->nilaiDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('PengendalianPendidikan/perbaikan/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/nilai', $data);
        $this->load->view('template/footer');
    }

    public function hasilPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_pengendalianpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('pengendalian/hasil', $data);
        $this->load->view('template/footer');
    }
}
