<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('profil');
        }

        $query = $this->M_auth->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        $query = $this->M_auth->getPengajar();
        $data['pengajar'] = $query->result_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus di isi!',
            'valid_email' => 'Email yang dimasukan tidak sesuai'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kata sandi harus di isi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header');
            $this->load->view('auth/login', $data);
            $this->load->view('template/auth_footer');
        } else {
            //pindahkan ke validasi
            $this->_login();
        }
    }

    public function layanan_pelanggan()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
        $this->form_validation->set_rules('subjek', 'Subjek', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {
            redirect('auth');
        } else {
            $data['nama_depan'] = $this->input->post('nama_depan');
            $data['nama_belakang'] = $this->input->post('nama_belakang');
            $data['subjek'] = $this->input->post('subjek');
            $data['email'] = $this->input->post('email');
            $data['pesan'] = $this->input->post('pesan');

            $cek = $this->M_auth->insertLaporan($data);

            if ($cek) {
                $this->session->set_flashdata("pesan", '<div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Pesan berhasil dikirimkan !
                    </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata("pesan", '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Pesan gagal dikirimkan !
                </div>');
                redirect('auth');
            }
        }
    }

    public function blog($link_blog)
    {
        if ($this->session->userdata('email')) {
            redirect('profil');
        }

        $query = $this->M_auth->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        $query = $this->M_auth->getPengajar();
        $data['pengajar'] = $query->result_array();

        $query = $this->M_auth->getSingleBlog('link_blog', $link_blog);
        $data['blog'] = $query->row_array();

        $this->load->view('template/auth_header');
        $this->load->view('auth/blog', $data);
        $this->load->view('template/auth_footer');
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //cek validasi
        if ($user) {
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    //jika semua benar, simpan data ke session
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'prodi_id' => $user['prodi_id'],
                        'fakultas_id' => $user['fakultas_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {

                        //ambil data sistem
                        $this->load->library('user_agent');
                        $browser = $this->agent->browser();
                        $browser_version = $this->agent->version();
                        $os = $this->agent->platform();
                        $ip_address = $this->input->ip_address();

                        //login log
                        $log = [
                            'user_id' => $this->session->userdata('id'),
                            'message' => 'has logged in from the address ' . $ip_address . ' using ' . $browser . ' ' . $browser_version . ' os ' . $os,
                        ];
                        $this->db->insert('user_log', $log);

                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-success" role="alert">
                        <strong>Selamat!</strong> kamu berhasil masuk.
                        </div>
                        ');
                        redirect('profil');
                    } else {

                        //ambil data sistem
                        $this->load->library('user_agent');
                        $browser = $this->agent->browser();
                        $browser_version = $this->agent->version();
                        $os = $this->agent->platform();
                        $ip_address = $this->input->ip_address();

                        //login log
                        $log = [
                            'user_id' => $this->session->userdata('id'),
                            'message' => 'has been login from ' . $ip_address . ' using ' . $browser . ' ' . $browser_version . ' os ' . $os,
                        ];
                        $this->db->insert('user_log', $log);

                        $this->session->set_flashdata('pesan', '
                        <div class="alert alert-success" role="alert">
                        <strong>Selamat!</strong> kamu berhasil masuk.
                        </div>
                        ');
                        redirect('profil');
                    }
                } else {
                    //salah password
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-warning" role="alert">
                    <strong>Maaf!</strong> kata sandi yang dimasukan salah.
                    </div>
                    ');
                    redirect('auth');
                }
            } else {
                //jika belum verifikasi
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-warning" role="alert">
                <strong>Maaf!</strong> status pengguna nonaktif.
                </div>
                ');
                redirect('auth');
            }
        } else {
            //jika email tidak ada
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger" role="alert">
            <strong>Maaf!</strong> email tidak terdaftar.
            </div>
            ');
            redirect('auth');
        }
    }

    public function registration()
    {
        $query = $this->M_auth->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        $query = $this->M_auth->getPengajar();
        $data['pengajar'] = $query->result_array();

        if ($this->session->userdata('email')) {
            redirect('profil');
        }

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
            $this->load->view('template/auth_header');
            $this->load->view('auth/registration', $data);
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 7,
                'is_active' => 0,
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


            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
            <strong>Selamat!</strong> kamu sudah terdaftar, cek email kamu.
            </div>');
            redirect('auth');
        }
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

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', [
            'email' => $email
        ])->row_array();

        if ($user) {    //verifikasi email

            $user_token = $this->db->get_where('user_token', [
                'token' => $token
            ])->row_array();

            if ($user_token) { //verifikasi token

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {    //verifikasi expired token

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success" role="alert">
                    <strong>Selamat!</strong> ' . $email . ' akunmu sudah aktif, silahkan login.
                    </div>
                    ');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger" role="alert">
                    <strong>Maaf!</strong> aktifasi gagal, token kadaluarsa.
                    </div>
                    ');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger" role="alert">
                <strong>Maaf!</strong> aktifasi gagal, token yang dimasukan salah.
                </div>
                ');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger" role="alert">
            <strong>Maaf!</strong> aktifasi gagal, email yang dimasukan salah.
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        //ambil data sistem
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $browser_version = $this->agent->version();
        $os = $this->agent->platform();
        $ip_address = $this->input->ip_address();


        if ($this->session->userdata('id') == null) {
            $log = [
                'user_id' => 0,
                'message' => 'session timeout, user null'
            ];

            $this->db->insert('user_log', $log);
        } else {

            //login log
            $log = [
                'user_id' => $this->session->userdata('id'),
                'message' => 'logged out of the address ' . $ip_address . ' using ' . $browser . ' ' . $browser_version . ' os ' . $os,
            ];
            $this->db->insert('user_log', $log);
        }

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '
            <div class="alert alert-success" role="alert">
            <strong>Terima kasih!</strong> kamu berhasil keluar.
            </div>
            ');
        redirect('auth');
    }

    public function block()
    {
        // $this->load->view('template/auth_header');
        $this->load->view('auth/block');
        $this->load->view('template/auth_footer');

        //login log
        $log = [
            'user_id' => $this->session->userdata('id'),
            'message' => 'user access forbidden menu',
        ];
        $this->db->insert('user_log', $log);
    }

    public function forgotpassword()
    {
        $query = $this->M_auth->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        $query = $this->M_auth->getPengajar();
        $data['pengajar'] = $query->result_array();

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header');
            $this->load->view('auth/forgotpassword', $data);
            $this->load->view('template/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> link untuk reset password sudah dikirimkan.
                </div>
                ');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger" role="alert">
                <strong>Maaf!</strong> email tidak terdaftar atau belum terverifikasi.
                </div>
                ');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {    //verifikasi expired token

                    $this->session->set_userdata('reset_email', $email);
                    $this->changepassword();
                } else {

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> reset token gagal, token kadaluarsa.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> token tidak valid.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> email tidak terdaftar.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        $query = $this->M_auth->getKegiatan();
        $data['kegiatan'] = $query->result_array();

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        } else {
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');

            if ($this->form_validation->run() == false) {
                $this->load->view('template/auth_header');
                $this->load->view('auth/changepassword', $data);
                $this->load->view('template/auth_footer');
            } else {
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');

                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->unset_userdata('user_email');
                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('pesan', '<div class="alert alert alert-fill-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> reset sandi berhasil.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('auth');
            }
        }
    }

    public function tnc()
    {
        $this->load->view('template/auth_header');
        $this->load->view('auth/tnc');
        $this->load->view('template/auth_footer');
    }

    public function about()
    {
        $this->load->view('template/auth_header');
        $this->load->view('auth/about');
        $this->load->view('template/auth_footer');
    }
}
