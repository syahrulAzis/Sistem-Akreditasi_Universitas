<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //cek login dan role
        is_logged_in();
        $this->load->model('M_user');
    }

    public function index()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getUser();
        $data['user'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open User ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        //ambil data dari database
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['fakultas'] = $this->db->get('fakultas')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Nama harus di isi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus di isi!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Kata sandi harus di isi!',
            'matches' => 'Kata sandi tidak sama!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Kata sandi harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('user/add', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('fakultas_id'),
                'role_id' => $this->input->post('prodi_id'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];

            //buat token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];

            $this->_sendEmail($token, 'verify');

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'add user ' . $data,
            ];
            $this->db->insert('user_log', $log);

            $this->session->set_flashdata('message', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> pengguna baru berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user');
        }
    }

    public function update($id)
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getSingleuser('id', $id);
        $data['user'] = $query->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();


        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('no', 'no', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('date_created', 'date_created', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');
        $this->form_validation->set_rules('is_active', 'is_active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('user/update', $data);
            $this->load->view('template/footer');
        } else {
            $name = $this->input->post('name');
            $address = $this->input->post('address');
            $no = $this->input->post('no');
            $email = $this->input->post('email');
            $date_created = $this->input->post('date_created');
            $phone = $this->input->post('phone');
            $role_id = $this->input->post('role_id');
            $is_active = $this->input->post(('is_active'));

            //konfigurasi image file upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './unggah/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //upload gambar
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('address', $address);
            $this->db->set('no', $no);
            $this->db->set('email', $email);
            $this->db->set('date_created', $date_created);
            $this->db->set('phone', $phone);
            $this->db->set('role_id', $role_id);
            $this->db->set('is_active', $is_active);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> profil berhasil diperbaharui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user');
        }
    }

    public function updatepass($id)
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('user/updatepass');
            $this->load->view('template/footer');
        } else {

            //buat password hash
            $new_password = $this->input->post('password1');
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            $this->db->set('password', $password_hash);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> sandi berhasil diperbaharui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('user');
        }
    }

    public function delete($id)
    {
        $result = $this->M_user->delete($id);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete user ' . $id,
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

        redirect('user');
    }

    public function requestUser()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getUserupgrade();
        $data['userupgrade'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open request user ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('user/requestuser', $data);
        $this->load->view('template/footer');
    }

    public function detailupgrade($id)
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getSinglupgrade('id', $id);
        $data['userupgrade'] = $query->row_array();

        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $sess);
            $this->load->view('user/detailupgrade', $data);
            $this->load->view('template/footer');
        } else {
            // data update user_upgrade
            $post1['user_email'] = $this->input->post('user_email');
            $post1['pesan'] = $this->input->post('pesan');
            $post1['user_id'] = $this->input->post('user_id');
            $post1['waktu'] = $this->input->post('waktu');
            $post1['role_id'] = $this->input->post('role_id');
            $post1['status'] = $this->input->post('status');

            //data update tabel user
            $email = $this->input->post('user_email');
            $post2['role_id'] = $this->input->post('role_id');

            $cek = $this->M_user->updateuserupgrade($id, $post1);
            $cek = $this->M_user->updateuserrole($email, $post2);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update detailupgrade ' . $post1 . $post2,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('user/requestUser');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('user/requestUser');
            }
        }
    }

    public function deleteUpgrade($id)
    {
        $result = $this->M_user->deleteUpgradeuser($id);

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'delete upgrade ',
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

        redirect('user/requestUser');
    }

    public function log()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // $query = $this->M_user->getLog();
        // $data['log'] = $query->result_array();

        $data['log'] = $this->M_user->getLog();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open log user ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('user/log', $data);
        $this->load->view('template/footer');
    }

    public function layananpengguna()
    {
        //session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getLayananPelanggan();
        $data['pesan'] = $query->result_array();

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'open layananpengguna ',
        ];
        $this->db->insert('user_log', $log);

        $this->load->view('template/header', $sess);
        $this->load->view('user/pesan', $data);
        $this->load->view('template/footer');
    }

    public function detailpesan($id_lp)
    {
        //data dari session
        $sess['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $query = $this->M_user->getSinglePesan('id_lp', $id_lp);
        $data['p'] = $query->row_array();

        if ($this->input->post()) {
            $post['status_pesan'] = $this->input->post('status_pesan');

            $cek = $this->M_user->updatePesan($id_lp, $post);

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'update detailpesan ' . $post . $id_lp,
            ];
            $this->db->insert('user_log', $log);

            if ($cek) {
                $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Data berhasil diperbaharui !
                    </div>');
                redirect('user/layananpengguna');
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Data gagal diperbaharui atau tidak ada perubahan !
                </div>');
                redirect('user/layananpengguna');
            }
        }

        $this->load->view('template/header', $sess);
        $this->load->view('user/detailpesan', $data);
        $this->load->view('template/footer');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'master.lp3m.ubp@gmail.com',
            'smtp_pass' => 'ilhamhadi98',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
        ];

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('master.lp3m.ubp@gmail.com', 'Administrator');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Email Verifikasi | SISTEM INFORMASI LP3M');
            $this->email->message('
            <!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html
            style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">

            <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title>Email Verification</title>
            <!--[if (mso 16)]>
                <style type="text/css">
                a {text-decoration: none;}
                </style>
                <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <style type="text/css">
                @media only screen and (max-width:600px) {

                p,
                ul li,
                ol li,
                a {
                    font-size: 16px !important;
                    line-height: 150% !important
                }

                h1 {
                    font-size: 30px !important;
                    text-align: center;
                    line-height: 120%
                }

                h2 {
                    font-size: 26px !important;
                    text-align: center;
                    line-height: 120%
                }

                h3 {
                    font-size: 20px !important;
                    text-align: center;
                    line-height: 120%
                }

                h1 a {
                    font-size: 30px !important
                }

                h2 a {
                    font-size: 26px !important
                }

                h3 a {
                    font-size: 20px !important
                }

                .es-menu td a {
                    font-size: 16px !important
                }

                .es-header-body p,
                .es-header-body ul li,
                .es-header-body ol li,
                .es-header-body a {
                    font-size: 16px !important
                }

                .es-footer-body p,
                .es-footer-body ul li,
                .es-footer-body ol li,
                .es-footer-body a {
                    font-size: 16px !important
                }

                .es-infoblock p,
                .es-infoblock ul li,
                .es-infoblock ol li,
                .es-infoblock a {
                    font-size: 12px !important
                }

                *[class="gmail-fix"] {
                    display: none !important
                }

                .es-m-txt-c,
                .es-m-txt-c h1,
                .es-m-txt-c h2,
                .es-m-txt-c h3 {
                    text-align: center !important
                }

                .es-m-txt-r,
                .es-m-txt-r h1,
                .es-m-txt-r h2,
                .es-m-txt-r h3 {
                    text-align: right !important
                }

                .es-m-txt-l,
                .es-m-txt-l h1,
                .es-m-txt-l h2,
                .es-m-txt-l h3 {
                    text-align: left !important
                }

                .es-m-txt-r img,
                .es-m-txt-c img,
                .es-m-txt-l img {
                    display: inline !important
                }

                .es-button-border {
                    display: block !important
                }

                a.es-button {
                    font-size: 20px !important;
                    display: block !important;
                    border-width: 10px 0px 10px 0px !important
                }

                .es-btn-fw {
                    border-width: 10px 0px !important;
                    text-align: center !important
                }

                .es-adaptive table,
                .es-btn-fw,
                .es-btn-fw-brdr,
                .es-left,
                .es-right {
                    width: 100% !important
                }

                .es-content table,
                .es-header table,
                .es-footer table,
                .es-content,
                .es-footer,
                .es-header {
                    width: 100% !important;
                    max-width: 600px !important
                }

                .es-adapt-td {
                    display: block !important;
                    width: 100% !important
                }

                .adapt-img {
                    width: 100% !important;
                    height: auto !important
                }

                .es-m-p0 {
                    padding: 0px !important
                }

                .es-m-p0r {
                    padding-right: 0px !important
                }

                .es-m-p0l {
                    padding-left: 0px !important
                }

                .es-m-p0t {
                    padding-top: 0px !important
                }

                .es-m-p0b {
                    padding-bottom: 0 !important
                }

                .es-m-p20b {
                    padding-bottom: 20px !important
                }

                .es-mobile-hidden,
                .es-hidden {
                    display: none !important
                }

                .es-desk-hidden {
                    display: table-row !important;
                    width: auto !important;
                    overflow: visible !important;
                    float: none !important;
                    max-height: inherit !important;
                    line-height: inherit !important
                }

                .es-desk-menu-hidden {
                    display: table-cell !important
                }

                table.es-table-not-adapt,
                .esd-block-html table {
                    width: auto !important
                }

                table.es-social {
                    display: inline-block !important
                }

                table.es-social td {
                    display: inline-block !important
                }
                }

                #outlook a {
                padding: 0;
                }

                .ExternalClass {
                width: 100%;
                }

                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                line-height: 100%;
                }

                .es-button {
                mso-style-priority: 100 !important;
                text-decoration: none !important;
                }

                a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                }

                .es-desk-hidden {
                display: none;
                float: left;
                overflow: hidden;
                width: 0;
                max-height: 0;
                line-height: 0;
                mso-hide: all;
                }
            </style>
            </head>

            <body
            style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
            <div class="es-wrapper-color" style="background-color:transparent;">
                <!--[if gte mso 9]>
                        <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                            <v:fill type="tile" color="transparent" origin="0.5, 0" position="0.5,0"></v:fill>
                        </v:background>
                    <![endif]-->
                <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
                <tr style="border-collapse:collapse;">
                    <td valign="top" style="padding:0;Margin:0;">
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top;"
                                align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;"><img class="adapt-img"
                                                src="https://fvlgqx.stripocdn.email/content/guids/CABINET_0491c9538741f6792452a64971135520/images/13251581321144458.jpg"
                                                alt
                                                style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"
                                                width="560"></td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:20px;Margin:0;">
                                            <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"
                                                role="presentation"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                <tr style="border-collapse:collapse;">
                                                <td
                                                    style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;">
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-bottom:10px;">
                                            <h1
                                                style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#333333;text-align:center;">
                                                Hai,<br></h1>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-bottom:20px;">
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:27px;color:#999999;">
                                                Terima kasih sudah mendaftar, ini adalah email verifikasi yang dikirimkan secara
                                                otomatis untuk memverifikasi akun kamu, klik tombol dibawah untuk verifikasi :<br>
                                            </p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:10px;Margin:0;"><span class="es-button-border"
                                                style="border-style:solid;border-color:#2196F3;background:#2196F3 none repeat scroll 0% 0%;border-width:0px 0px 2px 0px;display:inline-block;border-radius:30px;width:auto;"><a
                                                href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"
                                                class="es-button" target="_blank"
                                                style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#2196F3;border-width:10px 20px 10px 20px;display:inline-block;background:#2196F3 none repeat scroll 0% 0%;border-radius:30px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;">
                                                Verifikasi
                                                Sekarang</a></span></td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left"
                                style="Margin:0;padding-top:15px;padding-bottom:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center"
                                            style="padding:0;Margin:0;padding-bottom:20px;padding-top:30px;">
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:17px;color:#999999;">
                                                Jika kamu tidak merasa mendaftar silahkan abaikan email ini dan jika memiliki
                                                kendala saat memverifikasi silahkan menghubungi administrator melalui email.</p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left"
                                style="Margin:0;padding-top:15px;padding-bottom:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-infoblock" align="center"
                                            style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;">
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:14px;color:#CCCCCC;">
                                                <a target="_blank" href="https://ubpkarawang.ac.id"
                                                style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC;">Kunjungi
                                                website</a></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-footer-body"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"
                            width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#FFFFFF;"
                                bgcolor="#ffffff" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;">
                                            <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0"
                                                role="presentation"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                <tr style="border-collapse:collapse;">
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Facebook"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png"
                                                    alt="Fb" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Twitter"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png"
                                                    alt="Tw" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Instagram"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png"
                                                    alt="Inst" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;"><img title="Youtube"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png"
                                                    alt="Yt" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;">
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#999999;">
                                                Lembaga Pengembangan, Pendidikan dan Penjaminan Mutu<br></p>
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#999999;">
                                                Universitas Buana Perjuangan Karawang <br></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;background-position:center top;background-color:#FFFFFF;"
                                bgcolor="#ffffff" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top;"
                                        width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;">
                                            <p
                                                style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#00CE8D;">
                                                <strong></strong><br></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top;"
                                        width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                        <tr style="border-collapse:collapse;">
                                            <td align="left" style="padding:0;Margin:0;padding-top:5px;">
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                </table>
            </div>
            </body>

            </html>
            ');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Sandi | SISTEM INFORMASI LP3M');
            $this->email->message('
            <!DOCTYPE html
            PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html style="width:100%;font-family:arial, " helvetica neue", helvetica,
            sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">

            <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title>Reset Password</title>
            <!--[if (mso 16)]>
                            <style type="text/css">
                            a {text-decoration: none;}
                            </style>
                            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <style type="text/css">
                @media only screen and (max-width:600px) {

                p,
                ul li,
                ol li,
                a {
                    font-size: 16px !important;
                    line-height: 150% !important
                }

                h1 {
                    font-size: 30px !important;
                    text-align: center;
                    line-height: 120%
                }

                h2 {
                    font-size: 26px !important;
                    text-align: center;
                    line-height: 120%
                }

                h3 {
                    font-size: 20px !important;
                    text-align: center;
                    line-height: 120%
                }

                h1 a {
                    font-size: 30px !important
                }

                h2 a {
                    font-size: 26px !important
                }

                h3 a {
                    font-size: 20px !important
                }

                .es-menu td a {
                    font-size: 16px !important
                }

                .es-header-body p,
                .es-header-body ul li,
                .es-header-body ol li,
                .es-header-body a {
                    font-size: 16px !important
                }

                .es-footer-body p,
                .es-footer-body ul li,
                .es-footer-body ol li,
                .es-footer-body a {
                    font-size: 16px !important
                }

                .es-infoblock p,
                .es-infoblock ul li,
                .es-infoblock ol li,
                .es-infoblock a {
                    font-size: 12px !important
                }

                *[class="gmail-fix"] {
                    display: none !important
                }

                .es-m-txt-c,
                .es-m-txt-c h1,
                .es-m-txt-c h2,
                .es-m-txt-c h3 {
                    text-align: center !important
                }

                .es-m-txt-r,
                .es-m-txt-r h1,
                .es-m-txt-r h2,
                .es-m-txt-r h3 {
                    text-align: right !important
                }

                .es-m-txt-l,
                .es-m-txt-l h1,
                .es-m-txt-l h2,
                .es-m-txt-l h3 {
                    text-align: left !important
                }

                .es-m-txt-r img,
                .es-m-txt-c img,
                .es-m-txt-l img {
                    display: inline !important
                }

                .es-button-border {
                    display: block !important
                }

                a.es-button {
                    font-size: 20px !important;
                    display: block !important;
                    border-width: 10px 0px 10px 0px !important
                }

                .es-btn-fw {
                    border-width: 10px 0px !important;
                    text-align: center !important
                }

                .es-adaptive table,
                .es-btn-fw,
                .es-btn-fw-brdr,
                .es-left,
                .es-right {
                    width: 100% !important
                }

                .es-content table,
                .es-header table,
                .es-footer table,
                .es-content,
                .es-footer,
                .es-header {
                    width: 100% !important;
                    max-width: 600px !important
                }

                .es-adapt-td {
                    display: block !important;
                    width: 100% !important
                }

                .adapt-img {
                    width: 100% !important;
                    height: auto !important
                }

                .es-m-p0 {
                    padding: 0px !important
                }

                .es-m-p0r {
                    padding-right: 0px !important
                }

                .es-m-p0l {
                    padding-left: 0px !important
                }

                .es-m-p0t {
                    padding-top: 0px !important
                }

                .es-m-p0b {
                    padding-bottom: 0 !important
                }

                .es-m-p20b {
                    padding-bottom: 20px !important
                }

                .es-mobile-hidden,
                .es-hidden {
                    display: none !important
                }

                .es-desk-hidden {
                    display: table-row !important;
                    width: auto !important;
                    overflow: visible !important;
                    float: none !important;
                    max-height: inherit !important;
                    line-height: inherit !important
                }

                .es-desk-menu-hidden {
                    display: table-cell !important
                }

                table.es-table-not-adapt,
                .esd-block-html table {
                    width: auto !important
                }

                table.es-social {
                    display: inline-block !important
                }

                table.es-social td {
                    display: inline-block !important
                }
                }

                #outlook a {
                padding: 0;
                }

                .ExternalClass {
                width: 100%;
                }

                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                line-height: 100%;
                }

                .es-button {
                mso-style-priority: 100 !important;
                text-decoration: none !important;
                }

                a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                }

                .es-desk-hidden {
                display: none;
                float: left;
                overflow: hidden;
                width: 0;
                max-height: 0;
                line-height: 0;
                mso-hide: all;
                }
            </style>
            </head>

            <body style="width:100%;font-family:arial, " helvetica neue", helvetica,
            sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
            <div class="es-wrapper-color" style="background-color:transparent;">
                <!--[if gte mso 9]>
                                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                        <v:fill type="tile" color="transparent" origin="0.5, 0" position="0.5,0"></v:fill>
                                    </v:background>
                                <![endif]-->
                <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;">
                <tr style="border-collapse:collapse;">
                    <td valign="top" style="padding:0;Margin:0;">
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top;"
                                align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;"><img class="adapt-img"
                                                src="https://fvlgqx.stripocdn.email/content/guids/CABINET_0491c9538741f6792452a64971135520/images/13251581321144458.jpg"
                                                alt
                                                style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"
                                                width="560"></td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:20px;Margin:0;">
                                            <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"
                                                role="presentation"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                <tr style="border-collapse:collapse;">
                                                <td
                                                    style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;">
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-bottom:10px;">
                                            <h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial, "
                                                helvetica neue", helvetica,
                                                sans-serif;font-size:30px;font-style:normal;font-weight:normal;color:#333333;text-align:center;">
                                                Hai,<br></h1>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;padding-bottom:20px;">
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:27px;color:#999999;">
                                                Kami menerima permintaan untuk mengatur ulang kata sandi pada akunmu, klik tombol
                                                dibawah untuk mengatur ulang kata sandi akunmu :<br>
                                            </p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:10px;Margin:0;"><span class="es-button-border"
                                                style="border-style:solid;border-color:#2196F3;background:#2196F3 none repeat scroll 0% 0%;border-width:0px 0px 2px 0px;display:inline-block;border-radius:30px;width:auto;"><a
                                                href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"
                                                class="es-button" target="_blank"
                                                style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "
                                                helvetica neue", helvetica,
                                                sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#2196F3;border-width:10px
                                                20px 10px 20px;display:inline-block;background:#2196F3 none repeat scroll 0%
                                                0%;border-radius:30px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;">
                                                Atur Ulang Kata Sandi
                                                </a></span></td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left"
                                style="Margin:0;padding-top:15px;padding-bottom:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center"
                                            style="padding:0;Margin:0;padding-bottom:20px;padding-top:30px;">
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:17px;color:#999999;">
                                                Jika kamu tidak merasa melakukan pengaturan ulang sandi silahkan abaikan email ini
                                                dan jika memiliki
                                                kendala saat masuk ke dalam sistem silahkan menghubungi administrator melalui email.
                                            </p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left"
                                style="Margin:0;padding-top:15px;padding-bottom:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-infoblock" align="center"
                                            style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;">
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:14px;color:#CCCCCC;">
                                                <a target="_blank" href="https://ubpkarawang.ac.id"
                                                style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "
                                                helvetica neue", helvetica,
                                                sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC;">Kunjungi
                                                website</a></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-footer-body"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"
                            width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#FFFFFF;"
                                bgcolor="#ffffff" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;">
                                            <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0"
                                                role="presentation"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                                <tr style="border-collapse:collapse;">
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Facebook"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png"
                                                    alt="Fb" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Twitter"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png"
                                                    alt="Tw" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;padding-right:10px;">
                                                    <img title="Instagram"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png"
                                                    alt="Inst" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                <td valign="top" align="center" style="padding:0;Margin:0;"><img title="Youtube"
                                                    src="https://fvlgqx.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png"
                                                    alt="Yt" width="32"
                                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;">
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr style="border-collapse:collapse;">
                                            <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;">
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:21px;color:#999999;">
                                                Lembaga Pengembangan, Pendidikan dan Penjaminan Mutu<br></p>
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:21px;color:#999999;">
                                                Universitas Buana Perjuangan Karawang <br></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            <tr style="border-collapse:collapse;">
                                <td
                                style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;background-position:center top;background-color:#FFFFFF;"
                                bgcolor="#ffffff" align="left">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top;"
                                        width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                        <tr style="border-collapse:collapse;">
                                            <td class="es-m-txt-c" align="center" style="padding:0;Margin:0;">
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, "
                                                helvetica neue", helvetica, sans-serif;line-height:21px;color:#00CE8D;">
                                                <strong></strong><br></p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    <table class="es-footer" cellspacing="0" cellpadding="0" align="center"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;">
                        <tr style="border-collapse:collapse;">
                        <td align="center" style="padding:0;Margin:0;">
                            <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                            align="center"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;">
                            <tr style="border-collapse:collapse;">
                                <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;">
                                    <tr style="border-collapse:collapse;">
                                    <td width="560" valign="top" align="center" style="padding:0;Margin:0;">
                                        <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top;"
                                        width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                        <tr style="border-collapse:collapse;">
                                            <td align="left" style="padding:0;Margin:0;padding-top:5px;">
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                </table>
            </div>
            </body>

            </html>
            ');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
