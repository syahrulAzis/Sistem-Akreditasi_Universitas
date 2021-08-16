<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsesorPeningkatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_asesorppeningkatan');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan_peningkatan', [
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_asesorppeningkatan->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/index', $data);
        $this->load->view('template/footer');
    }

    public function kelengkapan($id_pendidikan_peningkatan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorppeningkatan->getSinglePendidikan('id_pendidikan_peningkatan', $id_pendidikan_peningkatan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorppeningkatan->getAlldokumendetail('pendidikan_id', $id_pendidikan_peningkatan);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/kelengkapan', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorppeningkatan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/detaildokumen', $data);
        $this->load->view('template/footer');
    }

    public function pengendalian($id_pendidikan_peningkatan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorppeningkatan->getSinglePendidikan('id_pendidikan_peningkatan', $id_pendidikan_peningkatan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorppeningkatan->getAlldokumen('pendidikan_id', $id_pendidikan_peningkatan);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/pengendalian', $data);
        $this->load->view('template/footer');
    }

    public function detailPengendalian($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorppeningkatan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/detailPengendalian', $data);
        $this->load->view('template/footer');
    }

    public function lampiran($id_pendidikan_peningkatan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['lampiran'] = $this->db->get_where('pendidikan_lampiran', [
            'pendidikan_id' => $id_pendidikan_peningkatan,
        ])->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/ppeningkatan/lampiran', $data);
        $this->load->view('template/footer');
    }
}
