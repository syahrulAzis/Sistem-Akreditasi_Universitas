<?php

class Docborang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_docborang');
    }

    public function index()
    {
        //ambil data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
            ])->row_array();

        $query = $this->M_docborang->getBorangdata();
        $data['borang'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open dokumen borang',
        ];
            
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('docborang/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data standar
        $sent['standar'] = $this->db->get('b_standar')->result_array();
        
        //ambil data butir
        $sent['butir'] = $this->db->get('b_butirstandar')->result_array();
        
        //ambil data fakultas
        $sent['fakultas'] = $this->db->get('fakultas')->result_array();
        
        //ambil data prodi
        $sent['prodi'] = $this->db->get('prodi')->result_array();

        if ($this->input->post()) {
            $data['bstandar_id'] = $this->input->post('bstandar_id');
            $data['butirstandar_id'] = $this->input->post('butirstandar_id');
            $data['fakultas_id'] = $this->input->post('fakultas_id');
            $data['prodi_id'] = $this->input->post('prodi_id');
            $data['kode_dokumen'] = $this->input->post('kode_dokumen');
            $data['nama_dokumen'] = $this->input->post('nama_dokumen');
            $data['tanggal_terbit'] = $this->input->post('tanggal_terbit');
            $data['periode_borang'] = $this->input->post('periode_borang');
            $data['keterangan_dokumen'] = $this->input->post('keterangan_dokumen');
            $data['user_id'] = $this->session->userdata('id');

            //konfigurasi upload dan perintah upload
            $config['upload_path']          = './unggah/borang/';
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

            $cek = $this->M_docborang->insertBorang($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add borang dokumen ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('Docborang');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('Docborang');
            }
        }


        $this->load->view('template/header', $sess);
        $this->load->view('docborang/add', $sent);
        $this->load->view('template/footer');
    }

    public function detail($id_dokumentransaksi)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_docborang->getSingleBorang('id_dokumentransaksi', $id_dokumentransaksi);
        $data['borang'] = $query->row_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open detail borang ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('docborang/detail', $data);
        $this->load->view('template/footer');
    }

    public function delete($id_dokumentransaksi)
    {
        $result = $this->M_docborang->deleteBorang($id_dokumentransaksi);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete borang dokumen ' . $id_dokumentransaksi,
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

        redirect('docborang');
    }
}