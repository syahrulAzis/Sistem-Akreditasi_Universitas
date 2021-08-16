<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsesorPengendalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_asesorpendidikanpengendalian');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan_pengendalian', [
            'prodi_id' => $this->session->userdata('prodi_id'),
            'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_asesorpendidikanpengendalian->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/index', $data);
        $this->load->view('template/footer');
    }

    public function perbaikan($id_pendidikan_pengendalian)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanpengendalian->getSinglePendidikan('id_pendidikan_pengendalian', $id_pendidikan_pengendalian);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorpendidikanpengendalian->getAlldokumen('pendidikan_id', $id_pendidikan_pengendalian);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/perbaikan', $data);
        $this->load->view('template/footer');
    }

    public function selesai($id_pendidikan_pengendalian)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanpengendalian->getSinglePendidikan('id_pendidikan_pengendalian', $id_pendidikan_pengendalian);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorpendidikanpengendalian->getAlldokumendetail('pendidikan_id', $id_pendidikan_pengendalian);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/detail', $data);
        $this->load->view('template/footer');
    }

    public function nilaiPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorpendidikanpengendalian->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_asesorpendidikanpengendalian->getStatus();
        $data['ambilstatus'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['status_perbaikan'] = $this->input->post('status_perbaikan');
            $post['perbaikan_dokumen'] = $this->input->post('perbaikan_dokumen');

            $cek = $this->M_asesorpendidikanpengendalian->nilaiDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('AsesorPengendalian/perbaikan/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('AsesorPengendalian/perbaikan/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/nilai', $data);
        $this->load->view('template/footer');
    }

    public function hasilPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorpendidikanpengendalian->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/hasil', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorpendidikanpengendalian->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppengendalian/detaildokumen', $data);
        $this->load->view('template/footer');
    }

    public function sendPendidikan($id_pendidikan_pengendalian)
    {
        //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanpengendalian->getOnePendidikan('id_pendidikan_pengendalian', $id_pendidikan_pengendalian);

        $this->load->view('asesor/ppengendalian/sendPendidikan', $data);
    }
}
