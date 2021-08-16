<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_pendidikan');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['pendidikan'] = $this->M_pendidikan->getPendidikan();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_pendidikan->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Pendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('pendidikan/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['standar'] = $this->db->get('standar')->result_array();

        $data['aspekdok'] = $this->M_pendidikan->getDokumenaspek();

        $this->form_validation->set_rules('des_pendidikan', 'deskripsi', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'tahun_ajaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('pendidikan/add', $data);
            $this->load->view('template/footer');
        } else {

            $time = time();
            $date = date('Ymd');
            $user = $this->session->userdata('id');
            $kode = $user . $date . $time;

            $post = [
                'object_id_pendidikan' => $kode,
                'des_pendidikan' => $this->input->post('des_pendidikan'),
                'standar_id' => $this->input->post('standar_id'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'periode' => $this->input->post('periode'),
                'kegiatan' => $this->input->post('kegiatan'),
                'fakultas_id' => $this->input->post('fakultas_id'),
                'prodi_id' => $this->input->post('prodi_id'),
                'user_id' => $this->session->userdata('id'),
                'is_active_pendidikan' => $this->input->post('is_active_pendidikan'),
            ];

            $this->db->insert('pendidikan', $post);

            //log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add new data to the Pendidikan table ' . $post['object_id_pendidikan'] . ' ' . $post['des_pendidikan'] . ' ' . $post['tahun_ajaran'] . ' ' . $post['periode'] . ' ' . $post['kegiatan'] . ' ' . $post['fakultas_id'] . ' ' . $post['prodi_id'],
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
            redirect('pendidikan');
        }
    }

    public function update($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['standar'] = $this->db->get('standar')->result_array();

        $query = $this->M_pendidikan->getPendidikanedit('id_pendidikan', $id_pendidikan);
        $data['pendidikan'] = $query->row_array();

        if ($this->input->post()) {
            $post = [
                'des_pendidikan' => $this->input->post('des_pendidikan'),
                'standar_id' => $this->input->post('standar_id'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'periode' => $this->input->post('periode'),
                'kegiatan' => $this->input->post('kegiatan'),
                'fakultas_id' => $this->input->post('fakultas_id'),
                'prodi_id' => $this->input->post('prodi_id'),
                'user_id' => $this->session->userdata('id'),
                'is_active_pendidikan' => $this->input->post('is_active_pendidikan'),
            ];

            $cek = $this->M_pendidikan->updatePendidikan($id_pendidikan, $post);

            //log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'has updated the data in the Pendidikan table ' . $post['des_pendidikan'] . ' ' . $post['tahun_ajaran'] . ' ' . $post['periode'] . ' ' . $post['kegiatan'] . ' ' . $post['fakultas_id'] . ' ' . $post['prodi_id'],
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('pendidikan');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('pendidikan');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('pendidikan/edit', $data);
        $this->load->view('template/footer');
    }

    public function deletedokumen($id_transaksi_pendidikan)
    {
        $result = $this->M_pendidikan->deleteDokumen($id_transaksi_pendidikan);

        //log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'deleted data ' . $$id_transaksi_pendidikan . ' in the Pendidikan_transaksi table',
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
        redirect('pendidikan');
    }

    public function detail($id_pendidikan)
    { //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_pendidikan->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_pendidikan->getAlldokumen('pendidikan_id', $id_pendidikan);

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_pendidikan->hitungJumlahDokumen();

        //ambil semua data pendidikan yang punya id $id_pendidikan si user
        $data['ambilpendidikan'] = $this->db->get_where('pendidikan', [
            'user_id' => $this->session->userdata('id')
        ])->result_array();

        //ambil semua data aspek 
        $query = $this->M_pendidikan->getAspek();
        $data['ambilaspek'] = $query->result_array();

        //ambil semua data dokumen 
        $query = $this->M_pendidikan->getDokumen();
        $data['ambildokumen'] = $query->result_array();

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('pendidikan/detail', $data);
        $this->load->view('template/footer');

        if ($this->input->post()) {
            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['aspek_id'] = $this->input->post('aspek_id');
            $post['dokumen_id'] = $this->input->post('dokumen_id');
            $post['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');
            $post['user_id'] = $this->session->userdata('id');

            $cek = $this->M_pendidikan->insertDokumen($post);

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
                redirect('pendidikan/detail/' . $id_pendidikan);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('pendidikan/detail/' . $id_pendidikan);
            }
        }
    }

    public function adddokumen($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_pendidikan->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data pendidikan yang punya id $id_pendidikan si user
        $data['ambilpendidikan'] = $this->db->get_where('pendidikan', [
            'user_id' => $this->session->userdata('id')
        ])->result_array();

        //ambil semua data aspek 
        $query = $this->M_pendidikan->getAspek();
        $data['ambilaspek'] = $query->result_array();

        //ambil semua data dokumen 
        $query = $this->M_pendidikan->getDokumen();
        $data['ambildokumen'] = $query->result_array();

        //kirim data role
        $data['role'] = $this->db->get('user_role')->result_array();

        // //data jad
        // $data['isi_jad'] = $this->db->get_where('pendidikan_jad_t', ['id_transaksi_pendidikan' => $id_pendidikan])->row_array();

        // //ambil jad
        // $query = $this->M_pendidikan->getJad();
        // $data['jad'] = $query->result_array();

        // //data borang
        // $data['isi_borang'] = $this->db->get_where('pendidikan_borang_t', ['id_transaksi_pendidikan' => $id_pendidikan])->row_array();

        // //ambil borang
        // $query = $this->M_pendidikan->getBorang();
        // $data['borang'] = $query->result_array();

        $this->load->view('template/header', $sess);
        $this->load->view('pendidikan/adddokumen', $data);
        $this->load->view('template/footer');
    }

    public function changejad()
    {
        $id_transaksi_pendidikan = $this->input->post('pendidikanId');
        $id_jad = $this->input->post('jadId');

        $data = [
            'id_transaksi_pendidikan' => $id_transaksi_pendidikan,
            'id_jad' => $id_jad
        ];

        $result = $this->db->get_where('pendidikan_jad_t', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('pendidikan_jad_t', $data);
        } else {
            $this->db->delete('pendidikan_jad_t', $data);
        }

        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
    }

    public function prosesadddokumen()
    {
        if ($this->input->post()) {
            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['aspek_id'] = $this->input->post('aspek_id');
            $post['dokumen_id'] = $this->input->post('dokumen_id');
            $post['role_id'] = $this->input->post('role_id');
            $post['target'] = $this->input->post('target');
            // $post['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');
            //$post['user_id'] = $this->session->userdata('id');

            $idb = $this->input->post('pendidikan_id');

            // var_dump($post);
            // die;
            $cek = $this->M_pendidikan->insertDokumen($post);

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
                redirect('pendidikan/detail/' . $idb);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('pendidikan/detail/' . $idb);
            }
        }
    }

    public function generatedokumen($id_pendidikan)
    {
        //ambil semua data dokumen 
        $query = $this->M_pendidikan->getDokumen();
        $data['ambildokumen'] = $query->result_array();

        $data['pendidikan'] = $id_pendidikan;

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'generate dokumen to ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('pendidikan/generate', $data);
    }

    public function delete($id_pendidikan)
    {
        $result = $this->M_pendidikan->deletePendidikan($id_pendidikan);

        // //hapus semua dokumen nya
        // $this->db->like('id_transaksi_pendidikan', $id_pendidikan);
        // $this->db->from('pendidikan_transaksi');
        // $jumlah = $this->db->count_all_results();

        // if ($jumlah != 0) {
        //     // foreach ($jumlah as $j) {
        //     //     $this->M_pendidikan->deletedokall($id_pendidikan);
        //     // }

        //     while ($jumlah < $jumlah) {
        //         $this->M_pendidikan->deletedokall($id_pendidikan);
        //     }
        // }

        //log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'deleted data ' . $id_pendidikan . ' in the Pendidikan table',
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

        redirect('pendidikan');
    }

    public function detaildokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        // $data['dokumen'] = $this->M_pendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $query = $this->M_pendidikan->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailDokumen ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('pendidikan/dokumen', $data);
        $this->load->view('template/footer');
    }
}
