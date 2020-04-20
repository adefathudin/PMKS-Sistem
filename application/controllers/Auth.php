<?php


class Auth extends MY_Controller {
    
    public function index() {
        if ($this->userlib->isLoggedin()) {
            redirect(base_url('laporan'));
            exit;
        }

        $this->load->view('login');
    }

    public function cek_login() {

        $email = $this->input->post('email');
        $user_id = md5($this->input->post('email'));
        $password = md5($this->input->post('password'));
        $qrcode = $this->input->get('qrcode');

         $login_service = $this->userlib->login($email, $password);
            if ($login_service){
                    redirect(base_url('laporan'));
            }else{
                $this->session->set_flashdata('message',  'user atau password salah');
                    redirect(base_url('auth'));
            }
    }

    //REGISTRASI PAGE
    public function registrasi() {
        $this->load->view('registrasi');
    }

    //LOGOUT
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function save_registrasi() {

        $user_id = md5($this->input->post('email'));
        $nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        //cek email terdaftar
        if ($this->users_detail_m->get_count(array('email' => $email)) > 0) {
            $this->session->set_flashdata('message', 'email <strong>' . $email . '</strong> sudah terdaftar');
            redirect('auth/registrasi');
        } else {

            //membuat qr code

            $this->load->library('qrcode/ciqrcode'); //pemanggilan library QR CODE

            $config['cacheable'] = true; //boolean, the default is true
            //$config['cachedir']     = './assets/'; //string, the default is application/cache/
            //$config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir'] = 'assets/img/user/qrcode/'; //direktori penyimpanan qr code
            $config['quality'] = true; //boolean, the default is true
            $config['size'] = '1024'; //interger, the default is 1024
            $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $qrcode = $user_id;
            $image_name = $qrcode . '.png'; //buat name dari qr code sesuai dengan user_id

            $params['data'] = $qrcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);


            $data_login = array(
                'user_id' => $user_id, 'password' => md5($password), 'email' => $email, 'qrcode' => $qrcode
            );

            $data_user_detail = array(
                'user_id' => $user_id, 'nama_lengkap' => $nama_lengkap,
                'email' => $email, 'type' => 'Basic Member', 'verifikasi_email' => 0, 'verifikasi_nomor_hp' => 1, 'kode_unik' => $code,
                'qrcode' => $qrcode
            );

            $insert_notifikasi = array(
                'user_id' => $user_id, 'judul' => 'Selamat Datang di WarungKoperasi', 'isi' => 'Kami berharap, Anda dan Kami bisa menjadi mitra yang Hebat ^_^'
            );


            if ($this->users_detail_m->save($data_user_detail)) {
                $this->users_login_m->save($data_login);
                $this->notifikasi_m->save($insert_notifikasi);
                $this->session->set_userdata($data_login);
                $this->session->set_flashdata('welcome_new_member', 'Kami berharap, Anda dan Kami bisa menjadi mitra yang Hebat ^_^');

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.warungkoperasi.my.id',
                    'smtp_port' => 587,
                    'smtp_user' => 'no-reply@warungkoperasi.my.id',
                    'smtp_pass' => 'hancamacul',
                    'smtp_username' => 'no-reply@warungkoperasi.my.id',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
                $message = "
          <html>
          <head>
          <title>Verifikasi E-Mail WarungKoperasi</title>
          </head>
          <body>
          <p>
          Selamat datang <b>" . $nama_lengkap . "</b>,
          <br><br>Terima kasih telah bergabung bersama kami, <a href='" . base_url() . "' target='_blank'><strong>WarungKoperasi</strong></a>. Akun anda saat ini belum sepenuhnya aktif, silahkan
          klik link dibawah ini untuk mengaktifkannya:<br><br>

          <a href='" . base_url() . "auth/aktivasi/" . $this->session->userdata('user_id') . "/" . $code . "'>" . base_url() . "auth/aktivasi/" . $this->session->userdata('user_id') . "/" . $code . "</a>
          <br><br>
          Jika anda tidak merasa melakukan registrasi, silahkan abaikan email ini.
          <br>Terima kasih
          <br><br><br>
          Best Regards,
          <br><b>WarungKoperasi Team</b></p>
          </body>
          </html>
          ";

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($config['smtp_user'], 'WarungKoperasi');
                $this->email->to($email);
                $this->email->subject('Selamat Datang di WarungKoperasi');
                $this->email->message($message);

                //sending email
                if ($this->email->send()) {
                    
                } else {
                    //$this->session->set_flashdata('message', $this->email->print_debugger());    
                }
            }
            redirect('dashboard');
        }
    }

//aktivasi email

    public function aktivasi() {

        $user_id = $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->users_detail_m->get_user($user_id);

        //if code matches
        if ($user->kode_unik == $code) {
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);
            //update user active status
            $data['verifikasi_email'] = 1;
            $data['kode_unik'] = $code;
            $query = $this->users_detail_m->save($data, $user_id);

            if ($query) {
                $this->session->set_flashdata('message', 'Email anda berhasil diverifikasi');
            } else {
                $this->session->set_flashdata('message', 'Ada sesuatu yang salah saat verifikasi');
            }
        } else {
            $this->session->set_flashdata('message', 'Link verifikasi email tidak valid');
        }
        redirect('dashboard');
    }

}
