<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_profil');
    }

    public function index()
    {
        //sess
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data profil
        $aktif = array(
            'email' => $this->session->userdata('email')
        );
        $data['profil'] = $this->M_profil->getProfil($aktif);

        // //ambil data log user
        // $data['log'] = $this->db->get_where('user_log', [
        //     'user_id' => $this->session->userdata('id')
        // ])->result_array();

        //ambil data profil
        $l = array(
            'user_id' => $this->session->userdata('id')
        );
        $data['log'] = $this->M_profil->getLoguser($l);

        //ambil data sistem
        $this->load->library('user_agent');
        $data['browser'] = $this->agent->browser();
        $data['browser_version'] = $this->agent->version();
        $data['os'] = $this->agent->platform();
        $data['ip_address'] = $this->input->ip_address();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Profil ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('profil/index', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data dari prodi dan fakultas
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['fakultas'] = $this->db->get('fakultas')->result_array();

        //pengecekan form 
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('no', 'No', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('bio_user', 'Bio', 'required|max_length[50]');


        //logika form validasi
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('profil/edit', $data);
            $this->load->view('template/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $bio_user = $this->input->post('bio_user');
            $no = $this->input->post('no');
            $phone = $this->input->post('phone');
            $prodi_id = $this->input->post('prodi_id');
            $fakultas_id = $this->input->post('fakultas_id');

            //cek gambar dan file upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './unggah/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //hapus gambar lama
                    $old_image = $sess['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'unggah/profile' . $old_image);
                    }

                    //upload gambar
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('address', $address);
            $this->db->set('no', $no);
            $this->db->set('phone', $phone);
            $this->db->set('bio_user', $bio_user);
            $this->db->set('name', $name);
            $this->db->set('prodi_id', $prodi_id);
            $this->db->set('fakultas_id', $fakultas_id);
            $this->db->where('email', $email);
            $this->db->update('user');

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'edited the profile to ' . $name . ' ' . $email . ' ' . $address . ' ' . $no . ' ' . $phone . ' ' . $prodi_id . ' ' . $fakultas_id . ' ' . $new_image,
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> profil berhasil diperbaharui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('profil');
        }
    }

    public function changepassword()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('profil/changepassword', $sess);
            $this->load->view('template/footer');
        } else {
            $current_password = $this->input->post('password');
            $new_password = $this->input->post('password1');

            if (!password_verify($current_password, $sess['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-warning alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Sandi yang dimasukan salah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('profil/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-warning alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Sandi yang dimasukan tidak boleh sama.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>');
                    redirect('profil/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    //log
                    $log = [
                        'user_id' => $this->session->userdata('id'),
                        'message' => 'has changed the password',
                    ];
                    $this->db->insert('user_log', $log);

                    $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Sandi berhasil diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('profil/changepassword');
                }
            }
        }
    }

    public function upgradelist()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data upgrade list
        $data['upgradelist'] = $this->db->get_where('user_upgrade', [
            'user_email' => $this->session->userdata('email')
        ])->result_array();

        //ambil query dari data user_role 
        $data['role'] = $this->db->get('user_role')->result_array();

        $email = array(
            'user_email' =>  $this->session->userdata('email')
        );

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open upgradelist ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('profil/upgradelist', $data);
        $this->load->view('template/footer');
    }

    public function upgrade()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil query dari data user_role 
        $data['role'] = $this->db->get('user_role')->result_array();

        //rule form validasi
        $this->form_validation->set_rules('pesan', 'message', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('profil/upgrade', $data);
            $this->load->view('template/footer');
        } else {
            $role_id = $this->input->post('role_id');
            $pesan = $this->input->post('pesan');
            $user_id = $this->input->post('user_id');
            $user_email = $this->input->post('user_email');
            $status = 'Menunggu verifikasi admin';

            //cek gambar dan file upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './unggah/upgrade/';

                $this->load->library('upload', $config);

                $this->upload->do_upload('image');
                $new_image = $this->upload->data('file_name');
                $this->db->set('file', $new_image);
            }

            $this->db->set('role_id', $role_id);
            $this->db->set('pesan', $pesan);
            $this->db->set('status', $status);
            $this->db->set('user_id', $user_id);
            $this->db->set('user_email', $user_email);
            $this->db->insert('user_upgrade');

            //log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'increase user to ' . $role_id . ' ' . $pesan . ' ' . $status . ' ' . $new_image,
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata("pesan", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil dikirim !
                    </div>');
            redirect('profil/upgradelist');
        }
    }
}
