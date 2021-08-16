<?php
class Gkm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_gkm');
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

        $query = $this->M_gkm->getStandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanStandar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/standar', $data);
        $this->load->view('template/footer');
    }

    public function DetailStandar($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailStandar ' . $id_standar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/detailstandar', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanMP()
    {

        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['mp'] = $this->M_gkm->getMp();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanMP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/mp', $data);
        $this->load->view('template/footer');
    }

    public function DetailMP($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleMP('id_mp', $id_mp);
        $data['mp'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailMP ' . $id_mp,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/detailmp', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanSOP()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSop();
        $data['sop'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanSOP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/sop', $data);
        $this->load->view('template/footer');
    }

    public function DetailSOP($id_sop)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleSop('id_sop', $id_sop);
        $data['sop'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailSOP ' . $id_sop,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/detailsop', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanFormulir()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getFormulir();
        $data['formulir'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanFormulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/formulir', $data);
        $this->load->view('template/footer');
    }

    public function DetailFormulir($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailFormulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/detailformulir', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanPedoman()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getPedoman();
        $data['pedoman'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanPedoman ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/pedoman', $data);
        $this->load->view('template/footer');
    }

    public function DetailPedoman($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPedoman ' . $id_pedoman,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/penetapan/detailpedoman', $data);
        $this->load->view('template/footer');
    }

    //pelaksanaan

    public function PelaksanaanPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PelaksanaanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pelaksanaan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPelaksanaan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPelaksanaan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pelaksanaan/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function HasilPelaksanaan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPelaksanaan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pelaksanaan/hasilpelaksanaan', $data);
        $this->load->view('template/footer');
    }

    public function UnggahDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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

            $cek = $this->M_gkm->uploadDokumen($post);

            //log pelaksanaan
            $isi_log = [
                'log_pelaksanaan' => $this->session->userdata('id')
            ];

            $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
            $this->db->update('pendidikan_transaksi', $isi_log);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'uploaded Dokumen ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Gkm/DetailPendidikanPelaksanaan/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Gkm/DetailPendidikanPelaksanaan/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pelaksanaan/unggahdokumen', $data);
        $this->load->view('template/footer');
    }

    public function RemoveDokumen($id_file)
    {
        $result = $this->M_gkm->deletefile($id_file);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'remove file ' . $id_file,
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

        redirect('Gkm/PelaksanaanPendidikan');
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
            'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open EvaluasiPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/evaluasi/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function HasilPendidikanEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPendidikanEvaluasi ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/evaluasi/hasilpendidikanevaluasi', $data);
        $this->load->view('template/footer');
    }

    public function MutuEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
        $this->load->view('gkm/evaluasi/mutuevaluasi', $data);
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
            'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PengendalianPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPengendalian($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_gkm->DokumenPengendalian('pendidikan_id', $id_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function HasilPengendalian($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_gkm->DokumenPengendalian('pendidikan_id', $id_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/hasilpengendalian', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianJadwalPerbaikan($id_transaksi_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_gkm->getUser();
        $data['ambiluser'] = $query->result_array();

        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'user_id' => $this->session->userdata('id'),
            // 'is_active_pendidikan' => 1
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['rencana_perbaikan'] = $this->input->post('rencana_perbaikan');
            $post['jadwal_perbaikan'] = $this->input->post('jadwal_perbaikan');
            $post['penanggung_jawab_perbaikan'] = $this->input->post('penanggung_jawab_perbaikan');

            $cek = $this->M_gkm->nilaiDokumen($id_transaksi_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update PengendalianJadwalPerbaikan ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/perbaikan', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianJadwalPengendalian($id_transaksi_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_gkm->getUser();
        $data['ambiluser'] = $query->result_array();

        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'user_id' => $this->session->userdata('id'),
            // 'is_active_pendidikan' => 1
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['rencana_pengendalian'] = $this->input->post('rencana_pengendalian');
            $post['jadwal_pengendalian'] = $this->input->post('jadwal_pengendalian');
            $post['penanggung_jawab_pengendalian'] = $this->input->post('penanggung_jawab_pengendalian');

            $cek = $this->M_gkm->nilaiDokumen($id_transaksi_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update PengendalianJadwalPengendalian ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/pengendalian', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianDetailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        // //ambil data pendidikan
        $data['listdocperbaikan'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 2
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PengendalianDetailDokumen ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/hasildokumenpengendalian', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianUnggahPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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

            $cek = $this->M_gkm->uploadDokumen($post);

            //log pengendalian
            $isi_log = [
                'log_pengendalian' => $this->session->userdata('id')
            ];

            $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
            $this->db->update('pendidikan_transaksi', $isi_log);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'upload pengendalian dokumen ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Gkm/DetailPendidikanPengendalian/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/unggahperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function RemovePerbaikan($id_file)
    {
        $result = $this->M_gkm->deletefile($id_file);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete file pengendalian ' . $id_file,
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

        redirect('Gkm/PengendalianPendidikan');
    }

    public function DokumenMonev($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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
        $this->load->view('gkm/pengendalian/dokumenmonev', $data);
        $this->load->view('template/footer');
    }

    public function DokumenPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_gkm->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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
        $this->load->view('gkm/pengendalian/dokumenperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function MutuPengendalian($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
            'message' => 'open MutuPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/pengendalian/mutupengendalian', $data);
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
            'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PeningkatanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('gkm/peningkatan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function ReportPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_gkm->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open ReportPeningkatan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('gkm/peningkatan/reportpeningkatan', $data);
        $this->load->view('template/footer');
    }

    public function MutuPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_gkm->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
        $this->load->view('gkm/peningkatan/mutupeningkatan', $data);
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
        $this->load->view('gkm/lampiran/lampirandokumen', $data);
        $this->load->view('template/footer');
    }
}
