<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsesorPendidikanEvaluasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_asesorpendidikanevaluasi');
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

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_asesorpendidikanevaluasi->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/pevaluasi/index', $data);
        $this->load->view('template/footer');
    }

    public function nilai($id_pendidikan_nilai)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanevaluasi->getSinglePendidikan('id_pendidikan_nilai', $id_pendidikan_nilai);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorpendidikanevaluasi->getAlldokumen('pendidikan_id', $id_pendidikan_nilai);

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_asesorpendidikanevaluasi->hitungJumlahDokumen();

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/pevaluasi/nilaiall', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_pendidikan_nilai)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanevaluasi->getSinglePendidikan('id_pendidikan_nilai', $id_pendidikan_nilai);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_asesorpendidikanevaluasi->getAlldokumen('pendidikan_id', $id_pendidikan_nilai);

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_asesorpendidikanevaluasi->hitungJumlahDokumen();

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('asesor/pevaluasi/detail', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorpendidikanevaluasi->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/pevaluasi/detaildokumen', $data);
        $this->load->view('template/footer');
    }

    public function nilaiDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_asesorpendidikanevaluasi->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_asesorpendidikanevaluasi->getStatus();
        $data['ambilstatus'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['status_id'] = $this->input->post('status_id');
            $post['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');

            $cek = $this->M_asesorpendidikanevaluasi->nilaiDokumen($id_transaksi_pendidikan, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('AsesorPendidikanEvaluasi/nilai/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('AsesorPendidikanEvaluasi/nilai/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('asesor/pevaluasi/nilai', $data);
        $this->load->view('template/footer');
    }

    public function sendPendidikan($id_pendidikan_nilai)
    {
        //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_asesorpendidikanevaluasi->getOnePendidikan('id_pendidikan_nilai', $id_pendidikan_nilai);

        $this->load->view('asesor/pevaluasi/sendPendidikan', $data);
    }
}
