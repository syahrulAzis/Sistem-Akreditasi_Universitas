<?php

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_menu');
    }

    public function index()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_menu->getMenu();
        $data['menu'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open Menu ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('menu/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('menu/add');
            $this->load->view('template/footer');
        } else {
            $data['menu'] = $this->input->post('menu');
            $data['icon'] = $this->input->post('icon');

            $cek = $this->M_menu->insertMenu($data);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add Menu ' . $data,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil disimpan !
                    </div>');
                redirect('menu');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal disimpan !
                </div>');
                redirect('menu');
            }
        }
    }

    public function update($id)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_menu->getSingleMenu('id', $id);
        $data['menu'] = $query->row_array();

        if ($this->input->post()) {
            $post['menu'] = $this->input->post('menu');
            $post['icon'] = $this->input->post('icon');

            $cek = $this->M_menu->updateMenu($id, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update Menu ' . $post . $id,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('menu');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('menu');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('menu/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $result = $this->M_menu->deleteMenu($id);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete Menu ' . $id,
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

        redirect('menu');
    }
}
