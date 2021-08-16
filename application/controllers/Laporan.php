<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_laporan');
    }

    public function index()
    {
        $data['lp'] = $this->M_laporan->getLaporan();

        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open laporan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('laporan/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id_laporan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['lp'] = $this->M_laporan->getSingleLaporan('id_laporan', $id_laporan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail laporan ' . $id_laporan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('laporan/detail', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data standar
        $standar['standar'] = $this->db->get('standar')->result_array();

        if ($this->input->post()) {
            $data['standar_id'] = $this->input->post('standar_id');
            $data['nama_laporan'] = $this->input->post('nama_laporan');
            $data['unit_laporan'] = $this->input->post('unit_laporan');
            $data['thn_akademik'] = $this->input->post('thn_akademik');
            $data['semester'] = $this->input->post('semester');
            $data['tahun_laporan'] = $this->input->post('tahun_laporan');
            $data['penyusun_laporan'] = $this->input->post('penyusun_laporan');
            $data['tgl_pengesahan'] = $this->input->post('tgl_pengesahan');
            $data['vol'] = $this->input->post('vol');
            $data['sifat'] = $this->input->post('sifat');
            $data['jenis_laporan'] = $this->input->post('jenis_laporan');
            $data['kategori_laporan'] = $this->input->post('kategori_laporan');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/laporan/';
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

            $cek = $this->M_laporan->insertLaporan($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Laporan ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Laporan');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Laporan');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('laporan/add', $standar);
        $this->load->view('template/footer');
    }

    public function delete($id_laporan)
    {
        $result = $this->M_laporan->deleteLaporan($id_laporan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete laporan ' . $id_laporan,
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

        redirect('Laporan');
    }
}