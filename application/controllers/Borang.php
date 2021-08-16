<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Borang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_borang');
    }

    public function index()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_borang->getBorang();
        $data['borang'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open borang menu ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('borang/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //rule
        $this->form_validation->set_rules('kode_borang', 'kode', 'required');
        $this->form_validation->set_rules('ket_kborang', 'keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('borang/add');
            $this->load->view('template/footer');
        } else {
            $data['kode_borang'] = $this->input->post('kode_borang');
            $data['ket_kborang'] = $this->input->post('ket_kborang');
            $data['user_id'] = $this->session->userdata('id');

            $cek = $this->M_borang->insertBorang($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add borang ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('borang');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('borang');
            }
        }
    }

    public function edit($id_kborang)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data aspek
        $query = $this->M_borang->getSingleborang('id_kborang', $id_kborang);
        $data['borang'] = $query->row_array();

        if ($this->input->post()) {
            $post['kode_borang'] = $this->input->post('kode_borang');
            $post['ket_kborang'] = $this->input->post('ket_kborang');
            $post['user_id'] = $this->session->userdata('id');

            $cek = $this->M_borang->updateborang($id_kborang, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update borang ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('borang');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('borang');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('borang/edit', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_kborang)
    {
        $result = $this->M_borang->deleteBorang($id_kborang);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete borang ' . $id_kborang,
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

        redirect('borang');
    }

    public function transaksiborang()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data pendidikan
        $query = $this->M_borang->getTransaksiBorang();
        $data['borang'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open transaksiborang ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('borang/transaksiborang', $data);
        $this->load->view('template/footer');
    }

    public function addtransaksi()
    {
        //data session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['dokumen'] = $this->db->get('pendidikan_dokumen')->result_array();

        //ambil semua data dokumen 
        $query = $this->M_borang->getBorang();
        $data['borang'] = $query->result_array();

        //rule
        $this->form_validation->set_rules('id_dokumen_pendidikan', 'dokumen', 'required');
        $this->form_validation->set_rules('id_kborang', 'kode_borang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('borang/addtransaksi', $data);
            $this->load->view('template/footer');
        } else {
            $post['id_dokumen_pendidikan'] = $this->input->post('id_dokumen_pendidikan');
            $post['id_kborang'] = $this->input->post('id_kborang');

            $cek = $this->M_borang->insertTransaksiBorang($post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add transaksi borang ' . $post,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('borang/transaksiborang');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('borang/transaksiborang');
            }
        }
    }

    public function deletetransaksi($id_btp)
    {
        $result = $this->M_borang->deletetransaksi($id_btp);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete transaksi borang ' . $id_btp,
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

        redirect('borang/transaksiborang');
    }
}
