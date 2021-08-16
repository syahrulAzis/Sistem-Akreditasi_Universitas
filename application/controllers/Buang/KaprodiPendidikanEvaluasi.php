<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaprodiPendidikanEvaluasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_kaprodipendidikanevaluasi');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan_nilai', [
            'prodi_id' => $this->session->userdata('prodi_id'),
            'is_active_pendidikan' => 1
        ])->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('kaprodi/pevaluasi/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_pendidikan_nilai)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_kaprodipendidikanevaluasi->getSinglePendidikan('id_pendidikan_nilai', $id_pendidikan_nilai);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_kaprodipendidikanevaluasi->getAlldokumen('pendidikan_id', $id_pendidikan_nilai);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('kaprodi/pevaluasi/detail', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_kaprodipendidikanevaluasi->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // var_dump($data);
        // die;

        $this->load->view('template/header', $sess);
        $this->load->view('kaprodi/pevaluasi/detailDokumen', $data);
        $this->load->view('template/footer');
    }
}
