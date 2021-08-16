<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeningkatanPendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_peningkatanpendidikan');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan_peningkatan', [
            'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_peningkatanpendidikan->hitungJumlahDokumen();

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/index', $data);
        $this->load->view('template/footer');
    }

    public function kelengkapan($id_pendidikan_peningkatan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_peningkatanpendidikan->getSinglePendidikan('id_pendidikan_peningkatan', $id_pendidikan_peningkatan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_peningkatanpendidikan->getAlldokumendetail('pendidikan_id', $id_pendidikan_peningkatan);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/kelengkapan', $data);
        $this->load->view('template/footer');
    }

    public function detailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_peningkatanpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/detaildokumen', $data);
        $this->load->view('template/footer');
    }

    public function pengendalian($id_pendidikan_peningkatan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_peningkatanpendidikan->getSinglePendidikan('id_pendidikan_peningkatan', $id_pendidikan_peningkatan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_peningkatanpendidikan->getAlldokumen('pendidikan_id', $id_pendidikan_peningkatan);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/pengendalian', $data);
        $this->load->view('template/footer');
    }

    public function detailPengendalian($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_peningkatanpendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/detailPengendalian', $data);
        $this->load->view('template/footer');
    }

    public function lampiran($id_pendidikan_peningkatan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_peningkatanpendidikan->getSinglePendidikan('id_pendidikan_peningkatan', $id_pendidikan_peningkatan);

        // //ambil data pendidikan
        $data['lampiran'] = $this->db->get_where('pendidikan_lampiran', [
            'pendidikan_id' => $id_pendidikan_peningkatan,
        ])->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/lampiran', $data);
        $this->load->view('template/footer');
    }

    public function tambahLampiran($id_pendidikan_peningkatan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $balik = $id_pendidikan_peningkatan;

        if ($this->input->post()) {
            $data['pendidikan_id'] = $this->input->post('pendidikan_id');
            $data['nama_lampiran'] = $this->input->post('nama_lampiran');
            $data['deskripsi_lampiran'] = $this->input->post('deskripsi_lampiran');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pendidikan/';
            $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                echo $this->upload->display_errors();
            } else {
                $data['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_peningkatanpendidikan->insertLampiran($data);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('PeningkatanPendidikan/lampiran/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('PeningkatanPendidikan/lampiran/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/tambahLampiran');
        $this->load->view('template/footer');
    }

    public function suntingLampiran($id_pendidikan_lampiran)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_peningkatanpendidikan->getSingleLampiran('id_pendidikan_lampiran', $id_pendidikan_lampiran);
        $data['lampiran'] = $query->row_array();

        if ($this->input->post()) {
            $balik = $this->input->post('pendidikan_id');
            $post['nama_lampiran'] = $this->input->post('nama_lampiran');
            $post['deskripsi_lampiran'] = $this->input->post('deskripsi_lampiran');
            $post['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/pendidikan/';
            $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|jpg|png';
            $config['max_size']             = 10024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('file');

            if (!empty($this->upload->data()['file_name'])) {
                $post['file'] = $this->upload->data()['file_name'];
            }
            //akhir dari konfigurasi upload

            $cek = $this->M_peningkatanpendidikan->updateLampiran($id_pendidikan_lampiran, $post);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('PeningkatanPendidikan/lampiran/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('PeningkatanPendidikan/lampiran/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('peningkatan/suntingLampiran', $data);
        $this->load->view('template/footer');
    }

    public function hapusLampiran($id_pendidikan_lampiran)
    {
        $result = $this->M_peningkatanpendidikan->deleteLampiran($id_pendidikan_lampiran);

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

        redirect('PeningkatanPendidikan');
    }
}
