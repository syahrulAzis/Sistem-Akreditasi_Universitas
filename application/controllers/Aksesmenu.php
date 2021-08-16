<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksesmenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();

        $this->load->model('M_aksesmenu');
    }

    public function index()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_aksesmenu->getAksesmenu();
        $data['aksesmenu'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open aksesmenu',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('aksesmenu/index', $data);
        $this->load->view('template/footer');
    }

    public function access($role_id)
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data user_role yang id nya $role_id
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        //ambil data menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open submenu access',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('aksesmenu/access', $data);
        $this->load->view('template/footer');
    }

    public function changeaccess()
    {
        $menuId = $this->input->post('menuId');
        $roleId = $this->input->post('roleId');

        $data = [
            'role_id' => $roleId,
            'menu_id' => $menuId
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'has changed access' . $menuId . ' for ' . $roleId,
        ];
        $this->db->insert('user_log', $log);

        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
    }

    public function add()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('aksesmenu/add');
            $this->load->view('template/footer');
        } else {
            $data['role'] = $this->input->post('role');

            $cek = $this->M_aksesmenu->insertRole($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add aksesmenu ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('aksesmenu');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('aksesmenu');
            }
        }
    }

    public function update($id)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_aksesmenu->getSingleaksesmenu('id', $id);
        $data['role'] = $query->row_array();

        if ($this->input->post()) {
            $post['role'] = $this->input->post('role');

            $cek = $this->M_aksesmenu->updateAksesmenu($id, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update aksesmenu ' . $post . ' for ' . $id,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('aksesmenu');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('aksesmenu');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('aksesmenu/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $result = $this->M_aksesmenu->deleteAksesmenu($id);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'has deleted data ' . $id,
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

        redirect('aksesmenu');
    }
}
