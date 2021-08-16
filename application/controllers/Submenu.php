<?php

class Submenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_submenu');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['submenu'] = $this->M_submenu->getSubmenu();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Submenu ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('submenu/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('submenu/add', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Submenu ' . $data,
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
            redirect('submenu');
        }
    }

    public function update($id)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_submenu->getSingleSubmenu('id', $id);
        $data['submenu'] = $query->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        if ($this->input->post()) {
            $post['title'] = $this->input->post('title');
            $post['menu_id'] = $this->input->post('menu_id');
            $post['url'] = $this->input->post('url');
            $post['is_active'] = $this->input->post('is_active');

            $cek = $this->M_submenu->updateSubmenu($id, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update submenu ' . $post . $id,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('submenu');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('submenu');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('submenu/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $result = $this->M_submenu->deleteSubmenu($id);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete submenu ' . $id,
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

        redirect('submenu');
    }
}
