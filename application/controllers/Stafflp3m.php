<?php
class Stafflp3m extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_stafflp3m');
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

        $query = $this->M_stafflp3m->getStandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanStandar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/standar', $data);
        $this->load->view('template/footer');
    }

    public function rapat()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getStandar();
        $data['standar'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanStandar ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('rapat', $data);
        $this->load->view('template/footer');
    }

    public function DetailStandar($id_standar)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleStandar('id_standar', $id_standar);
        $data['standar'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailStandar ' . $id_standar,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/detailstandar', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanMP()
    {

        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['mp'] = $this->M_stafflp3m->getMp();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanMP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/mp', $data);
        $this->load->view('template/footer');
    }

    public function DetailMP($id_mp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleMP('id_mp', $id_mp);
        $data['mp'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailMP ' . $id_mp,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/detailmp', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanSOP()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSop();
        $data['sop'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanSOP ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/sop', $data);
        $this->load->view('template/footer');
    }

    public function DetailSOP($id_sop)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleSop('id_sop', $id_sop);
        $data['sop'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailSOP ' . $id_sop,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/detailsop', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanFormulir()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getFormulir();
        $data['formulir'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanFormulir ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/formulir', $data);
        $this->load->view('template/footer');
    }

    public function DetailFormulir($id_formulir)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleFormulir('id_formulir', $id_formulir);
        $data['formulir'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailFormulir ' . $id_formulir,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/detailformulir', $data);
        $this->load->view('template/footer');
    }

    public function PenetapanPedoman()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getPedoman();
        $data['pedoman'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PenetapanPedoman ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/pedoman', $data);
        $this->load->view('template/footer');
    }

    public function DetailPedoman($id_pedoman)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSinglePedoman('id_pedoman', $id_pedoman);
        $data['pedoman'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPedoman ' . $id_pedoman,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/penetapan/detailpedoman', $data);
        $this->load->view('template/footer');
    }

    public function PelaksanaanPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PelaksanaanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPelaksanaan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPelaksanaan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function UnggahDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil list dokumen yg udah diupload
        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
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

            $cek = $this->M_stafflp3m->uploadDokumen($post);

            //log pelaksanaan
            $isi_log = [
                'log_pelaksanaan' => $this->session->userdata('id')
            ];
            $this->db->where('id_transaksi_pendidikan', $id_transaksi_pendidikan);
            $this->db->update('pendidikan_transaksi', $isi_log);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'uploaded dokumen ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/DetailPendidikanPelaksanaan/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanPelaksanaan/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/unggahdokumen', $data);
        $this->load->view('template/footer');
    }

    public function RemoveDokumen($id_file)
    {
        $result = $this->M_stafflp3m->deletefile($id_file);

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

        redirect('Stafflp3m/PelaksanaanPendidikan');
    }

    public function PelaksanaanLampiran($id_pendidikan)
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
            'message' => 'open PelaksanaanLampiran ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/pelaksanaanlampiran', $data);
        $this->load->view('template/footer');
    }

    public function TambahLampiran($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['pendidikan_id'] = $id_pendidikan;

        if ($this->input->post()) {
            $balik = $this->input->post('pendidikan_id');

            $post['pendidikan_id'] = $this->input->post('pendidikan_id');
            $post['nama_lampiran'] = $this->input->post('nama_lampiran');
            $post['deskripsi_lampiran'] = $this->input->post('deskripsi_lampiran');
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

            $cek = $this->M_stafflp3m->uploadLampiran($post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Lampiran ' . $post . $id_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/PelaksanaanLampiran/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/PelaksanaanLampiran/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/unggahlampiran', $data);
        $this->load->view('template/footer');
    }

    public function HapusLampiran($id_pendidikan_lampiran)
    {
        $result = $this->M_stafflp3m->deletelampiran($id_pendidikan_lampiran);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Lampiran ' . $id_pendidikan_lampiran,
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

        redirect('Stafflp3m/PelaksanaanPendidikan');
    }

    public function EvaluasiLampiran($id_pendidikan)
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
            'message' => 'open EvaluasiLampiran ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pelaksanaan/pelaksanaanlampiran', $data);
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
        $this->load->view('stafflp3m/pelaksanaan/pelaksanaanlampiran', $data);
        $this->load->view('template/footer');
    }

    public function EvaluasiPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open EvaluasiPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/evaluasi/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanEvaluasi ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/evaluasi/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function EvaluasiDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_stafflp3m->getStatus();
        $data['ambilstatus'] = $query->result_array();

        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['status_id'] = $this->input->post('status_id');
            $post['akar_masalah'] = $this->input->post('akar_masalah');
            $post['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');
            $post['capaian'] = $this->input->post('capaian');

            $cek = $this->M_stafflp3m->nilaiDokumen($id_transaksi_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update evaluasi dokumen ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/DetailPendidikanEvaluasi/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanEvaluasi/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/evaluasi/evaluasidokumen', $data);
        $this->load->view('template/footer');
    }

    public function HasilPendidikanEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPendidikanEValuasi ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/evaluasi/hasilpendidikanevaluasi', $data);
        $this->load->view('template/footer');
    }

    public function MutuEvaluasi($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
        $this->load->view('stafflp3m/evaluasi/mutuevaluasi', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PengendalianPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function DetailPendidikanPengendalian($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_stafflp3m->DokumenPengendalian('pendidikan_id', $id_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DetailPendidikanPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/detailpendidikan', $data);
        $this->load->view('template/footer');
    }

    public function HasilPengendalian($id_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->M_stafflp3m->DokumenPengendalian('pendidikan_id', $id_pendidikan);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open HasilPengendalian ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/hasilpengendalian', $data);
        $this->load->view('template/footer');
    }

    public function MutuPengendalian($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
        $this->load->view('stafflp3m/pengendalian/mutupengendalian', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianJadwalPerbaikan($id_transaksi_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_stafflp3m->getUser();
        $data['ambiluser'] = $query->result_array();

        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
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

            $cek = $this->M_stafflp3m->nilaiDokumen($id_transaksi_pendidikan, $post);

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
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/perbaikan', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianJadwalPengendalian($id_transaksi_pendidikan)
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        //ambil semua data status 
        $query = $this->M_stafflp3m->getUser();
        $data['ambiluser'] = $query->result_array();

        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
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

            $cek = $this->M_stafflp3m->nilaiDokumen($id_transaksi_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update PengendalianJadwalPengendalian ' . $id_transaksi_pendidikan . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/pengendalian', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianUnggahPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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

            $cek = $this->M_stafflp3m->uploadDokumen($post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'uploaded dokumen perbaiakn ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $balik);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $balik);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/unggahperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function RemovePerbaikan($id_file)
    {
        $result = $this->M_stafflp3m->deletefile($id_file);

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

        redirect('Stafflp3m/PengendalianPendidikan');
    }

    public function PengendalianNilaiPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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

        //ambil semua data status 
        $query = $this->M_stafflp3m->getStatus();
        $data['ambilstatus'] = $query->result_array();

        if ($this->input->post()) {
            // $post['user_id'] = $this->session->userdata('id');
            $idp = $this->input->post('pendidikan_id');

            $post['status_perbaikan'] = $this->input->post('status_perbaikan');
            $post['masalah_perbaikan'] = $this->input->post('masalah_perbaikan');
            $post['perbaikan_dokumen'] = $this->input->post('perbaikan_dokumen');
            $post['capaian_perbaikan'] = $this->input->post('capaian_perbaikan');

            $cek = $this->M_stafflp3m->nilaiDokumen($id_transaksi_pendidikan, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update PengendlaianNilaiPerbaikan ' . $post . $id_transaksi_pendidikan,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('Stafflp3m/DetailPendidikanPengendalian/' . $idp);
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/nilaiperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function PengendalianDetailDokumen($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
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
            'message' => 'open PengendlaianDetailDokumen ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/hasildokumenpengendalian', $data);
        $this->load->view('template/footer');
    }

    public function DokumenMonev($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 1
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DokumenMonev ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/dokumenmonev', $data);
        $this->load->view('template/footer');
    }

    public function DokumenPerbaikan($id_transaksi_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_stafflp3m->getSingleDokumen('id_transaksi_pendidikan', $id_transaksi_pendidikan);
        $data['dokumen'] = $query->row_array();

        // //ambil data pendidikan
        $data['listdoc'] = $this->db->get_where('pendidikan_file', [
            'transaksi_pendidikan_id' => $id_transaksi_pendidikan,
            'type_file' => 2
        ])->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open DOkumen Perbaiakn ' . $id_transaksi_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/pengendalian/dokumenperbaikan', $data);
        $this->load->view('template/footer');
    }

    public function PeningkatanPendidikan()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data pendidikan
        $data['pendidikan'] = $this->db->get_where('pendidikan', [
            // 'prodi_id' => $this->session->userdata('prodi_id'),
            // 'is_active_pendidikan' => 1
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open PeningkatanPendidikan ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/peningkatan/pendidikan', $data);
        $this->load->view('template/footer');
    }

    public function ReportPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

        //ambil semua data dokumen yang ada di tabel pendidikan_transaksi yang punya id $id_pendidikan
        $data['dokumen'] = $this->db->get_where('pendidikan_transaksi', [
            'pendidikan_id' => $id_pendidikan,
            // 'role_id' => $this->session->userdata('role_id')
        ])->result_array();

        //hitung jumlah dokumen
        $data['total_asset'] = $this->M_stafflp3m->hitungJumlahDokumen();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open ReportPeningkatan ' . $id_pendidikan,
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/peningkatan/reportpeningkatan', $data);
        $this->load->view('template/footer');
    }

    public function MutuPeningkatan($id_pendidikan)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // //ambil data satu baris dari tabel pendidikan
        $data['pendidikan'] = $this->M_stafflp3m->getSinglePendidikan('id_pendidikan', $id_pendidikan);

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
            'message' => 'open MutuPeningkatan ',
        ];
        $this->db->insert('user_log', $log);

        //tampilan
        $this->load->view('template/header', $sess);
        $this->load->view('stafflp3m/peningkatan/mutupeningkatan', $data);
        $this->load->view('template/footer');
    }
}
