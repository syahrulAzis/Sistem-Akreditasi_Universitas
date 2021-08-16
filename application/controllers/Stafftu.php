<?php
class Stafftu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_stafftu');
    }

    public function index()
    {
        echo 'null';
    }

    public function PenetapanStandar()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getStandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanStandar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/standar', $data);
        $this->load->view('template/footer');
    }

    public function DetailStandar($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailStandar ' . $id_standar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/detailstandar', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanMP()
    {

        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['mp'] = $this->M_stafftu->getMp();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanMP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/mp', $data);
        $this->load->view('template/footer');
    }

    public function DetailMP($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleMP('id_mp', $id_mp);
        $data['mp'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailMP ' . $id_mp,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/detailmp', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanSOP()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSop();
        $data['sop'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanSOP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/sop', $data);
        $this->load->view('template/footer');
    }

    public function DetailSOP($id_sop)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleSop('id_sop', $id_sop);
        $data['sop'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailSOP ' . $id_sop,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/detailsop', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanFormulir()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getFormulir();
        $data['formulir'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanFormulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/formulir', $data);
        $this->load->view('template/footer');
    }

    public function DetailFormulir($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailFormulir ' . $id_formulir,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/detailformulir', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanPedoman()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getPedoman();
        $data['pedoman'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanPedoman ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/pedoman', $data);
        $this->load->view('template/footer');
    }

    public function DetailPedoman($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPedoman ' . $id_pedoman,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/penetapan/detailpedoman', $data);
        $this->load->view('template/footer');
    }

    //Pelaksanaan
    public function PelaksanaanPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PelaksanaanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pelaksanaan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPelaksanaan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPelaksanaan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pelaksanaan/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function UnggahDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil list dokumen yg udah diupload
        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'user_id' => $this->session->userdata('id'),
            // 'is_active_pendidikan' => 1,
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        if ($this->input->post()) {
            $balik = $this->input->post('pendidikan_id');
            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['transaksi_pendidikan_id'] = $this->input->post('transaksi_pendidikan_id');
            $post['nilai'] = $this->input->post('nilai');
            $post['user_id'] = $this->session->userdata('id');
            $post['type_file'] = 1;

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

            $cek = $this->M_stafftu->uploadDokumen($post);

            //log pelaksanaan
            $isi_log = [
                'log_pelaksanaan' => $this->session->userdata('id')
            ];

            $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
            $this->db->update('pendidikan_transaksi', $isi_log);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'upload dokumen ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafftu/DetailPendidikanPelaksanaan/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafftu/DetailPendidikanPelaksanaan/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pelaksanaan/unggahdokumen', $data);
        $this->load->view('template/footer');
    }

    public function RemoveDokumen($id_file)
    {
        $result = $this->M_stafftu->deletefile($id_file);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete dokumen ' . $id_file,
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

        redirect('Stafftu/PelaksanaanPendidikan');
    }

    //evaluasi

    public function EvaluasiPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open EvaluasiPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/evaluasi/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function HasilPendidikanEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPendidikanEValuasi ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/evaluasi/hasilpendidikanevaluasi', $data);
        $this->load->view('template/footer');
    }

    public function MutuEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //ambil data mutu
        $data['mutu'] = $this->db->get_where('pendidikan_aspek', [])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open MutuEvaluasi ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/evaluasi/mutuevaluasi', $data);
        $this->load->view('template/footer');
    }

    //pengendalian
    public function PengendalianPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PengendalianPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function MutuPengendalian($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //ambil data mutu
        $data['mutu'] = $this->db->get_where('pendidikan_aspek', [])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Mutupengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/mutupengendalian', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPengendalian($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_stafftu->DokumenPengendalian('pendidikan_id', $id_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianUnggahPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'user_id' =>  $this->session->userdata('id'),
            'type_file' => 1
        ])->result_array();

        // //ambil data pendidikan
        $data['listdocperbaikan'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'user_id' =>  $this->session->userdata('id'),
            'type_file' => 2
        ])->result_array();

        if ($this->input->post()) {
            $balik = $this->input->post('pendidikan_id');
            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['transaksi_pendidikan_id'] = $this->input->post('transaksi_pendidikan_id');
            $post['nilai'] = $this->input->post('nilai');
            $post['user_id'] = $this->session->userdata('id');
            $post['type_file'] = 2;

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

            $cek = $this->M_stafftu->uploadDokumen($post);

            //log pengendalian
            $isi_log = [
                'log_pengendalian' => $this->session->userdata('id')
            ];

            $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
            $this->db->update('pendidikan_transaksi', $isi_log);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'upload dokumen perbaikan ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);


            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafftu/DetailPendidikanPengendalian/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafftu/DetailPendidikanPengendalian/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/unggahperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function RemovePerbaikan($id_file)
    {
        $result = $this->M_stafftu->deletefile($id_file);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete file perbiakan ' . $id_file,
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

        redirect('Stafftu/PengendalianPendidikan');
    }

    public function DokumenMonev($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'user_id' =>  $this->session->userdata('id'),
            'type_file' => 1
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DokumenMonev ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/dokumenmonev', $data);
        $this->load->view('template/footer');
    }

    public function DokumenPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafftu->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'user_id' =>  $this->session->userdata('id'),
            'type_file' => 2
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DokumenPerbaikan ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/pengendalian/dokumenperbaikan', $data);
        $this->load->view('template/footer');
    }

    //peningkatan
    public function PeningkatanPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'fakultas_id' => $this->session->userdata('fakultas_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PeningkatanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/peningkatan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function ReportPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafftu->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open ReportPeningkatan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/peningkatan/reportpeningkatan', $data);
        $this->load->view('template/footer');
    }

    public function MutuPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafftu->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //ambil data mutu
        $data['mutu'] = $this->db->get_where('pendidikan_aspek', [])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open MutuPeningkatan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/peningkatan/mutupeningkatan', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianLampiran($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['lampiran'] = $this->db->get_where('pendidikan_lampiran', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            'pendidikan_id' => $id_pendidikan
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PengendalianLampiran ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafftu/lampiran/lampirandokumen', $data);
        $this->load->view('template/footer');
    }
}
