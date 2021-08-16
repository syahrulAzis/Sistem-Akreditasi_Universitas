<?php

class Hasilrapat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_hasilrapat');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_hasilrapat->getHasilrapat();
        $data['hasil_rapat'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Hasil Rapat ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('hasilrapat/index', $data);
        $this->load->view('template/footer');
    }


    public function detail($id_hasil)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_rapat->getsingleRapat('id_rapat', $id_rapat);
        $data['rapat'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail rapat ' . $id_rapat,
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('rapat/detail', $data);
        $this->load->view('template/footer');
    }
    

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        if ($this->input->post()) {
            $data['tgl_rapat'] = $this->input->post('tgl_rapat');
            $data['jns_rapat'] = $this->input->post('jns_rapat');
            $data['jns_keputusan'] = $this->input->post('jns_keputusan');
            $data['pis'] = $this->input->post('pis');
            $data['rencana_tgl_pelaksanaan'] = $this->input->post('rencana_tgl_pelaksanaan');
            $data['progres'] = $this->input->post('progres');
            $data['status'] = $this->input->post('status');
            $data['user_id'] = $this->session->userdata('id');


            
            //akhir dari konfigurasi upload

            $cek = $this->M_hasilrapat->insertHasilrapat($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add hasilrapat ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('hasilrapat');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('hasilrapat');
            }
        }

        $this->load->view('hasilrapat/add', $sess);
    }

    public function update($id_hasil)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_hasilrapat->getSingleHasilrapat('id_hasil', $id_hasil);
        $data['hasilrapat'] = $query->row_array();

        if ($this->input->post()) {
            $post['tgl_rapat'] = $this->input->post('tgl_rapat');
            $post['jns_rapat'] = $this->input->post('jns_rapat');
            $post['jns_keputusan'] = $this->input->post('jns_keputusan');
            $post['pis'] = $this->input->post('pis');
            $post['rencana_tgl_pelaksanaan'] = $this->input->post('rencana_tgl_pelaksanaan');
            $post['progres'] = $this->input->post('progres');
            $post['status'] = $this->input->post('status');
            $post['user_id'] = $this->session->userdata('id');

            
            //akhir dari konfigurasi upload

            $cek = $this->M_hasilrapat->updateHasilrapat($id_hasil, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update hasil rapat ' . $post . $id_hasil,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('hasilrapat');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('hasilrapat');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('hasilrapat/update', $data, $sess);
    }

    public function delete($id_hasil)
    {
        $result = $this->M_hasilrapat->deleteHasilrapat($id_hasil);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete hasil rapat ' . $id_hasil,
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

        redirect('hasilrapat');
    }

    public function download($id_hasil)
    {

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'download hasil rapat ' / $id_hasil,
        ];
        $this->db->insert('user_log', $log);

        $this->load->helper('download');
        $fileinfo = $this->M_hasilrapat->download($id_hasil);
        $file = 'unggah/hasilrapat/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
