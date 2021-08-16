<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tupevaluasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_tupevaluasi');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_tupevaluasi->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('tu/pendidikan/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_tupevaluasi->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_tupevaluasi->getAlldokumen('pendidikan_id', $id_pendidikan);

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_tupevaluasi->hitungJumlahDokumen();

        //ambil semua data pendidikan yang punya id $id_pendidikan si user
        $data['ambilpendidikan'] = $this->db->get_where('pendidikan', [
            'user_id' => $this->session->userdata('id')
        ])->result_array();

        //ambil semua data aspek 
        $query = $this->M_tupevaluasi->getAspek();
        $data['ambilaspek'] = $query->result_array();

        //ambil semua data dokumen 
        $query = $this->M_tupevaluasi->getDokumen();
        $data['ambildokumen'] = $query->result_array();

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('tu/pendidikan/detail', $data);
        $this->load->view('template/footer');

        if ($this->input->post()) {
            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['aspek_id'] = $this->input->post('aspek_id');
            $post['dokumen_id'] = $this->input->post('dokumen_id');
            $post['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pendidikan/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            } else {
                $post['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_tupevaluasi->insertDokumen($post);

            //log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add new data to the Pendidikan_transaksi table ' . $post['pendidikan_id'] . ' ' . $post['aspek_id'] . ' ' . $post['dokumen_id'] . ' ' . $post['keterangan_dokumen'] . ' ' . $post['file'],
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data berhasil disimpan !
                </div>');
                redirect('Tupevaluasi/detail/' . $id_pendidikan);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Tupevaluasi/detail/' . $id_pendidikan);
            }
        }
    }
}
